<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Branches;

use Illuminate\Support\Facades\Redirect;

use DB;

class BranchesController extends Controller
{
    public function index(){

        $data['branches'] = DB::select('select * from branches join company on company.company_id = branches.company_id');

        return view('branches/list',$data);

    }

    function create(){
        $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
        return view('branches/create',$data);
    }

    function add(Request $req){
        $bname = $req->input('branch_name');
        $bphone = $req->input('branch_cont');
        $baddress = $req->input('branch_address');
        $bcompany = $req->input('branch_company');

        DB::insert("Insert into branches (branch_name,branch_cont,branch_address,company_id) VALUES ('$bname', $bphone, '$baddress','$bcompany')");

        return Redirect::to('branches');
    }

}
