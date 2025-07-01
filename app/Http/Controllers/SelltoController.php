<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SelltoModel;

use Illuminate\Support\Facades\Redirect;

use DB;

class SelltoController extends Controller
{
    public function index(){
        $data['sellto'] = DB::select("select * from sell_to where sell_to = 'farmer' and is_deleted = 0");
        return view('sellto/list',$data);

    }

     function create(){
        $data['items'] = DB::select("select * from product_services join taxes on product_services.tax_id = taxes.id where type = 'Product'"); 
       
        return view('sellto/create',$data);
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
        $cashamm = $req->input('sellto_cash_amount');
        $creditamm = $req->input('sellto_Credit_amount');
        $remainamm = $req->input('sellto_Remaining_amount');

        DB::insert("Insert into sell_to (sell_way,sell_to,sell_account_number,sell_phone,sell_relation_customer,sell_account_name,sell_property_owner,sell_village,item_selled,sell_quantity,sell_rate,sell_total_ammount,sell_gst_ammount,cash_amount,credit_amount,remaining_amount) VALUES ('$cashcredit', '$farmerother' , '$accno', '$phone' ,'$csname', '$accholder','$oname', '$village' ,'$itemselled', '$quantity','$rate' ,'$total', '$gst','$cashamm' ,'$creditamm', '$remainamm')");
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

           

            $searchData = DB::select("SELECT * FROM ladgers
            WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
            AND (relational_cust_name LIKE '%$searchname%'
            AND village LIKE '%$searchVillage%')
            ");



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

        $data['items'] = DB::select("select * from product_services where type = 'Product'");
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
         $id = $req->input('kp_id');


        DB::update("update sell_to set sell_way = '$cashcredit',sell_to = '$farmerother' ,sell_account_number = '$accno',sell_phone = '$phone',sell_relation_customer = '$csname',sell_account_name = '$accholder',sell_property_owner = '$oname',sell_village =  '$village',item_selled = '$itemselled',sell_quantity = '$quantity',sell_rate = '$rate',sell_total_ammount = '$total',sell_gst_ammount = '$gst' , cash_amount = '$cashamm',credit_amount = '$creditamm'  remaining_amount = '$remainamm'  where kp_id = '$id'");

        return Redirect::to('sellto');
    }

}