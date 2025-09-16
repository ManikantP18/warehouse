        <br/>
        <div class="row"> <b> {{$comp_name}} </b></div>
        <div class="row">
                <div class="col-xxl-7">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <div class="card" onclick="getList(1)">
                                <div class="card-body">
                                    <div class="theme-avtar bg-primary">
                                        <i class="ti ti-users"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2 ">{{ __('Sales') }}</p>
                                    <h6 class="mb-3 "><a href="javascript:void(0)" class="text-primary" >{{__('Total Bags')}}</a></h6>
                                    <h3 class="mb-0 text-primary">
                                        
                                    {{$totalbags[0]->totalbags ?? '0'}}

                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="card" onclick="getList(2)">
                                <div class="card-body">
                                    <div class="theme-avtar bg-info">
                                        <i class="ti ti-note"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2 text-info">{{ __('Sales') }}</p>
                                    <h6 class="mb-3 "><a href="javascript:void(0)" class="text-info" >{{__('Total Amount')}}</a></h6>
                                    <h3 class="mb-0 text-info"> ₹{{$totalamount[0]->totalamount ?? '0'}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="card" onclick="getList(3)">
                                <div class="card-body">
                                    <div class="theme-avtar bg-warning">
                                        <i class="ti ti-file-invoice"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2">{{ __('Sales') }}</p>
                                    <h6 class="mb-3 "><a href="javascript:void(0)" class="text-warning" >{{__('Cash Bags')}}</a></h6>
                                    <h3 class="mb-0 text-warning"> {{$cashbags[0]->totalbags ?? '0'}} </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="card" onclick="getList(4)">
                                <div class="card-body">
                                    <div class="theme-avtar bg-danger">
                                        <i class="ti ti-report-money"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2">{{ __('Sales') }}</p>
                                    <h6 class="mb-3 "><a href="javascript:void(0)" class="text-danger" >{{__('Credit Bags')}}</a></h6>
                                    <h3 class="mb-0 text-danger">{{$creditbags[0]->totalbags ?? '0' }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="card" onclick="getList(5)">
                                <div class="card-body">
                                    <div class="theme-avtar bg-danger">
                                        <i class="ti ti-report-money"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2">{{ __('Sales') }}</p>
                                    <h6 class="mb-3 "><a href="javascript:void(0)" class="text-danger" >{{__('Returned Bags')}}</a></h6>
                                    <h3 class="mb-0 text-danger">{{$returned_qty[0]->total_returned_qty ?? '0' }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="card" onclick="getList(6)">
                                <div class="card-body">
                                    <div class="theme-avtar bg-danger">
                                        <i class="ti ti-report-money"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2">{{ __('Sales') }}</p>
                                    <h6 class="mb-3 "><a href="javascript:void(0)" class="text-danger" >{{__('Returned Amount')}}</a></h6>
                                    <h3 class="mb-0 text-danger"> ₹{{$returned_amount[0]->total_returned_amount ?? '0' }}</h3>
                                </div>
                            </div>
                        </div>
        </div>