<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SelltoModel;

use Illuminate\Support\Facades\Redirect;

use DB;

class SelltoController extends Controller
{
    public function index(){
        $data['sellto'] = DB::select("select sell_to.*,ledgerbank_accounts.bank_name as branchname , company.company_name from sell_to join ledgerbank_accounts on ledgerbank_accounts.account_id = sell_to.bank_name join company on company.company_id = sell_to.company_id where sell_to = 'farmer' and sell_to.is_deleted = 0 order by sell_id DESC");
        return view('sellto/list',$data);

    }

     function create(){
        
        $data['items'] = DB::select("select *,product_services.id AS pid, product_services.name AS item_name from product_services join taxes on product_services.tax_id = taxes.id where type = 'Product'"); 

        $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 

        $data['units'] = DB::select("select * from product_service_units");

        $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");

        
        return view('sellto/create',$data);
    }

    function getItems(Request $req) {
        $comp_id = $req->input('cmp_id');
         $items = DB::select("select *,product_services.id AS pid, product_services.name AS item_name from product_services join taxes on product_services.tax_id = taxes.id where type = 'Product' and company_id = ' $comp_id' group by product_services.id");
         $opt = '<option value=""> Select Items </option>';

        if(!empty($items)){
            
            foreach($items as $ln) {

                $pid = $ln->pid;

                $opt .= "<option value='$pid'>$ln->item_name</option>";

            }
        }

        $banks = DB::select("select * from ledgerbank_accounts where company_id = ' $comp_id' ");
         $bopt = '<option value=""> Select Bank </option>';

        if(!empty($banks)){
            
            foreach($banks as $ln) {

                $bopt .= "<option value='$ln->account_id'>$ln->bank_name ($ln->account_num)</option>";

            }
        }

        echo json_encode(array('items' => $opt, 'banks'=> $bopt));
    }

    function lotno(Request $request) {
        $itemId = $request->item;

        $lotno = DB::select("SELECT `lot_no` FROM products_inventory WHERE item_id = '$itemId'");

        $opt = '<option value=""> Select Lot No. </option>';

        if(!empty($lotno)){
            
            foreach($lotno as $ln) {

                $lotnumber = $ln->lot_no;

                $opt .= "<option value='$lotnumber'>$lotnumber</option>";

            }
        } else {
             $lotno = DB::select("select lotno from product_services where type = 'Product' AND id  = '$itemId'"); 

             if(!empty($lotno)){
            
            foreach($lotno as $ln) {

                $lotnumber = $ln->lotno;

                $opt .= "<option value='$lotnumber'>$lotnumber</option>";

            }
        }

    }

        echo $opt;
    }

