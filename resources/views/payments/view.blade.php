{{ Form::open(['url' => 'payment/view', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">payment</h6>

    <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="relational_cust_name" class="form-label">Relational Customer Name</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" name="relational_cust_name" type="text" id="relational_cust_name" value="{{$Ldata[0]->relational_cust_name}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="account_holder" class="form-label"> Aadhar No.</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible"  name="account_holder" type="text" id="account_holder" value="{{$Ldata[0]->account_holder}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="farm_owner_name" class="form-label">Land Owner Name</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" name="farm_owner_name" type="text" id="farm_owner_name" value="{{$Ldata[0]->farm_owner_name}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="village" class="form-label">Village Name</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" name="village" type="text" id="village" value="{{$Ldata[0]->village}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="opening_balance" class="form-label">opening Balance</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" name="kp_reopening_balancel_name" type="text" id="opening_balance" value="{{$Ldata[0]->opening_balance}}">
                    </div>
                </div>
            </div>






        <!-- Multy Products Sells -->

<!-- @for($i = 0; $i < count($selleditems); $i++)
     <div class="row mb-12">
                

                <div class="col-md-2">
                <div class="form-group">
                    <label>Sell Item</label>
                    <select name="item[]" id="purchase_item_{{ $i }}" class="form-control allitems" onchange="selectItem({{$i}}, this)">
                    <option value="" hidden>Select Item</option>
                    @foreach($items as $value)
                        <option value="{{ $value->id }}" {{ $value->id == $selleditems[$i]->selled_item ? 'selected' : ''}}>
                            {{ $value->name }}
                        </option>
                    @endforeach
                    </select>
                </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="quantity" class="form-label">QUANTITY</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="quantity" type="text" id="quantity" value="{{$CNdata[0]->quantity}}" >
                        </div>
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">
                    <label>Unit</label>
                    <select class="form-control" name="unit[]" id="purchase_unit_{{ $i }}">
                        
                        @foreach($units as $value)
                        <option value="{{ $value->id }}" {{ $value->id == $selleditems[$i]->sell_unit ? 'selected' : ''}}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
           
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="rate" class="form-label">RATE</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="rate" type="number" id="rate" value="{{$CNdata[0]->rate}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="total_amount" class="form-label">TOTAL AMOUNT</label>
                        <input class="form-control onlyforformesrs"  name="total_amount" id="total_amount" value="{{$CNdata[0]->total_amount}}">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="GST_amount" class="form-label">GST AMOUNT</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible"  name="GST_amount" type="text" id="GST_amount" value="{{$CNdata[0]->GST_amount}}" >
                        </div>
                    </div>
                </div>
               </div> 
            </div>
     @endfor    -->
               
           
        
        
      <input type="hidden" name="pay_id" value="pay_id">
        
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    
</div>
</form>

<script>
    
</script>




