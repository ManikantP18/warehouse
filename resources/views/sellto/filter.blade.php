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
                <a href="#" data-size="xl" data-url="{{ route('sellto.edit', $value->sell_id) }}" data-ajax-popup="true"
                    data-bs-toggle="tooltip" title="{{ __('edit') }}" data-title="{{ __('edit Sells') }}"
                    class="btn btn-sm btn-primary">
                    <i class="ti ti-pencil"></i>
                </a>
                <a href="javascript:void(0)" class="btn btn-sm bg-danger text-white shadow-sm" title="Delete"
                    onclick="removeit('{{ route('sellto.delete', $value->sell_id) }}')">
                    <i class="ti ti-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
</tbody>