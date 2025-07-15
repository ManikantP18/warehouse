


{{ Form::open(['url' => 'ledger/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Ledger Creation</h6>

    <div class="form-group mb-3">
        <label for="ledger_type" class="form-label">Select Ledger Type</label>
        <select name="ledger_type" id="ledger_type" class="form-select" required onchange="showhide(this.value)">
            <option value="farmer">Farmer</option>
            <option value="others">Others</option>
        </select>
    </div>

    {{-- FARMER FORM SECTION --}}
    <div class="row farmer-form-section">
    <div class="col-md-6">
    <label>Relational Cust. Name</label>
    <input class="form-control" name="relational_cust_name" type="text" required pattern="^[A-Za-z\s]+$" title="Only alphabets and spaces allowed">
</div>

    <div class="col-md-6">
        <label>Aadhar No.</label>
        <input class="form-control" name="account_holder" type="number" required minlength="2" pattern="^[A-Za-z\s]+$" title="Only alphabets and spaces allowed">
    </div>

    <div class="col-md-6">
        <label>Farmer Owner Name</label>
        <input class="form-control" name="farm_owner_name" type="text" required minlength="2" pattern="^[A-Za-z\s]+$" title="Only alphabets and spaces allowed">
    </div>

    <div class="col-md-6">
        <label>Village</label>
        <input class="form-control" name="village" type="text" required minlength="2" pattern="^[A-Za-z\s ]+$" title="Only alphabets and spaces allowed" >
    </div>

     <div class="col-md-6">
        <label>Bhumi Gram</label>
        <input class="form-control" name="bhumi_gram" type="text" required minlength="2" pattern="^[A-Za-z\s ]+$" title="Only alphabets and spaces allowed" >
    </div>

    <div class="col-md-6">
        <label>Farmer Area Acre</label>
        <input class="form-control" name="farm_area_acre" type="number" required min="0" step="0.01">
    </div>
    <div class="col-md-6">
        <label>Khasra No.</label>
        <input class="form-control" name="khasra_no" type="number" required>
    </div>
    <div class="col-md-6">
        <label>Opening Balance</label>
        <input class="form-control" name="opening_balance" type="number" required>
    </div>

   <div class="col-md-6">
    <label>Phone No.</label>
    <input 
        class="validphone form-control @error('phone_number') is-invalid @enderror" 
        name="phone_number" 
        type="tel" 
        required 
        pattern="^[6-9][0-9]{9}$" 
        value="{{ old('phone_number') }}"
        title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9" onchange="validphone(this.value)"
    >

    @error('phone_number')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
</div>


    <div class="col-md-6">
        <label>Bank Account Name</label>
        <input class="form-control" name="bank_account_name" type="text" required minlength="2" pattern="^[A-Za-z\s]+$" title="Only alphabets and spaces allowed">
    </div>

    <div class="col-md-6">
        <label>Account No.</label>
        <input class="form-control" name="account_number" type="text" required pattern="\d{9,18}" title="Enter 9 to 18 digit account number">
    </div>

    <div class="col-md-6">
        <label>Bank Name</label>
        <input class="form-control" name="bank_name" type="text" required minlength="2" pattern="^[A-Za-z\s]+$" title="Only alphabets and spaces allowed" >
    </div>

    <div class="col-md-6">
        <label>IFSC Code</label>
        <input class="form-control" name="ifsc_code" type="text" required pattern="^[A-Z]{4}0[A-Z0-9]{6}$" title="Enter valid IFSC code (e.g., SBIN0001234)">
    </div>

    <div class="col-md-6">
        <label>Branch</label>
        <input class="form-control" name="branch" type="text" required minlength="2" pattern="^[A-Za-z\s]+$" title="Only alphabets and spaces allowed">
    </div>

    <div class="col-md-6">
        <label>GST Number</label>
        <input class="form-control" name="gst_num"  required  title="Enter 15-digit GST number">
    </div>
</div>


<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Create" class="btn btn-primary">
</div>
{{ Form::close() }}
<script>
function showhide(value) {
   
    let formar_fields = `<div class="col-md-6">
            <label>Relational Cust. Name</label>
            <input class="form-control" name="relational_cust_name" required type="text">
        </div>

        <div class="col-md-6">
            <label>Account Holder</label>
            <input class="form-control" name="account_holder" required type="text">
        </div>

        <div class="col-md-6">
            <label>Farmer Owner Name</label>
            <input class="form-control" name="farm_owner_name" type="text">
        </div>

        <div class="col-md-6">
            <label>Village</label>
            <input class="form-control" name="village" required type="text">
        </div>

        <div class="col-md-6">
        <label>Bhumi Gram</label>
        <input class="form-control" name="bhumi_gram" type="text" required minlength="2" pattern="^[A-Za-z\s ]+$" title="Only alphabets and spaces allowed" >
      </div>

        <div class="col-md-6">
            <label>Farmer Area Acre</label>
            <input class="form-control" name="farm_area_acre" type="number">
        </div>
        <div class="col-md-6">
            <label>Khasra No.</label>
            <input class="form-control" name="khasra_no" type="number" required 
           pattern="^[6-9][0-9]{9}$" 
           title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
        </div>

       <div class="col-md-6">
    <label>Phone No.</label>
    <input class="validphone form-control @error('phone_number') is-invalid @enderror" 
           name="phone_number" 
           type="tel" 
           required 
           pattern="^[6-9][0-9]{9}$" 
           value="{{ old('phone_number') }}"
           title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9" onchange="validphone(this.value)">


    @error('phone_number')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
</div>


        <div class="col-md-6">
            <label>Bank Account Name</label>
            <input class="form-control" name="bank_account_name" type="text">
        </div>

        <div class="col-md-6">
            <label>Account No.</label>
            <input class="form-control" name="account_number" type="number">
        </div>

        <div class="col-md-6">
            <label>Bank Name</label>
            <input class="form-control" name="bank_name" type="text">
        </div>

        <div class="col-md-6">
            <label>IFSC Code</label>
            <input class="form-control" name="ifsc_code" type="text">
        </div>

        <div class="col-md-6">
            <label>Branch</label>
            <input class="form-control" name="branch" type="number">
        </div>`;

        let other_fields = `<div class="col-md-6">
    <label>Relational Cust. Name</label>
    <input class="form-control" name="relational_cust_name" type="text" required
           pattern="^[A-Za-z ]+$"
           title="Only letters and spaces are allowed. Special characters are not permitted.">
</div>

        <div class="col-md-6">
            <label>Aadhar No.</label>
            <input class="form-control" name="account_holder" type="number" required 
           pattern="^[6-9][0-9]{9}$" 
           title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9">
        </div>

        <div class="col-md-6">
            <label>Village</label>
            <input class="form-control" name="village" type="text" required  pattern="^[A-Za-z\s ]+$" title="Only alphabets and spaces allowed">
        </div>

       
       <div class="col-md-6">
    <label>Phone No.</label>
    <input class="validphone form-control @error('phone_number') is-invalid @enderror" 
           name="phone_number" 
           type="tel" 
           required 
           pattern="^[6-9][0-9]{9}$" 
           value="{{ old('phone_number') }}"
           title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9" onchange="validphone(this.value)">

    @error('phone_number')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
</div>



        <div class="col-md-6">
            <label>GST Number</label>
            <input class="form-control" name="gst_num" required title="Enter 15-digit GST number" >
        </div>`;

    if (value === 'farmer') {
        $(".farmer-form-section").html(formar_fields)
    } else {
        $(".farmer-form-section").html(other_fields)
    }
}

function validphone(val){
    $.ajax({
            url : '{{route('ledger.verifyphone')}}',
            type : 'GET',
            data : {
                mobileno : val
            },
            success: function(response) {

                if(response != 'ok'){
                    alert(`${val} phone no.is already exist with another ledger!`);
                    $(".validphone").val('');
                }

            }
        });
}
</script>
