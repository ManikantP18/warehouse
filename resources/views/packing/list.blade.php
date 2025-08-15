@extends('layouts.admin')
@php
    $profile = asset(Storage::url('uploads/avatar/'));
@endphp

@push('script-page')
<script>
    $(document).ready(function () {
        const columnHeaders = [
            "Packing Date",
            "Farmer Name",
            "Land Owner",
            "Packing Godown",
            "Gredded Quantity (Quintal)",
            "Packing Total Bags",
            "Pay for Packing",
            "Lot No.",
            "Company Name",
            "Packing Verity",
            "Packing Stage No.",
            "Final Weight",
            "40 KG Bags",
            "30 KG Bags",
            "20 KG Bags",
            "5 KG Bags",
            "Remaining Qty (KG)",
            "Action"
        ];
        
        const table = $('.datatable');
        const container = $('<div class="row mb-3"><label class="form-label fw-bold">Show/Hide Columns:</label><div class="d-flex flex-wrap column-checkboxes"></div></div>');
        const checkboxContainer = container.find('.column-checkboxes');

        table.before(container);

        columnHeaders.forEach((header, index) => {
            const id = 'col-toggle-' + index;
            const wrapper = $('<div>', { class: 'form-check form-check-inline' });
            const checkbox = $('<input>', {
                type: 'checkbox',
                id,
                class: 'form-check-input',
                checked: localStorage.getItem('col_' + index) !== 'false'
            });
            const label = $('<label>', {
                for: id,
                class: 'form-check-label'
            }).text(header);

            wrapper.append(checkbox).append(label);
            checkboxContainer.append(wrapper);

            checkbox.on('change', function () {
                const colIndex = index + 1;
                const visible = $(this).is(':checked');
                localStorage.setItem('col_' + index, visible);
                table.find('tr').each(function () {
                    $(this).find('td:nth-child(' + colIndex + '), th:nth-child(' + colIndex + ')').toggle(visible);
                });
            });
        });

        checkboxContainer.find('input[type="checkbox"]').each(function () {
            $(this).trigger('change');
        });
    });
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
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Packing Date</th>
                                <th>Farmer Name</th>
                                <th>Land Owner</th>
                                <th>Packing Godown</th>
                                <th>Gredded Quantity (Quintal)</th>
                                <th>Packing Total Bags</th>
                                <th>Pay for Packing</th>
                                <th>Lot No.</th>
                                <th>Company Name</th>
                                <th>Packing Verity</th>
                                <th>Packing Stage No.</th>
                                <th>Final Weight</th>
                                <th>40 KG Bags</th>
                                <th>30 KG Bags</th>
                                <th>20 KG Bags</th>
                                <th>5 KG Bags</th>
                                <th>Remaining Qty (KG)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packing as $value)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($value->packing_date)) }}</td>
                                    <td>{{ $value->farmer_name }}</td>
                                    <td>{{ $value->land_owner }}</td>
                                    <td>{{ $value->branch_name }}</td>
                                    <td>{{ $value->packing_gredded_quantity }}</td>
                                    <td>{{ $value->packing_no_of_begs }}</td>
                                    <td>{{ $value->packing_pay }}</td>
                                    <td>{{ $value->lot_no }}</td>
                                    <td>{{ $value->company_name }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->packing_stage_no }}</td>
                                    <td>{{ $value->final_weight }}</td>
                                    <td>{{ $value->packing_40 ?? 0 }}</td>
                                    <td>{{ $value->packing_30 ?? 0 }}</td>
                                    <td>{{ $value->packing_20 ?? 0 }}</td>
                                    <td>{{ $value->packing_5 ?? 0 }}</td>
                                    <td>{{ $value->remaing_qty ?? 0 }}</td>
                                    <td>
                                        <a href="#" data-size="xl" data-url="{{ route('packing.edit', $value->packing_id) }}"
                                            data-ajax-popup="true" data-bs-toggle="tooltip" title="{{ __('Edit') }}"
                                            data-title="{{ __('Edit Packing') }}" class="btn btn-sm btn-primary">
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
