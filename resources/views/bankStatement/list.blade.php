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
    </script>
@endpush

@section('page-title')
    {{ __('Bank Statement') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Bank Statement') }}</li>
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
                    <div class="col-12">
                        <div class="row align-items-end m-auto">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="comp_id" class="form-label">Company Name</label>
                                    <select class="form-control" name="comp_id" id="comp_id">
                                        <option value="">Select Company</option>
                                        @foreach($company as $value)
                                            <option value="{{ $value->company_id }}">{{ $value->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 d-none" id="bank_dropdown_wrapper">
                                <div class="form-group">
                                    <label for="bank_id" class="form-label">Bank Name</label>
                                    <select class="form-control" name="bank_id" id="bank_id">
                                        <option value="">Select Bank</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="table"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script-page')
<script>
    $(document).ready(function () {
        $('#form-fields-wrapper').hide();
        $('.allfarmers').hide();
        $(".allcompanies").hide();
    });

    $('#comp_id').on('change', function () {
        let company_id = $(this).val();

        if (company_id && company_id !== "all") {
            $('#bank_dropdown_wrapper').removeClass('d-none');

            $.ajax({
                url: "{{ route('get.company.banks') }}",
                type: "GET",
                data: { company_id },
                success: function (response) {
                    let options = '<option value="">Select Bank</option>';
                    if (response.success && response.data.length > 0) {
                        response.data.forEach(bank => {
                            options += `<option value="${bank.account_id}">
                                            ${bank.bank_name}(${bank.account_num}) 
                                        </option>`;
                        });
                    }
                    $("#bank_id").html(options);
                }
            });
        } else {
            $("#bank_dropdown_wrapper").addClass('d-none');
            $("#bank_id").html('<option value="">Select Bank</option>');
        }
    });

    $('#bank_id').on('change', function () {
        let bank_id = $(this).val();

        if (bank_id) {
            $.ajax({
                url: "{{ route('get.bank.statement') }}",
                type: "GET",
                data: { bank_id },
                success: function (response) {
                    $("#table").html(response);
                }
            });
        }
    });
</script>
@endpush
