{{ Form::open(['url' => route('ledger.update'), 'method' => 'PUT', 'class'=>'needs-validation','novalidate']) }}

<div class="modal-body">
    <h6 class="sub-title">Ladger Creation</h6>

    <div class="row">
        <input type="hidden" name="ladger_id" value="{{ $ledger[0]->ladger_id}}">


        <div class="form-group mb-3">
    <label for="ledger_type" class="form-label">Select Ledger Type</label>
    <select name="ledger_type" id="ledger_type" class="form-select" required onchange="showhide(this.value)">
        <option value="">-- Select Type --</option>
        <option value="farmer">Farmer</option>
        <option value="others">Others</option>
    </select>
</div>  

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="ladger_id " class="form-label">relational cust. name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="relational_cust_name" type="text" id="relational_cust_name" value="{{$ledger[0]->relational_cust_name }}">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Aadhar No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="account_holder" type="number" id="account_holder" value="{{$ledger[0]->account_holder }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Farmer Owner name </label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="farm_owner_name" type="text" id="farm_owner_name" value="{{$ledger[0]->farm_owner_name }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Khasra No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="khasra_no" type="text" id="khasra_no" value="{{$ledger[0]->khasra_no}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Bhumi Gram</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="bhumi_gram" type="text" id="bhumi_gram" value="{{$ledger[0]->bhumi_gram}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Opening Balance</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="opening_balance" type="number" id="opening_balance" value="{{$ledger[0]->opening_balance}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Village</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="village" type="text" id="village" value="{{$ledger[0]->village }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Farmer Area acre</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="farm_area_acre" type="number" id="farm_area_acre" value="{{$ledger[0]->farm_area_acre }}" step="0.01">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 ">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Phone No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="phone_number" type="number" id="phone_number" value="{{$ledger[0]->phone_number }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow ">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Bank Account name </label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="bank_account_name" type="text" id="bank_account_name" value="{{$ledger[0]->bank_account_name }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Account No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="account_number" type="number" id="account_number" value="{{$ledger[0]->account_number }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label"> Bank Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="bank_name" type="text" id="bank_name" value="{{$ledger[0]->bank_name }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">IFSC code</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="ifsc_code" type="text" id="ifsc_code" value="{{$ledger[0]->ifsc_code }}">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 hideshow">
            <div class="form-group">
                <label for="ladger_type	" class="form-label">Branch </label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="branch" type="text" id="branch" value="{{$ledger[0]->branch }}">
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
</form>

<script>
    function showhide(ledger_type){
       // let ledger_type = $("#ledger_type").val();

        

        $(".hideshow").hide();

        if(ledger_type == 'farmer'){
            $(".hideshow").show();
        }
    }
</script>     