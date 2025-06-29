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
    {{ __('Manage Ladgers') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Ladgers') }}</li>
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

         <a href="#" data-size="xl" data-url="{{ route('ledger.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Ladger') }}"
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
                <div class="mb-4 text-center d-flex justify-content-center w-100" style="gap: 0;">
                   <a href="{{route('ledger.list') }}"> <button id="farmer-btn" class="btn btn-outline-primary w-100 me-0 btn-toggle-type" >Farmer</button></a>

                <a href="{{route('ledger.other')}} "><button id="others-btn" class="btn btn-outline-primary w-100 ms-0 btn-toggle-type" >Others</button>
</a>
                    <input type="hidden" name="ledger_type" id="ledger_type" value="">
                </div>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
    <tr>
        <th>Ladger Id</th>
        <th>Account Id</th>
        <th>Relational Cust. Name</th>
        <th>Account Holder</th>
        <th class="farmer-only">Farmer Owner Name</th>
        <th>Village</th>
        <th class="farmer-only">Farmer Area Acre</th>
        <th>Phone No.</th>
        <th  class="farmer-only">Bank Account Name</th>
        <th class="farmer-only">Account No.</th>
        <th class="farmer-only">Bank Name</th>
        <th class="farmer-only">IFSC Code</th>
        <th class="farmer-only">Branch</th>
        <th>GST Details</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
@foreach($ledger AS $value)
<tr>
    <td>{{ $value->account_id }}</td>
    <td>{{ $value->ladger_type }}</td>
    <td >{{ $value->relational_cust_name }}</td>
    <td>{{ $value->account_holder }}</td>
    <td class="farmer-only">{{ $value->farm_owner_name }}</td>
    <td>{{ $value->village }}</td>
    <td class="farmer-only">{{ $value->farm_area_acre }}</td> {{-- corrected --}}
    <td>{{ $value->phone_number }}</td>
    <td class="farmer-only">{{ $value->bank_account_name }}</td>
    <td class="farmer-only">{{ $value->account_number }}</td>
    <td class="farmer-only">{{ $value->bank_name }}</td>
    <td class="farmer-only">{{ $value->ifsc_code }}</td>
    <td class="farmer-only">{{ $value->branch }}</td>
    <td >{{ $value->gst_num }}</td>
    <td>{{ $value->status == 1 ? 'Active' : 'Inactive' }}</td>
    <td>
    {{-- ✅ Edit Button: Redirects to edit page --}}
   <a href="#" data-size="xl" data-url="{{ route('ledger.edit', $value->ladger_id) }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{ __('edit') }}" data-title="{{ __('edit Ladger') }}"
            class="btn btn-sm btn-success">
           <i class="ti ti-pencil"></i>
        </a>
           

    {{-- ✅ Delete Button: Calls JS confirm & deletes --}}
    <button class="btn btn-sm btn-danger" onclick="deleteit('{{ route('ledger.delete', $value->ladger_id) }}')" title="Delete">
        <i class="ti ti-trash"></i>
    </button>
</td>

</tr>
@endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page')
    <script>

       function showFields(type) {
    document.getElementById('ledger_type').value = type;
    const farmerCols = document.querySelectorAll('.farmer-only');

    if (type === 'farmer') {
        farmerCols.forEach(el => el.style.display = '');
    } else {
        farmerCols.forEach(el => el.style.display = 'none');
    }
}

// // Default show farmer fields on load
// document.addEventListener('DOMContentLoaded', function () {
//     showFields('farmer'); // or 'others' if needed
// });

// document.querySelectorAll('.btn-toggle-type').forEach(btn => {
//     btn.classList.remove('active');
// });
// document.getElementById(`${type}-btn`).classList.add('active');






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
@endpush
