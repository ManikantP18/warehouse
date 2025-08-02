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
    {{ __('Manage Packing') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Packing') }}</li>
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
                                    <th>Packing Date</th>
                                    <th>Farmer Name</th>
                                    <th>Land Owner</th>
                                    <th> Packing Godown </th>
                                    <th> Company Name </th>
                                    <th> Gredded quantity </th>
                                    <th> Packing total bag </th>
                                    <th> Pay for packing </th>
                                    <th>rst no.</th>
                                    <th>packing verity</th>
                                    <th>stage no.</th>
                                    <th>final weight</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            

                                @foreach($packing AS $value):

                                <tr>
                                    <td> {{ $value->packing_date }} </td>
                                    <td> {{ $value->farmer_name }} </td>
                                    <td> {{ $value->land_owner }} </td>
                                    <td> {{ $value->packing_godown }} </td>
                                    <td> {{ $value->packing_godown }} </td>
                                    <td> {{ $value->packing_gredded_quantity }} </td>
                                    <td> {{ $value->packing_no_of_begs }} </td>
                                    <td> {{ $value->packing_pay }} </td>
                                    <td> {{ $value->rst_no }} </td>
                                    <td> {{ $value->packing_verity }} </td>
                                     <td> {{ $value->packing_stage_no }} </td>
                                    <td> {{ $value->final_weight }} </td>
                                    <td>  
                                        <a href="#" data-size="xl" data-url="{{ route('packing.edit', $value->packing_id) }}" data-ajax-popup="true"
                                            data-bs-toggle="tooltip" title="{{ __('Edit') }}" data-title="{{ __('Edit Packing') }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="ti ti-pencil"></i>
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
    </script>
@endpush
