<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomField;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Mail\UserCreate;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Utility;
use App\Models\ProductServiceCategory;
use Auth;
use File;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;

use App\Models\Ladger;

class LadgerController extends Controller

{
    public function index()
    {
        if (\Auth::user()->can('manage customer')) {
            $customers = Ladger::where('created_by', \Auth::user()->creatorId())->get();

            return view('ladger.index', compact('customers'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if (\Auth::user()->can('create customer')) {
            $customFields = CustomField::where('created_by', '=', \Auth::user()->creatorId())->where('module', '=', 'customer')->get();

            return view('ladger.create', compact('customFields'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request)
    {

        if (\Auth::user()->can('create customer')) {

            $rules = [
                'relational_cust_name' => 'required',
                'account_holder' => 'required'

            ];


            $validator = \Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->route('ladger.index')->with('error', $messages->first());
            }

            

            
                $customer                  = new Ladger();
                $customer->account_id     = $this->customerNumber() > 0 ? 'cust-'.$this->customerNumber() : 'cust-1';
                $customer->ladger_type            = $request->ladger_type;
                $customer->relational_cust_name         = $request->relational_cust_name;
                $customer->account_holder           = $request->account_holder;
                $customer->farm_owner_name      = $request->farm_owner_name;

                $customer->created_by      = \Auth::user()->creatorId();
                $customer->village    = $request->village;
                $customer->farm_area_acre = $request->farm_area_acre;
                $customer->phone_number   = $request->phone_number;
                $customer->bank_account_name    = $request->bank_account_name;
                $customer->account_number   = $request->account_number;
                $customer->bank_name     = $request->bank_name;
                $customer->ifsc_code = $request->ifsc_code;
              
                $customer->branch    = $request->branch;
                $customer->gst_num = $request->gst_num;

                $customer->save();
            
            //Twilio Notification
           /* $setting  = Utility::settings(\Auth::user()->creatorId());
            if (isset($setting['customer_notification']) && $setting['customer_notification'] == 1) {
                $uArr = [
                    'customer_name' => $request->name,
                    'email'  => $request->email,
                    'password'  =>  $request->password,
                ];
                Utility::send_twilio_msg($request->contact, 'new_customer', $uArr);
            }*/

            // webhook
            $module = 'New Customer';
            $webhook =  Utility::webhookSetting($module);

            if ($webhook) {
                $parameter = json_encode($customer);
                // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);


                if ($status == true) {
                    return redirect()->route('customer.index')->with('success', __('Customer successfully created.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
                } else {
                    return redirect()->back()->with('error', __('Webhook call failed.'));
                }
            }


            return redirect()->route('ladger.index')->with('success', __('Customer successfully created.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show($ids)
    {

        $id       = \Crypt::decrypt($ids);
        $customer = Customer::find($id);
        return view('customer.show', compact('customer'));
    }


    public function edit($id)
    {
        if (\Auth::user()->can('edit customer')) {
            $customer              = Customer::find($id);
            $customer->customField = CustomField::getData($customer, 'customer');

            $customFields = CustomField::where('created_by', '=', \Auth::user()->creatorId())->where('module', '=', 'customer')->get();

            return view('customer.edit', compact('customer', 'customFields'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, Customer $customer)
    {

        if (\Auth::user()->can('edit customer')) {

            $rules = [
                'name' => 'required',
                'contact' => 'required|regex:/^\+\d{1,3}\d{9,13}$/',
                'email' => 'required|email|unique:customers,email,' . $customer->id,
            ];


            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->route('customer.index')->with('error', $messages->first());
            }

            $customer->name             = $request->name;
            $customer->contact          = $request->contact;
            $customer->email            = $request->email;
            $customer->tax_number       = $request->tax_number;
            $customer->created_by       = \Auth::user()->creatorId();
            $customer->billing_name     = $request->billing_name;
            $customer->billing_country  = $request->billing_country;
            $customer->billing_state    = $request->billing_state;
            $customer->billing_city     = $request->billing_city;
            $customer->billing_phone    = $request->billing_phone;
            $customer->billing_zip      = $request->billing_zip;
            $customer->billing_address  = $request->billing_address;
            $customer->shipping_name    = $request->shipping_name;
            $customer->shipping_country = $request->shipping_country;
            $customer->shipping_state   = $request->shipping_state;
            $customer->shipping_city    = $request->shipping_city;
            $customer->shipping_phone   = $request->shipping_phone;
            $customer->shipping_zip     = $request->shipping_zip;
            $customer->shipping_address = $request->shipping_address;
            $customer->save();

            CustomField::saveData($customer, $request->customField);

            return redirect()->route('customer.index')->with('success', __('Customer successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Customer $customer)
    {
        if (\Auth::user()->can('delete customer')) {
            if ($customer->created_by == \Auth::user()->creatorId()) {
                $customer->delete();

                return redirect()->route('customer.index')->with('success', __('Customer successfully deleted.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    function customerNumber()
    {
        $latest = Customer::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if (!$latest) {
            return 1;
        }

        return $latest->customer_id + 1;
    }

    public function customerLogout(Request $request)
    {
        \Auth::guard('customer')->logout();

        $request->session()->invalidate();

        return redirect()->route('customer.login');
    }

    public function payment(Request $request)
    {

        if (\Auth::user()->can('manage customer payment')) {
            // $category = [
            //     'Invoice' => 'Invoice',
            //     'Deposit' => 'Deposit',
            //     'Sales' => 'Sales',
            // ];

            $category = ProductServiceCategory::where('created_by', \Auth::user()->creatorId())->where('type', 2)->get()->pluck('name', 'id');
            // $category->prepend('Bill', '');

            $query = Transaction::where('user_id', \Auth::user()->id)->where('user_type', 'Customer')->where('type', 'Payment');
            if (isset($request->date) && !empty($request->date)) {
                $time = strtotime($request->date);
                $month = date("m", $time);

                $query = $query->whereMonth('date', $month);
            }

            if (!empty($request->category)) {
                $query->where('category', '=', $request->category);
            }
            $payments = $query->get();

            return view('customer.payment', compact('payments', 'category'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function transaction(Request $request)
    {
        if (\Auth::user()->can('manage customer payment')) {
            $category = [
                'Invoice' => 'Invoice',
                'Retainer' => 'Retainer',
                // 'Sales' => 'Sales',
            ];

            $query = Transaction::where('user_id', \Auth::user()->id)->where('user_type', 'Customer');

            if (isset($request->date) && !empty($request->date)) {
                $time = strtotime($request->date);
                $month = date("m", $time);

                $query = $query->whereMonth('date', $month);
            }

            if (!empty($request->category)) {
                $query->where('category', '=', $request->category);
            }
            $transactions = $query->get();

            return view('customer.transaction', compact('transactions', 'category'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function profile()
    {
        $userDetail              = \Auth::user();
        $userDetail->customField = CustomField::getData($userDetail, 'customer');
        $customFields            = CustomField::where('created_by', '=', \Auth::user()->creatorId())->where('module', '=', 'customer')->get();

        return view('customer.profile', compact('userDetail', 'customFields'));
    }

    public function editprofile(Request $request)
    {
        $userDetail = \Auth::user();
        $user       = Customer::findOrFail($userDetail['id']);

        $this->validate(
            $request,
            [
                'name' => 'required|max:120',
                // 'contact' => 'required',
                'email' => 'required|email|unique:users,email,' . $userDetail['id'],
            ]
        );

        if ($request->hasFile('profile')) {
            if (\Auth::guard('customer')->check()) {
                $file_path = $user['avatar'];
                $filenameWithExt = $request->file('profile')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('profile')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $settings = Utility::getStorageSetting();

                if ($settings['storage_setting'] == 'local') {
                    $dir        = 'uploads/avatar/';
                } else {
                    $dir        = 'uploads/avatar';
                }
                $image_path = $dir . $userDetail['avatar'];

                $url = '';
                // $path = $request->file('profile')->storeAs('uploads/avatar/', $fileNameToStore);
                // dd($path);
                $path = Utility::upload_file($request, 'profile', $fileNameToStore, $dir, []);
                // dd($path);
                if ($path['flag'] == 1) {
                    $url = $path['url'];
                } else {
                    return redirect()->route('profile', \Auth::user()->id)->with('error', __($path['msg']));
                }
            } else {
                $file_path = $user['avatar'];
                $image_size = $request->file('profile')->getSize();
                $result = Utility::updateStorageLimit(\Auth::user()->creatorId(), $image_size);

                if ($result == 1) {

                    Utility::changeStorageLimit(\Auth::user()->creatorId(), $file_path);
                    $filenameWithExt = $request->file('profile')->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension       = $request->file('profile')->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $settings = Utility::getStorageSetting();

                    if ($settings['storage_setting'] == 'local') {
                        $dir        = 'uploads/avatar/';
                    } else {
                        $dir        = 'uploads/avatar';
                    }
                    $image_path = $dir . $userDetail['avatar'];

                    $url = '';
                    // $path = $request->file('profile')->storeAs('uploads/avatar/', $fileNameToStore);
                    // dd($path);
                    $path = Utility::upload_file($request, 'profile', $fileNameToStore, $dir, []);
                    // dd($path);
                    if ($path['flag'] == 1) {
                        $url = $path['url'];
                    } else {
                        return redirect()->route('profile', \Auth::user()->id)->with('error', __($path['msg']));
                    }
                } else {
                    return redirect()->back()->with('error', $result);
                }
            }
        }

        if (!empty($request->profile)) {
            $user['avatar'] = $fileNameToStore;
        }
        $user['name']    = $request['name'];
        $user['email']   = $request['email'];
        $user['contact'] = $request['contact'];
        $user->save();
        CustomField::saveData($user, $request->customField);

        return redirect()->back()->with(
            'success',
            __('Profile successfully updated.') . ((isset($result) && $result != 1) ? '<br> <span class="text-danger">' . $result . '</span>' : '')
        );
    }

    public function editBilling(Request $request)
    {
        $userDetail = \Auth::user();
        $user       = Customer::findOrFail($userDetail['id']);
        $this->validate(
            $request,
            [
                'billing_name' => 'required',
                'billing_country' => 'required',
                'billing_state' => 'required',
                'billing_city' => 'required',
                'billing_phone' => 'required',
                'billing_zip' => 'required',
                'billing_address' => 'required',
            ]
        );
        $input = $request->all();
        $user->fill($input)->save();

        return redirect()->back()->with(
            'success',
            'Profile successfully updated.'
        );
    }

    public function editShipping(Request $request)
    {
        $userDetail = \Auth::user();
        $user       = Customer::findOrFail($userDetail['id']);
        $this->validate(
            $request,
            [
                'shipping_name' => 'required',
                'shipping_country' => 'required',
                'shipping_state' => 'required',
                'shipping_city' => 'required',
                'shipping_phone' => 'required',
                'shipping_zip' => 'required',
                'shipping_address' => 'required',
            ]
        );
        $input = $request->all();
        $user->fill($input)->save();

        return redirect()->back()->with(
            'success',
            'Profile successfully updated.'
        );
    }

    public function updatePassword(Request $request)
    {
        if (Auth::Check()) {
            $request->validate(
                [
                    'current_password' => 'required',
                    'new_password' => 'required|min:6',
                    'confirm_password' => 'required|same:new_password',
                ]
            );
            $objUser          = Auth::user();
            $request_data     = $request->All();
            $current_password = $objUser->password;
            if (Hash::check($request_data['current_password'], $current_password)) {
                $user_id            = Auth::User()->id;
                $obj_user           = Customer::find($user_id);
                $obj_user->password = Hash::make($request_data['new_password']);;
                $obj_user->save();

                return redirect()->back()->with('success', __('Password updated successfully.'));
            } else {
                return redirect()->back()->with('error', __('Please enter correct current password.'));
            }
        } else {
            return redirect()->back()->with('error', __('Something is wrong.'));
        }
    }

    public function changeLanquage($lang)
    {
        $user       = Auth::user();
        $user->lang = $lang;
        $user->save();
        if ($user->lang == 'ar' || $user->lang == 'he') {
            $value = 'on';
        } else {
            $value = 'off';
        }
        if ($user->type == 'super admin') {
            \DB::insert(
                'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $value,
                    'SITE_RTL',
                    $user->creatorId(),
                    date('Y-m-d H:i:s'),
                    date('Y-m-d H:i:s'),
                ]
            );
        } else {
            \DB::insert(
                'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                [
                    $value,
                    'SITE_RTL',
                    $user->creatorId(),
                    date('Y-m-d H:i:s'),
                    date('Y-m-d H:i:s'),
                ]
            );
        }

        return redirect()->back()->with('success', __('Language change successfully.'));
    }

    public function export()
    {
        $name = 'customer_' . date('Y-m-d i:h:s');
        $data = Excel::download(new CustomerExport(), $name . '.xlsx');

        return $data;
    }

    public function importFile()
    {
        return view('customer.import');
    }

    public function import(Request $request)
    {

        $rules = [
            'file' => 'required|mimes:csv,txt,xls',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $customers = (new CustomerImport())->toArray(request()->file('file'))[0];

        $totalCustomer = count($customers) - 1;
        $errorArray    = [];
        $customer_id = $this->customerNumber();

        for ($i = 1; $i <= count($customers) - 1; $i++) {
            $cust_id = $customer_id++;
            $customer = $customers[$i];
            $customerByEmail = Customer::where('email', $customer[1])->first();
            if (!empty($customerByEmail)) {
                $customerData = $customerByEmail;
            } else {
                $customerData = new Customer();
                $customerData->customer_id      = $cust_id;
            }
            //            dd($customer);

            $customerData->name             = $customer[0] ?? "";
            $customerData->email            = $customer[1] ?? "";
            $customerData->password         = Hash::make($customer[2]);
            $customerData->contact          = $customer[3] ?? "";
            $customerData->billing_name     = $customer[4] ?? "";
            $customerData->billing_country  = $customer[5] ?? "";
            $customerData->billing_state    = $customer[6] ?? "";
            $customerData->billing_city     = $customer[7] ?? "";
            $customerData->billing_phone    = $customer[8] ?? "";
            $customerData->billing_zip      = $customer[9] ?? "";
            $customerData->billing_address  = $customer[10] ?? "";
            $customerData->shipping_name    = $customer[11] ?? "";
            $customerData->shipping_country = $customer[12] ?? "";
            $customerData->shipping_state   = $customer[13] ?? "";
            $customerData->shipping_city    = $customer[14] ?? "";
            $customerData->shipping_phone   = $customer[15] ?? "";
            $customerData->shipping_zip     = $customer[16] ?? "";
            $customerData->shipping_address = $customer[17] ?? "";
            $customerData->lang             = 'en';
            $customerData->is_active        = 1;
            $customerData->created_by       = \Auth::user()->creatorId();

            if (empty($customerData)) {
                $errorArray[] = $customerData;
            } else {
                $customerData->save();

                $role_r = Role::where('name', '=', 'customer')->firstOrFail();
                $customerData->assignRole($role_r);
            }
        }

        $errorRecord = [];
        if (empty($errorArray)) {
            $data['status'] = 'success';
            $data['msg']    = __('Record successfully imported');
        } else {
            $data['status'] = 'error';
            $data['msg']    = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalCustomer . ' ' . 'record');


            foreach ($errorArray as $errorData) {

                $errorRecord[] = implode(',', $errorData);
            }

            \Session::put('errorArray', $errorRecord);
        }

        return redirect()->back()->with($data['status'], $data['msg']);
    }
    public function previewInvoice()
    {

        $objUser  = \Auth::user();
        $settings = Utility::settings();

        $invoice  = new Invoice();

        $customer                   = new \stdClass();
        $customer->email            = '<Email>';
        $customer->shipping_name    = '<Customer Name>';
        $customer->shipping_country = '<Country>';
        $customer->shipping_state   = '<State>';
        $customer->shipping_city    = '<City>';
        $customer->shipping_phone   = '<Customer Phone Number>';
        $customer->shipping_zip     = '<Zip>';
        $customer->shipping_address = '<Address>';
        $customer->billing_name     = '<Customer Name>';
        $customer->billing_country  = '<Country>';
        $customer->billing_state    = '<State>';
        $customer->billing_city     = '<City>';
        $customer->billing_phone    = '<Customer Phone Number>';
        $customer->billing_zip      = '<Zip>';
        $customer->billing_address  = '<Address>';
        $invoice->sku               = 'Test123';

        $totalTaxPrice = 0;
        $taxesData     = [];

        $items = [];
        for ($i = 1; $i <= 3; $i++) {
            $item           = new \stdClass();
            $item->name     = 'Item ' . $i;
            $item->quantity = 1;
            $item->tax      = 5;
            $item->discount = 50;
            $item->price    = 100;

            $taxes = [
                'Tax 1',
                'Tax 2',
            ];

            $itemTaxes = [];
            foreach ($taxes as $k => $tax) {
                $taxPrice         = 10;
                $totalTaxPrice    += $taxPrice;
                $itemTax['name']  = 'Tax ' . $k;
                $itemTax['rate']  = '10 %';
                $itemTax['price'] = '$10';
                $itemTaxes[]      = $itemTax;
                if (array_key_exists('Tax ' . $k, $taxesData)) {
                    $taxesData['Tax ' . $k] = $taxesData['Tax 1'] + $taxPrice;
                } else {
                    $taxesData['Tax ' . $k] = $taxPrice;
                }
            }
            $item->itemTax = $itemTaxes;
            $items[]       = $item;
        }

        $invoice->invoice_id = 1;
        $invoice->issue_date = date('Y-m-d H:i:s');
        $invoice->due_date   = date('Y-m-d H:i:s');
        $invoice->itemData   = $items;

        $invoice->totalTaxPrice = 60;
        $invoice->totalQuantity = 3;
        $invoice->totalRate     = 300;
        $invoice->totalDiscount = 10;
        $invoice->taxesData     = $taxesData;
        $invoice->customField   = [];
        $customFields           = [];

        $preview    = 1;


        $logo         = asset(Storage::url('uploads/logo/'));
        $company_logo = Utility::getValByName('company_logo_dark');
        $img          = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png'));

        return view('customer.show', compact('invoice', 'preview', 'img', 'settings', 'customer', 'customFields'));
    }

    public function statement(Request $request, $id)
    {
        $customer = Customer::find($id);
        $settings = Utility::settings();
        $customerDetail       = Customer::findOrFail($customer['id']);
        $invoice   = Invoice::where('created_by', '=', \Auth::user()->creatorId())->where('customer_id', '=', $customer->id)->get()->pluck('id');
        $invoice_payment = InvoicePayment::whereIn('invoice_id', $invoice);
        if (!empty($request->from_date) && !empty($request->until_date)) {
            $invoice_payment->whereBetween('date',  [$request->from_date, $request->until_date]);

            $data['from_date']  = $request->from_date;
            $data['until_date'] = $request->until_date;
        } else {
            $data['from_date']  = date('Y-m-t');
            $data['until_date'] = date('Y-m-t');
            $invoice_payment->whereBetween('date',  [$data['from_date'], $data['until_date']]);
        }
        $invoice_payment = $invoice_payment->get();
        //        dd($invoice_payment);
        $user = \Auth::user();
        $logo         = asset(Storage::url('uploads/logo/'));
        $company_logo = Utility::getValByName('company_logo_dark');
        $img          = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png'));

        $invoice_id = Invoice::where('created_by', '=', \Auth::user()->creatorId())->where('customer_id', '=', $customer->id)->first();
        // dd($customer->id, $invoice_id);

        if (!empty($invoice_id)) {
            $invoice_total = Invoice::find($invoice_id->id);
            $invoicePayment = InvoicePayment::where('invoice_id', $invoice_total->id)->first();
            $customer = $invoice_total->customer;
            $iteams   = $invoice_total->items;

            $invoice_total->customField = CustomField::getData($invoice_total, 'invoice');
        } else {
            $invoice_total = 0;
            $invoicePayment = 0;
        }

        $customFields = CustomField::where('created_by', '=', \Auth::user()->creatorId())->where('module', '=', 'invoice')->get();

        return view('customer.statement', compact('customer', 'img', 'user', 'customerDetail', 'invoice_payment', 'settings', 'data', 'invoice_total'));
    }

    public function customerPassword($id)
    {
        $eId        = \Crypt::decrypt($id);
        $customer = Customer::find($eId);

        return view('customer.reset', compact('customer'));
    }

    public function customerPasswordReset(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'password' => 'required|confirmed|same:password_confirmation',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }


        $customer                 = Customer::where('id', $id)->first();
        $customer->forceFill([
            'password' => Hash::make($request->password),
            'is_enable_login' => 1,
        ])->save();

        return redirect()->route('customer.index')->with(
            'success',
            'Customer Password successfully updated.'
        );
    }
}
