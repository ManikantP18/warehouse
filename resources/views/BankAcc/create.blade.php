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

<!-- Checkbook Range -->
<div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs" id="checkbook-range-section" style="display: none;">
    <div class="form-group">
        <label class="form-label">Checkbook Range?</label>
        <div class="row">
            <!-- From Input -->
            <div class="col-md-6">
                <div class="form-icon-user">
                     <lable class="form-label">From Number</lable>
                    <input class="form-control onlyforformesrs" 
                           name="chequerange_from" 
                           type="number" 
                           id="chequerange_from" 
                           placeholder="From" 
                           min="1"
                           value="0"
                           onkeyup="totalCheck()">
                </div>
            </div>
            <!-- To Input -->
            <div class="col-md-6">
                <div class="form-icon-user">
                     <lable class="form-label">To Number</lable>
                    <input class="form-control onlyforformesrs" 
                           name="chequerange_to" 
                           type="number" 
                           id="chequerange_to" 
                           placeholder="To" 
                           min="1"
                           value="0"
                           onkeyup="totalCheck()">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <lable class="form-label">Total Check</lable>
                    <input class="form-control onlyforformesrs" 
                           name="total_check" 
                           type="number" 
                           id="total_check" 
                           placeholder="total_check" 
                           min="1"
                           value="0">
                </div>
            </div>
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


$(document).ready(function () {
    // Listen to change event on radio buttons with class .cheque_book
    $(".cheque_book").on("change", function () {
        if ($(this).val() === "yes") {
            $("#checkbook-range-section").show();
            $("#chequerange_from, #chequerange_to").prop("required", true);
        } else {
            $("#checkbook-range-section").hide();
            $("#chequerange_from, #chequerange_to")
                .prop("required", false)
                .val(""); // clear values if hiding
        }
    });

    // Trigger the change event on page load to set initial state
    $(".cheque_book:checked").trigger("change");
});

function totalCheck() {
    let from =  $("#chequerange_from").val();
    let to =    $("#chequerange_to").val();
    let totalCheck = to - from ;
    $('#total_check').val(totalCheck);
}

</script>
