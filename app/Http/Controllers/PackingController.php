<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class PackingController extends Controller
{
    function index() {
        $data['packing'] = DB::select("select * from packing where packing_status = 1 and is_deleted = 0");
        return view('packing/list',$data);
    }



    function edit() {
        return view('packing/edit');
    }

    function update() {
        
    }

  
}
