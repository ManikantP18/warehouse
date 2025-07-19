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
    {{ __('Manage Bank Accounts') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Ladgers') }}</li>
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

        <a href="#" data-size="xl" data-url="{{ route('bankacc.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Ladger') }}"
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
                                 
                                    <th> AC Holder Name</th>
                                      <th> Account  Num</th>
                                       <th> Bank Name</th>
                                       <th> Opening Bal</th>
                                    <th> Account Type </th>
                                    <th> ChequeBook  </th>
                                    <th> ChequeRangefrom </th>
                                    <th> ChequeRangeto </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            
                                
                                  @foreach($bankacc AS $value):

                                <tr>
                                 
                                    <td> {{ $value->account_name }} </td>
                                    <td> {{ $value->account_num }} </td>
                                     <td> {{ $value->bank_name }} </td>
                                      <td> {{ $value->opening_bal }} </td>
                                    <td> {{ $value->account_type }} </td>
                                     <td> {{ $value->cheque_book }} </td>
                                   
                                     <td> {{ $value->chequerange_from }} </td>
                                      <td> {{ $value->chequerange_to }} </td>
                                    
                                       <td>
                                   
                                    <a href="#" data-size="xl" data-url="{{ route('bankacc.edit', $value->account_id) }}" data-ajax-popup="true"
                                    data-bs-toggle="tooltip" title="{{ __('edit') }}" data-title="{{ __('edit Sells') }}"
                                    class="btn btn-sm btn-primary">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    class="btn btn-sm bg-danger text-white shadow-sm" 
                                    title="Delete" 
                                    onclick="removeit('{{ route('bankacc.delete', $value->account_id) }}')">
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
