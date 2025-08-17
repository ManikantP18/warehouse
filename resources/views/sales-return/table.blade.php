<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <div class="mb-3">
                        <label><strong>Show/Hide Columns:</strong></label><br>
                        @php
                            $columns = [
                                ['label' => 'Customer-ID', 'index' => 1],
                                ['label' => 'Aadhar Number', 'index' => 3],
                                ['label' => 'Field Owner', 'index' => 4],
                                ['label' => 'Mobile No.', 'index' => 6],
                                ['label' => 'Received Cash', 'index' => 7],
                                ['label' => 'Received Bank', 'index' => 8],
                                ['label' => 'Bank Name', 'index' => 9],
                                ['label' => 'Remaining Amount', 'index' => 10],
                                ['label' => 'Mode of Invoice', 'index' => 11],
                            ];
                        @endphp
                        @foreach($columns as $col)
                            <label class="form-check-label me-3">
                                <input type="checkbox" onchange="handleCheckbox()" class="form-check-input toggle-col checkbox-rem" data-col="{{ $col['index'] }}"> {{ $col['label'] }}
                            </label>
                        @endforeach
                    </div>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sell Date</th>
                                <th style="display:none">Customer-ID</th>
                                <th>Customer name </th>
                                <th style="display:none"> Aadhar Number </th>
                                <th style="display:none"> Land owner </th>
                                <th>village</th>
                                <th style="display:none"> mobile no. </th>
                                <th style="display:none"> Received cash </th>
                                <th style="display:none"> recieved bank </th>
                                <th style="display:none"> bank name </th>
                                <th style="display:none"> Remaining Amount </th>
                                <th >Mode of Invoice</th>
                                <th > Company Name </th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sellto AS $value):
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($value->sell_created_date)) }}</td>
                                    <td style="display:none">{{ $value->sell_account_number }}</td>
                                    <td>{{ $value->sell_relation_customer }}</td>
                                    <td style="display:none">{{ $value->sell_account_name }}</td>
                                    <td style="display:none">{{ $value->sell_property_owner }}</td>
                                    <td>{{ $value->sell_village }}</td>
                                    <td style="display:none">{{ $value->sell_phone }}</td>
                                    <td style="display:none">{{ $value->cash_amount }}</td>
                                    <td style="display:none">{{ $value->credit_amount }}</td>
                                    <td style="display:none">{{ $value->branchname }}</td>
                                    <td style="display:none">{{ $value->remaining_amount }}</td>
                                    <td >{{ $value->sell_way }}</td>
                                    <td >{{ $value->company_name }}</td>
                                    <td>
                                        <a href="#" data-size="xl" data-url="{{ route('Sales-Return.edit', $value->sell_id) }}" data-ajax-popup="true"
                                            data-bs-toggle="tooltip" title="{{ __('Make Return') }}" data-title="{{ __('Make Sales Return') }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        
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

<script>
    function handleCheckbox() {
            let arr = [];

            $(".checkbox-rem").each(function () {
                if ($(this).is(":checked")) {
                    arr.push($(this).attr('data-col'));
                }
            });

            localStorage.setItem('checkedItems', JSON.stringify(arr));
        }
</script>