{!! Form::open(['url' => route('staging.update'), 'method' => 'PUT', 'class'=>'needs-validation', 'novalidate']) !!}

<div class="modal-body">
    <input type="hidden" name="staging_id" value="{{ $staging[0]->staging_id }}">

    <h6 class="sub-title">Ladger Creation</h6>

    <div class="row">

       

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="ladger_id " class="form-label">Select Lot No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="select_lot_no" type="text" id="select_lot_no" value="{{$staging[0]->select_lot_no}}">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="staging_varity	" class="form-label">Staging Varity</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="staging_varity" type="text" id="staging_varity" value="{{$staging[0]->staging_varity }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="godown" class="form-label">Godown </label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="godown" type="text" id="godown" value="{{$staging[0]->godown }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Stage No</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="stage_no" type="text" id="stage_no" value="{{$staging[0]->stage_no}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="no_of_begs" class="form-label">No of Begs</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="no_of_begs" type="number" id="no_of_begs" value="{{$staging[0]->no_of_begs}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 ">
            <div class="form-group">
                <label for="staging_date	" class="form-label">Staging Date</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="staging_date" type="
                    date" id="staging_date" value="{{$staging[0]->staging_date}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow ">
            <div class="form-group">
                <label for="pay_for_staging	" class="form-label">Pay for Staging </label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="pay_for_staging" type="text" id="pay_for_staging" value="{{$staging[0]->pay_for_staging }}">
                </div>
            </div>
        </div>
       
        
       
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Create" class="btn btn-primary">
</div>
</form>

