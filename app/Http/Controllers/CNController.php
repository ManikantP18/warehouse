<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;


class CNController extends Controller
{

 public function index() {
    $data['SalesReturn'] = DB::select('SELECT * FROM sales_return where is_deleted = 0');
    return view('sales-return.list', $data);
 }

function create(){

        $data['branches'] = DB::select("select * from sales_return"); 

         $data['units'] = DB::select("select * from product_service_units");

         $data['item'] = DB::select("select * from product_services where type = 'Product' ");
        return view('sales-return/creat',$data);
    }

    function add(Request $req){

        $item_sales = $req->input('item_sale');

if (is_array($item_sales) && count($item_sales) > 0) {
    // get other arrays also
    $quantities = $req->input('quantity');
    $units = $req->input('unit');
    $rates = $req->input('rate');
    $total_amounts = $req->input('total_amount');
    $GST_amounts = $req->input('GST_amount');

    // common fields
    $cash_credit = $req->input('cash_credit');
    $aadhar_no = $req->input('aadhar_no');
    $r_cust = $req->input('r_cust');
    $village = $req->input('village');
    $mo_no = $req->input('mo_no');

    // loop and insert
    for ($i = 0; $i < count($item_sales); $i++) {
        DB::insert("INSERT INTO sales_return 
            (cash_credit, aadhar_no, r_cust, village, mo_no, item_sale, quantity, unit, rate, total_amount, GST_amount)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            $cash_credit,
            $aadhar_no,
            $r_cust,
            $village,
            $mo_no,
            $item_sales[$i],
            $quantities[$i],
            $units[$i],
            $rates[$i],
            $total_amounts[$i],
            $GST_amounts[$i],
        ]);
    }
} else {
    // error or fallback
    return back()->with('error', 'No sale items found.');
}




        return Redirect::to('Sales-Return');
    }

    public function delete($id){

        DB::update("UPDATE sales_return SET is_deleted = 1 where cn_id = $id");
        return redirect::to ('Sales-Return')->with('success','credit note deleted successfully.');
    }
    
    function edit($id) {
        $data['CNdata'] = DB::select("select * from sales_return where cn_id = '$id' ");

         $data['units'] = DB::select("select * from product_service_units");

         $data['item'] = DB::select("select * from product_services where type = 'Product' ");
        
        return view('Sales-Return/edit',$data);
        
    } 

    public function update(Request $req) {
    $id = $req->input('cn_id'); // Get hidden ID

    $cash_credit = $req->input('cash_credit');
    $aadhar_no = $req->input('aadhar_no');
    $quantity = $req->input('quantity');
    $rate = $req->input('rate');
    $total_amount = $req->input('total_amount');
    $GST_amount = $req->input('GST_amount');

    // ✅ Use parameterized query to avoid SQL injection
    DB::update("UPDATE sales_return SET 
        cash_credit = ?, 
        aadhar_no = ?, 
        quantity = ?, 
        rate = ?, 
        total_amount = ?, 
        GST_amount = ? 
        WHERE cn_id = ?", [
        $cash_credit,
        $aadhar_no,
        $quantity,
        $rate,
        $total_amount,
        $GST_amount,
        $id
    ]);

    return redirect()->route('Sales-Return.list')->with('success', 'Updated successfully');
}

}