<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;


class CNController extends Controller
{

 public function index() {
    $data['SalesReturn'] = DB::select('SELECT * FROM sales_return');
    return view('sales-return.list', $data);
}

function create(){

        $data['branches'] = DB::select("select * from sales_return"); 
        return view('sales-return/creat',$data);
    }

    function add(Request $req){

        $cash_credit = $req->input('cash_credit');
        $aadhar_no = $req->input('aadhar_no');
        $r_cust = $req->input('r_cust');
        $village = $req->input('village');
        $mo_no = $req->input('mo_no');
        $item_sale = $req->input('item_sale');
        $quantity = $req->input('quantity');
        $rate = $req->input('rate');
        $total_amount = $req->input('total_amount');
        $GST_amount = $req->input('GST_amount');
        
        

        DB::insert("Insert into sales_return (cash_credit,aadhar_no,r_cust,village,mo_no,item_sale,quantity,rate,total_amount,GST_amount) VALUES ('$cash_credit','$aadhar_no','$r_cust','$village','$mo_no','$item_sale','$quantity','$rate','$total_amount','$GST_amount')");

        return Redirect::to('Sales-Return');
    }

    public function delete($id){

        DB::update("UPDATE sales_return SET is_deleted = 1 where cn_id = $id");
        return redirect::to ('Sales-Return')->with('success','credit note deleted successfully.');
    }

}