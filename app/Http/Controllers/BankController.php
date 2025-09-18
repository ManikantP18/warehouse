<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BankController extends Controller
{
    public function index()
    {
        $data['bankacc'] = DB::select("SELECT * FROM ledgerbank_accounts left join chequebookrange on chequebookrange.bank_id = ledgerbank_accounts.account_id  join company on company.company_id = ledgerbank_accounts.company_id WHERE account_status = 1 and ledgerbank_accounts.is_deleted=0  group by account_id order by chequebookrange.check_id ");
        
        return view('bankacc/list', $data);
    }

    public function create()
    {
         $data['range'] = DB::select("select * from chequebookrange ");
        $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
        return view('bankacc/create',$data);
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
            'company_id'       => $req->input('company_id'),

            'open_blnc_date'       => $req->input('open_blnc_date'),
        ]);

       $from = $req->input('chequerange_from'); // array
        $to   = $req->input('chequerange_to');   // array
        $tc   = $req->input('total_check');      // array

        if($req->input('cheque_book') != 'no'){

            for ($i = 0; $i < count($from); $i++) {
                if($tc[$i] > 0){

                    DB::insert("
                    INSERT INTO chequebookrange (bank_id, check_from, check_to, check_total) 
                    VALUES (?, ?, ?, ?)
                ", [$lastId, $from[$i], $to[$i], $tc[$i]]);

                }
                
            }

        }

        $bank_bal = $req->input('opening_bal');

        $cid = $req->input('company_id');

        DB::insert("Insert into payment_statement (pay_type,prtclr,dr_amt,cr_amt,avbl_bal,comp_id,bank_id) VALUES ('Opening Balance','Opening Balance','0', '$bank_bal','$bank_bal','$cid','$lastId')");
        


        return Redirect::to('bankacc')->with('success', 'Bank account added successfully.');
    }

    function edit($id){
         $data['bankacc'] = DB::select("select * from ledgerbank_accounts where account_id = '$id'");
         $data['range'] = DB::select("select * from chequebookrange where bank_id = '$id'");
         $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
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
    'Bank_name' => $req->input('Bank_name'), // ✅ ADD THIS LINE
]);


    DB::delete("delete from chequebookrange where bank_id = '$account_id'");


               $chequerange_from = $req->input('chequerange_from');
                $chequerange_to = $req->input('chequerange_to');
                $total_check = $req->input('total_check');

                if (is_array($chequerange_from)) {
                    for ($i = 0; $i < count($chequerange_from); $i++) {
                        if (!empty($chequerange_from[$i]) && $chequerange_from[$i] != 0) {
                            DB::insert("INSERT INTO chequebookrange (bank_id, check_from, check_to, check_total) 
                                        VALUES (?, ?, ?, ?)", [
                                            $account_id,
                                            $chequerange_from[$i],
                                            $chequerange_to[$i],
                                            $total_check[$i]
                                        ]);
                        }
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
