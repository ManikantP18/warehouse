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

        $(document).ready(function () {
            $('.toggle-col').on('change', function () {
                const colIndex = $(this).data('col');
                const isVisible = $(this).is(':checked');
                const display = isVisible ? '' : 'none';
                $(`table tr`).each(function () {
                    $(this).find(`td:eq(${colIndex}), th:eq(${colIndex})`).css('display', display);
                });
            });
        });
    </script>
@endpush
@section('page-title')
    {{ __('Products Inventory management') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Inventory') }}</li>
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

<div class="row mb-3">

        <div class="col-md-4">
            <select name="company_id" id="company_id" class="form-control select" required onchange="getCategories()">
                <option value="">Select Company</option>
                <option value="all">All</option>
                @foreach($company as $key => $value)
                    <option value="{{ $value->company_id }}">{{ $value->company_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <select name="category_id" id="category_id" class="form-control select" required onchange="getItems()">
                <option value="">Select Category</option> 
                
            </select>
        </div>

        <div class="col-md-4">
            <select name="item_id" id="item_id" class="form-control select" required onchange="getInventory()">
                <option value="">Select Item</option> 
                
            </select>
        </div>

    <div class="col-md-3 mt-2">
        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}" id="from_date" onchange="filterTable()">
    </div>
    <div class="col-md-3 mt-2">
        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}" id="to_date" onchange="filterTable()">
    </div>
    <div class="col-md-3 mt-2">
        <button type="button" class="btn btn-primary" onclick="filterTable()">
            <i class="ti ti-filter"></i> Filter
        </button>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive" id="inventory-table">
                    
                    <table class="table datatable" id="purchasetable">
                        <thead>
                            <tr>
                                <th>Company</th>
                                
                                <th> Category </th>

                                <th> Item Name </th>

                                <th> Lot No. </th>
                                <th> Stock Qty. </th>
                                <th> Available Qty. </th>
                                
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
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
            let cnf = confirm('Are You Sure You Want To Delete This Sell?');
            if (cnf == true) {
                window.location.href = url;
            }
        }

        function handleCheckbox() {
            let arr = [];

            $(".checkbox-rem").each(function () {
                if ($(this).is(":checked")) {
                    arr.push($(this).attr('data-col'));
                }
            });

            localStorage.setItem('checkedItems', JSON.stringify(arr));
        }

        $(document).ready(function () {
            let items = JSON.parse(localStorage.getItem('checkedItems')) || [];

            $(".checkbox-rem").each(function () {
                if (items.includes($(this).attr('data-col'))) {
                    $(this).prop("checked", true); // ✅ Proper way to check a checkbox

                    const colIndex = $(this).data('col');
                        const isVisible = $(this).is(':checked');
                        const display = isVisible ? '' : 'none';
                        $(`table tr`).each(function () {
                            $(this).find(`td:eq(${colIndex}), th:eq(${colIndex})`).css('display', display);
                        });
                }
            });
        });

        function getInventory() {
        let from_date = $('#from_date').val();
        let to_date = $('#to_date').val();

        let item_id = $("#item_id").val();

        let cid = $("#company_id").val();

        let cat_id = $("#category_id").val();

        $.ajax({
            url: '{{ route('inventory.filter') }}',
            type: 'GET',
            data: {
                from_date: from_date,
                to_date: to_date,
                item_id : item_id,
                comp_id : cid,
                cat_id : cat_id
            },
            success: function(response) {
                $("#inventory-table").html('');
                $("#inventory-table").html(response);
            },
            error: function(xhr) {
                alert("Something went wrong while fetching data.");
                console.log(xhr.responseText);
            }
        });
    }

    function getCategories() {

        let comp_id = $("#company_id").val();

        $.ajax({
            url: '{{ route('inventory.getcategories') }}',
            type: 'GET',
            data: {
                comp_id: comp_id
            },
            success: function(response) {
                $("#category_id").html(response);
            },
            error: function(xhr) {
                alert("Something went wrong while fetching data.");
                console.log(xhr.responseText);
            }
        });

        getInventory();
    }

    
    function getItems() {

        let cat_id = $("#category_id").val();

        $.ajax({
            url: '{{ route('inventory.getitems') }}',
            type: 'GET',
            data: {
                cat_id: cat_id
            },
            success: function(response) {
                $("#item_id").html(response);
            },
            error: function(xhr) {
                alert("Something went wrong while fetching data.");
                console.log(xhr.responseText);
            }
        });

        getInventory();
    }


    </script>
@endpush
