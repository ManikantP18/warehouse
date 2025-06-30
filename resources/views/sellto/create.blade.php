{{ Form::open(['url' => 'sellto/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Sells Creation</h6>

    <div class="row">

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

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label class="form-label d-none d-sm-block">&nbsp;</label>
        <button type="button" class="btn btn-primary w-100" onclick="searchLadger()">Search</button>
      </div>
    </div>

  </div>
</div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                
                    <div class="form-icon-user allfarmers">
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                <label for="sellto_farmer/other" class="form-label">Sell To</label>
                <div class="form-icon-user">
                    <select name="sellto_farmer/other" id="sellto_farmer/other" class="form-control alwaysvisible"  onchange="toggleFields()">
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
                    <select name="sellto_cash/credit" id="sellto_cash/credit" class="form-control alwaysvisible" >
                        <option value="cash">Cash</option>
                        <option value="credit">Credit</option>
                    </select>
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
                    
                    id="sellto_account_number">

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
                    id="sellto_phone">

                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_customer_name" class="form-label">Customer Name</label>
                <div class="form-icon-user">
                   <input class="form-control alwaysvisible" required pattern="[A-Za-z ]+" title="Only alphabets are allowed" name="sellto_customer_name" type="text" id="sellto_customer_name">
            </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_acc_holder" class="form-label">Account Holder Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="sellto_acc_holder" type="text" id="sellto_acc_holder">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 changehide">
            <div class="form-group">
                <label for="sellto_owner_name" class="form-label"> Field Owner Name</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="sellto_owner_name" type="text" id="sellto_owner_name">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_village" class="form-label"> Village </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required pattern="[A-Za-z ]+" title="Only letters allowed" name="sellto_village" type="text" id="sellto_village">
                </div>
            </div>
        </div>
        
       

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_item_selled" class="form-label">Item Selled</label>
                <div class="form-icon-user">
                    <select name="sellto_item_selled" id="sellto_item_selled" class="form-control onlyforformesrs" onchange='autofill()'>
                        
                        <option value="" hidden>Select Item</option>
                       @foreach($items AS $val):
                        <option value="{{$val->id}}">{{$val->name}} - {{$val->quantity}} KG</option>
                       @endforeach
                    </select>
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_quantity" class="form-label"> Quantity </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required name="sellto_quantity" type="number" min="1" step="any" title="Enter a valid number" id="sellto_quantity" value="1" onkeyup="autofill()">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_rate" class="form-label"> Rate</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required name="sellto_rate" type="number" min="0.01" step="0.01" title="Enter a valid rate" id="sellto_rate">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_total_amount" class="form-label">Total Amount</label>
                <div class="form-icon-user">
                   <input class="form-control onlyforformesrs" required name="sellto_total_amount" type="number" min="0" step="0.01"  title="Enter total amount"  id="sellto_total_amount">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="sellto_gst_amount" class="form-label">GST Amount</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required  name="sellto_gst_amount" type="number" min="0" step="0.01" title="Enter GST amount" id="sellto_gst_amount">
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

<input type="hidden" id="itemsdata" value="{{json_encode($items)}}">

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


        function selectLadger(searchVal) {
            let searchVillage = '';
            let searchname = '';
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

                 console.log(data);

                        $('#sellto_account_number').val(data[0].account_id);
                        $('#sellto_phone').val(data[0].phone_number);
                        $('#sellto_customer_name').val(data[0].relational_cust_name);
                        $('#sellto_acc_holder').val(data[0].account_holder);
                        $('#sellto_owner_name').val(data[0].farm_owner_name);
                        $('#sellto_village').val(data[0].village);
                        $('#sellto_gst_amount').val(data[0].gst_num);
            } else {
                alert("No matching record found.");
            }
        },
        error: function(err) {
            console.log("AJAX error:", err);
        }

        })
        }
        
        function autofill() {

            let item = $("#sellto_item_selled").val();

            let sellto_quantity = $("#sellto_quantity").val();

            let itemdata = $("#itemsdata").val();

            let myitem = JSON.parse(itemdata).filter((values) =>{
                return values.id == item
            })

            $("#sellto_rate").val(myitem[0].sale_price);

            let totalprice = myitem[0].sale_price * sellto_quantity;

            $("#sellto_total_amount").val(totalprice)
            
        }


</script>