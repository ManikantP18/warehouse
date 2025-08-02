{{ Form::open(['url' => 'company/update', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Edit Company</h6>

    <div class="row">

        
            

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="company_name" class="form-label">Company Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="company_name" type="text" id="company_name" value="{{$company[0]->company_name}}">
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="company_address" class="form-label">Company Address</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="company_address" type="text" id="company_address" value="{{$company[0]->company_address}}">
                </div>
            </div>
        </div>

        <input type="hidden" value="{{$company[0]->company_id}}" name="company_id" id="company_id">
        

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
</form>