{{ Form::open(['url' => 'sellto/add', 'method' => 'post', 'class'=>'needs-validation','novalidate', 'onsubmit' => 'return checkmode()']) }}
<div class="modal-body">
  <div class="row">

    <!-- Search Fields -->
    <div class="col-12">
      <div class="row align-items-end">
        <div class="col-md-6">
          <div class="form-group">
            <label for="search" class="form-label">Account/Mobile No</label>
            <input class="form-control" name="search" type="text" id="search" placeholder="Acc No / Mobile No">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="search_name" class="form-label">Farmer Name</label>
            <input class="form-control" name="search_name" type="text" id="search_name" placeholder="Farmer Name">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="search_village" class="form-label">Village Name</label>
            <input class="form-control" name="search_village" type="text" id="search_village" placeholder="Village Name">
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

    <!-- Dynamic Farmer Selection -->
    <div class="col-12">
      <div class="form-group">
        <div class="form-icon-user allfarmers"></div>
      </div>
    </div>

    <!-- Form Fields Wrapper -->
    <div id="form-fields-wrapper" style="display: none;">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Sell To</label>
            <select name="sellto_farmer/other" id="sellto_farmer/other" class="form-control" onchange="toggleFields()">
              <option value="farmer">Farmer</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Mode of Invoice</label>
            <select name="sellto_cash/credit" id="sellto_cash" class="form-control">
              <option value="cash">Cash</option>
              <option value="credit">Credit</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Account Number</label>
            <input type="text" class="form-control" name="sellto_account_number" id="sellto_account_number" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="tel" class="form-control" name="sellto_phone" id="sellto_phone" required pattern="[0-9]{10}" maxlength="10">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Customer Name</label>
            <input type="text" class="form-control" name="sellto_customer_name" id="sellto_customer_name" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Aadhar Number</label>
            <input type="text" class="form-control" name="sellto_acc_holder" id="sellto_acc_holder" required>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Field Owner Name</label>
            <input type="text" class="form-control" name="sellto_owner_name" id="sellto_owner_name" required>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Village</label>
            <input type="text" class="form-control" name="sellto_village" id="sellto_village" required>
          </div>
        </div>

        <!-- Multy Products Selling Nikku -->

        @for($i = 0; $i < count($items); $i++)
  <div class="row mb-3 ms-1" style="background-color: #c6c6c6;">

    <div class="col-md-2">
      <div class="form-group">
        <label>Sell Item</label>
        <select
          name="sellto_item_selled[]"
          class="form-control sellto_item_selled sellto_item_selled_{{$i}}"
          dataid="{{$i}}"
          onchange="selectItem({{$i}}, this)">
          <option value="">Select Item</option>
          @foreach($items as $val)
            <option value="{{ $val->pid }}">{{ $val->item_name }}</option>
          @endforeach
       </select>


      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Quantity</label>
         <input type="number" class="form-control sellto_quantity" name="sellto_quantity[]" id="sellto_quantity_{{$i}}" value="1" required onkeyup="autofill({{$i}})" onchange="autofill({{$i}})">
      </div>
    </div>

      <div class="col-md-2">
        <div class="form-group">
          <label>Unit</label>
          <select class="form-control" name="purchase_unit[]" id="purchase_unit_{{ $i }}">
            <option value="" hidden>Select Unit</option>
            @foreach($units as $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
          </select>
        </div>
      </div>


    <div class="col-md-2">
      <div class="form-group">
        <label>Rate</label>
        <input type="number" class="form-control sellto_rate" onchange="autofill({{$i}})" name="sellto_rate[]" id="sellto_rate_{{$i}}" required value='0'>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>GST</label>
        <input type="number" class="form-control sellto_gst_amount" name="sellto_gst_amount[]" onchange="autofill({{$i}})" id="sellto_gst_amount_{{$i}}" required value='0'>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Total Amount</label>
        <input type="number" class="form-control purchase_total" name="sell_total[]" id="purchase_total_{{ $i }}" required value="0">
      </div>
    </div>

  </div>
@endfor

<!-- End of multy products selling -->

        <div class="col-md-6">
          <div class="form-group">
            <label>Receive Cash</label>
            <input type="number" class="form-control" name="sellto_cash_amount" id="sellto_cash_amount" required value='0' onkeyup="calculateAmt()">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Receive Bank</label>
            <input type="number" class="form-control" name="sellto_Credit_amount" id="sellto_Credit_amount" required value='0' onkeyup="calculateAmt()">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Bank Name</label>
            <select name="bank_name" id="bank_name" class="form-control">
             @foreach($banks as $val)
                <option value="{{ $val->account_id }}">{{ $val->bank_name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Remaining Amount</label>
            <input type="number" class="form-control" name="sellto_Remaining_amount" id="sellto_Remaining_amount" required value='0'>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Total Amount</label>
            <input type="number" class="form-control sellto_total_amount" name="sellto_total_amount" id="sellto_total_amount" required value='0'>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
  <input type="submit" value="Create" class="btn btn-primary" id="savebtn">
</div>
{{ Form::close() }}

<input type="hidden" id="itemsdata" value="{{ json_encode($items) }}">

<script>

function calculateAmt(){
  let sellto_cash_amount = parseInt($("#sellto_cash_amount").val());
  let sellto_Credit_amount = parseInt($("#sellto_Credit_amount").val());
  let sellto_total_amount = parseInt($("#sellto_total_amount").val());

  let remainAmt = sellto_total_amount - sellto_cash_amount - sellto_Credit_amount;

  $("#sellto_Remaining_amount").val(remainAmt)


}

function toggleFields() {
  let val = document.getElementById('sellto_farmer/other').value;
  $('.changehide').show();
  if (val === 'other') {
    $('.changehide').hide();
    makeFieldsEditable(); // Allow editing for "Other"
  }
}

function makeFieldsEditable() {
  $('#sellto_account_number, #sellto_phone, #sellto_customer_name, #sellto_acc_holder, #sellto_owner_name, #sellto_village, #sellto_gst_amount')
    .prop('readonly', false)
    .val('');
}

function searchLadger() {
  let searchVal = $('#search').val();
  let searchVillage = $('#search_village').val();
  let searchname = $('#search_name').val();
  $.ajax({
    url: '{{ route('sellto.search') }}',
    type: 'GET',
    data: { searchVal, searchVillage, searchname },
    success: function(response) {
      if (response.success && response.data) {
        let html = '<select class="form-control" onchange="selectLadger(this.value)"><option value="">Select Farmer</option>';
        response.data.forEach(d => {
          html += `<option value="${d.account_id}">${d.relational_cust_name} - ${d.farm_owner_name}</option>`;
        });
        html += '</select>';
        $('.allfarmers').html(html).show();
        $('#form-fields-wrapper').hide();
      } else {
        alert("No matching record found.");
      }
    }
  });
}

function selectLadger(id) {
  $.get('{{ route('sellto.search') }}', { searchVal: id }, function(response) {
    if (response.success && response.data.length > 0) {
      let d = response.data[0];
      $('#sellto_account_number').val(d.account_id).prop('readonly', true);
      $('#sellto_phone').val(d.phone_number).prop('readonly', true);
      $('#sellto_customer_name').val(d.relational_cust_name).prop('readonly', true);
      $('#sellto_acc_holder').val(d.account_holder).prop('readonly', true);
      $('#sellto_owner_name').val(d.farm_owner_name).prop('readonly', true);
      $('#sellto_village').val(d.village).prop('readonly', true);
      $('#sellto_gst_amount').val(d.gst_num).prop('readonly', true);
      $('#form-fields-wrapper').slideDown();
    }
  });
}

$(document).ready(function () {
  $('#form-fields-wrapper').hide();
  $('.allfarmers').hide();
});

function addMoreItem() {
 let $parent = $('#item-wrapper');
  let $clone = $parent.find('.item-group').first().clone();

  // Clear all inputs, selects, and textareas inside the clone
  $clone.find('input, select, textarea').val('');

  // Append the clone

  $parent.append('<hr> ');
  $parent.append($clone);

  $('.sellto_item_selled').last().attr('dataid', '2');

  $('.sellto_quantity').last().val(1);


}
</script>

<script>
  // Move this function OUTSIDE of $(document).ready
  function selectItem(did, el) {
  const item = String($(el).val()); // convert to string to avoid type mismatch
console.log(item)
  // 🔄 Reset if empty
  if (!item) {
    $('#sellto_rate_' + did).val('');
    $('#sellto_gst_amount_' + did).val('');
    $('#purchase_total_' + did).val('');
    autofill();
    return;
  }

  let isDuplicate = false;

  $(".sellto_item_selled").each(function () {
    const currentVal = String($(this).val());
    const currentDid = String($(this).attr("dataid"));

    // ✅ Skip current select box
    if (currentDid != String(did)) { console.log(currentVal, item)
      if (currentVal === item) {
        isDuplicate = true;
        return false; // break loop
      }
    }
  });

  if (isDuplicate) {
    alert("Same item already selected.");
    $(el).val(''); // Reset value
    $('#sellto_rate_' + did).val('');
    $('#sellto_gst_amount_' + did).val('');
    $('#purchase_total_' + did).val('');
    autofill();
    return;
  }

  // ✅ Proceed with calculations
  const qty = parseFloat($('#sellto_quantity_' + did).val()) || 0;
  const data = JSON.parse($('#itemsdata').val());
  const product = data.find(d => String(d.pid) === item);

  if (product) {
    const salePrice = parseFloat(product.sale_price) || 0;
    const taxRate = parseFloat(product.rate) || 0;

    $('#sellto_rate_' + did).val(salePrice);

    const ratetotal = salePrice * qty;
    const gst = (ratetotal / 100) * taxRate;

    $('#purchase_total_' + did).val((ratetotal + gst).toFixed(2));
    $('#sellto_gst_amount_' + did).val(gst.toFixed(2));

    autofill();

   /* const cash = parseFloat($('#sellto_cash_amount').val()) || 0;
    const credit = parseFloat($('#sellto_Credit_amount').val()) || 0;
    const remaining = (ratetotal + gst) - (cash + credit);

    $('#sellto_Remaining_amount').val(remaining.toFixed(2));*/
  }
}



    function autofill(id) {
      
        $("#purchase_total_" + id).val((parseInt($("#sellto_quantity_" + id).val()) * parseInt($("#sellto_rate_" + id).val())) + parseInt($("#sellto_gst_amount_" + id).val()));

      let total = 0;

       $(".purchase_total").each(function() {
          let val = parseFloat($(this).val()) || 0;
          total += val;
        });

        $("#sellto_total_amount").val(total);
    }

  function checkmode() {
    let mode = $('#sellto_cash').val(); // Use correct ID of your select box
    let remaining = parseFloat($('#sellto_Remaining_amount').val()) || 0;

    if (mode.toLowerCase() === 'cash' && remaining > 0) {
      alert('For cash invoices, the remaining amount must be zero.');
      
      

      setTimeout(() => {

      $("#savebtn").removeAttr("disabled");
        
      }, 500);

      return false;
    }

    return true;
}

</script>

