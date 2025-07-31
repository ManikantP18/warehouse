{{ Form::open(['url' => 'company/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Company Creation</h6>

    <div class="row">

        
            

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="company_name" class="form-label">Company Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="company_name" type="text" id="company_name">
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="company_address" class="form-label">Company Address</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="company_address" type="text" id="company_address">
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