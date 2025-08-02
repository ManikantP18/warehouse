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
        });

        function toggleColumn(className, isChecked) {
            if (isChecked) {
                $('.' + className).show();
            } else {
                $('.' + className).hide();
            }
        }

        $(document).ready(function () {
            $('.column-toggle').on('change', function () {
                const columnClass = $(this).data('column');
                toggleColumn(columnClass, $(this).is(':checked'));
            });

            // Hide all optional columns by default
            $('.optional-column').hide();
        });
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
<div class="mb-3">
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="accountant" onchange="handleCheckbox()" data-id='1'> 
        <label class="form-check-label">Aadhar no.</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="owner" onchange="handleCheckbox()" data-id='2'>
        <label class="form-check-label">Land Owner Name</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="field-acre" onchange="handleCheckbox()" data-id='3'>
        <label class="form-check-label">Field Acre</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="phone " onchange="handleCheckbox()" data-id='4'>
        <label class="form-check-label">Mobile Number</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="rst" onchange="handleCheckbox()" data-id='5'>
        <label class="form-check-label">RST No.</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="lot" onchange="handleCheckbox()" data-id='6'>
        <label class="form-check-label">LOT No.</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="gst" onchange="handleCheckbox()" data-id='7'>
        <label class="form-check-label">GST Details</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="total" onchange="handleCheckbox()" data-id='8'>
        <label class="form-check-label">Total Amount</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="purewigth" onchange="handleCheckbox()" data-id='9'>
        <label class="form-check-label">Pure Wigth</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="godown" onchange="handleCheckbox()" data-id='10'>
        <label class="form-check-label">Godown Name</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input column-toggle checkbox-rem" type="checkbox" data-column="company" onchange="handleCheckbox()" data-id='11'>
        <label class="form-check-label">Company Name</label>
    </div>
</div>
<div class="table-responsive mt-2" id="purchasetable">
    <table class="table datatable">
        <thead>
            <tr>
                <th>Purchase Date</th>
                <th >cash/Credit</th>
                <th>Relational Customer Name</th>
                <th class="accountant optional-column">Aadhar no.</th>
                <th class="owner optional-column">Land Owner Name</th>
                <th>Village</th>
                <th class="field-acre optional-column">Field Acre</th>
                <th class="phone optional-column">Mobile Number</th>
                <th class="rst optional-column">RST No.</th>
                <th class="lot optional-column">LOT No.</th>
                <th class="gst optional-column">GST Details</th>
                <th class="total optional-column">Total Amount</th>
                <th class="purewigth optional-column">Pure Wigth</th>
                <th class="godown optional-column">Godown Name</th>
                <th class="company optional-column">Company Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase AS $value):
                <tr>
                    <td>{{ date('d/m/Y', strtotime($value->purchase_date)) }}</td>
                    <td >{{ $value->purchase_way }}</td>
                    <td>{{ $value->purchase_relation_cusm }}</td>
                    <td class="accountant optional-column">{{ $value->purchase_accountant }}</td>
                    <td class="owner optional-column">{{ $value->purchase_owner }}</td>
                    <td>{{ $value->purchase_village }}</td>
                    <td class="field-acre optional-column">{{ $value->purchase_acre }}</td>
                    <td class="phone optional-column">{{ $value->purchase_phone }}</td>
                    <td class="rst optional-column">{{ $value->purchase_rst_no }}</td>
                    <td class="lot optional-column">{{ $value->purchase_lot_no }}</td>
                    <td class="gst optional-column">{{ $value->purchase_gst_no }}</td>
                    <td class="total optional-column">{{ $value->purchase_total }}</td>
                     <td class="purewigth optional-column">{{ $value->pure_wigth }}</td>
                     <td class="godown optional-column">{{ $value->godown }}</td>
                      <td class="company optional-column">{{ $value->company_name }}</td>
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
@endsection

@push('script-page')
<script>
    function removeit(url) {
        let cnf = confirm('Are You Sure You Want To Delete This Purchase?');
        if (cnf == true) {
            window.location.href = url;
        }
    }

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

    function handleCheckbox() {
            let arr = [];

            $(".checkbox-rem").each(function () {
                if ($(this).is(":checked")) {
                    arr.push($(this).attr('data-id'));
                }
            });

            localStorage.setItem('purchase', JSON.stringify(arr));
        }

        $(document).ready(function () {
            let items = JSON.parse(localStorage.getItem('purchase')) || [];

            $(".checkbox-rem").each(function () {
                if (items.includes($(this).attr('data-id'))) {
                    $(this).prop("checked", true); 

                    const colIndex = $(this).data('col');
                        const isVisible = $(this).is(':checked');
                        const display = isVisible ? '' : 'none';
                        const columnClass = $(this).data('column');
                         toggleColumn(columnClass, $(this).is(':checked'));
                        $(`table tr`).each(function () {
                            $(this).find(`td:eq(${colIndex}), th:eq(${colIndex})`).css('display', display);
                        });
                }

                
            });
        });
</script>
@endpush
