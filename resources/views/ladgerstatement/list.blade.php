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
    {{ __('Manage Payments') }}
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

        <!-- <a href="#" data-size="xl" data-url="{{ route('payment.create') }}" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Company') }}"
            class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a> -->
    </div>
@endsection

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-border-style table-border-style">
                            <div class="table-responsive">
                    <div class="col-12">
                        <div class="row align-items-end m-auto">
                            <div class="col-md-2">
                            <div class="form-group">
                                <label for="search" class="form-label">Account/Mobile No</label>
                                <input class="form-control" name="search" type="text" id="search" placeholder="Acc No / Mobile No">
                            </div>
                            </div>

                            <div class="col-md-2">
                            <div class="form-group">
                                <label for="search_name" class="form-label">Farmer Name</label>
                                <input class="form-control" name="search_name" type="text" id="search_name" placeholder="Farmer Name">
                            </div>
                            </div>

                            <div class="col-md-2">
                            <div class="form-group">
                                <label for="search_owner" class="form-label">Land Owner</label>
                                <input class="form-control" name="search_owner" type="text" id="search_owner" placeholder="Owner Name">
                            </div>
                            </div>

                            <div class="col-md-2">
                            <div class="form-group">
                                <label for="search_village" class="form-label">Village Name</label>
                                <input class="form-control" name="search_village" type="text" id="search_village" placeholder="Village Name">
                            </div>
                            </div>

                            

                            <div class="col-md-2 ">
                            <div class="form-group">
                                <label class="form-label d-none d-sm-block">&nbsp;</label>
                                <button type="button" class="btn btn-primary w-100" onclick="searchLadger()">Search</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dynamic Farmer Selection -->
                     <div class="row">
                            <div class="col-3 ">
                            <div class="form-group">
                                <div class="form-icon-user allfarmers"></div>
                            </div>
                            </div>

                            <div class="col-3 ">
                            <div class="form-group allcompanies">
                                <label for="comp_id" class="form-label">Company Name</label>
                                <select class="form-control" name="comp_id"  id="comp_id" onchange="selectLadger()">
                                    <option value="all">All</option>
                                    @foreach($company as $value)
                                    <option value="{{$value->company_id}}">{{$value->company_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                                <div class="col-md-3 allcompanies">
                                    <label for="comp_id" class="form-label">From Date</label>
                                    <input type="date" name="from_date" class="form-control"  id="from_date" onchange="selectLadger()">
                                </div>
                                <div class="col-md-3 allcompanies">
                                    <label for="comp_id" class="form-label">To Date</label>
                                    <input type="date" name="to_date" class="form-control" id="to_date" onchange="selectLadger()">
                                </div>
                                <!-- <div class="col-md-2 allcompanies">
                                    
                                    <button type="submit" class="btn btn-primary mt-4" onclick="filterTable()">
                                        <i class="ti ti-filter"></i> Filter
                                    </button>
                                </div> -->
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

        function searchLadger() {
            let searchVal = $('#search').val();
            let searchVillage = $('#search_village').val();
            let searchname = $('#search_name').val();
            let searchowner = $('#search_owner').val();
            let all = 'no';
            $.ajax({
                url: '{{ route('Ladgerstatement.search') }}',
                type: 'GET',
                data: { searchVal, searchVillage, searchname,searchowner, all },
                success: function(response) {
                if (response.success && response.data) {
                    let html = '<label for="comp_id" class="form-label">Farmers</label> <select class="form-control" onchange="selectLadger()" id="selectedLadger"><option value="">Select Farmer</option>';
                    response.data.forEach(d => {
                    html += `<option value="${d.account_id}">${d.relational_cust_name} - ${d.farm_owner_name}</option>`;
                    });
                    html += '</select>';
                    $('.allfarmers').html(html).show();
                    $(".allcompanies").show();
                    $('#form-fields-wrapper').hide();
                } else {
                    alert("No matching record found.");
                }
                }
            });
        }

        function selectLadger() {
            let id = $("#selectedLadger").val();
            let cid = $("#comp_id").val();
            let fdate = $("#from_date").val();
            let todate = $("#to_date").val();
            $.get('{{ route('Ladgerstatement.history') }}', { searchVal: id, company : cid , fromdate : fdate , todate : todate}, function(response) {
                if (response && response.length > 0) {
                    $("#table").html(response)
                }
            });
            }

            $(document).ready(function () {
            $('#form-fields-wrapper').hide();
            $('.allfarmers').hide();
            $(".allcompanies").hide();
            });



    </script>
@endpush
