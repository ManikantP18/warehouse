@extends('layouts.admin')
@section('page-title')
    {{ __('Sales Dashboard') }}
@endsection
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

@section('breadcrumb')
    {{-- <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard/Sale')}}</a></li> --}}
@endsection
@section('content')
    <div class="row">

    <div class="row mb-3">

        <div class="col-md-4">
            <select name="company_id" id="company_id" class="form-control select" required onchange="getCategories()">
                <option value="">Select Company</option>
                <option value="all">All</option>
                @foreach($company as $key => $value)
                    <option value="{{ $value->company_id }}">{{ $value->company_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <select name="category_id" id="category_id" class="form-control select" required onchange="getItems()">
                <option value="">Select Category</option> 
                
            </select>
        </div>

        <div class="col-md-4">
            <select name="item_id" id="item_id" class="form-control select" required onchange="getInventory()">
                <option value="">Select Item</option> 
                
            </select>
        </div>

    <div class="col-md-3 mt-2">
        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}" id="from_date">
    </div>
    <div class="col-md-3 mt-2">
        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}" id="to_date">
    </div>
    <div class="col-md-3 mt-2">
        <button type="button" class="btn btn-primary" onclick="gethistory()">
            <i class="ti ti-filter"></i> Filter
        </button>
    </div>
</div>

        <!-- [ sample-page ] start -->
        <div class="col-sm-12 salescards mt-3">
            
                    
        </div>
@endsection

<script>
    function gethistory() {
        let from_date = $('#from_date').val();
        let to_date = $('#to_date').val();

        let item_id = $("#item_id").val();

        let cid = $("#company_id").val();

        let cat_id = $("#category_id").val();

        $.ajax({
            url: '{{ route('dashboard.history') }}',
            type: 'GET',
            data: {
                from_date: from_date,
                to_date: to_date,
                item_id : item_id,
                comp_id : cid,
                cat_id : cat_id
            },
            success: function(response) {
                $(".salescards").html('');
                $(".salescards").html(response);
            },
            error: function(xhr) {
                alert("Something went wrong while fetching data.");
                console.log(xhr.responseText);
            }
        });
    }

    function getCategories() {

        let comp_id = $("#company_id").val();

        $.ajax({
            url: '{{ route('inventory.getcategories') }}',
            type: 'GET',
            data: {
                comp_id: comp_id
            },
            success: function(response) {
                $("#category_id").html(response);
            },
            error: function(xhr) {
                alert("Something went wrong while fetching data.");
                console.log(xhr.responseText);
            }
        });
    }

    
    function getItems() {

        let cat_id = $("#category_id").val();

        $.ajax({
            url: '{{ route('inventory.getitems') }}',
            type: 'GET',
            data: {
                cat_id: cat_id
            },
            success: function(response) {
                $("#item_id").html(response);
            },
            error: function(xhr) {
                alert("Something went wrong while fetching data.");
                console.log(xhr.responseText);
            }
        });
    }

    function getList(tid){

        let from_date = $('#from_date').val();
        let to_date = $('#to_date').val();

        let item_id = $("#item_id").val();

        let cid = $("#company_id").val();

        let cat_id = $("#category_id").val();

        let url = `{{ route('dashboard.report') }}?tid=${tid}&from_date=${from_date}&to_date=${to_date}&item_id=${item_id}&cid=${cid}&cat_id=${cat_id}&title='Returned Amount History'`;

        if(tid == 1){
            url = `{{ route('dashboard.report') }}?tid=${tid}&from_date=${from_date}&to_date=${to_date}&item_id=${item_id}&cid=${cid}&cat_id=${cat_id}&title='Total Selled Bags'`;

            window.location.href = url;
        }

        if(tid == 2){
            url = `{{ route('dashboard.report') }}?tid=${tid}&from_date=${from_date}&to_date=${to_date}&item_id=${item_id}&cid=${cid}&cat_id=${cat_id}&title='Selled Amount History'`;

            window.location.href = url;
        }

        if(tid == 3){
            url = `{{ route('dashboard.report') }}?tid=${tid}&from_date=${from_date}&to_date=${to_date}&item_id=${item_id}&cid=${cid}&cat_id=${cat_id}&title='Cash Bags Hisory'`;

            window.location.href = url;
        }

        if(tid == 4){
            url = `{{ route('dashboard.report') }}?tid=${tid}&from_date=${from_date}&to_date=${to_date}&item_id=${item_id}&cid=${cid}&cat_id=${cat_id}&title='Credit Bags Hisory'`;

            window.location.href = url;
        }

        if(tid == 5){
            url = `{{ route('dashboard.report') }}?tid=${tid}&from_date=${from_date}&to_date=${to_date}&item_id=${item_id}&cid=${cid}&cat_id=${cat_id}&title='Returned Bags Hisory'`;

            window.location.href = url;
        } 

            window.location.href = url;
       

    }

   
    </script>
