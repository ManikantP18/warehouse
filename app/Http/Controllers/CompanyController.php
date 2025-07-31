<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

class CompanyController extends Controller
{
   function index() {
    $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
    return view('company/list',$data);
   }

   function create() {
    return view('company/create');
   }

   function add(Request $req){
        $cname = $req->input('company_name');
        $caddress = $req->input('company_address');
         DB::insert("Insert into company (company_name,company_address) VALUES ('$cname','$caddress')");

        return Redirect::to('company');
    }

    public function delete($id){

        DB::update("UPDATE company SET is_deleted = 1 where company_id = $id");
        return redirect::to ('company')->with('success','Company deleted successfully.');
    }

    function edit($id) {
        $data['company'] = DB::select("select * from company where company_id = '$id'");
        return view('company/edit',$data);
        
    } 

    function update(Request $req) {
        $cname = $req->input('company_name');
        $caddress = $req->input('company_address');
        $cid = $req->input('company_id');
        DB::update("update company set company_name = '$cname',company_address = '$caddress' where company_id = '$cid'");

        return Redirect::to('company');
    
    }
}
