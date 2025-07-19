<table class="table datatable">
    <thead>
        <tr>
            <th>Purchase Date</th>
            <th>cash/Credit</th>
            <th> Relational Customer Name</th>
            <th> Accountant Name </th>
            <th> Owner Name </th>
            <th> Village </th>
            <th> Field Acre </th>
            <th> Mobile Number </th>
            <th> RST No. </th>
            <th> LOT No. </th>
            <th> GST Details </th>
            <th> Total Amount </th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach($purchase as $value)
            <tr>
                <td>{{ date('d/m/Y', strtotime($value->purchase_date)) }}</td>
                <td>{{ $value->purchase_way }}</td>
                <td>{{ $value->purchase_relation_cusm }}</td>
                <td>{{ $value->purchase_accountant }}</td>
                <td>{{ $value->purchase_owner }}</td>
                <td>{{ $value->purchase_village }}</td>
                <td>{{ $value->purchase_acre }}</td>
                <td>{{ $value->purchase_phone }}</td>
                <td>{{ $value->purchase_rst_no }}</td>
                <td>{{ $value->purchase_lot_no }}</td>
                <td>{{ $value->purchase_gst_no }}</td>
                <td>{{ $value->purchase_total }}</td>
                <td>
                    <a href="#" data-size="xl" data-url="{{ route('purchase.edit', $value->purchase_id) }}"
                        data-ajax-popup="true"
                        data-bs-toggle="tooltip"
                        title="{{ __('edit') }}"
                        data-title="{{ __('edit Purchase') }}"
                        class="btn btn-sm btn-primary">
                        <i class="ti ti-pencil"></i>
                    </a>
                    <a href="javascript:void(0)"
                        class="btn btn-sm bg-danger text-white shadow-sm"
                        title="Delete"
                        onclick="removeit('{{ route('purchase.delete', $value->purchase_id) }}')">
                        <i class="ti ti-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
