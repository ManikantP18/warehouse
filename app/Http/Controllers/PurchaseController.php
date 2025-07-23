<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;

use DB;

class PurchaseController extends Controller
{
    function index() {
         $data['purchase'] = DB::select("select * from purchase where purchase_status = 1 AND is_deleted = 0 order by purchase_id DESC");
        return view('purchase/list',$data);
    }

    function create() {
        $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product'");
        $data['units'] = DB::select("select * from product_service_units");
        //  $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 
         
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
   
        $purchase_to = $req->input('purchase_to');

        
       $purchase_total = $req->input('purchase_total');

       $sum_total = array_sum($purchase_total);


       $pid = DB::table('purchase')->insertGetId([
            'purchase_way' => $purchase_way,
            'purchase_relation_cusm' => $purchase_relation_cusm,
            'purchase_accountant' => $purchase_accountant,
            'purchase_owner' => $purchase_owner,
            'purchase_village' => $purchase_village,
            'purchase_acre' => $purchase_acre,
            'purchase_phone' => $purchase_phone,
            'purchase_rst_no' => $purchase_rst_no,
            'purchase_lot_no' => $purchase_lot_no,
            'purchase_account_no' => $purchase_account_no,
            'purchas_bank_name' => $purchas_bank_name,
            'purchase_ifsc' => $purchase_ifsc,
            'purchase_branch' => $purchase_branch,
            'purchase_gst_no' => $purchase_gst_no,
            'purchase_to' => $purchase_to,
            'purchase_total' => $sum_total
        ]);

                 $purchase_item = $req->input('purchase_item');
                 $purchase_quantity = $req->input('purchase_quantity');
                 $purchase_rate = $req->input('purchase_rate');
                 $purchase_total = $req->input('purchase_total');
                 $purchase_unit = $req->input('purchase_unit');

                 for($i = 0 ; $i < count($purchase_rate) ; $i++) {
                    if($purchase_rate[$i] != '' && $purchase_rate[$i] != 0) {
                         DB::insert("Insert into purchase_item (purchase_id,purchased_item,purchased_rate,purchased_qty,purchased_unit,purchased_total) values ('$pid','$purchase_item[$i]','$purchase_rate[$i]','$purchase_quantity[$i]','$purchase_unit[$i]','$purchase_total[$i]')" );
                    }
                 }

       
        return Redirect::to('purchase');
    }

   public function search(Request $req)
        {
            $searchVal = $req->input('searchVal'); // Account No or Mobile No
            $searchVillage = $req->input('searchVillage');
            $searchname = $req->input('searchname');

            $all = $req->input('all') ? $req->input('all') : 'no';

            if($all == 'no'){

                $searchData = DB::select("SELECT *,ladgers.bank_name as ladgers_bank,product_services.name AS item_name FROM ladgers left join sell_to ON sell_to.sell_account_number = ladgers.account_id left join product_services ON sell_to.item_selled = product_services.id
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%')
                group by sell_to.sell_account_number order by sell_to.sell_id");

            } else {

                $searchData = DB::select("SELECT *,ladgers.bank_name as ladgers_bank FROM ladgers
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%')");

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

        function delete($id) { 
            DB::update("update purchase set is_deleted = 1 where purchase_id = '$id'");

            //  return view('sellto/delete');
            return Redirect::to('purchase');
    }

    function getrst(request $req){
            $searchVal = $req->input('account_id');


            $searchData = DB::select("SELECT kp_rstno from kata_parchi where kp_acc_no = '$searchVal' order by kp_id DESC limit 1");



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
         
        $data['units'] = DB::select("select * from product_service_units");
         $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 

        $data['items'] = DB::select("select * from purchase_item where purchase_id = '$id' and purchased_status = 1");

        $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product' AND product_services.id NOT IN(select purchased_item from purchase_item where purchase_id = '$id' and purchased_status = 1)");

        $data['allproducts'] = DB::select("select id, name, quantity from product_services where type = 'Product'");
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
        
        $purchase_to = $req->input('purchase_to');
        $id = $req->input('purchase_id');

        $purchase_total = $req->input('purchase_total');

        $sum_total = array_sum($purchase_total);

        
        
        DB::update("UPDATE purchase SET purchase_way = '$purchase_way' ,purchase_relation_cusm = '$purchase_relation_cusm',purchase_accountant = '$purchase_accountant',purchase_owner = '$purchase_owner',purchase_village = '$purchase_village',purchase_acre = '$purchase_acre',purchase_phone = '$purchase_phone',purchase_rst_no = '$purchase_rst_no',purchase_lot_no = '$purchase_lot_no',purchase_account_no = '$purchase_account_no',purchas_bank_name = '$purchas_bank_name',purchase_ifsc = '$purchase_ifsc',purchase_branch = '$purchase_branch',purchase_gst_no = '$purchase_gst_no',purchase_total = '0',purchase_to = '$purchase_to' , purchase_total = '$sum_total' WHERE purchase_id = '$id'");


        DB::delete("delete from purchase_item where purchase_id = '$id'");

        $purchase_item = $req->input('purchase_item');
                 $purchase_quantity = $req->input('purchase_quantity');
                 $purchase_rate = $req->input('purchase_rate');
                 
                 $purchase_unit = $req->input('purchase_unit');

                 for($i = 0 ; $i < count($purchase_rate) ; $i++) {
                    if($purchase_rate[$i] != '' && $purchase_rate[$i] != 0) {
                         DB::insert("Insert into purchase_item (purchase_id,purchased_item,purchased_rate,purchased_qty,purchased_unit,purchased_total) values ('$id','$purchase_item[$i]','$purchase_rate[$i]','$purchase_quantity[$i]','$purchase_unit[$i]','$purchase_total[$i]')" );
                    }
                 }
       
        return Redirect::to('purchase');
       
    }
  
}
