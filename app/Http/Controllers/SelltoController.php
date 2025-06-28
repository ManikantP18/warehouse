<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SelltoModel;

use Illuminate\Support\Facades\Redirect;

use DB;

class SelltoController extends Controller
{
    public function index(){
        $data['sellto'] = DB::select('select * from sell_to');
        return view('sellto/list',$data);

    }

     function create(){
        return view('sellto/create');
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
        $itemselled = $req->input('sellto_item_selled');
         $quantity = $req->input('sellto_quantity');
        $rate = $req->input('sellto_rate');
        $total = $req->input('sellto_total_amount');
         $gst = $req->input('sellto_gst_amount');


        DB::insert("Insert into sell_to (sell_way,sell_to,sell_account_number,sell_phone,sell_relation_customer,sell_account_name,sell_property_owner,sell_village,item_selled,sell_quantity,sell_rate,sell_total_ammount,sell_gst_ammount) VALUES ('$cashcredit', '$farmerother' , '$accno', '$phone' ,'$csname', '$accholder','$oname', '$village' ,'$itemselled', '$quantity','$rate' ,'$total', '$gst')");

        return Redirect::to('sellto');
    }

    public function search(Request $req)
{
    $searchVal = $req->input('searchVal');

    $searchData = DB::table('ladgers')
        ->where('account_id', $searchVal)
        ->orWhere('phone_number', $searchVal)
        ->first(); // fetch only one record

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

}