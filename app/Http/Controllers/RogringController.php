<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branches;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB; 

class RogringController extends Controller
{
    public function index(){
        $data['rogring'] = DB::select('select * from rogring');
        return view('Rogring/list',$data);
    }

    function create(){
        return view('Rogring/create');
    }  

    public function add(Request $req)
    {

        DB::table('rogring')->insert([
            'Rogring_name' => $req->input('Rogring_name'),
            'Rogring_contcact' => $req->input('Rogring_contcact'),
        ]);

    return Redirect::to('Rogring')->with('success', 'Rogring added successfully.');
}


    public function destroy($id)
{
    DB::table('rogring')->where('Rogring_id', $id)->delete();

    return Redirect::to('Rogring')->with('success', 'Rogring deleted successfully.');
}

public function edit($id)
{
    $rogring = DB::table('rogring')->where('Rogring_id', $id)->first();

    if (!$rogring) {
        return redirect()->route('Rogring')->with('error', 'Rogring not found');

    }

    return view('Rogring.edit', compact('rogring'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'Rogring_name' => 'required|string|max:255',
        'Rogring_contcact' => 'required|string|max:20',
    ]);

    DB::table('rogring')->where('Rogring_id', $id)->update([
        'Rogring_name' => $request->input('Rogring_name'),
        'Rogring_contcact' => $request->input('Rogring_contcact'),
    ]);

    return Redirect::to('Rogring')->with('success', 'Rogring Updated successfully.');

}


}
