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
    {{ __('Manage Gredding') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Gredding') }}</li>
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
                    <div class="mb-3">
                        <label><strong>Show/Hide Columns:</strong></label><br>
                       @php
                        $columns = [
                            ['label' => 'Gredding Id', 'index' => 0],
                            ['label' => 'Farmar Name.', 'index' => 1],
                            ['label' => 'Land Owner name', 'index' => 2],
                            ['label' => 'Select Lot No.', 'index' => 3],
                            ['label' => 'Gredding Varity', 'index' => 4],
                            ['label' => 'Godown', 'index' => 5],
                            ['label' => 'Stage No.', 'index' => 6],
                            ['label' => 'Final Waigth', 'index' => 7],
                            ['label' => 'No of Begs', 'index' => 8],
                            ['label' => ' Gredded  Quantity ', 'index' => 9],
                            ['label' => 'Undersize Quantity', 'index' => 10],
                            ['label' => 'Pay for greeding', 'index' => 11],
                            ['label' => 'Date', 'index' => 12],
                            ['label' => 'Status', 'index' => 13],
                            ['label' => 'Action', 'index' => 14],
                        ];
                    @endphp

                    @foreach($columns as $col)
                        <label class="form-check-label me-3">
                            <input type="checkbox" class="form-check-input checkbox-rem toggle-col" data-col="{{ $col['index'] }}" onchange="handleCheckbox()"> {{ $col['label'] }}
                        </label>
                    @endforeach

                    </div>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Gredding Id</th>
                                    <th>Farmar Name</th>
                                    <th>Land Owner name</th>
                                    <th>Select Lot No.</th>
                                    <th> Gredding Varity </th>
                                    <th> Godown </th>
                                    <th>Stage No. </th>
                                    <th>Final Waigth</th>
                                    <th> No of Begs </th>
                                    <th> Gredded  Quantity </th>
                                    <th> Undersize Quantity </th>
                                    <th>Pay for greeding </th>
                                    <th>Date </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($gredding AS $value):

                                <tr>
                                    <td> {{ $value->gredding_id}} </td>
                                    <td> {{ $value->farmar_name}} </td>
                                    <td> {{ $value->land_owner}} </td>

                                    <td> {{ $value->gredding_lot_no}} </td>
                                    <td> {{ $value->name}} </td>
                                    <td> {{ $value->branch_name}} </td>
                                    <td> {{ $value->gred_stage_no}} </td>
                                    <td> {{ $value->final_waigth}} </td>

                                    <td> {{ $value->gred_no_begs}} </td>
                                    <td> {{ $value->gredded_quantity}} </td>
                                    <td> {{ $value->undersize_quantity}} </td>
                                     <td> {{ $value->pay_gredding}} </td>
                                      <td> {{ $value->gredding_date}} </td>
                                    <td> {{ $value->gredding_status == 1 ? 'Active' : 'Inactive' }} </td>
                                <td>
                                    <div class="d-flex">
                                            
                                        <a href="#" data-size="xl"
                                                data-url="{{ route('gredding.edit', $value->gredding_id) }}"
                                                data-ajax-popup="true"
                                                 data-title="{{ __('Edit gredding') }}"
                                                 
                                                 class="btn btn-sm btn-primary me-2"
                                                data-bs-toggle="tooltip" title="{{ __('Edit')}}">
                                                <i class="ti ti-pencil"></i>
                                            </a> 
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
   
    <script>
$(document).ready(function () {
    // 👉 Define default visible column indexes
    const defaultCols = ['0', '1', '3', '4', '6', '14']; // example: Gredding Id, Farmar Name, Lot No, Varity, Stage No, Action
    const savedCols = JSON.parse(localStorage.getItem('gredding')) || defaultCols;

    $(".checkbox-rem").each(function () {
        const colIndex = $(this).data('col').toString();

        if (savedCols.includes(colIndex)) {
            $(this).prop("checked", true);
            toggleColumn(colIndex, true);
        } else {
            $(this).prop("checked", false);
            toggleColumn(colIndex, false);
        }
    });

    // 🔁 On checkbox change
    $(".toggle-col").on('change', function () {
        const colIndex = $(this).data('col').toString();
        const isVisible = $(this).is(':checked');

        toggleColumn(colIndex, isVisible);
        updateLocalStorage();
    });

    function toggleColumn(colIndex, show) {
        const display = show ? '' : 'none';
        $('table tr').each(function () {
            $(this).find(`td:eq(${colIndex}), th:eq(${colIndex})`).css('display', display);
        });
    }

    function updateLocalStorage() {
        let selected = [];

        $(".checkbox-rem").each(function () {
            if ($(this).is(":checked")) {
                selected.push($(this).data('col').toString());
            }
        });

        localStorage.setItem('gredding', JSON.stringify(selected));
    }
});
</script>

@endpush
