<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BankController extends Controller
{
    public function index()
    {
        $data['bankacc'] = DB::select("SELECT * FROM ledgerbank_accounts join chequebookrange on chequebookrange.bank_id = ledgerbank_accounts.account_id   WHERE account_status = 1 and is_deleted=0  group by account_id order by chequebookrange.check_id ");
        
        return view('bankacc.list', $data);
    }

    public function create()
    {
        return view('bankacc.create');
    }

    public function add(Request $req)
    {
        $lastId = DB::table('ledgerbank_accounts')->insertGetId([
            'account_name'      => $req->input('account_name'),
            'account_num'       => $req->input('account_num'),
            'account_type'      => $req->input('account_type'),
            'cheque_book'       => $req->input('cheque_book'),
            
            'Bank_name'         => $req->input('Bank_name'),
            'opening_bal'       => $req->input('opening_bal'),
        ]);

        $from = $req->input('chequerange_from');

        $to = $req->input('chequerange_to');
        $tc = $req->input('total_check');

        DB::insert("Insert into chequebookrange (bank_id,check_from,check_to,check_total) values ('$lastId','$from','$to','$tc')" );

        return Redirect::to('bankacc')->with('success', 'Bank account added successfully.');
    }

    function edit($id){
         $data['bankacc'] = DB::select("select * from ledgerbank_accounts where account_id = '$id'");
         $data['range'] = DB::select("select * from chequebookrange where bank_id = '$id'");
        return view('bankacc/edit',$data);
    }

     public function update(Request $req)
{
    $account_id = $req->input('account_id');
    $ledger_id = $req->input('ledger_id');
    $account_name = $req->input('account_name');
    $account_num = $req->input('account_num');
    $account_type = $req->input('account_type');
    $cheque_book = $req->input('cheque_book');
    
    
      $opening_bal = $req->input('opening_bal');
   

    DB::table('ledgerbank_accounts')->where('account_id', $account_id)->update([
        'ledger_id' => $ledger_id,
        'account_name' => $account_name,
        'account_num' => $account_num,
        'account_type' => $account_type,
        'cheque_book' => $cheque_book,
        'opening_bal' => $opening_bal,
    ]);

    DB::delete("delete from chequebookrange where bank_id = '$account_id'");


                 $chequerange_from = $req->input('chequerange_from');
                 $chequerange_to = $req->input('chequerange_to');
                  $total_check = $req->input('total_check');

                 for($i = 0 ; $i < count($chequerange_from) ; $i++) {
                    if($chequerange_from[$i] != '' && $chequerange_from[$i] != 0) {
                         DB::insert("Insert into chequebookrange (bank_id,check_from,check_to,check_total) values ($account_id,'$chequerange_from[$i]','$chequerange_to[$i]','$total_check[$i]')" );

                    }
                 }


    return Redirect::to('/bankacc')->with('success', 'Bank detail edited successfully.');
}
function delete($id) { 
        DB::update("update ledgerbank_accounts set is_deleted = 1 where account_id = '$id'");
        //  return view('sellto/delete');
         return Redirect::to('bankacc');
    }

}
