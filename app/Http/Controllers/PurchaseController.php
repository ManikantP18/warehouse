<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;

use DB;

class PurchaseController extends Controller
{
    function index() {
         $data['purchase'] = DB::select("select * from purchase join product_services on purchase.purchase_item = product_services.id where purchase_status = 1 AND is_deleted = 0");
        return view('purchase/list',$data);
    }

    function create() {
        $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product'");
         $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 
        return view('purchase/create',$data);
    }
    function add(Request $req){
        $purchase_way = $req->input('purchase_way');
        $purchase_relation_cusm = $req->input('purchase_relation_cusm');
        $purchase_accountant = $req->input('purchase_accountant');
        $purchase_owner = $req->input('purchase_owner');
        $purchase_village = $req->input('purchase_village');
        $purchase_acre = $req->input('purchase_acre');
        $purchase_phone = $req->input('purchase_phone');
        $purchase_rst_no = $req->input('purchase_rst_no');
        $purchase_lot_no = $req->input('purchase_lot_no');
         $purchase_account_no = $req->input('purchase_account_no');
        $purchas_bank_name = $req->input('purchas_bank_name');
        $purchase_ifsc = $req->input('purchase_ifsc');
         $purchase_branch = $req->input('purchase_branch');
        $purchase_gst_no = $req->input('purchase_gst_no');
        $purchase_item = $req->input('purchase_item');
        $purchase_quantity = $req->input('purchase_quantity');
        $purchase_rate = $req->input('purchase_rate');
        $purchase_total = $req->input('purchase_total');
        $purchase_to = $req->input('purchase_to');

        DB::insert("Insert into purchase (purchase_way,purchase_relation_cusm,purchase_accountant,purchase_owner,purchase_village,purchase_acre,purchase_phone,purchase_rst_no,purchase_lot_no,purchase_account_no,purchas_bank_name,purchase_ifsc,purchase_branch,purchase_gst_no,purchase_item,purchase_quantity,purchase_rate,purchase_total,purchase_to) VALUES ('$purchase_way', '$purchase_relation_cusm' , '$purchase_accountant', '$purchase_owner' ,'$purchase_village','$purchase_acre', '$purchase_phone','$purchase_rst_no','$purchase_lot_no' ,'$purchase_account_no', '$purchas_bank_name','$purchase_ifsc' ,'$purchase_branch', '$purchase_gst_no' ,'$purchase_item','$purchase_quantity','$purchase_rate','$purchase_total','$purchase_to' )");
       
        return Redirect::to('purchase');
    }

   public function search(Request $req)
        {
            $searchVal = $req->input('searchVal'); // Account No or Mobile No
            $searchVillage = $req->input('searchVillage');
            $searchname = $req->input('searchname');

            $searchData = DB::select("SELECT *,product_services.name AS item_name FROM ladgers left join sell_to ON sell_to.sell_account_number = ladgers.account_id left join product_services ON sell_to.item_selled = product_services.id
            WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
            AND (relational_cust_name LIKE '%$searchname%'
            AND village LIKE '%$searchVillage%')
             group by sell_to.sell_account_number order by sell_to.sell_id");



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

        function delete($id) { 
            DB::update("update purchase set is_deleted = 1 where purchase_id = '$id'");

            //  return view('sellto/delete');
            return Redirect::to('purchase');
    }

    function getrst(request $req){
            $searchVal = $req->input('account_id');

            $searchData = DB::select("SELECT kp_rstno from kata_parchi where ladger_id = '$searchVal' order by kp_id DESC limit 1");



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

    function edit($id) {
       
         $data['purchase'] = DB::select("select * from purchase where purchase_id = '$id' and is_deleted = 0");
            $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product'");
       // $data['items'] = DB::select("select * from product_services where type = 'Product'");
        return view('purchase/edit',$data);
    } 

    function update(Request $req) {
        
         $purchase_way = $req->input('purchase_way');
        $purchase_relation_cusm = $req->input('purchase_relation_cusm');
        $purchase_accountant = $req->input('purchase_accountant');
        $purchase_owner = $req->input('purchase_owner');
        $purchase_village = $req->input('purchase_village');
        $purchase_acre = $req->input('purchase_acre');
        $purchase_phone = $req->input('purchase_phone');
        $purchase_rst_no = $req->input('purchase_rst_no');
        $purchase_lot_no = $req->input('purchase_lot_no');
         $purchase_account_no = $req->input('purchase_account_no');
        $purchas_bank_name = $req->input('purchas_bank_name');
        $purchase_ifsc = $req->input('purchase_ifsc');
         $purchase_branch = $req->input('purchase_branch');
        $purchase_gst_no = $req->input('purchase_gst_no');
        $purchase_item = $req->input('purchase_item');
        $purchase_quantity = $req->input('purchase_quantity');
        $purchase_rate = $req->input('purchase_rate');
        $purchase_total = $req->input('purchase_total');
        $purchase_to = $req->input('purchase_to');
        $id = $req->input('purchase_id');

        
        
        DB::update("UPDATE purchase SET purchase_way = '$purchase_way' ,purchase_relation_cusm = '$purchase_relation_cusm',purchase_accountant = '$purchase_accountant',purchase_owner = '$purchase_owner',purchase_village = '$purchase_village',purchase_acre = '$purchase_acre',purchase_phone = '$purchase_phone',purchase_rst_no = '$purchase_rst_no',purchase_lot_no = '$purchase_lot_no',purchase_account_no = '$purchase_account_no',purchas_bank_name = '$purchas_bank_name',purchase_ifsc = '$purchase_ifsc',purchase_branch = '$purchase_branch',purchase_gst_no = '$purchase_gst_no',purchase_item = '$purchase_item',purchase_quantity = '$purchase_quantity',purchase_rate = '$purchase_rate',purchase_total = '$purchase_total',purchase_to = '$purchase_to' WHERE purchase_id = '$id'");
       
        return Redirect::to('purchase');
       
    }
  
}
