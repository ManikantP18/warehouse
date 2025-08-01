{{ Form::open(['url' => 'bankacc/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">

    <div class="row">

            <!-- <div class="col-lg-3 col-md-3 col-sm-12">
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

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label class="form-label d-none d-sm-block">&nbsp;</label>
        <button type="button" class="btn btn-primary w-100" onclick="searchLadger()">Search</button>
      </div>
    </div> -->

    
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
                   minlength="3"
                   maxlength="100"
                   pattern="[A-Za-z\s]+" 
                   title="Only letters and spaces are allowed"
                   value="{{$bankacc[0]->account_name	}}">
                   
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
                    value="{{$bankacc[0]->account_num	}}"
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
                    value="{{$bankacc[0]->bank_name	}}"
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
                value="{{$bankacc[0]->opening_bal	}}"
                   title="Enter a valid 10-digit Indian mobile number starting with 6, 7, 8, or 9">
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




   <div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs" id="checkbook-range-section">
    <div class="form-group">
        <label class="form-label">Checkbook Range?</label>
        <div id="checkbook-range-container">
            <!-- First Row (Default with Laravel values) -->
             @foreach($range as $val)
            <div class="row checkbook-range-row mb-2">
                <div class="col-md-3">
                    <div class="form-icon-user">
                        <label class="form-label">From Number</label>
                        <input class="form-control onlyforformesrs"
                               name="chequerange_from[]"
                               type="number"
                               placeholder="From"
                               min="1"
                               value="{{ $val->check_from }}"
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
                               value="{{ $val->check_to }}"
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
                               value="{{ $val->check_total }}"
                               readonly>
                    </div>
                </div>
                
            </div>
            @endforeach
            <div class="col-md-3 d-flex align-items-end">
                    <button type="button" class="btn btn-success add-checkbook-range">Add More</button>
            </div>
        </div>
    </div>
</div>

    </div>
</div>
<div class="modal-footer">
    <input class="form-control" required="required" name="account_id" type="hidden" id="" value="{{$bankacc[0]->account_id	}}">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="update" class="btn btn-primary">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Add More
    $(document).on('click', '.add-checkbook-range', function () {
        const row = `
        <div class="row checkbook-range-row mb-2">
            <div class="col-md-3">
                <div class="form-icon-user">
                    <label class="form-label">From Number</label>
                    <input class="form-control onlyforformesrs" name="chequerange_from[]" type="number" placeholder="From" min="1" value="0" onkeyup="totalCheck(this)">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-icon-user">
                    <label class="form-label">To Number</label>
                    <input class="form-control onlyforformesrs" name="chequerange_to[]" type="number" placeholder="To" min="1" value="0" onkeyup="totalCheck(this)">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-label">Total Check</label>
                    <input class="form-control onlyforformesrs" name="total_check[]" type="number" placeholder="Total" min="1" value="0" readonly>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-checkbook-range">Remove</button>
            </div>
        </div>`;
        $('#checkbook-range-container').append(row);
    });

    // Remove Row
    $(document).on('click', '.remove-checkbook-range', function () {
        $(this).closest('.checkbook-range-row').remove();
    });
});

// Auto Calculate Total Check
function totalCheck(el) {
    const row = $(el).closest('.checkbook-range-row');
    const from = parseInt(row.find("input[name='chequerange_from[]']").val()) || 0;
    const to = parseInt(row.find("input[name='chequerange_to[]']").val()) || 0;
    const total = (to >= from) ? (to - from + 1) : 0;
    row.find("input[name='total_check[]']").val(total);
}
</script>


       