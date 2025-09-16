<table class="table table-bordered table-striped">
            <thead>
                <tr>
                    @if(isset($list[0]->invoice_no))
                        <th>Invoice No</th>
                    @endif
                    <th>Date</th>
                    <th>Ladger</th>
                    <th>Product</th>
                    @if(isset($list[0]->selled_quantity))
                        <th>Quantity</th>
                        <th>Returned</th>
                    @endif
                    @if(isset($list[0]->amount))
                        <th>Amount</th>
                    @endif
                    @if(isset($list[0]->rate))
                        <th>Rate</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($list as $row)
                    <tr>
                        @if(isset($row->invoice_no))
                            <td>{{ $row->invoice_no }}</td>
                        @endif
                        <td>{{ $row->sell_created_date ?? $row->return_date }}</td>
                        <td>{{ $row->sell_relation_customer.'-'.$row->sell_property_owner }} ({{$row->sell_village}})</td>
                        <td>{{ $row->product_name ?? '-' }}</td>
                        @if(isset($row->selled_quantity))
                            <td>{{ $row->selled_quantity }}</td>
                            <td>{{ $row->return_qty }}</td>
                        @endif
                        @if(isset($row->amount))
                            <td>₹{{ $row->amount }}</td>
                        @endif
                        @if(isset($row->rate))
                            <td>{{ $row->rate }}</td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Records Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>