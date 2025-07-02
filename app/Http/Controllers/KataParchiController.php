<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;


class KataParchiController extends Controller
{
    public function index(){

        $data['kataparchi'] = DB::select('select * from kata_parchi where is_deleted = 0');

        return view('kataparchi/list',$data);

    }

    function create(){

        //$data['items'] = DB::select("select * from ladgers join rogring on ladgers.ladger_id = rogring.ledgers"); 
        return view('kataparchi/create');
    }

    function add(Request $req){

        //print_r($req->input()); exit;

        $kpdate = date('Y-m-d', strtotime($req->input('kp_date')));
        $kpacc = $req->input('kp_acc_no');
        $kprel = $req->input('kp_rel_name');
        $kpacc_hold_name = $req->input('kp_acc_holdername');
        $kp_land_owner = $req->input('kp_bhoomiswami_name');
        $kpvilage = $req->input('kp_vilage');
        $kp_acre = $req->input('kp_rakaba_acre');
        $kpmn = $req->input('kp_mo_no');
        $kp_rogger = $req->input('kp_rogger_name');
        $kpvarity = $req->input('kp_varity');
        $kprst = $req->input('kp_rstno');
        $kp_vwihgt = $req->input('kp_vechicle_wight');
        $kp_goween = $req->input('kp_godown_name');

        DB::insert("Insert into kata_parchi (kp_date,kp_acc_no,kp_rel_name,kp_acc_holdername,kp_bhoomiswami_name,kp_vilage,kp_rakaba_acre,kp_mo_no,kp_rogger_name,kp_verity,kp_rstno,kp_vehicle_wight,kp_godown_name) VALUES ('$kpdate','$kpacc','$kprel','$kpacc_hold_name ','$kp_land_owner','$kpvilage','$kp_acre','$kpmn','$kp_rogger','$kpvarity','$kprst','$kp_vwihgt','$kp_goween')");

        return Redirect::to('kataparchi');
    }

    public function delete($id){

        DB::update("UPDATE kata_parchi SET is_deleted = 1 where kp_id = $id");
        return redirect::to ('kataparchi')->with('success','kataparchi deleted successfully.');
    }

    function edit($id) {
        $data['kataparchi'] = DB::select("select * from kata_parchi where kp_id = '$id' and is_deleted = 0");
        return view('kataparchi/edit',$data);

        //return redirect::to ('kataparchi')->with('success','kataparchi update successfully.');
    } 

    function update(Request $req) {
       
        $kpdate = date('Y-m-d', strtotime($req->input('kp_date')));
        $kpacc = $req->input('kp_acc_no');
        $kprel = $req->input('kp_rel_name');
        $kpacc_hold_name = $req->input('kp_acc_holdername');
        $kp_land_owner = $req->input('kp_bhoomiswami_name');
        $kpvilage = $req->input('kp_vilage');
        $kp_acre = $req->input('kp_rakaba_acre');
        $kpmn = $req->input('kp_mo_no');
        $kp_rogger = $req->input('kp_rogger_name');
        $kpvarity = $req->input('kp_varity');
        $kprst = $req->input('kp_rstno');
        $kp_vwihgt = $req->input('kp_vehicle_wight');
        $kp_goween = $req->input('kp_godown_name');

        $id = $req->input('kp_id');

        
        DB::update("update kata_parchi set 

        kp_date ='$kpdate',kp_acc_no ='$kpacc',kp_rel_name ='$kprel',kp_acc_holdername='$kpacc_hold_name',kp_bhoomiswami_name='$kp_land_owner',kp_vilage ='$kpvilage',kp_rakaba_acre='$kp_acre',kp_mo_no= '$kpmn',kp_rogger_name='$kp_rogger',kp_verity='$kpvarity',kp_rstno= '$kprst',kp_vehicle_wight='$kp_vwihgt',kp_godown_name='$kp_goween'  where kp_id='$id' ");
                
       

        return Redirect::to('kataparchi');
    }

}
