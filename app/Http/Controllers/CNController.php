<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;


class CNController extends Controller
{

 public function index() {

     $data['items'] = DB::select("select *,product_services.id AS pid, product_services.name AS item_name from product_services join taxes on product_services.tax_id = taxes.id where type = 'Product'"); 

     $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 

    $data['units'] = DB::select("select * from product_service_units");

    $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");


    $data['sellto'] = DB::select("select sell_to.*,ledgerbank_accounts.bank_name as branchname , company.company_name from sell_to join ledgerbank_accounts on ledgerbank_accounts.account_id = sell_to.bank_name join company on company.company_id = sell_to.company_id where sell_to = 'farmer' and sell_to.is_deleted = 0 order by sell_id DESC ");

    return view('sales-return.list', $data);
 }

 function history(Request $req) {
        $acc_id = $req->input('searchVal'); 
        

        $data['sellto'] = DB::select("select sell_to.*,ledgerbank_accounts.bank_name as branchname , company.company_name from sell_to join ledgerbank_accounts on ledgerbank_accounts.account_id = sell_to.bank_name join company on company.company_id = sell_to.company_id where sell_to = 'farmer' and sell_to.is_deleted = 0 and sell_account_number = '$acc_id' order by sell_id DESC ");


        return view('sales-return/table',$data);
        
    }

function create(){

        $data['branches'] = DB::select("select * from sales_return"); 

         $data['units'] = DB::select("select * from product_service_units");

         $data['item'] = DB::select("select * from product_services where type = 'Product' ");  

        return view('sales-return/creat',$data);
    }

    
    
    function edit($id) {
       $data['sellto'] = DB::select("select * from sell_to where sell_id = '$id' and sell_to = 'farmer' and is_deleted = 0");

        $data['units'] = DB::select("select * from product_service_units");

        $data['selleditems'] = DB::select("select * from selled_item where sell_id = '$id' and selled_status = 1");

        $data['items'] = DB::select("select * from product_services where type = 'Product'");

        $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product' AND product_services.id NOT IN(select selled_item from selled_item where sell_id = '$id' and selled_status = 1)");

        $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 

         $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
         
       
        
        return view('Sales-Return/edit',$data);
        
    } 

    public function update(Request $req) {
    $id = $req->input('cn_id'); // Get hidden ID

    $cash_credit = $req->input('cash_credit');
    $aadhar_no = $req->input('aadhar_no');
    $quantity = $req->input('quantity');
    $rate = $req->input('rate');
    $purchase_unit = $req->input('purchase_unit');
    $total_amount = $req->input('total_amount');
    $GST_amount = $req->input('GST_amount');

     $sellto_farmer = $req->input('sellto_farmer/other');

      $sellto_account_number = $req->input('sellto_account_number');

     $sellto_phone = $req->input('sellto_phone');

     $sellto_customer_name = $req->input('sellto_customer_name');

      $sellto_account_number = $req->input('sellto_acc_holder');

     $sellto_owner_name = $req->input('sellto_owner_name');

     $village = $req->input('village');

      $company_id = $req->input('company_id');

    //   DB::insert("insert into sales_return (cash_credit,aadhar_no,r_cust,village,mo_no,item_sale,sell_id,land_owner,acc_holder,quantity,unit,rate,total_amount,GST_amount,) values ('$cash_credit','$aadhar_no','$sellto_customer_name','$village','$sellto_phone','$aadhar_no','$sellto_customer_name','$village',)")

    return redirect()->route('Sales-Return.list')->with('success', 'Updated successfully');
}

}