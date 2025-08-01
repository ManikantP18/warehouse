<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gredding;

use Illuminate\Support\Facades\Redirect;

use DB;

class GreddingController extends Controller
{
    public function index(){

        $data['gredding'] = DB::select('select * from gredding');

        return view('gredding/list',$data);

    }

//     function create(){

//         $data['lotnumbers'] = DB::select("select purchase_lot_no from purchase where purchase_status = 1 AND is_deleted = 0");
        
//         return view('staging/create',$data);
//     }

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

//       function delete($id){
//        DB::table('staging')->where('staging_id', $id)->delete();
//        return Redirect::to('/staging')->with('success', 'Staging Delete Successfully');
   
//     }

//     function edit($id){
//          $data['staging'] = DB::select("select * from staging where staging_id = '$id'");
//       ///   print_r($data);
//         return view('staging/edit',$data);
//     }

    
//     function update(Request $req) {
//          $staging_id  = $req->input('staging_id');
//         $select_lot_no = $req->input('select_lot_no');
//         $staging_varity	 = $req->input('staging_varity');
//         $godown	 = $req->input('godown');
//         $stage_no = $req->input('stage_no');
//         $no_of_begs = $req->input('no_of_begs');
//          $pay_for_staging = $req->input('pay_for_staging');
//           $staging_date	 = $req->input('staging_date');
           
                


//        DB::update("update staging set select_lot_no = '$select_lot_no' ,staging_varity = '$staging_varity',godown = '$godown',stage_no = '$stage_no',no_of_begs = '$no_of_begs',pay_for_staging = '$pay_for_staging',staging_date = '$staging_date' where staging_id = '$staging_id'");


//         return Redirect::to('/staging')->with('success', 'Staging edit Successfully');
//     }


}
