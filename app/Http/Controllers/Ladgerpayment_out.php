<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Redirect;

class Ladgerpayment_out extends Controller

{
    function index() {
    $company = DB::table('company')
                ->where('company_status', 1)
                ->where('is_deleted', 0)
                ->get();

   $payments = DB::table('payment_outs as p')
    ->leftJoin('company as c', 'p.comp_id', '=', 'c.company_id')
    ->leftJoin('ledgerbank_accounts as b', 'p.bank_id', '=', 'b.account_id')
    ->leftJoin('ladgers as l', 'p.ladger_id', '=', 'l.account_id')
    ->where('p.is_deleted', 0)
    ->orderBy('p.pay_id', 'desc')
    ->select(
        'p.*',
        'c.company_name',
        'b.bank_name',
        'b.account_num',
        'l.relational_cust_name as ladger_name',
        'l.farm_owner_name',
        'l.village'
    )
    ->get();




    return view('payment_out/list', [
        'company' => $company,
        'payments' => $payments
    ]);
}


function create() {
    $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
   return view('payment_out/create',$data);
}

    public function searchbanks(Request $req){

        $cid = $req->input('cid'); 

        $banks = DB::select("select * from ledgerbank_accounts where company_id = ' $cid'");
         $opt = '<option value=""> Select Bank </option>';

        if(!empty($banks)){
            
            foreach($banks as $ln) {

                $opt .= "<option value='$ln->account_id '>$ln->bank_name ($ln->account_num)</option>";

            }
        }

        echo $opt;

    }

    
    public function getladgerbalance(Request $req){

        $cid = $req->input('cust');
        $cmpid = $req->input('comp_id');

        if(!empty($cmpid)){

            $avbl_bal = DB::select(" select avbl_bal as total_balance from payment_statement where ladger_id = '$cid' AND comp_id = '$cmpid' ORDER BY pay_id DESC limit 1");

        } else {

            $avbl_bal = DB::select("
            SELECT SUM(t.avbl_bal) as total_balance
            FROM (
                SELECT ps.comp_id, ps.avbl_bal
                FROM payment_statement ps
                INNER JOIN (
                    SELECT comp_id, MAX(pay_id) as last_id
                    FROM payment_statement
                    WHERE ladger_id = '$cid'
                    GROUP BY comp_id
                ) x ON ps.comp_id = x.comp_id AND ps.pay_id = x.last_id
                WHERE ps.ladger_id = '$cid'
            ) t
        ");

        }

        

        $totalBalance = $avbl_bal[0]->total_balance ?? 0;
         

        echo $totalBalance;

    }

    public function search(Request $req)

    
        {
            $searchVal = $req->input('searchVal'); 
            $searchVillage = $req->input('searchVillage');
            $searchname = $req->input('searchname');
            $searchowner = $req->input('searchowner');
            $all = $req->input('all') ? $req->input('all') : 'no';

            if($all == 'no'){

                $searchData = DB::select("SELECT *,ladgers.bank_name as ladgers_bank,product_services.name AS item_name FROM ladgers left join sell_to ON sell_to.sell_account_number = ladgers.account_id left join product_services ON sell_to.item_selled = product_services.id
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%'
                AND farm_owner_name LIKE '%$searchowner%')
                group by sell_to.sell_account_number order by sell_to.sell_id");

            } else {

                $searchData = DB::select("SELECT *,ladgers.bank_name as ladgers_bank FROM ladgers
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%'
                AND farm_owner_name LIKE '%$searchowner%')");

            }

            if ($searchData) {
                return response()->json([
                    'success' => true,
                    'data' => $searchData
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No record found.'
                ]);
            }

        }

       function history(Request $req) {
    $acc_id = $req->input('searchVal');
    $cid = $req->input('company');
    $fdate = $req->input('fromdate');    
    $todate = $req->input('todate');   
    $html = '';
    $totalBalance = 0; 

    if($cid == 'all'){
        $companies = DB::select("select * from company where company_status = 1 and is_deleted = 0");
    } else {
        $companies = DB::select("select * from company where company_id = $cid");
    }

    foreach($companies as $comp){
        $data['comp_name'] = $comp->company_name;
        
        $where = '';

        if(!empty($fdate)) {
            $where .= " AND created_date >= '$fdate' ";
        }

        if(!empty($todate)){
            $where .= " AND created_date <= '$todate'";
        }

        // company wise pura statement
        $data['statement'] = DB::select("
            select * from payment_statement 
            join ladgers on ladgers.account_id = payment_statement.ladger_id 
            where payment_statement.ladger_id = '$acc_id' 
            AND comp_id = '$comp->company_id' $where AND dr_amt > 0
            order by pay_id asc 
        ");

        // 👉 last available balance nikalna
        $lastBalance = DB::selectOne("
            select avbl_bal from payment_statement 
            where ladger_id = '$acc_id' AND comp_id = '$comp->company_id' $where AND dr_amt > 0
            order by pay_id desc limit 1 
        ");

        if($lastBalance){
            $totalBalance += $lastBalance->avbl_bal;
        }

        $html .= view('payment_out/list',$data);
    }

                $html .= '
                <div class="mt-4">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">Total Available Balance</h5>
                            <h3 class="fw-bold text-' . ($totalBalance > 0 ? 'success' : 'danger') . '">
                                ' . number_format($totalBalance) . ' ' . ($totalBalance > 0 ? 'Cr' : 'Dr') . '
                            </h3>
                        </div>
                    </div>
                </div>
            ';


    return $html;
}

function add(Request $req){
        $ladger_id = $req->input('ladger_id');
        $comp_id = $req->input('comp_id');
        $cash_amt = $req->input('cash_amt');
        $bank_amt = $req->input('bank_amt');
        $bank_id = $req->input('bank_id');
        $date = $req->input('date');

        $cheque_no = $req->input('cheque_no');

        // Save cash payment
        if(!empty($cash_amt) && $cash_amt > 0){
            DB::table('payment_outs')->insert([
                'ladger_id' => $ladger_id,
                'bank_id'   => 0,
                'comp_id'   => $comp_id,
                'pay_type'  => 'Cash',
                'ammount'   => $cash_amt,
                
                'created_date' => date('Y-m-d', strtotime($date))
            ]);
        }
        if(!empty($bank_amt) && $bank_amt > 0){

            $lastId = DB::table('payment_outs')->insert([
                        'ladger_id' => $ladger_id,
                        'bank_id'   => $bank_id,
                        'comp_id'   => $comp_id,
                        'pay_type'  => 'Bank',
                        'ammount'   => $bank_amt,
                        'cheque_no'   => $cheque_no,
                        'created_date' => date('Y-m-d', strtotime($date))
                    ]);

        }
        
        

        $avbl_bal = 0;

        $lastAvailableBal = DB::select("select avbl_bal from payment_statement where ladger_id = '$ladger_id' AND pay_status  = 1 AND is_deleted = 0 AND comp_id = '$comp_id' ORDER BY pay_id DESC LIMIT 1"); 
         if(!empty($lastAvailableBal)){
            
            foreach($lastAvailableBal as $ln) {

                    $avbl_bal = $ln->avbl_bal;

                }
         }

         $avbl_bal = $avbl_bal - $cash_amt;

        if(!empty($cash_amt) && $cash_amt > 0){
                DB::insert("Insert into payment_statement (ladger_id,pay_type,prtclr,dr_amt,avbl_bal,comp_id) VALUES ('$ladger_id','Payment','Cash','$cash_amt','$avbl_bal','$comp_id')");

            }

         if(!empty($cash_amt) && $cash_amt > 0){

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

            $cashLadgerBalanceAmt = $cashLadgerBalanceAmt - $cash_amt;

            $cashLadgerId = DB::select("SELECT account_id
        FROM ladgers
        WHERE relational_cust_name = 'Cash In Hand'
        ORDER BY ladger_id DESC
        LIMIT 1");

        $cashLadgerAcc = 'Cash Ladger';

        if(!empty($cashLadgerId)){
            $cashLadgerAcc = $cashLadgerId[0]->account_id;
        }

            DB::insert("Insert into payment_statement (ladger_id,pay_type,prtclr,dr_amt,avbl_bal,comp_id) VALUES ('$cashLadgerAcc','Payment','Cash','$cash_amt','$cashLadgerBalanceAmt','$comp_id')");



        }

        //---------------

        if (!empty($bank_amt) && $bank_amt > 0) {

    $avbl_bal = $avbl_bal - $bank_amt;

    $bank = DB::select("SELECT bank_name, account_num FROM ledgerbank_accounts WHERE account_id = $bank_id");

    foreach ($bank as $b) {

        $prtclr = $b->bank_name . ' (' . $b->account_num . ')';

        DB::insert("INSERT INTO payment_statement (ladger_id, bank_id, pay_type, prtclr, dr_amt, avbl_bal, comp_id) 
                    VALUES (?, ?, 'Payment', ?, ?, ?, ?)", 
                    [$ladger_id, $bank_id, $prtclr, $bank_amt, $avbl_bal, $comp_id]);

        $bank_bal = 0 - $bank_amt;

        $bankBalance = DB::select("SELECT avbl_bal FROM payment_statement 
                                   WHERE bank_id = ? AND pay_status = 1 AND is_deleted = 0 
                                   AND comp_id = ? AND ladger_id = '' 
                                   ORDER BY pay_id DESC LIMIT 1", 
                                   [$bank_id, $comp_id]);

        if (!empty($bankBalance)) {
            $bank_bal = $bankBalance[0]->avbl_bal - $bank_amt;
        }

        DB::insert("INSERT INTO payment_statement (pay_type, prtclr, cr_amt, dr_amt, avbl_bal, comp_id, bank_id) 
                    VALUES ('Ladger', 'Payment Out', '0', ?, ?, ?, ?)", 
                    [$bank_amt, $bank_bal, $comp_id, $bank_id]);
    }
}

        
        return Redirect::to('payment_out');
    }

}
