<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class InventoryController extends Controller
{
    public function index(){
       $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");

       return view('inventory/list',$data);

    }

    public function getcategories(Request $req){

        $cid = $req->input('comp_id'); 

        $categories = DB::select("select * from product_service_categories where company_id = ' $cid'");
         $opt = '<option value=""> Select Category </option> <option value="all"> Select All </option>';

        if(!empty($categories)){
            
            foreach($categories as $ln) {

                $opt .= "<option value='$ln->id'>$ln->name</option>";

            }
        }

        echo $opt;

    }

    public function getItems(Request $req){

        $cid = $req->input('cat_id'); 

        $categories = DB::select("select * from product_services where category_id = ' $cid'");
         $opt = '<option value=""> Select Item </option> <option value="all"> All </option>';

        if(!empty($categories)){
            
            foreach($categories as $ln) {

                $opt .= "<option value='$ln->id'>$ln->name</option>";

            }
        }

        echo $opt;

    }

    function filter( Request $req){

        $itemid = $req->input('item_id');

        $comp_id = $req->input('comp_id');
        $cat_id = $req->input('cat_id');

        $where = '';

        if($cat_id  != 'all')
        {
            $where .= " WHERE products_inventory.company_id = '$comp_id'";
        }

        if(!empty($cat_id) && $cat_id  != 'all'){
            $where .= " AND products_inventory.cat_id = '$cat_id' ";
        }

        if(!empty($itemid) && $itemid != 'all'){
            $where .= " AND products_inventory.item_id = '$itemid' ";
        }

        $data['pInfo'] = DB::select("
            SELECT products_inventory.*,company.company_name, 
                product_services.name AS item_name, 
                product_service_categories.name AS category_name  
            FROM products_inventory  
            JOIN company 
                ON company.company_id = products_inventory.company_id  
            JOIN product_service_categories 
                ON product_service_categories.id = products_inventory.cat_id  
            JOIN product_services 
                ON product_services.id = products_inventory.item_id  
            $where"
        );


        return view('inventory/table',$data);

    }
}
