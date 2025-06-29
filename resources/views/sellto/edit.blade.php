{{ Form::open(['url' => 'sellto/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Sells Creation</h6>

    <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                <label for="sellto_farmer/other" class="form-label">Sell To</label>
                <div class="form-icon-user">
                    <select name="sellto_farmer/other" id="sellto_farmer/other" class="form-control alwaysvisible" required="required" onchange="toggleFields()">
                        <option value="farmer">Farmer</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                <label for="sellto_cash/credit" class="form-label">Payment</label>
                <div class="form-icon-user">
                    <select name="sellto_cash/credit" id="sellto_cash/credit" class="form-control alwaysvisible" required="required">
                        <option value="cash">Cash</option>
                        <option value="credit">Credit</option>
                    </select>
                </div>
            </div>
            </div>

           <div class="col-lg-12 col-md-12 col-sm-12">
  <div class="row align-items-end">
    
    <div class="col-lg-10 col-md-9 col-sm-9">
      <div class="form-group">
        <label for="search" class="form-label">Search By</label>
        <div class="form-icon-user">
          <input class="form-control" required name="search" type="text" id="search" placeholder="Khata Number / Mobile Number">
        </div>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 col-sm-3">
      <div class="form-group">
        <label class="form-label d-none d-sm-block">&nbsp;</label>
        <button type="button" class="btn btn-primary w-100" onclick="searchLadger()">Search</button>
      </div>
    </div>

  </div>
</div>

        

             <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_account_number" class="form-label">Account Number</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible"
                    required
                    name="sellto_account_number"
                    type="text"
                    id="sellto_account_number"
                    value="{{$sellto[0]->sell_account_number}}"
                    >

                </div>
            </div>
        </div>

          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_phone" class="form-label">Mobile Number</label>
                <div class="form-icon-user">
                     <input class="form-control onlyforformesrs"
                    required
                    name="sellto_phone"
                    type="tel"
                    pattern="[0-9]{10}"
                    maxlength="10"
                    title="Enter 10-digit mobile number"
                    id="sellto_phone"
                    value="{{$sellto[0]->sell_phone}}"
                    >
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_customer_name" class="form-label">Customer Name</label>
                <div class="form-icon-user">
                     <input class="form-control alwaysvisible" required pattern="[A-Za-z ]+" title="Only alphabets are allowed" name="sellto_customer_name" type="text" id="sellto_customer_name" value="{{$sellto[0]->sell_relation_customer}}">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_acc_holder" class="form-label">Account Holder Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="sellto_acc_holder" type="text" id="sellto_acc_holder" value="{{$sellto[0]->sell_account_name}}">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 changehide">
            <div class="form-group">
                <label for="sellto_owner_name" class="form-label"> Field Owner Name</label>
                <div class="form-icon-user">
                     <input class="form-control onlyforformesrs" required="required" name="sellto_owner_name" type="text" id="sellto_owner_name" value="{{$sellto[0]->sell_property_owner}}">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_village" class="form-label"> Village </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required pattern="[A-Za-z ]+" title="Only letters allowed" name="sellto_village" type="text" id="sellto_village" value="{{$sellto[0]->sell_village	}}">
                </div>
            </div>
        </div>
        
       

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_item_selled" class="form-label">Item Selled</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="sellto_item_selled" type="text" id="sellto_item_selled" value="{{$sellto[0]->item_selled	}}">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_quantity" class="form-label"> Quantity </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="sellto_quantity" type="text" id="sellto_quantity" value="{{$sellto[0]->sell_quantity}}">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_rate" class="form-label"> Rate</label>
                <div class="form-icon-user">
                      <input class="form-control onlyforformesrs" required name="sellto_quantity" type="number" min="1" step="any" title="Enter a valid number" id="sellto_quantity" value="{{$sellto[0]->sell_rate}}">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_total_amount" class="form-label">Total Amount</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required name="sellto_total_amount" type="number" min="0" step="0.01"  title="Enter total amount"  id="sellto_total_amount" value="{{$sellto[0]->sell_total_ammount}}">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_gst_amount" class="form-label">GST Amount</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required  name="sellto_gst_amount" type="number" min="0" step="0.01" title="Enter GST amount" id="sellto_gst_amount" value="{{$sellto[0]->sell_gst_ammount	}}">
                    <input class="form-control" required="required" name="sell_id" type="hidden" id="" value="{{$sellto[0]->sell_id	}}">
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

<>
  <script>
    (() => {
      'use strict'

      const forms = document.querySelectorAll('.needs-validation')

      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()
        function toggleFields() {

            let val = document.getElementById('sellto_farmer/other').value;

            $('.changehide').show();
           
            if(val == 'other') {
                $('.changehide').hide();
            }
        }

        function searchLadger() {

            let searchVal = $("#search").val();
            

            $.ajax({
            url : '{{route('sellto.search')}}',
            type : 'GET',
            data : {
                searchVal : searchVal,
            },
            success: function(response) {
            if (response.success && response.data) {
                let data = response.data;
                        $('#sellto_account_number').val(data.account_id);
                        $('#sellto_phone').val(data.phone_number);
                        $('#sellto_customer_name').val(data.relational_cust_name);
                        $('#sellto_acc_holder').val(data.account_holder);
                        $('#sellto_owner_name').val(data.farm_owner_name);
                        $('#sellto_village').val(data.village);
                        $('#sellto_gst_amount').val(data.gst_num);
            } else {
                alert("No matching record found.");
            }
        },
        error: function(err) {
            console.log("AJAX error:", err);
        }

        })
        }
        
        


</script>