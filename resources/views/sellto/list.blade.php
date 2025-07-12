@extends('layouts.admin')
@php
    $profile = asset(Storage::url('uploads/avatar/'));
@endphp
@push('script-page')
    <script>
        $(document).on('click', '#billing_data', function() {
            $("[name='shipping_name']").val($("[name='billing_name']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_phone']").val($("[name='billing_phone']").val());
            $("[name='shipping_zip']").val($("[name='billing_zip']").val());
            $("[name='shipping_address']").val($("[name='billing_address']").val());
        })
    </script>
@endpush
@section('page-title')
    {{ __('Manage Sells') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Sells') }}</li>
@endsection

@section('action-btn')
    <div class="d-flex">
        <a href="#" data-size="md" data-bs-toggle="tooltip" title="{{ __('Import') }}"
            data-url="{{ route('customer.file.import') }}" data-ajax-popup="true"
            data-title="{{ __('Import customer CSV file') }}" class="btn btn-sm btn-primary me-2">
            <i class="ti ti-file-import"></i>
        </a>
        <a href="{{ route('customer.export') }}" data-bs-toggle="tooltip" title="{{ __('Export') }}"
            class="btn btn-sm btn-primary me-2">
            <i class="ti ti-file-export"></i>
        </a>

        <a href="#" data-size="xl" data-url="{{ route('sellto.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Sells') }}"
            class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
    </div>
@endsection



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style table-border-style">
                    <div class="table-responsive">
                         <div class="card shadow-sm rounded-4 border-0 mb-4">
                <div class="card-body pb-0">
    <ul class="nav nav-pills nav-fill gap-2 p-2 rounded-pill bg-light border" id="sellTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="{{ route('sellto.list') }}"
               class="nav-link {{ request()->routeIs('sellto.list') ? 'active' : '' }} rounded-pill" 
               role="tab">
                👨‍🌾 Farmers
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{ route('sellto.other') }}"
               class="nav-link {{ request()->routeIs('sellto.other') ? 'active' : '' }} rounded-pill"
               role="tab">
                👥 Others
            </a>
        </li>
    </ul>
</div>

            </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>account no.</th>
                                    <th>Customer name </th>
                                    <th> Aadhar Number </th>
                                    <th> field owner </th>
                                    <th>village</th>
                                    <th> mobile no. </th>
                                    <th> selled item  </th>
                                    <th>quantity </th>
                                    <th> rate </th>
                                    <th> total amount </th>
                                    <th> gst amount </th>
                                    <th> Received cash </th>
                                    <th> recieved bank </th>
                                    
                                    <th> bank name </th>
                                    <th> Remaining Amount </th>
                                    <th>Mode of Invoice</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($sellto AS $value):

                                <tr>
                                    <td> {{$value->sell_account_number}} </td>
                                    <td> {{$value->sell_relation_customer}} </td>
                                    <td> {{$value->sell_account_name}} </td>
                                    <td> {{$value->sell_property_owner}} </td>
                                    <td> {{$value->sell_village}} </td>
                                    <td> {{$value->sell_phone}} </td>
                                    <td> {{$value->item_selled}} </td>
                                    <td> {{$value->sell_quantity}} </td>
                                    <td> {{$value->sell_rate}} </td>
                                    <td> {{$value->sell_total_ammount}} </td>
                                    <td> {{$value->sell_gst_ammount}} </td>
                                    <td> {{$value->cash_amount}} </td>
                                    <td> {{$value->credit_amount}} </td>
                                    
                                    <td> {{$value->branchname}} </td>
                                    <td> {{$value->remaining_amount}} </td>
                                    <td> {{$value->sell_way}} </td>
                                  
                                 <td>
                                   
                                    <a href="#" data-size="xl" data-url="{{ route('sellto.edit', $value->sell_id) }}" data-ajax-popup="true"
                                    data-bs-toggle="tooltip" title="{{ __('edit') }}" data-title="{{ __('edit Sells') }}"
                                    class="btn btn-sm btn-primary">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    class="btn btn-sm bg-danger text-white shadow-sm" 
                                    title="Delete" 
                                    onclick="removeit('{{ route('sellto.delete', $value->sell_id) }}')">
                                        <i class="ti ti-trash"></i>
                                    </a>


                                </td>







                               </tr>

                            @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page')
    <script>
        $(document).on('change', '#password_switch', function() {
            if ($(this).is(':checked')) {
                $('.ps_div').removeClass('d-none');
                $('#password').attr("required", true);

            } else {
                $('.ps_div').addClass('d-none');
                $('#password').val(null);
                $('#password').removeAttr("required");
            }
        });
        $(document).on('click', '.login_enable', function() {
            setTimeout(function() {
                $('.modal-body').append($('<input>', {
                    type: 'hidden',
                    val: 'true',
                    name: 'login_enable'
                }));
            }, 2000);
        });

        function removeit(url) {
            let cnf = confirm('Are You Sure You Want To Delete This Sell?');
            if(cnf == true) {
                window.location.href = url;
            }
        }
    </script>
@endpush
