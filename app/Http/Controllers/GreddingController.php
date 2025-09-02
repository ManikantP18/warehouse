<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gredding;
use App\Models\LaborPrice;

use Illuminate\Support\Facades\Redirect;

use DB;

class GreddingController extends Controller
{
    public function index(){

        $data['gredding'] = DB::select('select * from gredding join branches on branches.branch_id  = gredding.gredding_godown join product_services on product_services.id = gredding.gredding_verity join company on company.company_id = gredding.company_id where gredding.is_hide = 0 order by gredding_id desc');

        return view('gredding/list',$data);

    }


   function add(Request $req){
        $gredding_lot_no = $req->input('gredding_lot_no');
        $gredding_verity = $req->input('gredding_verity');
        $gredding_godown = $req->input('gredding_godown');
        $gred_stage_no = $req->input('gred_stage_no');
        $gred_no_begs = $req->input('gred_no_begs');
        $gredded_quantity = $req->input('gredded_quantity');
        $undersize_quantity = $req->input('undersize_quantity');
         $pay_gredding = $req->input('pay_gredding');
          $gredding_date = $req->input('gredding_date');

        DB::insert("Insert into gredding (gredding_lot_no,gredding_verity,gredding_godown,gred_stage_no,gred_no_begs,gredded_quantity,undersize_quantity,pay_gredding,gredding_date) VALUES ('$gredding_lot_no', '$gredding_verity', '$gredding_godown', '$gred_stage_no', '$gred_no_begs', '$gredded_quantity','$undersize_quantity','$pay_gredding','$gredding_date')");

         return Redirect::to('gredding')->with('success', 'Gredding Create Successfully');
     }


    function edit($id){
         $data['gredding'] = DB::select("select *, gredding.company_id AS cmp from gredding join product_services on product_services.id = gredding.gredding_verity where gredding_id = '$id'");
         $data['branch'] = DB::select("select * from branches where branch_status = 1");

         $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");

        // Calculate pay for grading based on final weight
        if (!empty($data['gredding'])) {
            $final_weight = $data['gredding'][0]->final_waigth;
            $calculated_pay = LaborPrice::calculatePayment($final_weight, 'grading');
            $data['gredding'][0]->pay_gredding = $calculated_pay;
            
            // Set default date if grading_date is empty or format it properly
            if (empty($data['gredding'][0]->gredding_date)) {
                $data['gredding'][0]->gredding_date = date('Y-m-d');
            } else {
                // Convert datetime to date format if it's a datetime
                $date = $data['gredding'][0]->gredding_date;
                if (strlen($date) > 10) {
                    $data['gredding'][0]->gredding_date = date('Y-m-d', strtotime($date));
                }
            }
        }

        return view('gredding/edit',$data);
    }

    
    function update(Request $req) {
        $gredding_verity = $req->input('gredding_verity');
        $gredding_godown = $req->input('gredding_godown');
        $gred_stage_no = $req->input('gred_stage_no');
        $gred_no_begs = $req->input('gred_no_begs');
        $gredded_quantity = $req->input('gredded_quantity');
        $undersize_quantity = $req->input('undersize_quantity');
        $gredding_id = $req->input('gredding_id');
        $gredding_lot_no = $req->input('gredding_lot_no');
        $farmar_name = $req->input('farmar_name');
        $land_owner = $req->input('land_owner');
        $final_waigth = $req->input('final_waigth');
        $gredding_lot_no = $req->input('gredding_lot_no');
        $staging_stage_no = $req->input('staging_stage_no');
        $company_id = $req->input('company_id');
        $staging_no_begs = $req->input('staging_no_begs');
        $gredding_date = $req->input('gredding_date') ?: date('Y-m-d');

        // Auto-calculate pay for grading
        $pay_gredding = LaborPrice::calculatePayment($final_waigth, 'grading');
          
            DB::update("update gredding set gredding_verity = '$gredding_verity' ,gredding_godown = '$gredding_godown',gred_stage_no = '$gred_stage_no',gred_no_begs = '$gred_no_begs',gredded_quantity = '$gredded_quantity',undersize_quantity = '$undersize_quantity' ,pay_gredding = '$pay_gredding' ,gredding_lot_no = '$gredding_lot_no' ,farmar_name = '$farmar_name' ,land_owner = '$land_owner',final_waigth = '$final_waigth' ,gredding_date = '$gredding_date' , is_hide = 1 , staging_stage_no = '$staging_stage_no',staging_no_bags = ' $staging_no_begs', company_id = '$company_id' where gredding_id = '$gredding_id'");

           DB::insert("Insert into packing (lot_no,farmer_name,land_owner,packing_no_of_begs,packing_pay,packing_gredded_quantity,packing_verity,final_weight,packing_godown,gred_no_bag,gred_stage_no,company_id) VALUES ('$gredding_lot_no', '$farmar_name', '$land_owner', '$gred_no_begs', '$pay_gredding','$gredded_quantity','$gredding_verity','$final_waigth','$gredding_godown','$staging_no_begs','$gred_stage_no','$company_id')");


         return Redirect::to('gredding')->with('success', 'Gredding Create Successfully');

    }


}
