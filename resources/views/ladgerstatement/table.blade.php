                        <div class="mt-5">Company Name : <b>{{$comp_name}}</b></div>
                        <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th> Date </th>
                                            <th>Purticulars</th>
                                            <th>vch Type</th>
                                            <th> Debit </th>
                                            <th> Credit </th>
                                            <th> Balance </th>
                                            <th>action</th>
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
                                        <td>{{ ($value->avbl_bal) > 0 ? '-'.$value->avbl_bal : abs($value->avbl_bal)}} {{$value->avbl_bal > 0 ? 'Cr' : 'Dr'}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>