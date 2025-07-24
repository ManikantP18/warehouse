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

                 <div class="mb-3">
                        <label><strong>Show/Hide Columns:</strong></label><br>
                        @php
                            $columns = [
                                ['label' => 'cn_id', 'index' => 0],
                                ['label' => 'Aadhar Number ', 'index' => 2],
                                ['label' => 'Mobile no.', 'index' => 5],
                                ['label' => 'Item to sale', 'index' => 6],
                                ['label' => 'Quantity', 'index' => 7],
                                ['label' => 'UNIT', 'index' => 8],
                                ['label' => 'Rate', 'index' => 9],
                                ['label' => 'total amount ', 'index' => 10],
                                ['label' => 'GSt amount', 'index' => 11],
                                ['label' => 'creat date', 'index' => 12],
                                ['label' => 'update date', 'index' => 13],
                                ['label' => 'status', 'index' => 14],
                               
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
                                    <th style="display:none">cn_id</th>
                                    <th> Cash / Credit</th>
                                    <th style="display:none"> Aadhar Number </th>
                                    <th> Relational customer name </th>
                                    <th>village</th>
                                    <th style="display:none"> Mobile no. </th>
                                    <th style="display:none"> Item to sale</th>
                                    <th style="display:none"> Quantity </th>
                                    <th style="display:none"> UNIT </th>
                                    <th style="display:none"> Rate </th>
                                    <th style="display:none"> total amount  </th>
                                    <th style="display:none"> GSt amount </th> 
                                    <th style="display:none"> creat date </th>
                                    <th style="display:none"> update date </th>
                                    <th style="display:none"> status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                          @foreach($SalesReturn as $value)
                                <tr>
                                    <td style="display:none">{{ $value->cn_id }}</td>
                                    <td>{{ $value->cash_credit }}</td>
                                    <td style="display:none">{{ $value->aadhar_no }}</td>
                                    <td>{{ $value->r_cust }}</td>
                                    <td>{{ $value->village }}</td>
                                    <td style="display:none">{{ $value->mo_no }}</td>
                                    <td style="display:none">{{ $value->item_sale }}</td>
                                    <td style="display:none">{{ $value->quantity }}</td>
                                    <td style="display:none">{{ $value->unit }}</td>
                                    <td style="display:none">{{ $value->rate }}</td>
                                    <td style="display:none">{{ $value->total_amount }}</td>
                                    <td style="display:none">{{ $value->GST_amount }}</td>
                                    <td style="display:none">{{ $value->creat_at }}</td>
                                    <td style="display:none">{{ $value->UPdate_at }}</td>
                                    <td style="display:none">{{ $value->status }}</td>

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
            let conf = confirm("ARE You Sure You Want To Delete This sales return ?")

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
