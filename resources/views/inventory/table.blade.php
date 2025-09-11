    <table class="table datatable" id="purchasetable">
        <thead>
            <tr>
                <th>Company</th>
                                
                <th> Category </th>

                <th> Item Name </th>

                <th> Lot No. </th>
                <th> Stock Qty. </th>

                <th> Available Qty. </th>
                                
                <th>Created Date</th>
            </tr>
            </thead>
                    <tbody>

                        @foreach($pInfo as $value)
                        <tr>
                           
                            <td>{{ $value->company_name }}</td>
                            <td>{{ $value->category_name }}</td>
                            <td>{{ $value->item_name }}</td>
                            <td>{{ $value->lot_no}}</td>
                            <td>{{ $value->stock}}</td>
                            <td>{{ $value->avbl_stock}}</td>
                             <td>{{ date('d/m/Y h:i a', strtotime($value->created_date)) }}</td>

                        @endforeach
                            
                    </tbody>
            </table>