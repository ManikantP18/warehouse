{{ Form::open(['url' => 'staging/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Staging Creation</h6>
    <div class="row">

        <!-- Select Lot No -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="select_lot_no" class="form-label">Select Lot No.</label>
                <div class="form-icon-user">
                     <select name="select_lot_no" required id="select_lot_no" class="form-control">
                        <option value="" hidden>Select Item</option>
                        @foreach($lotnumbers as $val)
                            <option value="{{ $val->purchase_lot_no }}">{{ $val->purchase_lot_no }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Staging Variety -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="staging_varity" class="form-label">Staging Variety</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="staging_varity" type="text" id="staging_varity" pattern="^[A-Za-z0-9\s\-]+$" placeholder="Enter Variety Name">
                    <div class="invalid-feedback">Please enter a valid variety (letters, numbers, hyphen).</div>
                </div>
            </div>
        </div>

        <!-- Godown -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="godown" class="form-label">Godown</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="godown" type="text" id="godown" placeholder="Enter Godown Name">
                    <div class="invalid-feedback">Please enter the godown name.</div>
                </div>
            </div>
        </div>

        <!-- Stage No -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Stage No</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="stage_no" type="number" id="stage_no" min="1" placeholder="Enter Stage No">
                    <div class="invalid-feedback">Please enter a valid stage number.</div>
                </div>
            </div>
        </div>

        <!-- No of Bags -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="no_of_begs" class="form-label">No of Bags</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="no_of_begs" type="number" id="no_of_begs" min="1" placeholder="Enter number of bags">
                    <div class="invalid-feedback">Please enter number of bags.</div>
                </div>
            </div>
        </div>

        <!-- Staging Date -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="staging_date" class="form-label">Staging Date</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="staging_date" type="date" id="staging_date">
                    <div class="invalid-feedback">Please select a valid staging date.</div>
                </div>
            </div>
        </div>

        <!-- Pay for Staging -->
        <div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs">
            <div class="form-group">
                <label for="pay_for_staging" class="form-label">Pay for Staging</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required name="pay_for_staging" type="number" id="pay_for_staging" min="0" step="0.01" placeholder="Enter amount">
                    <div class="invalid-feedback">Please enter valid amount for staging.</div>
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


<script>
(function () {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
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
