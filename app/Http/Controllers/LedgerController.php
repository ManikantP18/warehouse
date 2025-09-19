<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ledger;

use Illuminate\Support\Facades\Redirect;





use App\Models\OpeningBalance;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class LedgerController extends Controller
{
    public function index(){

        $data['ledger'] = DB::select('select * from ladgers where ladger_type = 1 and is_deleted = 0 order by ladger_id DESC');

        return view('ledger/ledgerlist',$data);

    }

    function create(){
    $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");
     return view('ledger/ledgerceate',$data);
    }

    function add(Request $req){
        $ladger_type = $req->input('ledger_type') == 'others' ? 2 : 1;
        $relational_cust_name = $req->input('relational_cust_name');
        $account_holder	 = $req->input('account_holder');
        $farm_owner_name = $req->input('farm_owner_name');
        $village = $req->input('village');
         $farm_area_acre = $req->input('farm_area_acre');
         $khasra_no = $req->input('khasra_no');
         $bhumi_gram = $req->input('bhumi_gram');

         $opening_balance = $req->input('opening_balance');
         
          $phone_number	 = $req->input('phone_number');
           $bank_account_name	 = $req->input('bank_account_name');
            $account_number	 = $req->input('account_number');
             $bank_name	 = $req->input('bank_name');
              $ifsc_code = $req->input('ifsc_code');
            $branch	 = $req->input('branch');
            $gst_num = $req->input('gst_num');
            $companies = $req->input('company_id');
            $account_id = $this->customerNumber() > 0 ? 'cust-'.$this->customerNumber() : 'cust-1';
                
            $ledger_under_type = $req->input('ledger_under_type');

            $photo_path = null;

            if ($req->hasFile('photo')) {
                $file = $req->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('photos', $filename, 'public'); // storage/app/public/photos
                $photo_path = 'photos/' . $filename;
            }


            if($ledger_under_type == 'cash'){
                $relational_cust_name = 'Cash In Hand';
            }
            

       DB::insert("Insert into ladgers ( account_id,ladger_type,under_type,relational_cust_name,account_holder,farm_owner_name,village,farm_area_acre,phone_number,bank_account_name,account_number,bank_name,ifsc_code,branch,gst_num,khasra_no,bhumi_gram,photo_path) VALUES ('$account_id',$ladger_type,'$ledger_under_type','$relational_cust_name', '$account_holder', '$farm_owner_name','$village','$farm_area_acre','$phone_number','$bank_account_name','$account_number','$bank_name','$ifsc_code','$branch','$gst_num','$khasra_no','$bhumi_gram','$photo_path')");

       

        for ($i = 0; $i < count($companies); $i++) {
            
            DB::insert("INSERT INTO ladger_opening_bal (ladger_id, company_id, opening_amount)VALUES ('$account_id','$companies[$i]','$opening_balance[$i]')");

            $cramt = 0; $dramt = 0;

            $avabl = 0;

            if($opening_balance[$i] < 0){
                $cramt = abs($opening_balance[$i]);

                $avabl = $avabl + $cramt;

            } else {
                $dramt = $opening_balance[$i];

                $avabl =  $avabl - $dramt;
            }

            DB::insert("Insert into payment_statement (ladger_id,pay_type,prtclr,dr_amt, cr_amt,avbl_bal,comp_id) VALUES ('$account_id','Payment','Opening Balance', '$dramt','$cramt','$avabl','$companies[$i]')");
        }

        if($ladger_type == 1){
            return Redirect::to('ledger')->with('success', 'Ledger Create Successfully');
        } else{
            return Redirect::to('ledger/others')->with('success', 'Ledger Create Successfully');
        }
        
    }

    function validmobile(request $req){

        $phone_number = $req->input('mobileno');

        $exists = DB::table('ladgers')
    ->where('phone_number', $phone_number)
    ->where('is_deleted', 0)
    ->exists();

    if ($exists) {
        echo 'This phone number is already in use';
    }else {
        echo 'ok';
    }
}

    function customerNumber()
    {
        $latest = DB::select('select ladger_id from ladgers order by ladger_id DESC limit 1');
        if (!$latest) {
            return 1;
        }

        return $latest[0]->ladger_id + 1;
    }

    function delete($id){
       DB::table('ladgers')->where('account_id', $id)->update(['is_deleted' => 1]);

       DB::table('ladger_opening_bal')->where('ladger_id', $id)->update(['is_deleted' => 1]);

       //Delete Sales

       DB::table('sell_to')->where('sell_account_number', $id)->update(['is_deleted' => 1]);

       DB::table('selled_item')->whereIn('sell_id', function($query) use ($id) {
                $query->select('sell_id')
                    ->from('sell_to')
                    ->where('sell_account_number', $id);
            })->update(['is_deleted' => 1]);

       //Updating inventory again

       DB::table('products_inventory as pi')
        ->join('selled_item as si', 'pi.lot_no', '=', 'si.selled_lot_no')
        ->join('sell_to as st', 'si.sell_id', '=', 'st.sell_id')
        ->where('st.sell_account_number', $id)
        ->update([
            'pi.avbl_stock' => DB::raw('pi.avbl_stock + (si.selled_quantity - si.return_qty)')
        ]);

        //clear payment transations

        DB::table('payment_statement')
        ->whereIn('sell_id', function($q) use ($id) {
            $q->select('sell_id')
              ->from('sell_to')
              ->where('sell_account_number', $id);
        })
        ->update(['is_deleted' => 1]);

       // Clear Payment in out

       DB::table('payment_outs')->where('ladger_id', $id)->update(['is_deleted' => 1]);
       DB::table('payment_in')->where('ladger_id', $id)->update(['is_deleted' => 1]);

       DB::table('payment_statement')->where('ladger_id', $id)->update(['is_deleted' => 1]);

     //Delete Purchase

      DB::table('purchase')->where('cust_id', $id)->update(['is_deleted' => 1]);
      
      DB::table('kata_parchi')->where('kp_acc_no', $id)->update(['is_deleted' => 1]);

      DB::table('purchase_item')->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('cust_id', $id);
        })->update(['is_deleted' => 1]);

      DB::table('payment_statement')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('cust_id', $id);
        })
        ->update(['is_deleted' => 1]);

        // 4. Staging soft delete
    DB::table('staging')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('cust_id', $id);
        })
        ->update(['is_deleted' => 1]);

    // 5. Gredding soft delete (based on staging_id)
    DB::table('gredding')
        ->whereIn('staging_id', function($q) use ($id) {
            $q->select('staging_id')
              ->from('staging')
              ->whereIn('purchase_id', function($q2) use ($id) {
                  $q2->select('purchase_id')
                     ->from('purchase')
                     ->where('cust_id', $id);
              });
        })
        ->update(['is_deleted' => 1]);

    // 6. Packing soft delete (based on gredding_id)
    DB::table('packing')
        ->whereIn('gredding_id', function($q) use ($id) {
            $q->select('gredding_id')
              ->from('gredding')
              ->whereIn('staging_id', function($q2) use ($id) {
                  $q2->select('staging_id')
                     ->from('staging')
                     ->whereIn('purchase_id', function($q3) use ($id) {
                         $q3->select('purchase_id')
                            ->from('purchase')
                            ->where('cust_id', $id);
                     });
              });
        })
        ->update(['is_deleted' => 1]);

    // 1. Purchase soft delete
    DB::table('purchase')
        ->where('cust_id', $id)
        ->update(['is_deleted' => 1]);

    // 2. Purchase Items soft delete
    DB::table('purchase_item')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('cust_id', $id);
        })
        ->update(['is_deleted' => 1]);

    // 3. Payment Statement soft delete
    DB::table('payment_statement')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('cust_id', $id);
        })
        ->update(['is_deleted' => 1]);

    // 4. Staging soft delete
    DB::table('staging')
        ->whereIn('purchase_id', function($q) use ($id) {
            $q->select('purchase_id')
              ->from('purchase')
              ->where('cust_id', $id);
        })
        ->update(['is_deleted' => 1]);

    // 5. Gredding soft delete
    DB::table('gredding')
        ->whereIn('staging_id', function($q) use ($id) {
            $q->select('staging_id')
              ->from('staging')
              ->whereIn('purchase_id', function($q2) use ($id) {
                  $q2->select('purchase_id')
                     ->from('purchase')
                     ->where('cust_id', $id);
              });
        })
        ->update(['is_deleted' => 1]);

    // 6. Packing soft delete
    DB::table('packing')
        ->whereIn('gredding_id', function($q) use ($id) {
            $q->select('gredding_id')
              ->from('gredding')
              ->whereIn('staging_id', function($q2) use ($id) {
                  $q2->select('staging_id')
                     ->from('staging')
                     ->whereIn('purchase_id', function($q3) use ($id) {
                         $q3->select('purchase_id')
                            ->from('purchase')
                            ->where('cust_id', $id);
                     });
              });
        })
        ->update(['is_deleted' => 1]);

    // 7. Products Inventory soft delete (based on lot_no from packing)
    DB::table('products_inventory')
        ->whereIn('lot_no', function($q) use ($id) {
            $q->select('lot_no')
              ->from('packing')
              ->whereIn('gredding_id', function($q2) use ($id) {
                  $q2->select('gredding_id')
                     ->from('gredding')
                     ->whereIn('staging_id', function($q3) use ($id) {
                         $q3->select('staging_id')
                            ->from('staging')
                            ->whereIn('purchase_id', function($q4) use ($id) {
                                $q4->select('purchase_id')
                                   ->from('purchase')
                                   ->where('cust_id', $id);
                            });
                     });
              });
        })
        ->update(['is_deleted' => 1]);


       return Redirect::to('/ledger')->with('success', 'Ledger Deleted Successfully');
   
    }

    function edit($id){
         $data['ledger'] = DB::select("select * from ladgers where ladger_id = '$id'");
          $data['open_bal'] = DB::select("select * from ladger_opening_bal join company on company.company_id = ladger_opening_bal.company_id  where ladger_id = 'cust-$id'");
        return view('ledger/edit',$data);
    }


    public function update(Request $request)
{
    
    /*$request->validate([
        'ladger_id' => 'required',
        'relational_cust_name' => 'required|string',
        'account_holder' => 'required',
        'farm_owner_name' => 'nullable|string',
        'khasra_no' => 'nullable|string',
        'bhumi_gram' => 'nullable|string',
        'village' => 'required|string',
        'farm_area_acre' => 'nullable|numeric',
        'phone_number' => 'required',
        'bank_account_name' => 'nullable|string',
        'account_number' => 'nullable|string',
        'bank_name' => 'nullable|string',
        'ifsc_code' => 'nullable|string',
        'branch' => 'nullable|string',
        'gst_num' => 'nullable|string',
        'opening_balance' => 'required|array',
        'opening_bal_id' => 'required|array',
        'company_ids' => 'required|array',
    ]);*/

    $ladger_id = $request->input('ladger_id');


    // Prepare update data
    $updateData = [
        'relational_cust_name' => $request->relational_cust_name,
        'account_holder' => $request->account_holder,
        'farm_owner_name' => $request->farm_owner_name,
        'village' => $request->village,
        'farm_area_acre' => $request->farm_area_acre,
        'phone_number' => $request->phone_number,
        'bank_account_name' => $request->bank_account_name,
        'account_number' => $request->account_number,
        'bank_name' => $request->bank_name,
        'ifsc_code' => $request->ifsc_code,
        'branch' => $request->branch,
        'gst_num' => $request->gst_num,
        'khasra_no' => $request->khasra_no,
        'bhumi_gram' => $request->bhumi_gram,
    ];

    // Photo upload
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('photos', $filename, 'public');
        $updateData['photo_path'] = 'photos/' . $filename;
    }

    // Update main ladger
    DB::table('ladgers')
        ->where('ladger_id', $ladger_id)
        ->update($updateData);

    // Update opening balances and payment statements
    $opening_balance = $request->input('opening_balance');
    $opening_ids = $request->input('opening_bal_id');
    $companies = $request->input('company_ids');

       for($i=0;$i<count($opening_balance);$i++) {
        DB::update("update ladger_opening_bal set opening_amount = '$opening_balance[$i]' where opening_bal_id = '$opening_ids[$i]'");

        $cramt = 0; $dramt = 0;

            $avabl = 0;

            if($opening_balance[$i] < 0){
                $cramt = abs($opening_balance[$i]);

                $avabl = $avabl + $cramt;

            } else {
                $dramt = $opening_balance[$i];

                $avabl =  $avabl - $dramt;
            }

        DB::update("update payment_statement SET dr_amt = '$dramt', cr_amt = '$cramt', avbl_bal = '$avabl' WHERE prtclr = 'Opening Balance' and comp_id = '$companies[$i]' and ladger_id = 'cust-$ladger_id'");

        $statement = DB::select("select pay_id,dr_amt,cr_amt from payment_statement WHERE prtclr != 'Opening Balance' and comp_id = '$companies[$i]' and ladger_id = 'cust-$ladger_id' order by pay_id ASC");

        if(!empty($statement)){
            foreach($statement as $sttmnt){

                $avabl = $avabl + $sttmnt->cr_amt - $sttmnt->dr_amt;

                $pay_id = $sttmnt->pay_id;

                DB::update("update payment_statement SET avbl_bal = '$avabl' WHERE pay_id = '$pay_id'");

            }
        }



       }


    return redirect('/ledger')->with('success', 'Ledger updated successfully');
}

 



    function other() {
        $data['ledger'] = DB::select("select * from ladgers where ladger_type != 1 and is_deleted = 0");
        return view('ledger/ledgerlist',$data);
    }
    
}

