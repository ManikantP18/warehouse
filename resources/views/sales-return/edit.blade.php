
{{ Form::open(['url' => 'kataparchi/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Kataparchi</h6>

    <div class="row">


            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="cash_credit" class="form-label">Cash Credit</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="cash_credit" type="text" id="cash_credit" value="{{$sales_return[0]->cash_credit}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="aadhar_no" class="form-label">Aadhar number</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" required="required" name="aadhar_no" type="text" id="aadhar_no" value="{{$sales_return[0]->aadhar_no}}">
                    </div>
                </div>
            </div>

            
            <div class="col-lg-6 col-md-6 col-sm-6 changehide">
                <div class="form-group">
                    <label for="item_sale" class="form-label">ITEM SALE</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="item_sale" type="text" id="item_sale" value="{{$sales_return[0]->item_sale}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="quantity" class="form-label"> Quntity </label>
                    <div class="form-icon-user">
                        <input class="form-control "  name="quantity" type="text" id="quantity" value="{{$sales_return[0]->quantity	}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="rate" class="form-label">RATE</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="rate" type="text" id="rate" value="{{$sales_return[0]->rate}}">
                    </div>
                </div>
            </div>

            

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="total_amount" class="form-label"> TOTAL AMOUNT </label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="total_amount" type="text" id="total_amount" value="{{$sales_return[0]->total_amount}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="GST_amount" class="form-label"> GST AMOUNT </label>
                    <div class="form-icon-user">
                        <input class="form-control "name="GST_amount" type="text" id="GST_amount" value="{{$sales_return[0]->GST_amoun}}">
                    </div>
                </div>
                </div>       
        
      <input type="hidden" name="cn_id" value="{{$sales_return[0]->cn_id}}">
        
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




