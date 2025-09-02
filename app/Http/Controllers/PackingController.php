<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\LaborPrice;

use Illuminate\Support\Facades\Redirect;


class PackingController extends Controller
{
    function index() {
        $data['packing'] = DB::select("select * from packing join branches on branches.branch_id  = packing.packing_godown join product_services on product_services.id = packing.packing_verity join company on company.company_id = packing.company_id  where packing_status = 1 and packing.is_deleted = 0 order by packing_id desc");
        return view('packing/list',$data);
    }



    function edit($id) {
        $data['packing'] = DB::select("select *,packing.company_id AS cmp from packing join product_services on product_services.id = packing.packing_verity where packing_id = '$id'");
        $data['branch'] = DB::select("select * from branches where branch_status = 1");
       $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
        
        // Calculate pay for packing based on graded quantity
        if (!empty($data['packing'])) {
            $graded_quantity = $data['packing'][0]->packing_gredded_quantity;
            $calculated_pay = LaborPrice::calculatePayment($graded_quantity, 'packing');
            $data['packing'][0]->packing_pay = $calculated_pay;
            
            // Set default date if packing_date is empty or format it properly
            if (empty($data['packing'][0]->packing_date)) {
                $data['packing'][0]->packing_date = date('Y-m-d');
            } else {
                // Convert datetime to date format if it's a datetime
                $date = $data['packing'][0]->packing_date;
                if (strlen($date) > 10) {
                    $data['packing'][0]->packing_date = date('Y-m-d', strtotime($date));
                }
            }
        }
        
        return view('packing/edit',$data);
    }

   public function update(Request $req)
{
    $packing_id = $req->packing_id;
    $remaing_qty = $req->remaing_qty;
    $Gredded_qty = $req->Gredded_qty;
    $packing_date = $req->packing_date ?: date('Y-m-d');
    // Bags data
    $bags_kg = $req->bags_kg;       // array
    $bags_count = $req->bags_count; // array

    // Initialize
    $packing_40 = $packing_30 = $packing_20 = $packing_5 = 0;

    if ($bags_kg && $bags_count) {
        foreach ($bags_kg as $index => $kg) {
            $count = isset($bags_count[$index]) ? (int)$bags_count[$index] : 0;
            if ($kg == 40) $packing_40 = $count;
            if ($kg == 30) $packing_30 = $count;
            if ($kg == 20) $packing_20 = $count;
            if ($kg == 5)  $packing_5  = $count;
        }
    }

    // Auto-calculate pay for packing
    $packing_pay = LaborPrice::calculatePayment($Gredded_qty, 'packing');

    DB::table('packing')
        ->where('packing_id', $packing_id)
        ->update([
            'lot_no'                   => $req->lot_no,
            'farmer_name'              => $req->farmer_name,
            'land_owner'               => $req->land_owner,
            'packing_stage_no'         => $req->stage_no,
            'packing_no_of_begs'       => array_sum($bags_count),
            'packing_pay'              => $packing_pay,
            'packing_gredded_quantity' => $req->Gredded_qty,
            'packing_verity'           => $req->verity,
            'final_weight'             => $req->final_weight,
            'packing_godown'           => $req->godown,
            'company_id'               => $req->company_id,
            'packing_40'               => $packing_40,
            'packing_30'               => $packing_30,
            'packing_20'               => $packing_20,
            'packing_5'                => $packing_5,
            'remaing_qty'              => $remaing_qty,
            'packing_date'             => $packing_date
        ]);

    return Redirect::to('/packing')->with('success', 'Packing updated successfully');
}



  
}
