{{ Form::open(['url' => 'purchase/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
  <div class="row">

    <!-- Search Fields -->
    <div class="col-12">
      <div class="row align-items-end">
        <div class="col-md-6">
          <div class="form-group">
            <label for="search" class="form-label">Account/Mobile No</label>
            <input class="form-control" name="search" type="text" id="search" placeholder="Acc No / Mobile No" >
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
            <label for="search_owner" class="form-label">Land Owner</label>
            <input class="form-control" name="search_owner" type="text" id="search_owner" placeholder="Owner Name">
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
            <select id="purchase_to" class="form-control" onchange="toggleFields()">
              <option value="farmer" selected>Farmer</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Mode of Invoice</label>
              <select name="purchase_way" id="purchase_way" class="form-control">
                <option value="cash">Cash</option>
                <option value="credit">Credit</option>
              </select>
          </div>
        </div>


        <div class="col-md-6">
          <div class="form-group">
            <label>Aadhar Number </label>
            <input type="text" class="form-control" name="purchase_accountant" id="spurchase_accountant" required readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Relational Customer name</label>
            <input type="text" class="form-control" name="purchase_relation_cusm" id="purchase_relation_cusm" required readonly>
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group">
            <label>Land Owner name</label>
            <input type="text" class="form-control" name="purchase_owner" id="purchase_owner" required readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="tel" class="form-control" name="purchase_phone" id="purchase_phone" required pattern="[0-9]{10}" maxlength="10" readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Acre</label>
            <input type="text" class="form-control" name="purchase_acre" id="purchase_acre" required readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>RST No.</label>
            <input type="text" class="form-control" name="purchase_rst_no" id="purchase_rst_no"  >
          </div>
        </div>

        <div class="col-md-6 ">
          <div class="form-group">
            <label>LOT No.</label>
            <input type="text" class="form-control" name="purchase_lot_no" id="purchase_lot_no" required>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="form-group">
            <label>Village</label>
            <input type="text" class="form-control" name="purchase_village" id="purchase_village" required readonly>
          </div>
        </div>

        <div class="col-md-6 ">
          <div class="form-group">
            <label>Account Number</label>
            <input type="text" class="form-control" name="purchase_account_no" id="purchase_account_no" required readonly>
          </div>
        </div>

        <div class="col-md-6 ">
          <div class="form-group">
            <label>Bank Name</label>
           <input type="text" class="form-control" name="purchas_bank_name" id="purchas_bank_name" required readonly>
          </div>
        </div>

        <div class="col-md-6 ">
          <div class="form-group">
            <label>IFSC Code</label>
            <input type="text" class="form-control" name="purchase_ifsc" id="purchase_ifsc" required readonly>
          </div>
        </div>

        <div class="col-md-6 ">
          <div class="form-group">
            <label>Branch</label>
            <input type="text" class="form-control" name="purchase_branch" id="purchase_branch" required readonly>
          </div>
        </div>

        <div class="col-md-6 changehide ">
          <div class="form-group changehide" style="display: none;">
            <label>GST No.</label>
            <input type="text" class="form-control" name="purchase_gst_no" id="purchase_gst_no">
          </div>
        </div>

        
   <!-- Wrapper for purchase item rows -->
<div id="item-wrapper">

  <!-- Initial Row -->
  <div class="row mb-3 item-group" style="background-color:#f2f2f2; padding:10px; border-radius:5px;">

    <div class="col-md-3">
      <div class="form-group">
        <label>Purchase Item</label>
        <select name="purchase_item[]" id="purchase_item_0" class="form-control allitems" onchange="handleChage(0)">
          <option value="" hidden>Select Item</option>
          @foreach($products as $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Pure Wigth</label>
        <input type="number" class="form-control" name="purchase_quantity[]" id="purchase_quantity_0" value="1" required onkeyup="autofill(0)" onchange="autofill(0)" step="0.01">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Unit</label>
        <select class="form-control" name="purchase_unit[]" id="purchase_unit_0">
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
        <input type="number" class="form-control" name="purchase_rate[]" id="purchase_rate_0" step="0.01" value="0" onkeyup="autofill(0)">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Total</label>
        <input type="number" class="form-control" name="purchase_total[]" id="purchase_total_0" required value="0" step="0.01">
      </div>
    </div>

    <!-- 🗑 Remove Button -->
    <div class="col-md-1">
      <div class="form-group">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger form-control" onclick="removeRow(this)">🗑</button>
      </div>
    </div>

  </div>
</div>

<!-- Add More Button -->
<div class="mt-2">
  <button type="button" class="btn btn-primary" onclick="addMorePurchaseRow()">+ Add More</button>
</div>

      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
  <input type="submit" value="Create" class="btn btn-primary">
</div>
{{ Form::close() }}
<script>
 


function handleChage(flag) {
  let val = $("#purchase_item_" + flag).val();

  let isDuplicate = false;

  $(".allitems").each(function () {
    // Fix: Remove space in '!='
    if ($(this).attr('id') !== 'purchase_item_' + flag && $(this).val() !== '') {
      if ($(this).val() === val) {
        isDuplicate = true;
        return false; // break out of loop
      }
    }
  });

  if (isDuplicate) {
    alert('Same item already selected');
    $("#purchase_item_" + flag).val(''); // reset the value
  }
}


function searchLadger() {
  let searchVal = $('#search').val();
  let searchVillage = $('#search_village').val();
  let searchname = $('#search_name').val();
  let searchowner = $('#search_owner').val();
  let all = 'yes';
  $.ajax({
    url: '{{ route('purchase.search') }}',
    type: 'GET',
    data: { searchVal, searchVillage, searchname,searchowner, all },
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
  $.get('{{ route('purchase.search') }}', { searchVal: id }, function(response) { 
    if (response.success && response.data) {
      let d = response.data[0];
     
      $.ajax({
        url: '{{ route('purchase.getrst') }}',
        type: 'GET',
        data: { account_id: d.account_id},
        success: function(res) {
          if (res.success && res.data) {
              $('#purchase_rst_no').val(res.data[0].kp_rstno);
          }
        }

      });
     
      $('#purchase_relation_cusm').val(d.relational_cust_name);
      $('#spurchase_accountant').val(d.account_holder);
      $('#purchase_owner').val(d.farm_owner_name);
      $('#purchase_village').val(d.village);
      $('#purchase_acre').val(d.farm_area_acre);
      $('#purchase_phone').val(d.phone_number);
       
      $('#purchase_lot_no').val(d.purchase_lot_no);
      $('#purchase_account_no').val(d.account_number);
      $('#purchas_bank_name').val(d.ladgers_bank);
      $('#purchase_ifsc').val(d.ifsc_code);
      $('#purchase_branch').val(d.branch);
      $('#purchase_gst_no').val(d.gst_no);

      

      $('#purchase_item').val(d.item_selled ?? '');
      
      $('#form-fields-wrapper').slideDown(); // show full form
    }
  });
}

function autofill(id) {
 $("#purchase_total_"+id).val(parseInt($("#purchase_quantity_"+id).val()) * parseInt($("#purchase_rate_"+id).val()));
}

// ✅ Initial setup to hide form
$(document).ready(function () {
  $('#form-fields-wrapper').hide();
  $('.allfarmers').hide();
});
</script>


<script>
let rowIndex = 1;

function addMorePurchaseRow() {
  let $wrapper = $('#item-wrapper');
  let $clone = $wrapper.find('.item-group').first().clone();

  // Clear values and update IDs
  $clone.find('input, select').each(function () {
    let $el = $(this);
    let oldId = $el.attr('id');

    if (oldId) {
      let newId = oldId.replace(/\d+/, rowIndex);
      $el.attr('id', newId);
    }

    // Reset value
    $el.val('');

    // Update function bindings
    if ($el.is('select') && $el.hasClass('allitems')) {
      $el.attr('onchange', 'handleChage(' + rowIndex + ')');
    }

    if ($el.attr('name') === 'purchase_quantity[]') {
      $el.attr('onkeyup', 'autofill(' + rowIndex + ')');
      $el.attr('onchange', 'autofill(' + rowIndex + ')');
    }

    if ($el.attr('name') === 'purchase_rate[]') {
      $el.attr('onkeyup', 'autofill(' + rowIndex + ')');
    }
  });

  $wrapper.append($clone);
  rowIndex++;
}
</script>
<script>
function removeRow(button) {
  // Only remove if more than one row exists
  if ($('.item-group').length > 1) {
    $(button).closest('.item-group').remove();
  } else {
    alert("At least one row is required.");
  }
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function toggleFields() {
    const val = document.getElementById('purchase_to').value;

    if (val === 'farmer') {
      $('.changehide').hide();
      $('#purchase_gst_no').removeAttr('required');
    } else {
      $('.changehide').show();
      $('#purchase_gst_no').attr('required', 'required');
    }
  }

  // ✅ Call once when the page loads
  document.addEventListener('DOMContentLoaded', toggleFields);
</script>

  
