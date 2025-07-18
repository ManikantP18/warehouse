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
    {{ __('Manage Sales-Return') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Sales-Return') }}</li>
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

        <a href="#" data-size="xl" data-url="{{ route('Sales-Return.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create SalesReturn') }}"
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
                                    <th>cn_id</th>
                                    <th> Cash / Credit</th>
                                    <th> Aadhar Number </th>
                                    <th> Relational customer name </th>
                                    <th>village</th>
                                    <th> Mobile no. </th>
                                    <th> Item to sale</th>
                                    <th> Quantity </th>
                                    <th> Rate </th>
                                    <th> total amount  </th>
                                    <th> GSt amount </th>                      
                                    <th> creat date </th>
                                    <th> update date </th>
                                    <th> status </th>
                                     <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                          @foreach($SalesReturn as $value)
                                <tr>
                                    <td>{{ $value->cn_id }}</td>
                                    <td>{{ $value->cash_credit }}</td>
                                    <td>{{ $value->aadhar_no }}</td>
                                    <td>{{ $value->r_cust }}</td>
                                    <td>{{ $value->village }}</td>
                                    <td>{{ $value->mo_no }}</td>
                                    <td>{{ $value->item_sale }}</td>
                                    <td>{{ $value->quantity }}</td>
                                    <td>{{ $value->rate }}</td>
                                    <td>{{ $value->total_amount }}</td>
                                    
                                    <td>{{ $value->GST_amount }}</td>
                                    <td>{{ $value->creat_at }}</td>
                                    <td>{{ $value->UPdate_at }}</td>
                                    <td>{{ $value->status }}</td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="#"
                                            data-url="{{ route('Sales-Return.edit', $value->cn_id) }}"
                                            data-ajax-popup="true"
                                            data-title="{{ __('EDit Sales-Return') }}"
                                            class="btn btn-sm btn-primary me-2"
                                            data-bs-toggle="tooltip" title="{{ __('Edite') }}">
                                                <i class="ti ti-pencil"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                    title="{{ __('DELETE') }}"
                                                    onclick="removeParch('{{ route('Sales-Return.delete', $value->cn_id) }}')">
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
