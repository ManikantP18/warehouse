<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;

use DB;

class PurchaseController extends Controller
{
    function index() {
         $data['purchase'] = DB::select("select * from purchase left join branches on branches.branch_id  = purchase.godown left join company on company.company_id = purchase.company_id where purchase_status = 1 AND purchase.is_deleted = 0 AND is_hide = 0 order by purchase_id DESC");
        return view('purchase/list',$data);
    }

    function create() {
        $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product'");
        $data['units'] = DB::select("select * from product_service_units");
        //  $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 
          $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
        return view('purchase/create',$data);
    }
    function add(Request $req){
        $purchase_way = $req->input('purchase_way');
        $custid = $req->input('cust_id');
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
        $purchase_gst_no = $req->input('purchase_gst_no') ?? 0;
        $purchase_to = $req->input('purchase_to');
       $purchase_total = $req->input('purchase_total');
        $comp_id = $req->input('company_id');

//      $pure_wigth = $req->input('pure_wigth');

       $sum_total = array_sum($purchase_total);


       $pid = DB::table('purchase')->insertGetId([
            'purchase_way' => $purchase_way,
            'cust_id'      => $custid,
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
            'purchase_to' => $purchase_to ?? 'farmer',
            'purchase_total' => $sum_total,
            'company_id'     => $comp_id,
            'is_hide'        => 1
        ]);

                 $purchase_item = $req->input('purchase_item');
                 $pure_wigth = $req->input('purchase_quantity');
                 $purchase_rate = $req->input('purchase_rate');
                 $purchase_total = $req->input('purchase_total');
                 $purchase_unit = $req->input('purchase_unit');

                 for($i = 0 ; $i < count($purchase_rate) ; $i++) {
                    if($purchase_rate[$i] != '' && $purchase_rate[$i] != 0) {
                         DB::insert("Insert into purchase_item (purchase_id,purchased_item,purchased_rate,purchased_qty,purchased_unit,purchased_total) values ('$pid','$purchase_item[$i]','$purchase_rate[$i]','$pure_wigth[$i]','$purchase_unit[$i]','$purchase_total[$i]')" );
                    }
                 }

                 $avlBal = DB::select("
                select avbl_bal from payment_statement 
                where ladger_id = ? AND comp_id = ? AND pay_status = 1 AND is_deleted = 0 
                order by pay_id desc limit 1
            ", [$custid, $comp_id]);

            $avlBal = $avlBal ? $avlBal[0]->avbl_bal : 0;

            $balance = $sum_total + $avlBal;

            DB::insert("Insert into payment_statement (ladger_id,pay_type,prtclr,dr_amt,cr_amt,avbl_bal,comp_id) VALUES ('$custid','Purchase','Purchase','0', '$sum_total','$balance','$comp_id')");

       
        return Redirect::to('purchase');
    }

   public function search(Request $req)
        {
            $searchVal = $req->input('searchVal'); // Account No or Mobile No
            $searchVillage = $req->input('searchVillage');
            $searchname = $req->input('searchname');
            $searchowner = $req->input('searchowner');
            $all = $req->input('all') ? $req->input('all') : 'no';

            if($all == 'no'){

                $searchData = DB::select("SELECT *,ladgers.bank_name as ladgers_bank,product_services.name AS item_name FROM ladgers left join sell_to ON sell_to.sell_account_number = ladgers.account_id left join product_services ON sell_to.item_selled = product_services.id
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%'
                AND farm_owner_name LIKE '%$searchowner%')
                group by sell_to.sell_account_number order by sell_to.sell_id");

            } else {

                $searchData = DB::select("SELECT *,ladgers.bank_name as ladgers_bank FROM ladgers
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%'
                AND farm_owner_name LIKE '%$searchowner%')");

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
           

            //Delete Purchase

      DB::table('purchase')->where('purchase_id', $id)->update(['is_deleted' => 1]);
      
      DB::table('kata_parchi')->where('kp_acc_no', $id)->update(['is_deleted' => 1]);

      DB::table('purchase_item')->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('purchase_id', $id);
        })->update(['is_deleted' => 1]);

      DB::table('payment_statement')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('purchase_id', $id);
        })
        ->update(['is_deleted' => 1]);

        // 4. Staging soft delete
    DB::table('staging')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('purchase_id', $id);
        })
        ->update(['is_deleted' => 1]);

    // 5. Gredding soft delete (based on staging_id)
    DB::table('gredding')
        ->whereIn('staging_id', function($q) use ($id) {
            $q->select('staging_id')
              ->from('staging')
              ->whereIn('purchase_id', function($q2) use ($id) {
                  $q2->select('purchase_id')
                     ->from('purchase')
                     ->where('purchase_id', $id);
              });
        })
        ->update(['is_deleted' => 1]);

    // 6. Packing soft delete (based on gredding_id)
    DB::table('packing')
        ->whereIn('gredding_id', function($q) use ($id) {
            $q->select('gredding_id')
              ->from('gredding')
              ->whereIn('staging_id', function($q2) use ($id) {
                  $q2->select('staging_id')
                     ->from('staging')
                     ->whereIn('purchase_id', function($q3) use ($id) {
                         $q3->select('purchase_id')
                            ->from('purchase')
                            ->where('purchase_id', $id);
                     });
              });
        })
        ->update(['is_deleted' => 1]);

    // 1. Purchase soft delete
    DB::table('purchase')
        ->where('purchase_id', $id)
        ->update(['is_deleted' => 1]);

    // 2. Purchase Items soft delete
    DB::table('purchase_item')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('purchase_id', $id);
        })
        ->update(['is_deleted' => 1]);

    // 3. Payment Statement soft delete
    DB::table('payment_statement')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('purchase_id', $id);
        })
        ->update(['is_deleted' => 1]);

    // 4. Staging soft delete
    DB::table('staging')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('purchase_id', $id);
        })
        ->update(['is_deleted' => 1]);

    // 5. Gredding soft delete
    DB::table('gredding')
        ->whereIn('staging_id', function($q) use ($id) {
            $q->select('staging_id')
              ->from('staging')
              ->whereIn('purchase_id', function($q2) use ($id) {
                  $q2->select('purchase_id')
                     ->from('purchase')
                     ->where('purchase_id', $id);
              });
        })
        ->update(['is_deleted' => 1]);

    // 6. Packing soft delete
    DB::table('packing')
        ->whereIn('gredding_id', function($q) use ($id) {
            $q->select('gredding_id')
              ->from('gredding')
              ->whereIn('staging_id', function($q2) use ($id) {
                  $q2->select('staging_id')
                     ->from('staging')
                     ->whereIn('purchase_id', function($q3) use ($id) {
                         $q3->select('purchase_id')
                            ->from('purchase')
                            ->where('purchase_id', $id);
                     });
              });
        })
        ->update(['is_deleted' => 1]);

    // 7. Products Inventory soft delete (based on lot_no from packing)
    DB::table('products_inventory')
        ->whereIn('lot_no', function($q) use ($id) {
            $q->select('lot_no')
              ->from('packing')
              ->whereIn('gredding_id', function($q2) use ($id) {
                  $q2->select('gredding_id')
                     ->from('gredding')
                     ->whereIn('staging_id', function($q3) use ($id) {
                         $q3->select('staging_id')
                            ->from('staging')
                            ->whereIn('purchase_id', function($q4) use ($id) {
                                $q4->select('purchase_id')
                                   ->from('purchase')
                                   ->where('purchase_id', $id);
                            });
                     });
              });
        })
        ->update(['is_deleted' => 1]);

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
         $data['branches'] = DB::select("select * from branches");
          $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
        $data['units'] = DB::select("select * from product_service_units");
         $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 

        $data['items'] = DB::select("select * from purchase_item where purchase_id = '$id' and purchased_status = 1");

        $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product' AND product_services.id NOT IN(select purchased_item from purchase_item where purchase_id = '$id' and purchased_status = 1)");

        $data['allproducts'] = DB::select("select * from product_services where type = 'Product'");
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

        // Bank Detail of Ladger
        $purchase_account_no = $req->input('purchase_account_no');
        $purchas_bank_name = $req->input('purchas_bank_name');
        $purchase_ifsc = $req->input('purchase_ifsc');
        $purchase_branch = $req->input('purchase_branch');

        $purchase_gst_no = $req->input('purchase_gst_no');
        $godown = $req->input('godown');
        $purchase_to = $req->input('purchase_to');
        $id = $req->input('purchase_id');
        $purchase_total = $req->input('purchase_total',[]);
        $purchase_item = $req->input('purchase_item');
        $sum_total = array_sum($purchase_total);
        $cid = $req->input('company_id');
        $ladgerid = $req->input('cust_id');
        
        
        DB::update("UPDATE purchase SET purchase_way = '$purchase_way' ,purchase_relation_cusm = '$purchase_relation_cusm',purchase_accountant = '$purchase_accountant',purchase_owner = '$purchase_owner',purchase_village = '$purchase_village',purchase_acre = '$purchase_acre',purchase_phone = '$purchase_phone',purchase_rst_no = '$purchase_rst_no',purchase_lot_no = '$purchase_lot_no',purchase_account_no = '$purchase_account_no',purchas_bank_name = '$purchas_bank_name',purchase_ifsc = '$purchase_ifsc',purchase_branch = '$purchase_branch',purchase_gst_no = '$purchase_gst_no',purchase_total = '0',purchase_to = '$purchase_to',company_id = '$cid' , purchase_total = '$sum_total',godown = '$godown', is_hide = '1' WHERE purchase_id = '$id'");

        $today = date('Y-m-d H:i:s');

        DB::delete("delete from purchase_item where purchase_id = '$id'");

        $purchase_item = $req->input('purchase_item', []);
                 $purchase_quantity = $req->input('purchase_quantity', []);
                 $purchase_rate = $req->input('purchase_rate', []);
                 
                 $purchase_unit = $req->input('purchase_unit', []);

                 for($i = 0 ; $i < count($purchase_rate) ; $i++) {
                    if($purchase_rate[$i] != '' && $purchase_rate[$i] != 0) {
                         DB::insert("Insert into purchase_item (purchase_id,purchased_item,purchased_rate,purchased_qty,purchased_unit,purchased_total) values ('$id','$purchase_item[$i]','$purchase_rate[$i]','$purchase_quantity[$i]','$purchase_unit[$i]','$purchase_total[$i]')" );



                            DB::insert("Insert into staging (purchase_id,select_lot_no,staging_varity,staging_date,rst_no,farmer_name,final_weight,land_owner,godown,company_id) VALUES ($id,'$purchase_lot_no', '$purchase_item[$i]','$today','$purchase_rst_no','$purchase_relation_cusm','$purchase_quantity[$i]','$purchase_owner','$godown','$cid')");
                        
                    }
                 }

            DB::update("update ladgers set account_number = '$purchase_account_no', bank_name = '$purchas_bank_name', ifsc_code = '$purchase_ifsc', branch = '$purchase_branch' WHERE account_id = '$ladgerid'");

           $avlBal = DB::select("
                select avbl_bal from payment_statement 
                where ladger_id = ? AND comp_id = ? AND pay_status = 1 AND is_deleted = 0 
                order by pay_id desc limit 1
            ", [$ladgerid, $cid]);

            $avlBal = $avlBal ? $avlBal[0]->avbl_bal : 0;

            $balance = $sum_total + $avlBal;

            DB::insert("Insert into payment_statement (ladger_id,pay_type,prtclr,dr_amt,cr_amt,avbl_bal,comp_id) VALUES ('$ladgerid','Purchase','Purchase','0', '$sum_total','$balance','$cid')");

        return Redirect::to('purchase');
       
    }

    public function filter(Request $request)
    {

                    
            $from = $request->input('from_date');
            $to = $request->input('to_date');

            $nextDay = date('Y-m-d',strtotime($to) + 86400);

            if (!$from || !$to) {
                return response()->json(['error' => 'Both dates are required'], 400);
            }

            $data['purchase'] = DB::table('purchase')
                ->whereBetween('purchase_date', [$from, $nextDay])
                ->get();

            
        return view('purchase/filter',$data);
    }

    
  
}
