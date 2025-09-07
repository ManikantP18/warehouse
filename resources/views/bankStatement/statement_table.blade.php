@if(count($statement) > 0)
    <div class="mt-5">Bank Name : <b>{{ $comp_name }}</b></div>

    <table class="table datatable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Particulars</th>
                <th>Vch Type</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($statement as $value)
            <tr>
                <td>{{ date('d/m/Y', strtotime($value->created_date)) }}</td>
                <td>{{ $value->prtclr }}</td>
                <td>{{ $value->pay_type }}</td>
                <td>{{ $value->dr_amt }}</td>
                <td>{{ $value->cr_amt }}</td>
                <td>{{ $value->avbl_bal }} {{ $value->avbl_bal > 0 ? 'Cr' : 'Dr' }}</td>
                <td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p class="text-center mt-3">No statement found for this bank.</p>
@endif
