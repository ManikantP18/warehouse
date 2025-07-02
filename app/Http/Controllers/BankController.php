<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class BankController extends Controller

{

  

  function index() {
    $data['bankacc'] = DB::select("select * from ledgerbank_accounts where account_status = 1");
    return view('bankacc/list',$data);
  }
  function create(){

    return view('bankacc/create');
  }
    function add(Request $req){
        $account_name = $req->input('account_name');
        $account_num = $req->input('account_num');
        $account_type = $req->input('account_type');
        $cheque_book = $req->input('cheque_book');
        $chequerange_from = $req->input('chequerange_from');
        $chequerange_to = $req->input('chequerange_to');
       


        DB::insert("INSERT INTO ledgerbank_accounts (account_name, account_num, account_type, cheque_book, chequerange_from, chequerange_to) VALUES ('$account_name', '$account_num', '$account_type', '$cheque_book', '$chequerange_from', '$chequerange_to')");

            return Redirect::to('bankacc')->with('success', 'Bank account added successfully.');

    }

    public function edit($id)
{
    $bankAccount = DB::table('ledgerbank_accounts')->where('account_id', $id)->first();
    return view('bankacc');
}

public function update(Request $request, $id)
{
    DB::table('ledgerbank_accounts')
        ->where('account_id', $id)
        ->update([
            'account_name' => $request->account_name,
            'account_num' => $request->account_num,
            'account_type' => $request->account_type,
            'cheque_book' => $request->cheque_book,
            'chequerange_from' => $request->chequerange_from,
            'chequerange_to' => $request->chequerange_to,
        ]);

    return redirect('bankacc')->with('success', 'Account updated successfully.');
}



}
