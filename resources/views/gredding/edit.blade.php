{{ Form::open(['url' => 'kataparchi/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Kataparchi</h6>

    <div class="row">
            
            

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="farmar_name" class="form-label">Customer Name</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" required pattern="[A-Za-z ]+" title="Only alphabets are allowed" name="farmar_name" type="text" id="farmar_name" value="{{$gredding[0]->farmar_name}}">
                    </div>
                </div>
            </div>

            
            <div class="col-lg-6 col-md-6 col-sm-6 changehide">
                <div class="form-group">
                    <label for="land_owner" class="form-label">land owner name</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="land_owner" type="text" id="land_owner" value="{{$gredding[0]->land_owner}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="gredding_lot_no" class="form-label"> Select LOT no. </label>
                    <div class="form-icon-user">
                        <input class="form-control " required pattern="[A-Za-z ]+" title="Only letters allowed" name="gredding_lot_no" type="text" id="gredding_lot_no" value="{{$gredding[0]->gredding_lot_no	}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="gredding_verity" class="form-label">Verity</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="gredding_verity" type="text" id="gredding_verity" value="{{$gredding[0]->gredding_verity}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="gredding_godown" class="form-label">Godown</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="gredding_godown" type="text" id="gredding_godown" value="{{$gredding[0]->gredding_godown}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="gred_stage_no" class="form-label"> Stage NO.</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="gred_stage_no" type="text" id="gred_stage_no" value="{{$gredding[0]->gred_stage_no}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="final_waigth" class="form-label"> Final Waigth </label>
                    <div class="form-icon-user">
                        <input class="form-control " title="Only letters allowed" name="final_waigth" type="text" id="final_waigth" value="{{$gredding[0]->final_waigth	}}" >
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="gred_no_begs" class="form-label">No Of Begs </label>
                    <div class="form-icon-user">
                        <select name="gred_no_begs" class="form-control " id="gred_no_begs">
                            <option value="{{$gredding[0]->gred_no_begs}}"> {{$kataparchi[0]->veriety}} </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="gredded_quantity" class="form-label">Gredded Quantity </label>
                    <div class="form-icon-user">
                        <input class="form-control "  title="Only letters allowed" name="gredded_quantity" type="text" id="gredded_quantity" value="{{$gredding[0]->gredded_quantity}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="undersize_quantity" class="form-label">Undersize Quantity </label>
                    <div class="form-icon-user">
                        <input class="form-control "  title="Only letters allowed" name="undersize_quantity" type="text" id="undersize_quantity" value="{{$gredding[0]->undersize_quantity}}">
                    </div>
                </div>
            </div>

             <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="pay_gredding" class="form-label">Pay For Gredding</label>
                    <div class="form-icon-user">
                        <input class="form-control "  title="Only letters allowed" name="pay_gredding" type="text" id="pay_gredding" value="{{$gredding[0]->pay_gredding}}">
                    </div>
                </div>
            </div>
        
        
      <input type="hidden" name="gredding_id" value="{{$gredding[0]->gredding_id}}">
        
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
</form>

<script>
    
</script>




