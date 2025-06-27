{{ Form::open(['url' => 'branches/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Branches Creation</h6>

    <div class="row">

        
            

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="branch_name" class="form-label">Branch Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="branch_name" type="text" id="branch_name">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="branch_cont" class="form-label">Branch Contact No</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="branch_cont" type="number" id="branch_cont">
                </div>
            </div>
        </div>

        
        <div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs">
            <div class="form-group">
                <label for="branch_address" class="form-label"> Branch Address </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="branch_address" type="text" id="branch_address">
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