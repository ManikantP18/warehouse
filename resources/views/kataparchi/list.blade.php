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
    {{ __('Manage kataparchi') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('kataparchi') }}</li>
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

        <a href="#" data-size="xl" data-url="{{ route('kataparchi.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create kataparchi') }}"
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
                     <div class="mb-3">
                        <label><strong>Show/Hide Columns:</strong></label><br>
                        @php
                            $columns = [
                                ['label' => 'kp_Id', 'index' => 0],
                                ['label' => 'Customer-ID', 'index' => 2],
                                ['label' => 'Aadhar Number', 'index' => 4],
                                ['label' => 'land owner name', 'index' => 5],
                                ['label' => 'land acre', 'index' => 7],
                                ['label' => 'khasra No.', 'index' => 8],
                                ['label' => 'Mobile no.', 'index' => 9],
                                ['label' => 'Rogating agent', 'index' => 10],
                                ['label' => 'RST no', 'index' => 12],
                                ['label' => 'Gross weight', 'index' => 13],
                                ['label' => 'Tare weight', 'index' => 14],
                                ['label' => 'pure weight', 'index' => 15],
                                ['label' => 'Godown name', 'index' => 16],
                                ['label' => 'creat date', 'index' => 17],
                                ['label' => 'update date', 'index' => 18],
                                ['label' => 'status', 'index' => 19],
                            ];
                        @endphp

                        @foreach($columns as $col)
                            <label class="form-check-label me-3">
                                <input type="checkbox" class="form-check-input toggle-col" data-col="{{ $col['index'] }}"> {{ $col['label'] }}
                            </label>
                        @endforeach
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th style="display:none">kp_Id</th>
                                    <th> kataparchi date</th>
                                    <th style="display:none">Customer-ID </th>
                                    <th> customer name </th>
                                    <th style="display:none"> Aadhar Number </th>
                                    <th style="display:none"> land owner name </th>
                                    <th>village</th>
                                    <th style="display:none"> land acre</th>
                                    <th style="display:none"> khasra No.</th> 
                                    <th style="display:none"> Mobile no. </th>
                                    <th style="display:none">Rogating agent</th>
                                    <th> variety </th>
                                    <th style="display:none"> RST no </th>

                                    <th style="display:none"> Gross weight </th>
                                    <th style="display:none"> Tare weight </th>
                                    <th style="display:none"> pure weight </th>
                                    <th style="display:none"> Godown name </th>
                                    <th style="display:none"> creat date </th>
                                    <th style="display:none"> update date </th>
                                    <th> status </th>

                                     <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($kataparchi AS $value):

                                <tr>
                                    <td style="display:none"> {{ $value->kp_id }} </td>
                                    <td> {{ date('d/m/Y', strtotime($value->kp_date)) }} </td>
                                    <td style="display:none"> {{ $value->kp_acc_no }} </td>
                                    <td> {{ $value->kp_rel_name  }} </td>
                                    <td style="display:none"> {{ $value->kp_acc_holdername}} </td>
                                    <td style="display:none"> {{ $value->kp_bhoomiswami_name }} </td>
                                    <td> {{ $value->kp_vilage }} </td>

                                    <td style="display:none"> {{ $value->kp_rakaba_acre }} </td>
                                    <td style="display:none"> {{ $value->kp_khasra_no }} </td>
                                    <td style="display:none"> {{ $value->kp_mo_no  }} </td>
                                    <td style="display:none"> {{ $value->kp_rogger_name }} </td>
                                    <td> {{ $value->kp_verity }} </td>
                                    <td style="display:none"> {{ $value->kp_rstno }} </td>

                                    <td style="display:none"> {{ $value->kp_vehicle_wight }} </td>
                                    
                                    <td style="display:none"> {{ $value->kp_only_vechicle_w }} </td>
                                    <td style="display:none"> {{ $value->kp_pure_wigth }} </td>

                                    <td style="display:none"> {{ $value->kp_godown_name  }} </td>
                                    <td style="display:none"> {{ $value->creat_at }} </td>
                                    <td style="display:none"> {{ $value->update_at}} </td>
                                    <td style="display:none"> {{ $value->status }} </td>

                                    <td> 
                                        <div class="d-flex">
                                            
                                        <a href="#" data-size="xl"
                                                data-url="{{ route('kataparchi.edit', $value->kp_id) }}"
                                                data-ajax-popup="true"
                                                 data-title="{{ __('Edit kataparchi') }}"
                                                 
                                                 class="btn btn-sm btn-primary me-2"
                                                data-bs-toggle="tooltip" title="{{ __('Edit')}}">
                                                <i class="ti ti-pencil"></i>
                                            </a> 

                                                

                                                @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="{{ __('DELETE') }}" onclick="removeParch('{{ route('kataparchi.delete',$value->kp_id) }}')">
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

        function removeParch(url){
            let conf = confirm("ARE You Sure You Want To Delete THis Kata Parchi?")

            if(conf == true){
                window.location.href = url;
            }
        }

        $(document).ready(function () {
    $('.toggle-col').on('change', function () {
        const colIndex = $(this).data('col');
        const isVisible = $(this).is(':checked');
        const display = isVisible ? '' : 'none';
        $('table tr').each(function () {
            $(this).find(`td:eq(${colIndex}), th:eq(${colIndex})`).css('display', display);
        });
    });

    // Initial checkboxes state sync (optional)
    $('.toggle-col').each(function () {
        const colIndex = $(this).data('col');
        if (!$(this).is(':checked')) {
            $('table tr').each(function () {
                $(this).find(`td:eq(${colIndex}), th:eq(${colIndex})`).css('display', 'none');
            });
        }
    });
});

    </script>
@endpush
