{{ Form::model($rogring, [
    'route' => ['rogring.update', $rogring->Rogring_id],
    'method' => 'PUT',
    'class' => 'needs-validation',
    'novalidate' => true
]) }}
<div class="modal-body">
    <h6 class="sub-title">Edit Rogring</h6>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="Rogring_name" class="form-label">Rogrowing Responsible</label>
                <div class="form-icon-user">
                    {{ Form::text('Rogring_name', null, ['class' => 'form-control alwaysvisible', 'required' => true, 'id' => 'Rogring_name']) }}
                </div>
            </div>
        </div>
    
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row align-items-end">

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label for="search" class="form-label">Account/Mobile No</label>
        <div class="form-icon-user">
          <input class="form-control onlyforformesrs"  name="search" type="text" id="search" placeholder="Acc No / Mobile No">
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label for="search_name" class="form-label">Farmer Name</label>
        <div class="form-icon-user">
          <input class="form-control onlyforformesrs"  name="search_name" type="text" id="search_name" placeholder="Farmer Name">
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label for="search_village" class="form-label">Village Name</label>
        <div class="form-icon-user">
          <input class="form-control onlyforformesrs"  name="search_village" type="text" id="search_village" placeholder="Village Name">
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