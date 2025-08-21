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

 public function returnList(){

    $data['SalesReturn'] = DB::select('SELECT sales_return.*,product_services.name as pname,product_service_units.*  FROM sales_return JOIN product_services ON product_services.id = sales_return.p_id JOIN product_service_units ON product_service_units.id = sales_return.unit where is_deleted = 0');
    return view('sales-return.return_list', $data);

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

        $data['selleditems'] = DB::select("select *, (selled_quantity-return_qty) AS returnAbleQty from selled_item where sell_id = '$id' and selled_status = 1");

        $data['items'] = DB::select("select * from product_services where type = 'Product'");

        $data['products'] = DB::select("select id, name, quantity from product_services where type = 'Product' AND product_services.id NOT IN(select selled_item from selled_item where sell_id = '$id' and selled_status = 1)");

        $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 

         $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
         
       
        
        return view('sales-return/edit',$data);
        
    } 


        function viewreturn($id) {
    $data['sellto'] = DB::select("select * from sell_to where sell_id = '$id' and sell_to = 'farmer' and is_deleted = 0");

    $data['units'] = DB::select("select * from product_service_units");

    // Remaining saled items (not returned yet)
    $data['selleditems'] = DB::select("select *, (selled_quantity-return_qty) AS returnAbleQty 
         from selled_item 
         where sell_id = '$id' and selled_status = 1");

        // print_r("SELECT sales_return.*,product_services.name as pname,product_service_units.*  FROM sales_return JOIN product_services ON product_services.id = sales_return.p_id JOIN product_service_units ON product_service_units.id = sales_return.unit where ");exit;

         $data['returneditems'] = DB::select("SELECT sales_return.*,product_services.name as pname,product_service_units.*  FROM sales_return JOIN product_services ON product_services.id = sales_return.p_id JOIN product_service_units ON product_service_units.id = sales_return.unit where sales_return.cn_id = '$id'");



            $data['items'] = DB::select("select * from product_services where type = 'Product'");

            $data['products'] = DB::select("select id, name, quantity 
                from product_services 
                where type = 'Product' 
                AND product_services.id NOT IN(
                    select selled_item from selled_item 
                    where sell_id = '$id' and selled_status = 1
                )");

            $data['banks'] = DB::select("select * FROM ledgerbank_accounts WHERE account_status = 1 "); 

            $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
            
            return view('sales-return/viewreturn',$data);
        }


    public function update(Request $req) {
    $id = $req->input('cn_id'); // Get hidden ID

    $cash_credit = $req->input('sellto_cash/credit');
    $aadhar_no = $req->input('sellto_acc_holder');
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

      $sell_id = $req->input('sell_id');

      $sellto_item_selled = $req->input('sellto_item_selled');
      

      $sellto_quantity = $req->input('sellto_quantity');

      $sellto_rate = $req->input('sellto_rate');

      $purchase_unit = $req->input('purchase_unit');

      $purchase_total = $req->input('purchase_total');

      $GST_amount = $req->input('sellto_gst_amount');

      $returnedProducts = $req->input('return_items');

    for($i=0; $i<count($returnedProducts); $i++){

        /*$exist = DB::select("select * FROM sales_return WHERE selled_item_id = $returnedProducts[$i] ");

        if(count($exist) > 0){

            DB::update("update sales_return set quantity = '$sellto_quantity[$i]',unit = '$purchase_unit[$i]' ,rate = '$sellto_rate[$i]',total_amount = '$purchase_total[$i]',GST_amount = '$GST_amount[$i]' where selled_item_id = '$returnedProducts[$i]'");

        } else{*/

            DB::insert("insert into sales_return (sale_id,p_id,selled_item_id,cash_credit,aadhar_no,r_cust,village,mo_no,land_owner,quantity,unit,rate,total_amount,GST_amount) values ('$sell_id','$sellto_item_selled[$i]','$returnedProducts[$i]','$cash_credit','$aadhar_no','$sellto_customer_name','$village','$sellto_phone','$sellto_owner_name','$sellto_quantity[$i]','$purchase_unit[$i]','$sellto_rate[$i]','$purchase_total[$i]','$GST_amount[$i]')");

       // }

        DB::update("update selled_item set return_qty = return_qty + '$sellto_quantity[$i]' where selled_id = '$returnedProducts[$i]'");

    }

    

    return redirect()->route('Sales-Return.list')->with('success', 'Updated successfully');
}

}