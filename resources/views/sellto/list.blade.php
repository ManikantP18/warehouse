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
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <div class="mb-3">
                        <label><strong>Show/Hide Columns:</strong></label><br>
                        @php
                            $columns = [
                                ['label' => 'Customer-ID', 'index' => 1],
                                ['label' => 'Aadhar Number', 'index' => 3],
                                ['label' => 'Field Owner', 'index' => 4],
                                ['label' => 'Mobile No.', 'index' => 6],
                                ['label' => 'Received Cash', 'index' => 7],
                                ['label' => 'Received Bank', 'index' => 8],
                                ['label' => 'Bank Name', 'index' => 9],
                                ['label' => 'Remaining Amount', 'index' => 10],
                                ['label' => 'Mode of Invoice', 'index' => 11],
                            ];
                        @endphp
                        @foreach($columns as $col)
                            <label class="form-check-label me-3">
                                <input type="checkbox" onchange="handleCheckbox()" class="form-check-input toggle-col checkbox-rem" data-col="{{ $col['index'] }}"> {{ $col['label'] }}
                            </label>
                        @endforeach
                    </div>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sell Date</th>
                                <th style="display:none">Customer-ID</th>
                                <th>Customer name </th>
                                <th style="display:none"> Aadhar Number </th>
                                <th style="display:none"> Land owner </th>
                                <th>village</th>
                                <th style="display:none"> mobile no. </th>
                                <th style="display:none"> Received cash </th>
                                <th style="display:none"> recieved bank </th>
                                <th style="display:none"> bank name </th>
                                <th style="display:none"> Remaining Amount </th>
                                <th >Mode of Invoice</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sellto AS $value):
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($value->sell_created_date)) }}</td>
                                    <td style="display:none">{{ $value->sell_account_number }}</td>
                                    <td>{{ $value->sell_relation_customer }}</td>
                                    <td style="display:none">{{ $value->sell_account_name }}</td>
                                    <td style="display:none">{{ $value->sell_property_owner }}</td>
                                    <td>{{ $value->sell_village }}</td>
                                    <td style="display:none">{{ $value->sell_phone }}</td>
                                    <td style="display:none">{{ $value->cash_amount }}</td>
                                    <td style="display:none">{{ $value->credit_amount }}</td>
                                    <td style="display:none">{{ $value->branchname }}</td>
                                    <td style="display:none">{{ $value->remaining_amount }}</td>
                                    <td >{{ $value->sell_way }}</td>
                                    <td>
                                        <a href="#" data-size="xl" data-url="{{ route('sellto.edit', $value->sell_id) }}" data-ajax-popup="true"
                                            data-bs-toggle="tooltip" title="{{ __('edit') }}" data-title="{{ __('edit Sells') }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm bg-danger text-white shadow-sm" title="Delete"
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


    </script>
@endpush
