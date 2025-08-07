<table class="table datatable">
    <thead>
        <tr>
             <th> Date </th>
            <th>Farmer Name</th>
            <th>Land Owner</th>
            <th> Amount </th>
            <th> Transition Type </th>
            <th> Paid Type </th>
            <th> payment status </th>
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
                <td>{{ $value->pay_type == 0 ? ' ' : $value->pay_type}}</td>
                <td>{{ $value->pay_status }}</td>
                <td> 
                                        <a href="#" data-size="xl" data-url="#" data-ajax-popup="true"
                                            data-bs-toggle="tooltip" title="{{ __('Pending') }}" data-title="{{ __('Pending') }}"
                                            class="btn btn-sm btn-primary">
                                           Pay
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm bg-danger text-white shadow-sm" title="View"
                                            >
                                            View
                                        </a>                   
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