    function add(Request $req){
        $cashcredit = $req->input('sellto_cash/credit');
        $farmerother = $req->input('sellto_farmer/other');
        $accno = $req->input('sellto_account_number');
        $phone = $req->input('sellto_phone');
        $csname = $req->input('sellto_customer_name');
        $accholder = $req->input('sellto_acc_holder');
        $oname = $req->input('sellto_owner_name');
        $village = $req->input('sellto_village');
        
        $cashamm = $req->input('sellto_cash_amount');
        $creditamm = $req->input('sellto_Credit_amount');
        $remainamm = $req->input('sellto_Remaining_amount');
        $bank_name = $req->input('bank_name');
        $comp_id = $req->input('company_id');


        $total = $req->input('sellto_total_amount');
        $s_id = $req-> input ('sell_id');

        $lastId = DB::table('sell_to')->insertGetId([
            'sell_way'            => $cashcredit,
            'sell_to'             => $farmerother,
            'sell_account_number' => $accno,
            'sell_phone'          => $phone,
            'sell_relation_customer' => $csname,
            'sell_account_name'   => $accholder,
            'sell_property_owner' => $oname,
            'sell_village'        => $village,
            'sell_total_ammount'  => $total,
            'cash_amount'         => $cashamm,
            'credit_amount'       => $creditamm,
            'remaining_amount'    => $remainamm,
            'bank_name'           => $bank_name,
            'company_id'          => $comp_id
        ]);

        $itemselled = $req->input('sellto_item_selled');
         $quantity = $req->input('sellto_quantity');
        $rate = $req->input('sellto_rate');
        $total = $req->input('sellto_total_amount');
         $gst = $req->input('sellto_gst_amount');
         $units = $req->input('purchase_unit');
         $lotno = $req->input('purchase_lot_no');


         for($i=0; $i<count($itemselled); $i++){

            if(!empty($itemselled[$i]) && !empty($rate[$i])){

                DB::insert("Insert into selled_item (selled_item,selled_quantity,sell_unit,selled_gst,selled_rate,selled_lot_no,sell_id) VALUES ('$itemselled[$i]', '$quantity[$i]',$units[$i] , '$gst[$i]', '$rate[$i]' ,'$lotno[$i]','$lastId')");

            }

         }

         $avbl_bal = -$total;

         $lastAvailableBal = DB::select("select avbl_bal from payment_statement where ladger_id = '$accno' AND pay_status  = 1 AND is_deleted = 0 AND comp_id = '$comp_id' ORDER BY pay_id DESC LIMIT 1"); 
         if(!empty($lastAvailableBal)){
            
            foreach($lastAvailableBal as $ln) {

                $avbl_bal = $ln->avbl_bal - $total;

                DB::insert("Insert into payment_statement (ladger_id,sell_id,pay_type,prtclr,dr_amt,avbl_bal,comp_id) VALUES ('$accno','$lastId','Sale','$lastId','$total','$avbl_bal','$comp_id')");

            }


        } else {

            DB::insert("Insert into payment_statement (ladger_id,sell_id,pay_type,prtclr,dr_amt,avbl_bal,comp_id) VALUES ('$accno','$lastId','Sale','$lastId','$total','-$total','$comp_id')");

        }

        if(!empty($cashamm) && $cashamm > 0){

            $avbl_bal = $avbl_bal + $cashamm;

            DB::insert("Insert into payment_statement (ladger_id,sell_id,pay_type,prtclr,cr_amt,avbl_bal,comp_id) VALUES ('$accno','$lastId','Sale','Cash','$cashamm','$avbl_bal','$comp_id')");

            $cashAvblBal = DB::select("
    SELECT ps.avbl_bal
    FROM payment_statement ps
    JOIN (
        SELECT account_id
        FROM ladgers
        WHERE relational_cust_name = 'Cash In Hand'
        ORDER BY ladger_id DESC
        LIMIT 1
    ) AS l ON ps.ladger_id = l.account_id
    WHERE ps.pay_status = 1
      AND ps.is_deleted = 0
      AND ps.comp_id = '$comp_id'
    ORDER BY ps.pay_id DESC
    LIMIT 1
");

            $cashLadgerBalanceAmt = 0;

            if(!empty($cashAvblBal)){

                $cashLadgerBalanceAmt = $cashAvblBal[0]->avbl_bal;

            }

            $cashLadgerBalanceAmt = $cashLadgerBalanceAmt + $cashamm;

            $cashLadgerId = DB::select("SELECT account_id
        FROM ladgers
        WHERE relational_cust_name = 'Cash In Hand'
        ORDER BY ladger_id DESC
        LIMIT 1");

        $cashLadgerAcc = 'Cash Ladger';

        if(!empty($cashLadgerId)){
            $cashLadgerAcc = $cashLadgerId[0]->account_id;
        }

            DB::insert("Insert into payment_statement (ladger_id,sell_id,pay_type,prtclr,cr_amt,avbl_bal,comp_id) VALUES ('$cashLadgerAcc','$lastId','Sale','$csname','$cashamm','$cashLadgerBalanceAmt','$comp_id')");



        }

        if(!empty($creditamm) && $creditamm > 0){

            $avbl_bal = $avbl_bal + $creditamm;

            $bank = DB::select("select bank_name,account_num FROM ledgerbank_accounts WHERE account_id  = $bank_name ");

            foreach($bank as $b) {

            DB::insert("Insert into payment_statement (ladger_id,sell_id,bank_id,pay_type,prtclr,cr_amt,avbl_bal,comp_id) VALUES ('$accno','$lastId','$bank_name','Sale','$b->bank_name.($b->account_num)','$creditamm','$avbl_bal','$comp_id')");

            $bank_bal = $creditamm;

            $bankBalance = DB::select("select avbl_bal from payment_statement where bank_id = '$bank_name' AND pay_status  = 1 AND is_deleted = 0 AND comp_id = '$comp_id' AND ladger_id = '' ORDER BY pay_id DESC LIMIT 1"); 
         

            if(!empty($bankBalance)){
                $bank_bal = $bank_bal + $bankBalance[0]->avbl_bal;
            }
            
                DB::insert("Insert into payment_statement (sell_id,pay_type,prtclr,dr_amt,cr_amt,avbl_bal,comp_id,bank_id) VALUES ('$lastId','Sale','$csname','0', '$creditamm','$bank_bal','$comp_id','$bank_name')");
            }

            

        }

        
        if($farmerother == 'farmer') {
            return Redirect::to('sellto');
        }
        return Redirect::to('othersSellto');
    }

    public function search(Request $req)
    {
            $searchVal = $req->input('searchVal'); // Account No or Mobile No
            $searchVillage = $req->input('searchVillage');
            $searchname = $req->input('searchname');
            $searchowner = $req->input('searchowner');

            $all = $req->input('all');
            

            if($all == 'no'){

                $searchData = DB::select("SELECT * FROM ladgers left join rogring on ladgers.ladger_id = rogring.ledgers
                left join users on rogring.Rogring_name = users.id WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%' AND farm_owner_name LIKE '%$searchowner%')
                ");

            } else {

                $searchData = DB::select("SELECT * FROM ladgers
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%' AND farm_owner_name LIKE '%$searchowner%')
                ");
                
            }
     
            $variety = DB::select("SELECT * FROM product_services join selled_item ON selled_item.selled_item = product_services.id join sell_to on sell_to.sell_id =  selled_item.sell_id
            WHERE sell_to.sell_account_number = '$searchVal' group by product_services.id");

             $Othervariety = DB::select("SELECT * FROM product_services group by product_services.id");


            if ($searchData) {
                return response()->json([
                    'success' => true,
                    'data' => $searchData,
                    'products' => $variety,
                    'otherProducts' => $Othervariety
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No record found.'
                ]);
            }

    }

    function others() {
         $data['sellto'] = DB::select("select * from sell_to where sell_to != 'farmer' and is_deleted = 0");
        return view('sellto/list',$data);
    }

    function delete($id) { 
        DB::update("update sell_to set is_deleted = 1 where sell_id = '$id'");
        //  return view('sellto/delete');
         return Redirect::to('sellto');
    }

    function edit($id) {
        $data['sellto'] = DB::select("select * from sell_to where sell_id = '$id' and sell_to = 'farmer' and is_deleted = 0");

        $data['units'] = DB::select("select * from product_service_units");

        $data['selleditems'] = DB::select("select * from selled_item where sell_id = '$id' and selled_status = 1");

        $data['items'] = DB::select("select * from product_services where type = 'Product'");

        $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product' AND product_services.id NOT IN(select selled_item from selled_item where sell_id = '$id' and selled_status = 1)");

        $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 

         $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
         
        return view('sellto/edit',$data);
    } 

    function update(Request $req) {
         $cashcredit = $req->input('sellto_cash/credit');
        $farmerother = $req->input('sellto_farmer/other');
        $accno = $req->input('sellto_account_number');
        $phone = $req->input('sellto_phone');
        $csname = $req->input('sellto_customer_name');
        $accholder = $req->input('sellto_acc_holder');
        $oname = $req->input('sellto_owner_name');
        $village = $req->input('sellto_village');
        $itemselled = $req->input('sellto_item_selled');
         $quantity = $req->input('sellto_quantity');
        $rate = $req->input('sellto_rate');
        $total = $req->input('sellto_total_amount');
         $gst = $req->input('sellto_gst_amount');
        $cashamm = $req->input('sellto_cash_amount');
        $creditamm = $req->input('sellto_Credit_amount');
        $remainamm = $req->input('sellto_Remaining_amount');
         $id = $req->input('sell_id');
         $cid = $req->input('company_id');


        DB::update("update sell_to set sell_way = '$cashcredit',sell_to = '$farmerother' ,sell_account_number = '$accno',sell_phone = '$phone',sell_relation_customer = '$csname',sell_account_name = '$accholder',sell_property_owner = '$oname',sell_village =  '$village',sell_total_ammount = '$total' ,company_id = '$cid', cash_amount = '$cashamm',credit_amount = '$creditamm',  remaining_amount = '$remainamm'  where sell_id = '$id'");

        $itemselled = $req->input('sellto_item_selled');
         $quantity = $req->input('sellto_quantity');
        $rate = $req->input('sellto_rate');
        $total = $req->input('sellto_total_amount');
         $gst = $req->input('sellto_gst_amount');
         $units = $req->input('purchase_unit');

         DB::update("update payment set sell_id ='$id',amount = '$total',pay_ladger_id ='$accno' ");

        DB::delete("delete from selled_item where sell_id = '$id'");

         for($i=0; $i<count($itemselled); $i++){

            if(!empty($itemselled[$i]) && !empty($rate[$i])){

                DB::insert("Insert into selled_item (selled_item,selled_quantity,sell_unit,selled_gst,selled_rate,sell_id) VALUES ('$itemselled[$i]', '$quantity[$i]',$units[$i] , '$gst[$i]', '$rate[$i]' ,'$id')");

            }

             

         }

        return Redirect::to('sellto');
    }

    public function filter(Request $request)
    {      
            $from = $request->input('from_date');
            $to = $request->input('to_date');

            $nextDay = date('Y-m-d',strtotime($to) + 86400);

            if (!$from || !$to) {
                return response()->json(['error' => 'Both dates are required'], 400);
            }

           $data['sellto'] = DB::table('sell_to')
            ->join('ledgerbank_accounts', 'ledgerbank_accounts.account_id', '=', 'sell_to.bank_name')
            ->join('company', 'company.company_id', '=', 'sell_to.company_id')
            ->select(
                'sell_to.*',
                'ledgerbank_accounts.bank_name as branchname',
                'company.company_name'
            )
            ->where('sell_to.sell_to', 'farmer')
            ->where('sell_to.is_deleted', 0)
            ->whereBetween('sell_to.sell_created_date', [$from, $nextDay]) // 👈 here
            ->orderByDesc('sell_to.sell_id')
            ->get();


            
            return view('sellto/filter',$data);
    }

}