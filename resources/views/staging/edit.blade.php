{!! Form::open(['url' => route('staging.update'), 'method' => 'PUT', 'class'=>'needs-validation', 'novalidate']) !!}
<div class="modal-body">
    <input type="hidden" name="staging_id" value="{{ $staging[0]->staging_id }}">

    <h6 class="sub-title">Staging Edit</h6>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Farmer Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="farmer_name" type="text" id="farmer_name"  placeholder="Enter farmer Name" value="{{ $staging[0]->farmer_name }}" readonly>
                    <div class="invalid-feedback">Please enter a valid Name.</div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="land_owner" class="form-label">Land Owner</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="land_owner" type="text" id="land_owner"  placeholder="Enter Land Owner" value="{{ $staging[0]->land_owner }}" readonly>
                    <div class="invalid-feedback">Please enter a valid Name.</div>
                </div>
            </div>
        </div>
        {{-- Select Lot No --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="select_lot_no" class="form-label">Select Lot No.</label>
                <input class="form-control" required name="select_lot_no" type="text" min="1" id="select_lot_no" value="{{ $staging[0]->select_lot_no }}" placeholder="Enter Lot No" readonly>
                <div class="invalid-feedback">Please enter a valid lot number (greater than 0).</div>
            </div>
        </div>

        {{-- Staging Variety --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <div class="form-icon-user">
                <label for="godown" class="form-label"> Variety</label>
                <select name="staging_varity" required id="staging_varity" class="form-control" readonly>
                        
                            <option value="{{ $staging[0]->id }}">{{ $staging[0]->name }}</option>
                       
                    </select>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="godown" class="form-label"> Godown</label>
                <div class="form-icon-user">
                    <select name="godown" required id="godown" class="form-control">
                        @foreach($branch as $val)
                            <option value="{{ $val->branch_id }}"  {{$staging[0]->godown == $val->branch_id ? 'selected' : 'hidden'}}>{{ $val->branch_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Stage No --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Stage No</label>
                <input class="form-control" required name="stage_no" type="text"  id="stage_no"
                       value="{{ $staging[0]->stage_no }}" placeholder="Enter Stage No" min="1">
                <div class="invalid-feedback">Please enter a valid stage number.</div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Rst No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="rst" type="number" id="rst"  placeholder="Enter rst no." value="{{ $staging[0]->rst_no }}" readonly>
                    <div class="invalid-feedback">Please enter a valid rst.</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Final Weight</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="final_weight" type="number" id="final_weight"  placeholder="Enter final weight" value="{{ $staging[0]->final_weight }}" step="0.01" readonly>
                    <div class="invalid-feedback">Please enter a final Weight</div>
                </div>
            </div>
        </div>

        {{-- No of Bags --}}
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="no_of_begs" class="form-label">No of Bags</label>
                <input class="form-control" required name="no_of_begs" type="number" min="1" id="no_of_begs"
                       value="{{ $staging[0]->no_of_begs }}" placeholder="Enter number of bags" step="0.01">
                <div class="invalid-feedback">Please enter number of bags (greater than 0).</div>
            </div>
        </div>

        {{-- Staging Date --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="staging_date" class="form-label">Staging Date</label>
                <input class="form-control" required name="staging_date" type="date" id="staging_date"
                       value="{{ $staging[0]->staging_date }}">
                <div class="invalid-feedback">Please select a staging date.</div>
            </div>
        </div>

        {{-- Pay for Staging --}}
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="pay_for_staging" class="form-label">Pay for Staging</label>
                <input class="form-control" required name="pay_for_staging" type="number" min="1" step="0.01"
                       id="pay_for_staging" value="{{ $staging[0]->pay_for_staging }}"
                       placeholder="Enter amount">
                <div class="invalid-feedback">Please enter valid payment amount (₹).</div>
            </div>
        </div>
    <input type="hidden" name="staging_id" value="{{$staging[0]->staging_id}}">
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
{!! Form::close() !!}
<script>
(function () {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
