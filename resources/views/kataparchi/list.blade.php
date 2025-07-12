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
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>kp_Id</th>
                                    <th> kataparchi date</th>
                                    <th> Acc No. </th>
                                    <th> customer name </th>
                                    <th> Aadhar Number </th>
                                    <th> land owner name </th>
                                    <th>village</th>
                                    <th> land acre</th>

                                    <th> khasra No.</th>

                                    <th> Mobile no. </th>
                                    <th>Rogating agent</th>
                                    <th> variety </th>
                                    <th> RST no </th>
                                    <th> Total weight </th>
                                    <th> only vehcle weight </th>
                                    <th>  pure weight </th>
                                    <th> Godown name </th>
                                    <th> creat date </th>
                                    <th> update date </th>
                                    <th> status </th>

                                     <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($kataparchi AS $value):

                                <tr>
                                    <td> {{ $value->kp_id }} </td>
                                    <td> {{ date('d/m/Y', strtotime($value->kp_date)) }} </td>
                                    <td> {{ $value->kp_acc_no }} </td>
                                    <td> {{ $value->kp_rel_name  }} </td>
                                    <td> {{ $value->kp_acc_holdername}} </td>
                                    <td> {{ $value->kp_bhoomiswami_name }} </td>
                                    <td> {{ $value->kp_vilage }} </td>

                                    <td> {{ $value->kp_rakaba_acre }} </td>

                                     <td> {{ $value->kp_khasra_no }} </td>

                                    <td> {{ $value->kp_mo_no  }} </td>
                                    <td> {{ $value->kp_rogger_name }} </td>
                                    <td> {{ $value->kp_verity }} </td>
                                    <td> {{ $value->kp_rstno }} </td>

                                    <td> {{ $value->kp_vehicle_wight }} </td>
                                    
                                    <td> {{ $value->kp_only_vechicle_w }} </td>
                                    <td> {{ $value->kp_pure_wigth }} </td>

                                    <td> {{ $value->kp_godown_name  }} </td>
                                    <td> {{ $value->creat_at }} </td>
                                    <td> {{ $value->update_at}} </td>
                                    <td> {{ $value->status }} </td>

                                    <td> 
                                        <div class="d-flex">
                                            
                                        <a href="#"
                                                data-url="{{ route('kataparchi.edit', $value->kp_id) }}"
                                                data-ajax-popup="true"
                                                 data-title="{{ __('EDit kataparchi') }}"
                                                 
                                                 class="btn btn-sm btn-primary me-2"
                                                data-bs-toggle="tooltip" title="{{ __('Edite')}}">
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
    </script>
@endpush
