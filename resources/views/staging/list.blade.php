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
                            ['label' => 'Staging Id', 'index' => 0],
                            ['label' => 'Select Lot No.', 'index' => 1],
                            ['label' => 'Farmer Name', 'index' => 2],
                            ['label' => 'Staging Varity', 'index' => 3],
                            ['label' => 'Rst number', 'index' => 4],
                            ['label' => 'Godown', 'index' => 5],
                            ['label' => 'Stage No.', 'index' => 6],
                            ['label' => 'No of Begs', 'index' => 7],
                            ['label' => 'Final Weight', 'index' => 8],
                            ['label' => 'Pay for staging', 'index' => 9],
                            ['label' => 'Date', 'index' => 10],
                            ['label' => 'Status', 'index' => 11],
                            ['label' => 'Action', 'index' => 12],
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
                                    <th >Staging Id</th>
                                    <th style="display:none">Select Lot No.</th>
                                    <th>Farmer Name</th>
                                    <th style="display:none"> Staging Varity </th>
                                    <th style="display:none">Rst number</th>
                                    <th> Godown </th>
                                    <th style="display:none">Stage No. </th>
                                    <th style="display:none"> No of Begs </th>
                                    <th style="display:none">Final Weight</th>
                                    <th style="display:none">Pay for staging </th>
                                    <th>Date </th>
                                    <th style="display:none"> Status </th>
                                    <th > Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($staging AS $value):

                                <tr>
                                    <td> {{ $value->staging_id}} </td>
                                    <td style="display:none"> {{ $value->select_lot_no}} </td>
                                    <td >{{ $value->farmer_name}}</td>
                                    <td style="display:none"> {{ $value->name}} </td>
                                    <td style="display:none">{{ $value->rst_no}}</td>
                                    <td> {{ $value->branch_name}} </td>
                                     <td style="display:none"> {{ $value->stage_no}} </td>
                                    <td style="display:none"> {{ $value->no_of_begs}} </td>
                                    <td style="display:none">{{ $value->final_weight}}</td>
                                     <td style="display:none"> {{ $value->pay_for_staging}} </td>
                                      <td> {{ $value->staging_date}} </td>
                                    <td style="display:none"> {{ $value->staging_status == 1 ? 'Active' : 'Inactive' }} </td>
                                    <td>
                                            <div class="flex gap-4">
        
                                        <a href="#" data-url="{{ route('staging.edit', $value->staging_id) }}"  data-size="xl"data-ajax-popup="true" data-bs-toggle="tooltip" 
                                            class="btn btn-sm btn-success">
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
<script> $(document).on('change', '#password_switch', function() {
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
     $(document).ready(function () {
    $('.toggle-col').on('change', function () {
        const colIndex = $(this).data('col');
        const isVisible = $(this).is(':checked');
        const display = isVisible ? '' : 'none';
        $('table tr').each(function () {
            $(this).find(`td:eq(${colIndex}), th:eq(${colIndex})`).css('display', display);
        });
    });
});


function handleCheckbox() {
            let arr = [];

            $(".checkbox-rem").each(function () {
                if ($(this).is(":checked")) {
                    arr.push($(this).attr('data-col'));
                }
            });

            localStorage.setItem('staging', JSON.stringify(arr));
        }

        $(document).ready(function () {
            let items = JSON.parse(localStorage.getItem('staging')) || [];

            $(".checkbox-rem").each(function () {
                if (items.includes($(this).attr('data-col'))) {
                    $(this).prop("checked", true); 

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

