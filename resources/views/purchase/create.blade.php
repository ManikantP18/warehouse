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
            <select name="purchase_to" id="purchase_to" class="form-control" onchange="toggleFields()">
              <option value="farmer">Farmer</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Mode of Invoice</label>
           <select name="purchase_way" id="purchase_way" class="form-control">
  <option value="" hidden selected>Select Mode</option>
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
            <label>Owner name</label>
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
            <input type="text" class="form-control" name="purchase_rst_no" id="purchase_rst_no" required >
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>LOT No.</label>
            <input type="text" class="form-control" name="purchase_lot_no" id="purchase_lot_no" required>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Village</label>
            <input type="text" class="form-control" name="purchase_village" id="purchase_village" required readonly>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Account Number</label>
            <input type="text" class="form-control" name="purchase_account_no" id="purchase_account_no" required readonly>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Bank Name</label>
           <select name="purchase_item" id="purchase_item" class="form-control" >
              <option value="" hidden>Select Bank</option>

              @foreach($banks AS $value) :
                  <option value="{{$value->account_id}}">{{$value->bank_name}}</option>
              @endforeach
              
            </select>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>IFSC Code</label>
            <input type="text" class="form-control" name="purchase_ifsc" id="purchase_ifsc" required readonly>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Branch</label>
            <input type="text" class="form-control" name="purchase_branch" id="purchase_branch" required readonly>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>GST No.</label>
            <input type="text" class="form-control" name="purchase_gst_no" id="purchase_gst_no" required>
          </div>
        </div>

        <!-- <div class="col-md-6 changehide">
          <div class="form-group">
            <label>GST No.</label>
            <input type="text" class="form-control" name="purchase_gst_no" id="purchase_gst_no" required>
          </div>
        </div> -->

        <div class="col-md-6">
          <div class="form-group">
            <label>Purchase Item</label>
            <select name="purchase_item" id="purchase_item" class="form-control" >
              <option value="" hidden>Select Item</option>

              @foreach($products AS $value) :
                  <option value="{{$value->id}}">{{$value->name}} {{$value->quantity}} KG</option>
              @endforeach
              
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Quantity</label>
            <input type="number" class="form-control" name="purchase_quantity" id="purchase_quantity" value="1" required onkeyup="autofill()" onchange="autofill()" value="1">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Rate</label>
            <input type="number" onkeyup="autofill()" class="form-control" name="purchase_rate" id="purchase_rate" required value='0'>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Total Amount</label>
            <input type="number" class="form-control" name="purchase_total" id="purchase_total" required value='0'>
          </div>
        </div>

        <!--
        <div class="col-md-6">
          <div class="form-group">
            <label>Cash Amount</label>
            <input type="number" class="form-control" name="sellto_cash_amount" id="sellto_cash_amount" required value='0' onkeyup="autofill()">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Credit Amount</label>
            <input type="number" class="form-control" name="sellto_Credit_amount" id="sellto_Credit_amount" required value='0' onkeyup="autofill()">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Remaining Amount</label>
            <input type="number" class="form-control" name="sellto_Remaining_amount" id="sellto_Remaining_amount" required value='0'>
          </div>
        </div>

        -->

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
    function toggleFields() {
  let val = document.getElementById('sellto_farmer/other').value;
  $('.changehide').show();
  if (val === 'other') $('.changehide').hide();
}

function searchLadger() {
  let searchVal = $('#search').val();
  let searchVillage = $('#search_village').val();
  let searchname = $('#search_name').val();
  $.ajax({
    url: '{{ route('purchase.search') }}',
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
        $('#form-fields-wrapper').hide(); // still hide until selection
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
        data: { account_id: d.ladger_id},
        success: function(res) {
          if (res.success && res.data) {
              $('#purchase_rst_no').val(res.data[0].kp_rstno);
          }
        }

      });
      $('#purchase_way').val(d.purchase_way);
      $('#purchase_relation_cusm').val(d.relational_cust_name);
      $('#spurchase_accountant').val(d.account_holder);
      $('#purchase_owner').val(d.farm_owner_name);
      $('#purchase_village').val(d.village);
      $('#purchase_acre').val(d.farm_area_acre);
      $('#purchase_phone').val(d.phone_number);
       
      $('#purchase_lot_no').val(d.purchase_lot_no);
      $('#purchase_account_no').val(d.account_number);
      $('#purchas_bank_name').val(d.bank_name);
      $('#purchase_ifsc').val(d.ifsc_code);
      $('#purchase_branch').val(d.branch);
      $('#purchase_gst_no').val(d.gst_no);

      

      $('#purchase_item').val(d.item_selled ?? '');
      
      $('#form-fields-wrapper').slideDown(); // show full form
    }
  });
}

function autofill() {
 $("#purchase_total").val(parseInt($("#purchase_quantity").val()) * parseInt($("#purchase_rate").val()));
}

// ✅ Initial setup to hide form
$(document).ready(function () {
  $('#form-fields-wrapper').hide();
  $('.allfarmers').hide();
});
</script>