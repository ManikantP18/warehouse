{{ Form::open(['url' => 'staging/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Staging Creation</h6>

    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="select_lot_no" class="form-label">Select Lot No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="select_lot_no" type="number" id="select_lot_no">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="staging_varity" class="form-label">Staging Varity</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="staging_varity" type="text" id="staging_varity">
                </div>
            </div>
        </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="godown" class="form-label">Godown</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="godown" type="text" id="godown">
                </div>
            </div>
        </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Stage No</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="stage_no" type="number" id="stage_no">
                </div>
            </div>
        </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="no_of_begs" class="form-label"> No of Begs</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="no_of_begs" type="number" id="no_of_begs">
                </div>
            </div>
        </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="staging_date" class="form-label">Staging Date</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="staging_date" type="date" id="staging_date">
                </div>
            </div>
        </div>

        
        <div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs">
            <div class="form-group">
                <label for="pay_for_staging" class="form-label">Pay for Staging </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="pay_for_staging" type="number" id="pay_for_staging">
                </div>
            </div>
        </div>

        

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Create" class="btn btn-primary">
</div>
</form>