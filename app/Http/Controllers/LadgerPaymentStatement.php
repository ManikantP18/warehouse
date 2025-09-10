<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LadgerPaymentStatement extends Controller
{
    function index() {
        $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
         return view('ladgerstatement/list',$data);
    }

    public function search(Request $req)
    {
            $searchVal = $req->input('searchVal'); // Account No or Mobile No
            $searchVillage = $req->input('searchVillage');
            $searchname = $req->input('searchname');
            $searchowner = $req->input('searchowner');

            $all = $req->input('all');
            

            if($all == 'no'){

                $searchData = DB::select("SELECT * FROM ladgers left join rogring on ladgers.ladger_id = rogring.ledgers
                left join users on rogring.Rogring_name = users.id WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%' AND farm_owner_name LIKE '%$searchowner%')
                 AND ladgers.is_deleted = 0");

            } else {

                $searchData = DB::select("SELECT * FROM ladgers
                WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
                AND (relational_cust_name LIKE '%$searchname%'
                AND village LIKE '%$searchVillage%' AND farm_owner_name LIKE '%$searchowner%')
                 AND ladgers.is_deleted = 0");
                
            }
     
            $variety = DB::select("SELECT * FROM product_services join selled_item ON selled_item.selled_item = product_services.id join sell_to on sell_to.sell_id =  selled_item.sell_id
            WHERE sell_to.sell_account_number = '$searchVal' group by product_services.id");

             $Othervariety = DB::select("SELECT * FROM product_services group by product_services.id");


            if ($searchData) {
                return response()->json([
                    'success' => true,
                    'data' => $searchData,
                    'products' => $variety,
                    'otherProducts' => $Othervariety
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No record found.'
                ]);
            }

    }

    //     function history(Request $req) {
    //     $acc_id = $req->input('searchVal');

    //     $cid = $req->input('company');

    //     $html = '';

    //     if($cid == 'all'){

    //         $companies = DB::select("select * from company where company_status = 1 and is_deleted = 0");

    //         foreach($companies as $comp){

    //             $data['comp_name'] = $comp->company_name;

    //             $data['statement'] = DB::select("select * from payment_statement join ladgers on ladgers.account_id = payment_statement.ladger_id where payment_statement.ladger_id = '$acc_id' AND comp_id = '$comp->company_id'");

    //             $html .= view('Ladgerstatement/table',$data);

    //         }

    //     } else {

    //         $companies = DB::select("select * from company where company_id = $cid");

    //         foreach($companies as $comp){

    //             $data['comp_name'] = $comp->company_name;

    //             $data['statement'] = DB::select("select * from payment_statement join ladgers on ladgers.account_id = payment_statement.ladger_id where payment_statement.ladger_id = '$acc_id' AND comp_id = '$comp->company_id'");

    //             $html .= view('Ladgerstatement/table',$data);

    //         }

    //     }

    //     return $html;
        
    // }

    function history(Request $req) {
    $acc_id = $req->input('searchVal');
    $cid = $req->input('company');
    $fdate = $req->input('fromdate');    
    $todate = $req->input('todate');   
    $html = '';
    $totalBalance = 0; 

    if($cid == 'all'){
        $companies = DB::select("select * from company where company_status = 1 and is_deleted = 0");
    } else {
        $companies = DB::select("select * from company where company_id = $cid");
    }

    foreach($companies as $comp){
        $data['comp_name'] = $comp->company_name;
        
        $where = ' AND payment_statement.is_deleted = 0 ';

        if(!empty($fdate)) {
            $where .= " AND created_date >= '$fdate' ";
        }

        if(!empty($todate)){
            $where .= " AND created_date <= '$todate'";
        }

        // company wise pura statement
        $data['statement'] = DB::select("
            select * from payment_statement 
            join ladgers on ladgers.account_id = payment_statement.ladger_id 
            where payment_statement.ladger_id = '$acc_id' 
            AND comp_id = '$comp->company_id' $where
            order by pay_id asc
        ");

        // 👉 last available balance nikalna
        $lastBalance = DB::selectOne("
            select avbl_bal from payment_statement 
            where ladger_id = '$acc_id' AND comp_id = '$comp->company_id' $where
            order by pay_id desc limit 1
        ");

        if($lastBalance){
            $totalBalance += $lastBalance->avbl_bal;
        }

        $html .= view('ladgerstatement/table',$data);
    }


                $html .= '
                <div class="mt-4">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">Total Available Balance</h5>
                            <h3 class="fw-bold text-' . ($totalBalance > 0 ? 'success' : 'danger') . '">
                                ' . ($totalBalance > 0 ? '-'. number_format($totalBalance) : number_format(abs($totalBalance))). ' ' . ($totalBalance > 0 ? 'Cr' : 'Dr' ). '
                            </h3>
                        </div>
                    </div>
                </div>
            ';


    return $html;
}

}
