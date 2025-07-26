<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;


class KataParchiController extends Controller
{
    public function index(){

        $data['kataparchi'] = DB::select('select kata_parchi.*,product_services.name as kp_verity  from kata_parchi join product_services ON kata_parchi.kp_verity = product_services.id where kata_parchi.is_deleted = 0 AND kp_pure_wigth = 0');

        return view('kataparchi/list',$data);

    }

    function create(){

        $data['branches'] = DB::select("select * from branches"); 
        return view('kataparchi/create',$data);
    }

    function add(Request $req){

        //print_r($req->input()); exit;

        $kpdate = date('d-m-y', strtotime($req->input('kp_date')));
        $kpacc = $req->input('kp_acc_no');
        $kprel = $req->input('kp_rel_name');
        $kpacc_hold_name = $req->input('kp_acc_holdername');
        $kp_land_owner = $req->input('kp_bhoomiswami_name');
        $kpvilage = $req->input('kp_vilage');
        $kp_acre = $req->input('kp_rakaba_acre');

        $kp_acre = $req->input('kp_khasra_no');

        $kpmn = $req->input('kp_mo_no');
        $kp_rogger = $req->input('kp_rogger_name');
        $kpvarity = $req->input('kp_varity');
        $kprst = $req->input('kp_rstno');
        $kp_vwihgt = $req->input('kp_vehicle_wight');

        $kp_goween = $req->input('kp_godown_name');

        DB::insert("Insert into kata_parchi (kp_date,kp_acc_no,kp_rel_name,kp_acc_holdername,kp_bhoomiswami_name,kp_vilage,kp_rakaba_acre,kp_mo_no,kp_rogger_name,kp_verity,kp_rstno,kp_vehicle_wight,kp_godown_name) VALUES ('$kpdate','$kpacc','$kprel','$kpacc_hold_name','$kp_land_owner','$kpvilage','$kp_acre','$kpmn','$kp_rogger','$kpvarity','$kprst','$kp_vwihgt','$kp_goween')");

        return Redirect::to('kataparchi');
    }

    public function delete($id){

        DB::update("UPDATE kata_parchi SET is_deleted = 1 where kp_id = $id");
        return redirect::to ('kataparchi')->with('success','kataparchi deleted successfully.');
    }

    function edit($id) {
        $data['kataparchi'] = DB::select("select kata_parchi.*, product_services.name as veriety from kata_parchi JOIN product_services ON product_services.id = kata_parchi.kp_verity where kp_id = '$id' and is_deleted = 0");
        $data['branches'] = DB::select("select * from branches");
        return view('kataparchi/edit',$data);
        //return redirect::to ('kataparchi')->with('success','kataparchi update successfully.');
    } 

    function update(Request $req) {

    $kpdate = $req->input('kp_date') ? date('d-m-y', strtotime($req->input('kp_date'))) : null;
    $kpacc = $req->input('kp_acc_no');
    $kprel = $req->input('kp_rel_name');
    $kpacc_hold_name = $req->input('kp_acc_holdername');
    $kp_land_owner = $req->input('kp_bhoomiswami_name');
    $kpvilage = $req->input('kp_vilage');
    $kp_acre = $req->input('kp_rakaba_acre');

    $kp_acre = $req->input('kp_khasra_no');

    $kpmn = $req->input('kp_mo_no');
    $kp_rogger = $req->input('kp_rogger_name');
    $kpvarity = $req->input('kp_verity');
    $kprst = $req->input('kp_rstno');
    $kp_vwihgt = $req->input('kp_vehicle_wight');
    $kp_only_vechicle_w = $req->input('kp_only_vechicle_w');
    $kp_pure_wigth = $req->input('kp_pure_wigth');
    $kp_goween = $req->input('kp_godown_name');
    $id = $req->input('kp_id');

    // Add this check AFTER all variables are defined
    $hideFlag = 0;
    if (!empty($kp_pure_wigth)) {
        $hideFlag = 1;
    }

    DB::update("UPDATE kata_parchi SET 
        kp_date = '$kpdate',
        kp_acc_no = '$kpacc',
        kp_rel_name = '$kprel',
        kp_acc_holdername = '$kpacc_hold_name',
        kp_bhoomiswami_name = '$kp_land_owner',
        kp_vilage = '$kpvilage',
        kp_rakaba_acre = '$kp_acre',
        kp_khasra_no = '$kp_acre',
        kp_mo_no = '$kpmn',
        kp_rogger_name = '$kp_rogger',
        kp_verity = '$kpvarity',
        kp_rstno = '$kprst',
        kp_vehicle_wight = '$kp_vwihgt',
        kp_only_vechicle_w = '$kp_only_vechicle_w',
        kp_pure_wigth = '$kp_pure_wigth',
        kp_godown_name = '$kp_goween',
        pure_update_hide = '$hideFlag'
        WHERE kp_id = '$id'");

        $ladgerinfo = DB::select("SELECT * FROM ladgers where account_id = '$kpacc'");

        $gst = $ladgerinfo[0]->gst_num;

        $acc = $ladgerinfo[0]->account_number;

        $bank_name = $ladgerinfo[0]->bank_name;

        $ifsc_code = $ladgerinfo[0]->ifsc_code;

        $branch = $ladgerinfo[0]->branch;

        $kpvarity = 1;

        $products = DB::select("select * from product_services where id = '$kpvarity'");

        $rate = $products[0]->purchase_price;

        DB::insert("Insert into purchase (purchase_relation_cusm,purchase_accountant,purchase_owner,purchase_village,purchase_acre,purchase_phone,purchase_rst_no,purchase_lot_no,purchase_account_no,purchas_bank_name,purchase_ifsc,purchase_branch,purchase_gst_no,purchase_item,purchase_quantity,purchase_rate,purchase_total) VALUES ('$kprel' , '$kpacc_hold_name', '$kp_land_owner' ,'$kpvilage','$kp_acre', '$kpmn','$kprst','' ,'$acc', '$bank_name','$ifsc_code' ,'$branch', '$gst' ,'$kpvarity','1','$rate','$rate' )");
    
        return Redirect::to('kataparchi');
}
}
