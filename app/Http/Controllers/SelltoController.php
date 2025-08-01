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

    function lotno(Request $request) {
        $itemId = $request->item;

        $lotno = DB::select("SELECT `purchase_lot_no` FROM purchase WHERE purchase_item = '$itemId' AND purchase_lot_no > 0 GROUP by purchase_lot_no;");

        $opt = '<option value=""> Select Lot No. </option>';

        if(!empty($lotno)){
            
            foreach($lotno as $ln) {

                $lotnumber = $ln->purchase_lot_no;

                $opt .= "<option value='$lotnumber'>$lotnumber</option>";

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
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
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

        DB::delete("delete from selled_item where sell_id = '$id'");

         for($i=0; $i<count($itemselled); $i++){

            if(!empty($itemselled[$i]) && !empty($rate[$i])){

                DB::insert("Insert into selled_item (selled_item,selled_quantity,sell_unit,selled_gst,selled_rate,sell_id) VALUES ('$itemselled[$i]', '$quantity[$i]',$units[$i] , '$gst[$i]', '$rate[$i]' ,'$id')");

            }

             

         }

        return Redirect::to('sellto');
    }

}