<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ledger;

use Illuminate\Support\Facades\Redirect;

use DB;

class LedgerController extends Controller
{
    public function index(){

        $data['ledger'] = DB::select('select * from ladgers where ladger_type = 1 and is_deleted = 0 order by ladger_id DESC');

        return view('ledger/ledgerlist',$data);

    }

    function create(){
     return view('ledger/ledgerceate');
    }

    function add(Request $req){
        
        $ladger_type = $req->input('ledger_type') == 'others' ? 2 : 1;
        $relational_cust_name = $req->input('relational_cust_name');
        $account_holder	 = $req->input('account_holder');
        $farm_owner_name = $req->input('farm_owner_name');
        $village = $req->input('village');
         $farm_area_acre = $req->input('farm_area_acre');
         $khasra_no = $req->input('khasra_no');
         $bhumi_gram = $req->input('bhumi_gram');
         $opening_balance = $req->input('opening_balance');
          $phone_number	 = $req->input('phone_number');
           $bank_account_name	 = $req->input('bank_account_name');
            $account_number	 = $req->input('account_number');
             $bank_name	 = $req->input('bank_name');
              $ifsc_code = $req->input('ifsc_code');
               $branch	 = $req->input('branch');
                $gst_num = $req->input('gst_num');
                $account_id = $this->customerNumber() > 0 ? 'cust-'.$this->customerNumber() : 'cust-1';
                


       DB::insert("Insert into ladgers ( account_id,ladger_type,relational_cust_name,account_holder,farm_owner_name,village,farm_area_acre,phone_number,bank_account_name,account_number,bank_name,ifsc_code,branch,gst_num,khasra_no,opening_balance,bhumi_gram) VALUES ('$account_id',$ladger_type,'$relational_cust_name', '$account_holder', '$farm_owner_name','$village','$farm_area_acre','$phone_number','$bank_account_name','$account_number','$bank_name','$ifsc_code','$branch','$gst_num','$khasra_no','$opening_balance','$bhumi_gram')");

        if($ladger_type == 1){
            return Redirect::to('ledger')->with('success', 'Ledger Create Successfully');
        } else{
            return Redirect::to('ledger/others')->with('success', 'Ledger Create Successfully');
        }
        
    }

    function validmobile(request $req){

        $phone_number = $req->input('mobileno');

        $exists = DB::table('ladgers')
    ->where('phone_number', $phone_number)
    ->where('is_deleted', 0)
    ->exists();

    if ($exists) {
        echo 'This phone number is already in use';
    }else {
        echo 'ok';
    }
}

    function customerNumber()
    {
        $latest = DB::select('select ladger_id from ladgers order by ladger_id DESC limit 1');
        if (!$latest) {
            return 1;
        }

        return $latest[0]->ladger_id + 1;
    }

    function delete($id){
       DB::table('ladgers')->where('ladger_id', $id)->delete();
       return Redirect::to('/ledger')->with('success', 'Ledger Delete Successfully');
   
    }

    function edit($id){
         $data['ledger'] = DB::select("select * from ladgers where ladger_id = '$id'");
      ///   print_r($data);
        return view('ledger/edit',$data);
    }

    function update(Request $req) {
       
        $ladger_id = $req->input('ladger_id');
        $relational_cust_name	 = $req->input('relational_cust_name');
        $account_holder	 = $req->input('account_holder');
        $farm_owner_name = $req->input('farm_owner_name');
        $khasra_no = $req->input('khasra_no');
        $bhumi_gram = $req->input('bhumi_gram');
        $opening_balance = $req->input('opening_balance');
        $village = $req->input('village');
         $farm_area_acre = $req->input('farm_area_acre');
          $phone_number	 = $req->input('phone_number');
           $bank_account_name	 = $req->input('bank_account_name');
            $account_number	 = $req->input('account_number');
             $bank_name	 = $req->input('bank_name');
              $ifsc_code = $req->input('ifsc_code');
               $branch	 = $req->input('branch');
                $gst_num = $req->input('gst_num');
                


       DB::update("update ladgers set relational_cust_name = '$relational_cust_name' ,account_holder = '$account_holder',farm_owner_name = '$farm_owner_name',village = '$village',farm_area_acre = '$farm_area_acre',phone_number = '$phone_number',bank_account_name = '$bank_account_name',account_number = '$account_number',bank_name = '$bank_name',ifsc_code = '$ifsc_code',branch = '$branch',gst_num = '$gst_num',khasra_no = '$khasra_no',opening_balance = '$opening_balance',bhumi_gram = '$bhumi_gram'  where ladger_id = '$ladger_id'");

       /*echo "update ladgers set relational_cust_name = '$relational_cust_name' ,account_holder = '$account_holder',farm_owner_name = '$farm_owner_name',village = '$village',farm_area_acre = '$farm_area_acre',phone_number = '$phone_number',bank_account_name = '$bank_account_name',account_number = '$account_number',bank_name = '$bank_name',ifsc_code = '$ifsc_code',branch = '$branch',gst_num = '$gst_num',khasra_no = '$khasra_no',opening_balance = '$opening_balance'  where ladger_id = '$ladger_id'"; exit;*/


        return Redirect::to('/ledger')->with('success', 'Ledger edit Successfully');
    }

    function other() {
        $data['ledger'] = DB::select("select * from ladgers where ladger_type != 1 and is_deleted = 0");
        return view('ledger/ledgerlist',$data);
    }
    
}

