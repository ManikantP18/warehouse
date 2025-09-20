<?php

namespace App\Http\Controllers;

use App\Models\BalanceSheet;
use App\Models\BankAccount;
use App\Models\Bill;
use App\Models\Goal;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceUnit;
use App\Models\Revenue;
use App\Models\Tax;
use App\Models\Utility;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            if (\Auth::user()->type == 'super admin') {
                $user                       = \Auth::user();
                $user['total_user']         = $user->countCompany();
                $user['total_paid_user']    = $user->countPaidCompany();
                $user['total_orders']       = Order::total_orders();
                $user['total_orders_price'] = Order::total_orders_price();
                $user['total_plan']         = Plan::total_plan();
                $user['most_purchese_plan'] = (!empty(Plan::most_purchese_plan()) ? Plan::most_purchese_plan()->total : 0);
                $chartData                  = $this->getOrderChart(['duration' => 'week']);

                return view('dashboard.super_admin', compact('user', 'chartData'));
            } else {
                if (\Auth::user()->can('show dashboard')) {
                    $data['latestIncome']  = Revenue::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();
                    $data['latestExpense'] = Payment::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();

                    $incomeCategory = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'income')->get();
                    $inColor        = array();
                    $inCategory     = array();
                    $inAmount       = array();
                    for ($i = 0; $i < count($incomeCategory); $i++) {
                        $inColor[]    = $incomeCategory[$i]->color;
                        $inCategory[] = $incomeCategory[$i]->name;
                        $inAmount[]   = $incomeCategory[$i]->incomeCategoryRevenueAmount();
                    }


                    $data['incomeCategoryColor'] = $inColor;
                    $data['incomeCategory']      = $inCategory;
                    $data['incomeCatAmount']     = $inAmount;

                    $expenseCategory = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'expense')->get();
                    $exColor         = array();
                    $exCategory      = array();
                    $exAmount        = array();
                    for ($i = 0; $i < count($expenseCategory); $i++) {
                        $exColor[]    = $expenseCategory[$i]->color;
                        $exCategory[] = $expenseCategory[$i]->name;
                        $exAmount[]   = $expenseCategory[$i]->expenseCategoryAmount();
                    }

                    $data['expenseCategoryColor'] = $exColor;
                    $data['expenseCategory']      = $exCategory;
                    $data['expenseCatAmount']     = $exAmount;

                    $data['incExpBarChartData']  = \Auth::user()->getincExpBarChartData();
                    $data['incExpLineChartData'] = \Auth::user()->getIncExpLineChartDate();

                    $data['currentYear']  = date('Y');
                    $data['currentMonth'] = date('M');

                    $constant['taxes']         = Tax::where('created_by', \Auth::user()->creatorId())->count();
                    $constant['category']      = ProductServiceCategory::where('created_by', \Auth::user()->creatorId())->count();
                    $constant['units']         = ProductServiceUnit::where('created_by', \Auth::user()->creatorId())->count();
                    $constant['bankAccount']   = BankAccount::where('created_by', \Auth::user()->creatorId())->count();
                    $data['constant']          = $constant;
                    $data['bankAccountDetail'] = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get();
                    $data['recentInvoice']     = Invoice::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();
                    $data['weeklyInvoice']     = \Auth::user()->weeklyInvoice();
                    $data['monthlyInvoice']    = \Auth::user()->monthlyInvoice();
                    $data['recentBill']        = Bill::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();
                    $data['weeklyBill']        = \Auth::user()->weeklyBill();
                    $data['monthlyBill']       = \Auth::user()->monthlyBill();
                    $data['goals']             = Goal::where('created_by', '=', \Auth::user()->creatorId())->where('is_display', 1)->get();
                } else {
                    $data = [];
                }

                $users = User::find(\Auth::user()->creatorId());
                $plan = Plan::find($users->plan);

                $data['totalledgers'] = DB::select('select count(account_id) as total from ladgers where is_deleted = 0');

                $data['totalsales'] = DB::select('select count(sell_id) as total from sell_to where is_deleted = 0');
                
                return view('dashboard.index', $data, compact('users','plan'));
                
            }
        } else {
            if (!file_exists(storage_path() . "/installed")) {
                header('location:install');
                die;
            } else {
                $settings = Utility::settings();
                if ($settings['display_landing_page'] == 'on' && \Schema::hasTable('landing_page_settings')) {
                    return view('landingpage::layouts.landingpage');
                } else {
                    return redirect('login');
                }
            }
        }
    }

    public function saledashboard(){
        $data['company'] = DB::select("select * from company where company_status = 1 and is_deleted = 0");

        return view('dashboard/selldashboard',$data);
    }


    public function saleHistory(Request $req)
{
    $item   = $req->input('item_id');
    $cat    = $req->input('cat_id');
    $cid    = $req->input('comp_id');
    $fdate  = $req->input('from_date');    
    $todate = $req->input('to_date');   
    $html   = '';
    $tatalbags = 0; 

    // Company list
    if ($cid == 'all') {
        $companies = DB::select("SELECT * FROM company WHERE company_status = 1 AND is_deleted = 0");
    } else {
        $companies = DB::select("SELECT * FROM company WHERE company_id = $cid");
    }

    foreach($companies as $comp){
        $data['comp_name'] = $comp->company_name;
        
        // base where
        $where = " s.company_id = '$comp->company_id' ";

        if (!empty($fdate)) {
            $where .= " AND s.sell_created_date >= '$fdate' ";
        }

        if (!empty($todate)) {
            $where .= " AND s.sell_created_date <= '$todate' ";
        }

        if (!empty($cat) && $cat != 'all') {
            $where .= " AND ps.category_id = '$cat' ";
        }

        if(!empty($item) && $item != 'all'){
            $where .= " AND ps.id = '$item' ";
        }

        // global join
        $join = " 
            JOIN selled_item si ON s.sell_id = si.sell_id
            JOIN product_services ps ON ps.id = si.selled_item
        ";

        // 1. Total Bags
        $data['totalbags'] = DB::select("
            SELECT 
                SUM(si.selled_quantity) - SUM(si.return_qty) AS totalbags,
                GROUP_CONCAT(DISTINCT ps.name ORDER BY ps.name ASC) AS product_names
            FROM sell_to s
            $join
            WHERE $where AND si.is_deleted = 0
        ");

        // 2. Total Amount
        $data['totalamount'] = DB::select("
            SELECT 
                SUM(s.sell_total_ammount + s.sell_gst_ammount) AS totalamount
            FROM sell_to s
            $join
            WHERE $where AND s.is_deleted = 0
        ");

        // 3. Cash Bags
        $data['cashbags'] = DB::select("
            SELECT 
                SUM(si.selled_quantity) - SUM(si.return_qty) AS totalbags
            FROM sell_to s
            $join
            WHERE $where AND si.is_deleted = 0
            AND s.sell_way = 'cash'
        ");

        // 4. Credit Bags
        $data['creditbags'] = DB::select("
            SELECT 
                SUM(si.selled_quantity) - SUM(si.return_qty) AS totalbags
            FROM sell_to s
            $join
            WHERE $where AND si.is_deleted = 0
            AND s.sell_way = 'credit'
        ");

        // 5. Returned Qty
        $data['returned_qty'] = DB::select("
            SELECT 
                SUM(sr.quantity) AS total_returned_qty
            FROM sales_return sr
            JOIN selled_item si ON sr.selled_item_id = si.selled_id
            JOIN sell_to s ON si.sell_id = s.sell_id
            JOIN product_services ps ON ps.id = si.selled_item
            WHERE $where AND s.is_deleted = 0
        ");

        // 6. Returned Amount
        $data['returned_amount'] = DB::select("
            SELECT 
                SUM(sr.quantity * sr.rate) + SUM(sr.GST_amount) AS total_returned_amount
            FROM sales_return sr
            JOIN selled_item si ON sr.selled_item_id = si.selled_id
            JOIN sell_to s ON si.sell_id = s.sell_id
            JOIN product_services ps ON ps.id = si.selled_item
            WHERE $where AND s.is_deleted = 0
        ");

        // Add to total
        if($data['totalbags']){
            $tatalbags += $data['totalbags'][0]->totalbags;
        }

        // Render card view
        $html .= view('dashboard/salescard',$data);
    }

    // Final card for all companies
    $html .= '
        <div class="mt-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title mb-3">Total Saled Bags</h5>
                    <h3 class="fw-bold text-' . ($tatalbags > 0 ? 'success' : 'danger') . '">
                        '. $tatalbags. '
                    </h3>
                </div>
            </div>
        </div>
    ';

    return $html;
}


public function salereport(Request $req)
{
    $tid    = $req->input('tid');   // yeh batayega kis card pe click hua
    $item   = $req->input('item_id');
    $cat    = $req->input('cat_id');
    $cid    = $req->input('cid');
    $fdate  = $req->input('from_date');    
    $todate = $req->input('to_date');   
    $title  = $req->input('title');

    $page = $req->input('page') ?? 'full';

    // base where

    $where = " s.company_id != '' ";
    if($cid != 'all'){

        $where = " s.company_id = '$cid' ";

    }
    

    if (!empty($fdate)) {
        $where .= " AND s.sell_created_date >= '$fdate' ";
    }

    if (!empty($todate)) {
        $where .= " AND s.sell_created_date <= '$todate' ";
    }

    if (!empty($cat) && $cat != 'all') {
        $where .= " AND ps.category_id = '$cat' ";
    }

    if(!empty($item) && $item != 'all'){
            $where .= " AND ps.id = '$item' ";
        }

    // global join
    $join = " 
        JOIN selled_item si ON s.sell_id = si.sell_id
        JOIN product_services ps ON ps.id = si.selled_item
    ";

    // default query
    $sql = "";

    if ($tid == 1) {
    $sql = "
        SELECT s.sell_id, s.sell_created_date,s.sell_relation_customer,s.sell_property_owner,s.sell_village, s.sell_way,
               ps.name AS product_name, si.selled_quantity, si.return_qty
        FROM sell_to s
        JOIN selled_item si ON s.sell_id = si.sell_id
        JOIN product_services ps ON ps.id = si.selled_item
        WHERE $where AND si.is_deleted = 0
    ";
}

// ✅ Total Amount List
if ($tid == 2) {
    $sql = "
        SELECT s.sell_id, s.sell_created_date,s.sell_relation_customer,s.sell_property_owner,s.sell_village, s.sell_way,
               (s.sell_total_ammount + s.sell_gst_ammount) AS amount,
               ps.name AS product_name, si.selled_quantity, si.return_qty
        FROM sell_to s
        JOIN selled_item si ON s.sell_id = si.sell_id
        JOIN product_services ps ON ps.id = si.selled_item
        WHERE $where AND s.is_deleted = 0
    ";
}

// ✅ Cash Bags List
if ($tid == 3) {
    $sql = "
        SELECT s.sell_id, s.sell_created_date,s.sell_relation_customer,s.sell_property_owner,s.sell_village, s.sell_way,
               ps.name AS product_name, si.selled_quantity, si.return_qty
        FROM sell_to s
        JOIN selled_item si ON s.sell_id = si.sell_id
        JOIN product_services ps ON ps.id = si.selled_item
        WHERE $where AND si.is_deleted = 0
        AND s.sell_way = 'cash'
    ";
}

// ✅ Credit Bags List
if ($tid == 4) {
    $sql = "
        SELECT s.sell_id, s.sell_created_date,s.sell_relation_customer,s.sell_property_owner,s.sell_village, s.sell_way,
               ps.name AS product_name, si.selled_quantity, si.return_qty
        FROM sell_to s
        JOIN selled_item si ON s.sell_id = si.sell_id
        JOIN product_services ps ON ps.id = si.selled_item
        WHERE $where AND si.is_deleted = 0
        AND s.sell_way = 'credit'
    ";
}

// ✅ Returned Bags List
if ($tid == 5) {
    $sql = "
        SELECT sr.sale_id, sr.creat_at as return_date, ps.name AS product_name, sr.quantity, sr.rate,s.sell_relation_customer,s.sell_property_owner,s.sell_village, s.sell_way, si.selled_quantity, si.return_qty
        FROM sales_return sr
        JOIN selled_item si ON sr.selled_item_id = si.selled_id
        JOIN sell_to s ON si.sell_id = s.sell_id
        JOIN product_services ps ON ps.id = si.selled_item
        WHERE $where AND s.is_deleted = 0
    ";
}

// ✅ Returned Amount List
if ($tid == 6) {
    $sql = "
        SELECT sr.sale_id, sr.creat_at, ps.name AS product_name, 
               (sr.quantity * sr.rate + sr.GST_amount) AS amount, ,s.sell_relation_customer,s.sell_property_owner,s.sell_village, s.sell_way, si.selled_quantity, si.return_qty
        FROM sales_return sr
        JOIN selled_item si ON sr.selled_item_id = si.selled_id
        JOIN sell_to s ON si.sell_id = s.sell_id
        JOIN product_services ps ON ps.id = si.selled_item
        WHERE $where AND s.is_deleted = 0
    ";
}

    $list = DB::select($sql);

    $copanies = DB::select("select * from company where company_status = 1 and is_deleted = 0");

    // Render ek naya blade table

    if($page == 'full') {

         return view('dashboard/saleslist', [
            'title' => $title,
            'list'  => $list,
            'company' => $copanies,
            'tid'     => $tid
        ]);

    } else {

        return view('dashboard/filteredtable', [
            'title' => $title,
            'list'  => $list,
            'company' => $copanies
        ]);

    }
   
}




    public function getOrderChart($arrParam)
    {
        $arrDuration = [];
        if ($arrParam['duration']) {
            if ($arrParam['duration'] == 'week') {
                $previous_week = strtotime("-2 week +1 day");
                for ($i = 0; $i < 14; $i++) {
                    $arrDuration[date('Y-m-d', $previous_week)] = date('d-M', $previous_week);
                    $previous_week                              = strtotime(date('Y-m-d', $previous_week) . " +1 day");
                }
            }
        }

        $arrTask          = [];
        $arrTask['label'] = [];
        $arrTask['data']  = [];
        foreach ($arrDuration as $date => $label) {

            $data               = Order::select(\DB::raw('count(*) as total'))->whereDate('created_at', '=', $date)->first();
            $arrTask['label'][] = $label;
            $arrTask['data'][]  = $data->total;
        }

        return $arrTask;
    }
}
