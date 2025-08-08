<table class="table datatable">
    <thead>
        <tr>
             <th> Date </th>
            <th>Farmer Name</th>
            <th>Land Owner</th>
            <th> Amount </th>
            <th> Transition Type </th>
            <th> Pay Type </th>
            <th> payment status </th>
            <th> Record Type </th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payment as $value)
            <tr>
                <td>{{ date('d/m/Y', strtotime($value->created_at)) }}</td>
                <td>{{ $value->relational_cust_name }}</td>
                <td>{{ $value->farm_owner_name }}</td>
                <td>{{ $value->amount }}</td>
                <td>{{ $value->tr_type == 1 ? 'IN' : 'OUT'}}</td>
                @php
                    $payTypeText = match($value->pay_type) {
                        1 => 'Cash',
                        2 => 'Bank',
                        3 => 'Both',
                        default => '',
                    };
                @endphp

                <td>{{ $payTypeText }}</td>
                <td>{{ $value->pay_status }}</td>
                @php
                    if ($value->sell_id > 0) {
                        $type = 'Sells';
                    } elseif ($value->purchase_id > 0) {
                        $type = 'Purchase';
                    } else {
                        $type = 'Opening Balance';
                    }
                @endphp

                <td>{{ $type }}</td>


                
                <td> 
                                        <a href="#" data-size="xl" data-url="{{ route('payment.pay', $value->pay_id) }}" data-ajax-popup="true"
                                            data-bs-toggle="tooltip" title="{{ __('Payment') }}" data-title="{{ __('Pending') }}"
                                            class="btn btn-sm btn-primary">
                                           Pay
                                        </a>
                                       
                                        <a href="#" data-size="xl" data-url=" {{ route('payment.view', $value->pay_id) }}"               data-ajax-popup="true"
                                            data-bs-toggle="tooltip" title="{{ __('Pending') }}" data-title="{{ __('Pending') }}"
                                            class="btn btn-sm btn-primary">
                                            View
                                        </a>             
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
