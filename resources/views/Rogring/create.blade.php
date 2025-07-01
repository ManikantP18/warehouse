{{ Form::open(['url' => 'Rogring/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Rogring Creation</h6>

    <div class="row">

    
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="Rogring_name" class="form-label">Rogring Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible"required minlength="2" pattern="^[A-Za-z\s]+$" title="Only alphabets and spaces allowed" name="Rogring_name" type="text" id="Rogring_name">
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