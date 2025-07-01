<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Branches;

use Illuminate\Support\Facades\Redirect;

use DB;

class BranchesController extends Controller
{
    public function index(){

        $data['branches'] = DB::select('select * from branches');

        return view('branches/list',$data);

    }

    function create(){
        return view('branches/create');
    }

    function add(Request $req){
        $bname = $req->input('branch_name');
        $bphone = $req->input('branch_cont');
        $baddress = $req->input('branch_address');

        DB::insert("Insert into branches (branch_name,branch_cont,branch_address) VALUES ('$bname', $bphone, '$baddress')");

        return Redirect::to('branches');
    }

}
