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

        print_r($req->input()); exit;

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

public function search(Request $req)
        {
            $searchVal = $req->input('searchVal'); // Account No or Mobile No
            $searchVillage = $req->input('searchVillage');
            $searchname = $req->input('searchname');

           

           /* $searchData = DB::select("SELECT ladger_id,relational_cust_name FROM ladgers
            WHERE (account_id LIKE '%$searchVal%' OR phone_number LIKE '%$searchVal%')
            AND (relational_cust_name LIKE '%$searchname%'
            AND village LIKE '%$searchVillage%')
            ")->get()->pluck('relational_cust_name', 'ladger_id');*/

               // $tax          = Tax::where('account_id', 'LIKE','%'.$searchVal.'%')->orwhere('phone_number', 'LIKE','%'.$searchVal.'%')->where('relational_cust_name', 'LIKE','%'.$searchname.'%')->where('relational_cust_name', 'LIKE','%'.$searchname.'%')->get()->pluck('name', 'id');

               $searchData = DB::table('ladgers')
    ->select('ladger_id', 'relational_cust_name')
    ->where(function ($query) use ($searchVal) {
        $query->where('account_id', 'LIKE', "%$searchVal%")
              ->orWhere('phone_number', 'LIKE', "%$searchVal%");
    })
    ->where('relational_cust_name', 'LIKE', "%$searchname%")
    ->where('village', 'LIKE', "%$searchVillage%")
    ->pluck('relational_cust_name', 'ladger_id') // This gives associative array: [id => name]
    ->toArray(); // Convert collection to array

            $farmers = [];

            foreach($searchData as $key=>$values){
                $farmers[$key] = $values;
            }

            $data['farmers'] = $searchData;

            return view('Rogring/multyopt',$data);

        }

}
