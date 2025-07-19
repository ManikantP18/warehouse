<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SallesQuatationModel;

use Illuminate\Support\Facades\Redirect;

use DB;

class SellesQuatationController extends Controller
{
    public function index(){
        $data['sellsquatation'] = DB::select("select * from sellsquatation ");
        return view('SellsQuatation/list',$data);

    }

     function create(){
        $data['items'] = DB::select("select * from sellsquatation"); 
       
        return view('SellsQuatation/create',$data);
    }
    

    function add(Request $req){
        $cashcredit = $req->input('Cash_Credit');
        $accholder = $req->input('Account_holders_name');
        $Users_name = $req->input('Users_name');
        $Village = $req->input('Village');
        $Contact_no = $req->input('Contact_no');
        $Item_To_Be_Sale = $req->input('Item_To_Be_Sale');
        $Quantity = $req->input('Quantity');
        $Rate = $req->input('Rate');
         $Total_Amount = $req->input('Total_Amount');
        $GST_Amount = $req->input('GST_Amount');
      

        DB::insert("Insert into sellsquatation (Cash_Credit	,Account_holders_name,Users_name,Village,Contact_no,Item_To_Be_Sale,Quantity,Rate,Total_Amount,GST_Amount) VALUES ('$cashcredit', '$accholder' , '$Users_name', '$Village' ,'$Contact_no', '$Item_To_Be_Sale','$Quantity', '$Rate' ,'$Total_Amount', '$GST_Amount')");
       
        return Redirect::to('SellsQuatation');
    }

    function delete($id){
        DB::table('sellsquatation')->where('id', $id)->delete();
        return Redirect::to('SellsQuatation')->with('success', ' Quatations Deleted Successfully');
    
     }

    function edit($id) {
        $data['sellsquatation'] = DB::select("select * from sellsquatation where id = '$id'");
        return view('SellsQuatation/edit',$data);
    

    } 

    function update(Request $req) {
        $id = $req->input('id');
        $cashcredit = $req->input('Cash_Credit');
        $accholder = $req->input('Account_holders_name');
        $Users_name = $req->input('Users_name');
        $Village = $req->input('Village');
        $Contact_no = $req->input('Contact_no');
        $Item_To_Be_Sale = $req->input('Item_To_Be_Sale');
        $Quantity = $req->input('Quantity');
        $Rate = $req->input('Rate');
         $Total_Amount = $req->input('Total_Amount');
        $GST_Amount = $req->input('GST_Amount');


        DB::update("update sellsquatation set Cash_Credit = '$cashcredit',Account_holders_name = '$accholder' ,Users_name = '$Users_name',Village = '$Village',Contact_no = '$Contact_no',Item_To_Be_Sale = '$Item_To_Be_Sale',Quantity = '$Quantity',Rate = '$Rate',Total_Amount = '$Total_Amount',GST_Amount = '$GST_Amount' where id = '$id'");

        return Redirect::to('SellsQuatation');
    }


    
}
