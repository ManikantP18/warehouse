<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BankController extends Controller
{
    public function index()
    {
        $data['bankacc'] = DB::select("SELECT * FROM ledgerbank_accounts WHERE account_status = 1");
        return view('bankacc.list', $data);
    }

    public function create()
    {
        return view('bankacc.create');
    }

    public function add(Request $req)
    {
        DB::table('ledgerbank_accounts')->insert([
            'account_name' => $req->input('account_name'),
            'account_num' => $req->input('account_num'),
            'account_type' => $req->input('account_type'),
            'cheque_book' => $req->input('cheque_book'),
            'chequerange_from' => $req->input('chequerange_from'),
            'chequerange_to' => $req->input('chequerange_to'),
             'Bank_name' => $req->input('Bank_name'),
        ]);

        return Redirect::to('bankacc')->with('success', 'Bank account added successfully.');
    }

    function edit($id){
         $data['bankacc'] = DB::select("select * from ledgerbank_accounts where account_id = '$id'");
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
    $chequerange_from = $req->input('chequerange_from');
    $chequerange_to = $req->input('chequerange_to');

    DB::table('ledgerbank_accounts')->where('account_id', $account_id)->update([
        'ledger_id' => $ledger_id,
        'account_name' => $account_name,
        'account_num' => $account_num,
        'account_type' => $account_type,
        'cheque_book' => $cheque_book,
        'chequerange_from' => $chequerange_from,
        'chequerange_to' => $chequerange_to,
    ]);

    return Redirect::to('/bankacc')->with('success', 'Bank detail edited successfully.');
}
function delete($id) { 
        DB::update("update ledgerbank_accounts set account_status = 1 where account_id = '$id'");
        //  return view('sellto/delete');
         return Redirect::to('bankacc');
    }

}
