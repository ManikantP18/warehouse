<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class BankStatementController extends Controller
{
   function index() {
    $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
    return view('bankStatement/list',$data);
   }

    function getCompanyBanks(Request $request) {
      $company_id = $request->company_id;

      $banks = DB::select("
         SELECT account_id, bank_name, account_name 
         FROM ledgerbank_accounts 
         WHERE company_id = ? AND is_deleted = 0
      ", [$company_id]);

      return response()->json([
         'success' => true,
         'data' => $banks
      ]);
   }

   public function getBankStatement(Request $request)
{
    $bank_id = $request->bank_id;

    $statement = DB::table('payment_statement')
        ->where('bank_id', $bank_id)
        ->where('ladger_id','')
        ->where('is_deleted', 0)
        ->orderBy('pay_id', 'desc')
        ->get();

    $comp_name = DB::table('ledgerbank_accounts')
        ->where('account_id', $bank_id)
        ->value('bank_name');

    return view('bankStatement.statement_table', compact('statement','comp_name'))->render();
}

}
