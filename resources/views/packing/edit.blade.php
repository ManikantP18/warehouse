{{ Form::open(['url' => 'packing/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title"> Edit Packing</h6>

    <div class="row">

        
            

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="farmer_name" class="form-label">Farmer Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="farmer_name" type="text" id="farmer_name">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="land_owner" class="form-label">Land Owner</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="land_owner" type="text" id="land_owner">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="verity" class="form-label">Verity</label>
                <div class="form-icon-user">
                    <select class="form-control alwaysvisible" required name="verity" type="text" id="verity">
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="Gredded_qty" class="form-label">Gredded Quantity</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="Gredded_qty" type="text" id="Gredded_qty">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="total_bag" class="form-label">Total Bag</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="total_bag" type="text" id="total_bag">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="packing_pay" class="form-label">Pay for Packing</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="packing_pay" type="text" id="packing_pay">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="rst_no" class="form-label">Rst No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="rst_no" type="text" id="rst_no">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Stage No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="stage_no" type="text" id="stage_no">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="final_weight" class="form-label">Final Weight</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="final_weight" type="text" id="final_weight">
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="godown" class="form-label">Godown Name</label>
                <div class="form-icon-user">
                    <select class="form-control alwaysvisible" required name="godown" type="text" id="godown">
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="company" class="form-label">Comapny Name</label>
                <div class="form-icon-user">
                    <select class="form-control alwaysvisible" required name="company" type="text" id="company">
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>

        

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
</form>