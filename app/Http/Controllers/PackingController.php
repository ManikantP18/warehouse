<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;


class PackingController extends Controller
{
    function index() {
        $data['packing'] = DB::select("select * from packing join branches on branches.branch_id  = packing.packing_godown join product_services on product_services.id = packing.packing_verity  where packing_status = 1 and is_deleted = 0 order by packing_id desc");
        return view('packing/list',$data);
    }



    function edit($id) {
        $data['packing'] = DB::select("select * from packing join product_services on product_services.id = packing.packing_verity where packing_id = '$id'");
        $data['branch'] = DB::select("select * from branches where branch_status = 1");
       
        return view('packing/edit',$data);
    }

    function update(Request $req ) {
        $packing_id  = $req->input('packing_id');
        $rst = $req->input('rst_no');
        $farmer_name	 = $req->input('farmer_name');
        $land_owner	 = $req->input('land_owner');
        $verity = $req->input('verity');
        $Gredded_qty = $req->input('Gredded_qty');
         $total_bag = $req->input('total_bag');
          $packing_pay	 = $req->input('packing_pay');
           $stage_no = $req->input('stage_no');
        $final_weight = $req->input('final_weight');
        $godown = $req->input('godown');
                


       DB::update("update packing set rst_no = '$rst' ,farmer_name = '$farmer_name',land_owner = '$land_owner',packing_stage_no = '$stage_no',packing_no_of_begs = '$total_bag',packing_pay = '$packing_pay' ,packing_gredded_quantity = '$Gredded_qty' ,packing_verity = '$verity' ,final_weight = '$final_weight' ,packing_godown = '$godown' where packing_id = '$packing_id'");


        return Redirect::to('/packing')->with('success', 'Packing edit Successfully');
    }

  
}
