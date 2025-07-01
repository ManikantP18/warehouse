{{ Form::model($rogring, [
    'route' => ['rogring.update', $rogring->Rogring_id],
    'method' => 'PUT',
    'class' => 'needs-validation',
    'novalidate' => true
]) }}
<div class="modal-body">
    <h6 class="sub-title">Edit Rogring</h6>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="Rogring_name" class="form-label">Rogring Name</label>
                <div class="form-icon-user">
                    {{ Form::text('Rogring_name', null, ['class' => 'form-control alwaysvisible', 'required' => true, 'id' => 'Rogring_name']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="Rogring_contcact" class="form-label">Rogring Contact No</label>
                <div class="form-icon-user">
                    {{ Form::number('Rogring_contcact', null, ['class' => 'form-control alwaysvisible', 'required' => true, 'id' => 'Rogring_contcact']) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
{!! Form::close() !!}
-