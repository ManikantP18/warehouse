<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Ladgerpayment_in extends Controller
{
    // 🔹 Index page
    public function index()
    {
        $company = DB::table('company')
            ->where('company_status', 1)
            ->where('is_deleted', 0)
            ->get();

        $payments = DB::table('payment_in as p')
            ->leftJoin('company as c', 'p.comp_id', '=', 'c.company_id')
            ->leftJoin('ledgerbank_accounts as b', 'p.bank_id', '=', 'b.account_id')
            ->leftJoin('ladgers as l', 'p.ladger_id', '=', 'l.account_id')
            ->where('p.is_deleted', 0)
            ->orderBy('p.in_id', 'desc')
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

        return view('payment_in/list', [
            'company' => $company,
            'payments' => $payments
        ]);
    }

    // 🔹 Create page
    public function create()
    {
        $data['company'] = DB::table('company')
            ->where('company_status', 1)
            ->where('is_deleted', 0)
            ->get();

        return view('payment_in/create', $data);
    }

    // 🔹 Search Banks by Company
    public function searchbanks(Request $req)
    {
        $cid = $req->input('cid');
        $banks = DB::table('ledgerbank_accounts')
            ->where('company_id', $cid)
            ->get();

        $opt = '<option value="">Select Bank</option>';
        foreach ($banks as $b) {
            $opt .= "<option value='$b->account_id'>$b->bank_name ($b->account_num)</option>";
        }

        return $opt;
    }

    

    // 🔹 Search Ladgers
    public function search(Request $req)
    {
        $searchVal = $req->input('searchVal');
        $searchVillage = $req->input('searchVillage');
        $searchname = $req->input('searchname');
        $searchowner = $req->input('searchowner');
        $all = $req->input('all') ?? 'no';

        if ($all == 'no') {
            $searchData = DB::select("
                SELECT *, ladgers.bank_name as ladgers_bank 
                FROM ladgers 
                LEFT JOIN sell_to ON sell_to.sell_account_number = ladgers.account_id
                LEFT JOIN product_services ON sell_to.item_selled = product_services.id
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%'
                AND farm_owner_name LIKE '%$searchowner%'
                GROUP BY sell_to.sell_account_number
                ORDER BY sell_to.sell_id
            ");
        } else {
            $searchData = DB::select("
                SELECT *, ladgers.bank_name as ladgers_bank 
                FROM ladgers
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%'
                AND farm_owner_name LIKE '%$searchowner%'
            ");
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

    // 🔹 Add Payment
    // 🔹 Add Payment
public function add(Request $req)
{
    $ladger_id = $req->input('ladger_id');
    $comp_id   = $req->input('comp_id');
    $cash_amt  = $req->input('cash_amt');
    $bank_amt  = $req->input('bank_amt');
    $bank_id   = $req->input('bank_id');
    $date      = $req->input('date');

    $avbl_bal = 0;

    // 🔹 Get last available balance of this ladger
    $lastAvailableBal = DB::select("SELECT avbl_bal FROM payment_statement WHERE ladger_id = '$ladger_id' AND pay_status = 1 AND is_deleted = 0 AND comp_id = '$comp_id' ORDER BY pay_id DESC LIMIT 1");

    if (!empty($lastAvailableBal)) {
        $avbl_bal = $lastAvailableBal[0]->avbl_bal;
    }

    // ---------------- CASH PAYMENT ---------------- //
    if (!empty($cash_amt) && $cash_amt > 0) {
        // ➤ Insert in payment_in table
        DB::table('payment_in')->insert([
            'ladger_id'    => $ladger_id,
            'bank_id'      => 0,
            'comp_id'      => $comp_id,
            'pay_type'     => 'Cash',
            'amount'       => $cash_amt,
            'created_date' => date('Y-m-d', strtotime($date))
        ]);

        $avbl_bal = $avbl_bal + $cash_amt;

        // ➤ Insert credit entry in ladger
        DB::insert("INSERT INTO payment_statement (ladger_id, pay_type, prtclr, cr_amt, avbl_bal, comp_id) VALUES ('$ladger_id', 'Payment In', 'Cash', '$cash_amt', '$avbl_bal', '$comp_id')");

        // 🔄 CASH LADGER UPDATE (Cash In Hand)
        $cashLadgerId = DB::selectOne("SELECT account_id FROM ladgers WHERE relational_cust_name = 'Cash In Hand' ORDER BY ladger_id DESC LIMIT 1");

        if ($cashLadgerId) {
            $cashLadgerAcc = $cashLadgerId->account_id;

            $lastCashBal = DB::selectOne("SELECT avbl_bal FROM payment_statement WHERE ladger_id = '$cashLadgerAcc' AND pay_status = 1 AND is_deleted = 0 AND comp_id = '$comp_id' ORDER BY pay_id DESC LIMIT 1");

            $cashBalance = $lastCashBal->avbl_bal ?? 0;
            $cashBalance = $cashBalance + $cash_amt;

            DB::insert("INSERT INTO payment_statement (ladger_id, pay_type, prtclr, cr_amt, avbl_bal, comp_id) VALUES ('$cashLadgerAcc', 'Payment In', 'Cash Received', '$cash_amt', '$cashBalance', '$comp_id')");
        }
    }

    // ---------------- BANK PAYMENT ---------------- //
    if (!empty($bank_amt) && $bank_amt > 0) {
        // ➤ Insert in payment_in table
        DB::table('payment_in')->insert([
            'ladger_id'    => $ladger_id,
            'bank_id'      => $bank_id,
            'comp_id'      => $comp_id,
            'pay_type'     => 'Bank',
            'amount'       => $bank_amt,
            'created_date' => date('Y-m-d', strtotime($date))
        ]);

        $avbl_bal = $avbl_bal + $bank_amt;

        $bank = DB::selectOne("SELECT bank_name FROM ledgerbank_accounts WHERE account_id = $bank_id");

        if ($bank) {
            $bankName = $bank->bank_name;

            // ➤ Credit entry to ladger
            DB::insert("INSERT INTO payment_statement (ladger_id, bank_id, pay_type, prtclr, cr_amt, avbl_bal, comp_id) VALUES ('$ladger_id', '$bank_id', 'Payment In', '$bankName', '$bank_amt', '$avbl_bal', '$comp_id')");

            // 🔄 Bank ledger entry
            $bankBalance = DB::selectOne("SELECT avbl_bal FROM payment_statement WHERE bank_id = '$bank_id' AND ladger_id = '' AND pay_status = 1 AND is_deleted = 0 AND comp_id = '$comp_id' ORDER BY pay_id DESC LIMIT 1");

            $bankBal = $bankBalance->avbl_bal ?? 0;
            $bankBal = $bankBal + $bank_amt;

            DB::insert("INSERT INTO payment_statement (pay_type, prtclr, cr_amt, dr_amt, avbl_bal, comp_id, bank_id) VALUES ('Ladger', 'Payment In', '$bank_amt', '0', '$bankBal', '$comp_id', '$bank_id')");
        }
    }

    return Redirect::to('payment_in');
}


}
