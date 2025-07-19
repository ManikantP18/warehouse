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
    {{ __('Manage SellesQuatation') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('SellesQuatation') }}</li>
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

        <a href="#" data-size="xl" data-url="{{ route('SellsQuatation.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create SellesQuatation') }}"
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
                        <table class="table datatable">
                            <thead>
                            <tr>
                                    <th>CASH/CREDIT</th>
                                    <th> Account Holder Name </th>
                                    <th>  Users Nmae </th>
                                    <th>village</th>
                                    <th> mobile no. </th>
                                    <th> Item To Be Sale  </th>
                                    <th>Quantity </th>
                                    <th> Rate </th>
                                    <th>Total Ammount </th>
                                    <th> GST Ammount </th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($sellsquatation AS $value):

                                <tr>
                                    <td> {{$value->Cash_Credit	}} </td>
                                    <td> {{$value->Account_holders_name}} </td>
                                    <td> {{$value->Users_name}} </td>
                                    <td> {{$value->Village}} </td>
                                    <td> {{$value->Contact_no}} </td>
                                    <td> {{$value->Item_To_Be_Sale}} </td>
                                    <td> {{$value->Quantity}} </td>
                                    <td> {{$value->Rate}} </td>
                                    <td> {{$value->Total_Amount}} </td>
                                    <td> {{$value->GST_Amount}} </td>
                            
                                 <td>
                                  
                                 <a href="#" data-size="xl" data-url="{{ route('SellsQuatation.edit', $value->id) }}" data-ajax-popup="true"
                                    data-bs-toggle="tooltip" title="{{ __('edit') }}" data-title="{{ __('edit SellsQuatation ') }}"
                                    class="btn btn-sm btn-primary">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    class="btn btn-sm bg-danger text-white shadow-sm" 
                                    title="Delete" 
                                    onclick="removeit('{{ route('SellsQuatation.delete', $value->id) }}')">
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
        function removeit(url) {
            console.log("Deleting:", url);  // for debugging
            let cnf = confirm('Are You Sure You Want To Delete This Sell?');
            if (cnf) {
                window.location.href = url;
            }
        }
    </script>
@endpush

