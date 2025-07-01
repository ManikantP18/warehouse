{{ Form::open(['url' => 'sellto/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
  <div class="row">

    <div class="col-12">
      <div class="row align-items-end">

        <div class="col-md-6">
          <div class="form-group">
            <label for="search" class="form-label">Account/Mobile No</label>
            <input class="form-control onlyforformesrs" name="search" type="text" id="search" placeholder="Acc No / Mobile No">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="search_name" class="form-label">Farmer Name</label>
            <input class="form-control onlyforformesrs" name="search_name" type="text" id="search_name" placeholder="Farmer Name">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="search_village" class="form-label">Village Name</label>
            <input class="form-control onlyforformesrs" name="search_village" type="text" id="search_village" placeholder="Village Name">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label d-none d-sm-block">&nbsp;</label>
            <button type="button" class="btn btn-primary w-100" onclick="searchLadger()">Search</button>
          </div>
        </div>

      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_farmer/other" class="form-label">Sell To</label>
        <select name="sellto_farmer/other" id="sellto_farmer/other" class="form-control alwaysvisible" required onchange="toggleFields()">
          <option value="farmer">Farmer</option>
          <option value="other">Other</option>
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_cash/credit" class="form-label">Payment</label>
        <select name="sellto_cash/credit" id="sellto_cash/credit" class="form-control alwaysvisible" required>
          <option value="cash">Cash</option>
          <option value="credit">Credit</option>
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_account_number" class="form-label">Account Number</label>
        <input class="form-control alwaysvisible" required name="sellto_account_number" type="text" id="sellto_account_number" value="{{$sellto[0]->sell_account_number}}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_phone" class="form-label">Mobile Number</label>
        <input class="form-control onlyforformesrs" required name="sellto_phone" type="tel" pattern="[0-9]{10}" maxlength="10" title="Enter 10-digit mobile number" id="sellto_phone" value="{{$sellto[0]->sell_phone}}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_customer_name" class="form-label">Customer Name</label>
        <input class="form-control alwaysvisible" required pattern="[A-Za-z ]+" title="Only alphabets are allowed" name="sellto_customer_name" type="text" id="sellto_customer_name" value="{{$sellto[0]->sell_relation_customer}}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_acc_holder" class="form-label">Account Holder Name</label>
        <input class="form-control alwaysvisible" required name="sellto_acc_holder" type="text" id="sellto_acc_holder" value="{{$sellto[0]->sell_account_name}}">
      </div>
    </div>

    <div class="col-md-6 changehide">
      <div class="form-group">
        <label for="sellto_owner_name" class="form-label">Field Owner Name</label>
        <input class="form-control onlyforformesrs" required name="sellto_owner_name" type="text" id="sellto_owner_name" value="{{$sellto[0]->sell_property_owner}}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_village" class="form-label">Village</label>
        <input class="form-control onlyforformesrs" required pattern="[A-Za-z ]+" title="Only letters allowed" name="sellto_village" type="text" id="sellto_village" value="{{$sellto[0]->sell_village}}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_item_selled" class="form-label">Item Selled</label>
        <select name="sellto_item_selled" id="sellto_item_selled" class="form-control onlyforformesrs" onchange='autofill()'>
          <option value="{{$sellto[0]->item_selled}}" hidden>Select Item</option>
          @foreach($items AS $val):
            <option value="{{$val->id}}">{{$val->name}} - {{$val->quantity}} KG</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_quantity" class="form-label">Quantity</label>
        <input class="form-control onlyforformesrs" required name="sellto_quantity" type="text" id="sellto_quantity" value="{{$sellto[0]->sell_quantity}}" onkeyup="autofill()" onchange="autofill()">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_rate" class="form-label">Rate</label>
        <input class="form-control onlyforformesrs" required name="sellto_quantity" type="number" min="1" step="any" title="Enter a valid number" id="sellto_quantity" value="{{$sellto[0]->sell_rate}}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_total_amount" class="form-label">Total Amount</label>
        <input class="form-control onlyforformesrs" required name="sellto_total_amount" type="number" min="0" step="0.01" title="Enter total amount" id="sellto_total_amount" value="{{$sellto[0]->sell_total_ammount}}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_gst_amount" class="form-label">GST Amount</label>
        <input class="form-control onlyforformesrs" required name="sellto_gst_amount" type="number" min="0" step="0.01" title="Enter GST amount" id="sellto_gst_amount" value="{{$sellto[0]->sell_gst_ammount}}">
        <input class="form-control" required name="sell_id" type="hidden" value="{{$sellto[0]->sell_id}}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label>Cash Amount</label>
        <input type="number" class="form-control" name="sellto_cash_amount" id="sellto_cash_amount" required value="{{$sellto[0]->cash_amount}}" onkeyup="autofill()">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label>Credit Amount</label>
        <input type="number" class="form-control" name="sellto_Credit_amount" id="sellto_Credit_amount" required value="{{$sellto[0]->credit_amount}}" onkeyup="autofill()">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label>Remaining Amount</label>
        <input type="number" class="form-control" name="sellto_Remaining_amount" id="sellto_Remaining_amount" required value="{{$sellto[0]->remaining_amount}}" >
      </div>
    </div>

  </div>
</div>
<div class="modal-footer">
  <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
  <input type="submit" value="Update" class="btn btn-primary">
</div>
{{ Form::close() }}
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

  $.ajax({
    url: '{{ route("sellto.search") }}',
    type: 'GET',
    data: {
      searchVal: searchVal
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
        $('#sellto_cash_amount').val(data.cash_amount);
        $('#sellto_Credit_amount').val(data.credit_amount);
        $('#sellto_Remaining_amount').val(data.remaining_amount);

        $('#form-fields-wrapper').slideDown(); // optional if using wrapper
      } else {
        alert("No matching record found.");
      }
    },
    error: function(err) {
      console.log("AJAX error:", err);
    }
  });
}

function autofill() {
  let item = $("#sellto_item_selled").val();
  let qty = parseFloat($("#sellto_quantity").val()) || 0;
  let data = JSON.parse($("#itemsdata").val());

  let product = data.find(d => d.id == item);
  if (product) {
    let rate = parseFloat(product.sale_price) || 0;
    let gstRate = parseFloat(product.rate) || 0;

    let ratetotal = rate * qty;
    let gst = (ratetotal / 100) * gstRate;

    $("#sellto_rate").val(rate);
    $("#sellto_total_amount").val((ratetotal + gst).toFixed(2));
    $("#sellto_gst_amount").val(gst.toFixed(2));

    let cash = parseFloat($("#sellto_cash_amount").val()) || 0;
    let credit = parseFloat($("#sellto_Credit_amount").val()) || 0;
    let remaining = (ratetotal + gst) - (cash + credit);

    $("#sellto_Remaining_amount").val(remaining.toFixed(2));
  }
}



</script> 