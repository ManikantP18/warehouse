{{ Form::open(['url' => 'Rogring/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Rogring Creation</h6>

    <div class="row">

        
            

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="Rogring_name" class="form-label">Rogring Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="Rogring_name" type="text" id="Rogring_name">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="Rogring_contact" class="form-label">Rogring Contact No</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="Rogring_contcact" type="number" id="Rogring_contact">
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