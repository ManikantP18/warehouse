
{{ Form::open(['url' => 'SalesReturn/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}



<div class="modal-body">
    <h6 class="sub-title">SalesReturn</h6>
    
    <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="cash_credit" class="form-label">Cash Credit</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="cash_credit" type="text" id="cash_credit" value="{{$CNdata[0]->cash_credit}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="aadhar_no" class="form-label">Aadhar number</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" required="required" name="aadhar_no" type="text" id="aadhar_no" value="{{$CNdata[0]->aadhar_no}}">
                    </div>
                </div>
            </div>

            
            <div class="row mb-3">
                
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>ITEM</label>
                        <select class="form-control" name="item[]" id="item">
                            <option value="" hidden>Select ITEM</option>
                            @foreach($item as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>          
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="quantity" class="form-label">QUANTITY</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="quantity" type="text" id="quantity" value="{{$CNdata[0]->quantity}}" >
                        </div>
                    </div>
                </div>

                 <div class="col-lg-4">
                    <div class="form-group">
                        <label>UNIT</label>
                        <select class="form-control" name="unit[]" id="unit">
                            <option value="" hidden>Select Unit</option>
                            @foreach($units as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="rate" class="form-label">RATE</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="rate" type="number" id="rate" value="{{$CNdata[0]->rate}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="total_amount" class="form-label">TOTAL AMOUNT</label>
                        <input class="form-control onlyforformesrs"  name="total_amount" id="total_amount" value="{{$CNdata[0]->total_amount}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="GST_amount" class="form-label">GST AMOUNT</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible"  name="GST_amount" type="text" id="GST_amount" value="{{$CNdata[0]->GST_amount}}" >
                        </div>
                    </div>
                </div>
               </div> 
            </div>
        <input type="hidden" name="cn_id" value="{{$CNdata[0]->cn_id}}">

      <input type="hidden" name="cn_id" value="{{$CNdata[0]->cn_id}}">
        
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
</form>

<script>
    

    // Attach events to update the pure weight on input
   // document.getElementById('kp_vehicle_wight').addEventListener('input', calculatePureWeight);
   // document.getElementById('kp_only_vechicle_w').addEventListener('input', calculatePureWeight);
</script>




