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
    {{ __('Payment OUT') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Payments') }}</li>
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

       <a href="#" data-size="xl" data-url="{{ route('payment_out.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Payment Out') }}"
            class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
    </div>
@endsection

@section('content')
            <div class="row">
                
               <div class="card mt-4">
    <div class="card-body">
        <h5 class="mb-5">Payment Out List</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Company</th>
            <th>Ladger Name</th>
            <th>Bank Name (Acc No)</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($payments as $row)
            <tr>
                <td>{{ $row->company_name ?? 'N/A' }}</td>

                    <td>
                        @if($row->ladger_name  || $row->farm_owner_name  || $row->village)
                            {{ $row->ladger_name ?? '' }} -  
                            {{ $row->farm_owner_name ?? '' }} -
                            ({{ $row->village ?? '' }})
                        @else
                            N/A
                        @endif
                    </td>

                    <td>
                        @if($row->bank_name || $row->account_num)
                            {{ $row->bank_name ?? '' }} 
                            ({{ $row->account_num ?? '' }})
                        @else
                            N/A
                        @endif
                    </td>

                    <td>{{ $row->pay_type ?? 'N/A' }}</td>
                    <td>{{ $row->ammount ?? '0' }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->created_date)->format('d-m-Y') ?? 'N/A' }}</td>

            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No payment records found</td>
            </tr>
        @endforelse
    </tbody>
</table>

        </div>
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

        
    </script>
@endpush
