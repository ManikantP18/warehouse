{{ Form::open(['url' => 'bankacc/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">

    <div class="row">


    
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                
                    <div class="form-icon-user allfarmers">
                        
                    </div>
                </div>
            </div>


            
<!-- Account Holder Name -->
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
        <label for="account_name" class="form-label">Account Holder Name</label>
        <div class="form-icon-user">
            <input class="form-control alwaysvisible" 
                   name="account_name" 
                   type="text" 
                   id="account_name" 
                   required
                   pattern="[A-Za-z\s]+"
                   title="Only letters and spaces are allowed">
        </div>
    </div>
</div>


<!-- Ledger Contact No -->
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
        <label for="account_num" class="form-label">Account Number</label>
        <div class="form-icon-user">
            <input class="form-control alwaysvisible" 
                   name="account_num" 
                   type="text" 
                   id="account_num" 
                   required 
               
                   title="Enter a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9">
        </div>
    </div>
</div>
        <!-- bank name -->
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
        <label for="account_num" class="form-label">Bank name</label>
        <div class="form-icon-user">
            <input class="form-control alwaysvisible" 
                   name="Bank_name" 
                   type="text" 
                   id="Bank_name" 
                   required 
              
                   title="Enter a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9">
        </div>
    </div>
</div>

 <!-- Opening Bal -->
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
        <label for="account_num" class="form-label">Opening Balance</label>
        <div class="form-icon-user">
            <input class="form-control alwaysvisible" 
                   name="opening_bal" 
                   type="number" 
                   id="opening_bal" 
                   required 
              
                   title="Enter a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9" value="0">
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
        <label for="company_id" class="form-label">Company Name</label>
        <div class="form-icon-user">
            <select class="form-control alwaysvisible" name="company_id"  id="company_id"  required >
                @foreach($company as $val)
                <option value="{{$val->company_id}}">{{$val->company_name}}</option>
                @endforeach
            </select>
              
        </div>
    </div>
</div>


<!-- Account Type -->
<div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs">
    <div class="form-group">
        <label for="account_type" class="form-label">Account Type</label>
        <div class="form-icon-user">
            <select class="form-control onlyforformesrs" 
                    name="account_type" 
                    id="account_type" 
                    
                    required>
                <option value="">Select Account Type</option>
                <option value="CC LIMIT">CC LIMIT</option>
                <option value="CURRENT">CURRENT</option>
                <option value="LOAN">LOAN</option>
                <option value="SAVING">SAVING</option>
                <option value="WHR">WHR</option>
                <option value="OTHER">OTHER</option>
            </select>
        </div>
    </div>
</div>


<!-- Checkbook Have -->
<div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs">
    <div class="form-group">
        <label class="form-label d-block">Checkbook Have?</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input cheque_book" 
                   type="radio" 
                   name="cheque_book" 
                   id="cheque_book_yes" 
                   value="yes" 
                   required>
            <label class="form-check-label" for="cheque_book_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input cheque_book" 
                   type="radio" 
                   name="cheque_book" 
                   id="cheque_book_no" 
                   value="no" 
                   required
                   checked>
            <label class="form-check-label" for="cheque_book_no" >No</label>
        </div>
    </div>
</div>

<div id="checkbook-range-container">
    <div class="row checkbook-range-row mb-2">
        <div class="col-md-3">
            <div class="form-icon-user">
                <label class="form-label">From Number</label>
                <input class="form-control onlyforformesrs"
                       name="chequerange_from[]"
                       type="number"
                       placeholder="From"
                       min="1"
                       value="0"
                       onkeyup="totalCheck(this)">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-icon-user">
                <label class="form-label">To Number</label>
                <input class="form-control onlyforformesrs"
                       name="chequerange_to[]"
                       type="number"
                       placeholder="To"
                       min="1"
                       value="0"
                       onkeyup="totalCheck(this)">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Total Check</label>
                <input class="form-control onlyforformesrs"
                       name="total_check[]"
                       type="number"
                       placeholder="Total"
                       min="1"
                       value="0"
                       readonly>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <!-- First row has NO remove button -->
            <button type="button" class="btn btn-success add-checkbook-range">Add More</button>
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Create" class="btn btn-primary">
</div>

</form>
   
<script>
    $(document).ready(function () {

    // Show/hide checkbook range section based on radio selection
    $(document).off('change', '.cheque_book').on('change', '.cheque_book', function () {
        if ($(this).val() === "yes") {
            $("#checkbook-range-container").show();
            $("input[name='chequerange_from[]'], input[name='chequerange_to[]']").prop("required", true);
        } else {
            $("#checkbook-range-container").hide();
            $("input[name='chequerange_from[]'], input[name='chequerange_to[]']").prop("required", false).val("");
            $("input[name='total_check[]']").val("");
        }
    });

    // Trigger initial state
    $(".cheque_book:checked").trigger("change");

    // Add More button — one event only
    $(document).off('click', '.add-checkbook-range').on('click', '.add-checkbook-range', function () {
        const row = `
        <div class="row checkbook-range-row mb-2">
            <div class="col-md-3">
                <div class="form-icon-user">
                    <label class="form-label">From Number</label>
                    <input class="form-control onlyforformesrs"
                           name="chequerange_from[]"
                           type="number"
                           placeholder="From"
                           min="1"
                           value="0"
                           onkeyup="totalCheck(this)">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-icon-user">
                    <label class="form-label">To Number</label>
                    <input class="form-control onlyforformesrs"
                           name="chequerange_to[]"
                           type="number"
                           placeholder="To"
                           min="1"
                           value="0"
                           onkeyup="totalCheck(this)">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-label">Total Check</label>
                    <input class="form-control onlyforformesrs"
                           name="total_check[]"
                           type="number"
                           placeholder="Total"
                           min="1"
                           value="0"
                           readonly>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-checkbook-range">Remove</button>
            </div>
        </div>`;
        $('#checkbook-range-container').append(row);
    });

    // Remove button
    $(document).off('click', '.remove-checkbook-range').on('click', '.remove-checkbook-range', function () {
        $(this).closest('.checkbook-range-row').remove();
    });
});

// Calculate total checks for that row
function totalCheck(el) {
    const row = $(el).closest('.checkbook-range-row');
    const from = parseInt(row.find("input[name='chequerange_from[]']").val()) || 0;
    const to = parseInt(row.find("input[name='chequerange_to[]']").val()) || 0;
    const total = (to >= from) ? (to - from + 1) : 0;
    row.find("input[name='total_check[]']").val(total);
}

</script>