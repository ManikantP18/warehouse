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
    {{ __('Manage Purchase') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Purchase') }}</li>
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

        <a href="#" data-size="xl" data-url="{{ route('purchase.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Purchase') }}"
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
                     <div class="row mb-3">
                            <div class="col-md-3">
                                <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}" id="from_date">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}" id="to_date">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary" onclick="filterTable()">
                                    <i class="ti ti-filter"></i> Filter
                                </button>
                            </div>
                        </div>
                    <div class="table-responsive mt-2" id="purchasetable">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Purchase Date</th>
                                    <th>cash/Credit</th>
                                    <th> Relational Customer Name</th>
                                    <th> Accountant Name </th>
                                    <th> Owner Name </th>
                                    <th> Village </th>
                                    <th> Field Acre </th>
                                    <th> Mobile Number </th>
                                    <th> RST No. </th>
                                    <th> LOT No. </th>
                                    <th> GST Details </th>
                                   
                                    <th> Total Amount </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                           @foreach($purchase AS $value):

                                <tr>
                                    <td> {{date('d/m/Y',strtotime($value->purchase_date))}} </td>
                                    <td> {{$value->purchase_way}} </td>
                                    <td> {{$value->purchase_relation_cusm}} </td>
                                    <td> {{$value->purchase_accountant}}</td>
                                    <td>{{$value->purchase_owner}} </td>
                                    <td>{{$value->purchase_village}} </td>
                                    <td> {{$value->purchase_acre}}</td>
                                    <td>{{$value->purchase_phone}} </td>
                                    <td> {{$value->purchase_rst_no}} </td>
                                    <td> {{$value->purchase_lot_no}} </td>
                                    <td>{{$value->purchase_gst_no}} </td>
                                    
                                    <td> {{$value->purchase_total}}</td>
                                    <td>
                                            
                                   
                                    <a href="#" data-size="xl" data-url="{{ route('purchase.edit', $value->purchase_id) }}" data-ajax-popup="true"
                                    data-bs-toggle="tooltip" title="{{ __('edit') }}" data-title="{{ __('edit Purchase') }}"
                                    class="btn btn-sm btn-primary">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    class="btn btn-sm bg-danger text-white shadow-sm" 
                                    title="Delete" 
                                    onclick="removeit('{{ route('purchase.delete', $value->purchase_id) }}')">
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
            let cnf = confirm('Are You Sure You Want To Delete This Purchase?');
            if(cnf == true) {
                window.location.href = url;
            }
        }
    </script>
@endpush

<script>

    function filterTable() {
    let from_date = $('#from_date').val();
    let to_date = $('#to_date').val();

    if (from_date === '' || to_date === '') {
        alert("Please select both dates");
        return;
    }

    $.ajax({
        url: '{{ route('purchase.filter') }}',
        type: 'GET',
        data: {
            from_date: from_date,
            to_date: to_date
        },
        success: function(response) {
            $("#purchasetable").html('');
            $("#purchasetable").html(response);
        },
        error: function(xhr) {
            alert("Something went wrong while fetching data.");
            console.log(xhr.responseText);
        }
    });
}


</script>
