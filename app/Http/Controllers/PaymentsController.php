<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PaymentsController extends Controller
{
    function index() {
        return view('payments/list');
    }

     public function search(Request $req)
        {
            $searchVal = $req->input('searchVal'); 
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
     function history(Request $req) {
        $acc_id = $req->input('searchVal'); 

        $data['payment'] = DB::select("select * from payment join ladgers on ladgers.account_id = payment.pay_ladger_id where payment.pay_ladger_id = '$acc_id' ");

        return view('payments/table',$data);
        
    }

     function edit() {
        
    }

     function view($id) {

        $data['CNdata'] = DB::select("select * from sales_return where cn_id = '$id' ");

         $data['units'] = DB::select("select * from product_service_units");

         $data['selleditems'] = DB::select("select * from selled_item where sell_id = '$id' and selled_status = 1");

        $data['items'] = DB::select("select * from product_services where type = 'Product'");

         $data['item'] = DB::select("select * from product_services where type = 'Product' ");

         $data['Ldata'] = DB::select("select * from ladgers where account_id IN(select pay_ladger_id FROM payment WHERE pay_id = '$id') ");

         $data['pt'] =  DB::select("select tr_type from payment where pay_id = '$id' ");
        
        return view('payments/view',$data);
        
    }
}
