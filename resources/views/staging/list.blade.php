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
    {{ __('Manage Staging') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Staging') }}</li>
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

        <a href="#" data-size="xl" data-url="{{ route('staging.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Staging') }}"
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
                                    <th>Staging Id</th>
                                    <th>Select Lot No.</th>
                                    <th>Farmer Name</th>
                                    <th> Staging Varity </th>
                                    <th>Rst number</th>
                                    <th> Godown </th>
                                    <th>Stage No. </th>
                                    <th> No of Begs </th>
                                    <th>Final Weight</th>
                                    <th>Pay for staging </th>
                                    <th>Date </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($staging AS $value):

                                <tr>
                                    <td> {{ $value->staging_id}} </td>
                                    <td> {{ $value->select_lot_no}} </td>
                                    <td>{{ $value->farmer_name}}</td>
                                    <td> {{ $value->name}} </td>
                                    <td>{{ $value->rst_no}}</td>
                                    <td> {{ $value->godown}} </td>
                                     <td> {{ $value->stage_no}} </td>
                                    <td> {{ $value->no_of_begs}} </td>
                                    <td>{{ $value->final_weight}}</td>
                                     <td> {{ $value->pay_for_staging}} </td>
                                      <td> {{ $value->staging_date}} </td>
                                    <td> {{ $value->staging_status == 1 ? 'Active' : 'Inactive' }} </td>
                            <td>
                                       <div class="flex gap-4">
  
   <a href="#" data-url="{{ route('staging.edit', $value->staging_id) }}"  data-size="xl"data-ajax-popup="true" data-bs-toggle="tooltip" 
            class="btn btn-sm btn-success">
           <i class="ti ti-pencil"></i>
        </a>
 
   {{-- ✅ Delete Button: Calls JS confirm & deletes --}}
    <button class="btn btn-sm btn-danger" onclick="deleteit('{{ route('staging.delete', $value->staging_id) }}')" title="Delete">
        <i class="ti ti-trash"></i>
    </button>
  

</div>
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

        function deleteit(url){
            let cnt = confirm("Are you sure you want to delete this Ledger?")

            if(cnt == true){
                window.location.href = url;
            }
        }
    </script>
@endpush
