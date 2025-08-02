{{ Form::open(['url' => 'purchase/update', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
  <div class="row">

    <!-- Search Fields -->
    <!-- <div class="col-12">
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
    </div> -->

    <!-- Dynamic Farmer Selection -->
    <div class="col-12">
      <div class="form-group">
        <div class="form-icon-user allfarmers"></div>
      </div>
    </div>

    <!-- Form Fields Wrapper -->
    <div id="form-fields-wrapper">
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
            <label>Payment</label>
            <select name="purchase_way" id="purchase_way" class="form-control">
              <option value="cash">Cash</option>
              <option value="credit">Credit</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Accountant name</label>
            <input type="text" class="form-control" name="purchase_accountant" id="spurchase_accountant" required value="{{$purchase[0]->purchase_accountant}}" readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Relational Customer name</label>
            <input type="text" class="form-control" name="purchase_relation_cusm" id="purchase_relation_cusm" required value="{{$purchase[0]->purchase_relation_cusm}}" readonly>
          </div>
        </div>

         <div class="col-md-6">
          <div class="form-group">
            <label>Land Owner name</label>
            <input type="text" class="form-control" name="purchase_owner" id="purchase_owner" required value="{{$purchase[0]->purchase_owner}}" readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="tel" class="form-control" name="purchase_phone" id="purchase_phone" required pattern="[0-9]{10}" maxlength="10" value="{{$purchase[0]->purchase_phone}}" readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Acre</label>
            <input type="text" class="form-control" name="purchase_acre" id="purchase_acre" required value="{{$purchase[0]->purchase_acre}}" readonly>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>RST No.</label>
            <input type="text" class="form-control" name="purchase_rst_no" id="purchase_rst_no" required value="{{$purchase[0]->purchase_rst_no}}" readonly>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>LOT No.</label>
            <input type="text" class="form-control" name="purchase_lot_no" id="purchase_lot_no" required min="1" value="{{$purchase[0]->purchase_lot_no}}">
          </div>
        </div>

         <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Godown Name</label>
            
            <select name="godown" id="godown" class="form-control">
              @foreach($branches  as $val)
              <option value="{{ $val->branch_id }}"  {{$purchase[0]->godown == $val->branch_id ? 'selected' : 'hidden'}}>{{ $val->branch_name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Village</label>
            <input type="text" class="form-control" name="purchase_village" id="purchase_village" required value="{{$purchase[0]->purchase_village}}" readonly>
          </div>
        </div>

        <div class="form-group col-md-6">
            <label for="company_id" class="form-label">Company Name</label>
            <select name="company_id" id="company_id" class="form-control select" required>
                 
                @foreach($company as $key => $value)
                    <option value="{{ $value->company_id }}" {{ $value->company_id == $purchase[0]->company_id ? 'selected' : ''}}>{{ $value->company_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Account Number</label>
            <input type="text" class="form-control" name="purchase_account_no" id="purchase_account_no" required value="{{$purchase[0]->purchase_account_no}}" >
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Bank Name</label>
            <input type="text" class="form-control" name="purchas_bank_name" id="purchas_bank_name" required value="{{$purchase[0]->purchas_bank_name}}" >
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>IFSC Code</label>
            <input type="text" class="form-control" name="purchase_ifsc" id="purchase_ifsc" required value="{{$purchase[0]->purchase_ifsc}}" >
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Branch</label>
            <input type="text" class="form-control" name="purchase_branch" id="purchase_branch" required value="{{$purchase[0]->purchase_branch}}" >
          </div>
        </div>

        <div div class="form-group changehide" style="display: none;">
          <div class="form-group">
            <label>GST No.</label>
            <input type="text" class="form-control" name="purchase_gst_no" id="purchase_gst_no" required value="{{$purchase[0]->purchase_gst_no}}" readonly>
          </div>
        </div>

        <!-- <div class="col-md-6 changehide">
          <div class="form-group">
            <label>GST No.</label>
            <input type="text" class="form-control" name="purchase_gst_no" id="purchase_gst_no" required>
          </div>
        </div> -->

        <!-- Multy items purchasing -->

         @for($i = 0; $i < count($items); $i++)
  <div class="row mb-3">

    <div class="col-md-4">
      <div class="form-group">
        <label>Purchase Item</label>
        <select name="purchase_item[]" id="purchase_item_{{ $i }}" class="form-control allitems" onchange="handleChage({{ $i }})">
          <option value="" hidden>Select Item</option>
          @foreach($allproducts as $value)
            <option value="{{ $value->id }}" {{ $value->id == $items[$i]->purchased_item ? 'selected' : ''}}>
                {{ $value->name }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Quantity</label>
        <input type="number" class="form-control" name="purchase_quantity[]" id="purchase_quantity_{{ $i }}" value="{{$items[$i]->purchased_qty}}" required onkeyup="autofill({{ $i }})" onchange="autofill({{ $i }})" step="0.01">
        <span id="other_qty_val"></span>
      </div>
    </div>

      <div class="col-md-2">
        <div class="form-group">
          <label>Unit</label>
          <select class="form-control" name="purchase_unit[]" id="purchase_unit_{{ $i }}" onchange="handleChage({{ $i }})">
            <option value="" hidden>Select Unit</option>
            @foreach($units as $value)
            <option value="{{ $value->id }}" {{ $value->id == $items[$i]->purchased_unit ? 'selected' : ''}} >{{ $value->name }}</option>
            @endforeach
          </select>

          @foreach($units as $value)

              @if($value->id == $items[$i]->purchased_unit)
                  <input type="hidden" value="{{$value->short_unit}}" id="prev_unit_{{ $i }}">
              @endif

          @endforeach

          
        </div>
      </div>


    <div class="col-md-2">
      <div class="form-group">
        <label>Rate</label>
        <input type="number" class="form-control" name="purchase_rate[]" id="purchase_rate_{{ $i }}" value="{{$items[$i]->purchased_rate}}" onkeyup="autofill({{ $i }})">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Total Amount</label>
        <input type="number" class="form-control" name="purchase_total[]" id="purchase_total_{{ $i }}" required value="{{$items[$i]->purchased_total}}">
      </div>
    </div>

  </div>
@endfor

<!-- Newitem for create Niku -->
  @for($i = 0; $i < count($products); $i++)
 @php
    $j = $i + 1000;
@endphp
  <div class="row mb-3">

    <div class="col-md-4">
      <div class="form-group">
        <label>Purchase Item</label>
        <select name="purchase_item[]" id="purchase_item_{{ 1000+$i }}" class="form-control allitems">
          <option value="" hidden>Select Item</option>
          @foreach($allproducts as $value)
            <option value="{{ $value->id }}">
                {{ $value->name }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Quantity</label>
        <input type="number" class="form-control" name="purchase_quantity[]" id="purchase_quantity_{{ $j }}" value="1" required onkeyup="autofill({{ $j }})" onchange="autofill({{ $j }})">
      </div>
    </div>

      <div class="col-md-2">
        <div class="form-group">
          <label>Unit</label>
          <select class="form-control" name="purchase_unit[]" id="purchase_unit_{{ $j }}">
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
        <input type="number" class="form-control" name="purchase_rate[]" id="purchase_rate_{{ $j }}" value="0" onkeyup="autofill({{ $j }})">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>Total Amount</label>
        <input type="number" class="form-control" name="purchase_total[]" id="purchase_total_{{ $j }}" required value="0">
      </div>
    </div>

  </div>
@endfor

        

        <input class="form-control" required name="purchase_id" type="hidden" id="sellto_account_number" value="{{$purchase[0]->purchase_id}}">

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
  <input type="submit" value="Update" class="btn btn-primary">
</div>
<input type="hidden" id="allproductsinfo" value="{{json_encode($allproducts)}}">
<input type="hidden" id="allunitsinfo" value="{{json_encode($units)}}">
{{ Form::close() }}
<script>
   

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

function autofill(id) {
 $("#purchase_total_"+id).val(parseInt($("#purchase_quantity_"+id).val()) * parseInt($("#purchase_rate_"+id).val()));
 handleChage(id)
}

// ✅ Initial setup to hide form
// $(document).ready(function () {
//   $('#form-fields-wrapper').hide();
//   $('.allfarmers').hide();
// });
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

  /*function handleChage(rid) {

    let all = JSON.parse($("#allproductsinfo").val());

    let pid = $("#purchase_item_"+rid).val();
    let qty = parseInt($("#purchase_quantity_"+rid).val());
    let uid = $("#purchase_unit_"+rid).val();

    let other_unit = 'bag';

    let secQty = '';

    all.forEach((val) => {

      if(val.id == pid){

        if(val.unit_id == uid){

          var first_unit_val = val.first_unit_val;
          var sec_unit_val = val.second_unit_val;

          secQty = (qty / first_unit_val) * sec_unit_val;

          if(val.second_unit_val == 2){
            other_unit = 'kg';
          } else if(val.second_unit_val == 2) {
            other_unit = 'kw';
          }



        } else {

          var first_unit_val = val.first_unit_val;
          var sec_unit_val = val.second_unit_val;

          secQty = (qty / sec_unit_val) * first_unit_val;

          if(val.first_unit_val == 2){
            other_unit = 'kg';
          } else if(val.first_unit_val == 2) {
            other_unit = 'kw';
          }


        }

      }
      
    });

    $("#other_qty_val").html(secQty+' '+other_unit)
    
  }*/

    function handleChage(rid) {
  let all = JSON.parse($("#allproductsinfo").val());
  let allunits = JSON.parse($("#allunitsinfo").val());

  let pid = $("#purchase_item_" + rid).val();
  let qty = parseFloat($("#purchase_quantity_" + rid).val());

  let selectedUnitName = $("#purchase_unit_" + rid + " option:selected").text().trim();
  let prevUnitShort = $("#prev_unit_" + rid).val(); // old unit short name

  let currentUnitShort = ''; // selected unit short name
  let firstUnitShort = '';
  let secondUnitShort = '';

  let firstUnitValue = 0;
  let secondUnitValue = 0;

  let secQty = '';

  // Step 1: Find short name of current unit (selected)
  allunits.forEach(ut => {
    if (ut.name.trim() === selectedUnitName) {
      currentUnitShort = ut.short_unit;
    }
  });

  // Step 2: Loop through all products to find selected one
  all.forEach((product) => {
    if (product.id == pid) {
      firstUnitValue = parseFloat(product.first_unit_val);
      secondUnitValue = parseFloat(product.second_unit_val);

      // First & second unit IDs
      let firstUnitId = product.unit_id;
      let secondUnitId = product.sec_unit_id;

      // Get short names of product's first & second units
      allunits.forEach(ut => {
        if (ut.id == firstUnitId) {
          firstUnitShort = ut.short_unit;
        }
        if (ut.id == secondUnitId) {
          secondUnitShort = ut.short_unit;
        }
      });

      // 🔄 Step 3: Check if bag involved
      if (firstUnitShort === 'bag' || secondUnitShort === 'bag') {
        console.log('Bag logic triggered');

        if (currentUnitShort === 'kg' && (firstUnitShort === 'bag' || secondUnitShort === 'bag')) {
          secQty = (qty / firstUnitValue).toFixed(2) + ' bag';
        } else if (currentUnitShort === 'kw' && (firstUnitShort === 'bag' || secondUnitShort === 'bag')) {
          let kg = qty * 100;
          secQty = (kg / firstUnitValue).toFixed(2) + ' bag';
        } else if (currentUnitShort === 'bag' && (firstUnitShort === 'kg' || secondUnitShort === 'kg')) {
          secQty = (qty * firstUnitValue).toFixed(2) + ' kg';
        } else if (currentUnitShort === 'bag' && (firstUnitShort === 'kw' || secondUnitShort === 'kw')) {
          let kg = qty * firstUnitValue;
          secQty = (kg / 100).toFixed(2) + ' kw';
        }
      } else {
        // 🔄 Step 4: Fallback conversion using switch
        if (currentUnitShort !== prevUnitShort) {
          switch (`${currentUnitShort}-${prevUnitShort}`) {
            case 'kg-kw':
              secQty = (qty / 100).toFixed(2) + ' kw';
              break;
            case 'kw-kg':
              secQty = (qty * 100).toFixed(2) + ' kg';
              break;
            default:
              secQty = qty + ' ' + currentUnitShort;
              break;
          }
        }
      }
    }
  });

  // Step 5: Show result
  console.log('Converted Qty:', secQty);
  $("#other_qty_val").html(secQty);
  $("#prev_unit_" + rid).val(currentUnitShort); // update old unit
}



</script>