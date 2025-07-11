{{ Form::open(['url' => 'bankacc/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Branches Creation</h6>

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
            </select>
        </div>
    </div>
</div>


<!-- Checkbook Have -->
<div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs">
    <div class="form-group">
        <label class="form-label d-block">Checkbook Have?</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" 
                   type="radio" 
                   name="cheque_book" 
                   id="cheque_book_yes" 
                   value="yes" 
                   required>
            <label class="form-check-label" for="cheque_book_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" 
                   type="radio" 
                   name="cheque_book" 
                   id="cheque_book_no" 
                   value="no" 
                   required>
            <label class="form-check-label" for="cheque_book_no">No</label>
        </div>
    </div>
</div>

<!-- Checkbook Range -->
<div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs">
    <div class="form-group">
        <label class="form-label">Checkbook Range?</label>
        <div class="row">
            <!-- From Input -->
            <div class="col-md-6">
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" 
                           name="chequerange_from" 
                           type="number" 
                           id="chequerange_from" 
                           placeholder="From" 
                           min="1"
                           required>
                </div>
            </div>
            <!-- To Input -->
            <div class="col-md-6">
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" 
                           name="chequerange_to" 
                           type="number" 
                           id="chequerange_to" 
                           placeholder="To" 
                           min="1"
                           required>
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
    <!-- <script>
function searchLadger() {

            let searchVal = $("#search").val();
            let searchVillage = $("#search_village").val();
            let searchname = $("#search_name").val();
            $.ajax({
            url : '{{route('sellto.search')}}',
            type : 'GET',
            data : {
                searchVal : searchVal,
                searchVillage : searchVillage,
                searchname : searchname
            },
            success: function(response) {
            if (response.success && response.data) {
                 let data = response.data;

                 console.log(data)

                 let html = `
                    <select name="sellto_farmer/other" id="sellto_farmer/other" class="form-control alwaysvisible"  onchange="selectLadger(this.value)">
                    <option value=""> Select Farmer </option>`;

                data.map((value) =>{

                    html += `<option value="${value.account_id}">${value.relational_cust_name} - ${value.farm_owner_name}</option>`;

                })

                html += `</select>`;

                $('.allfarmers').html(html);

                //         $('#sellto_account_number').val(data.account_id);
                //         $('#sellto_phone').val(data.phone_number);
                //         $('#sellto_customer_name').val(data.relational_cust_name);
                //         $('#sellto_acc_holder').val(data.account_holder);
                //         $('#sellto_owner_name').val(data.farm_owner_name);
                //         $('#sellto_village').val(data.village);
                //         $('#sellto_gst_amount').val(data.gst_num);
            } else {
                alert("No matching record found.");
            }
        },
        error: function(err) {
            console.log("AJAX error:", err);
        }

        })
        }
        </script> -->