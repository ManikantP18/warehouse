<style>
  .photo-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    padding-top: 60px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.9);
  }

  .photo-modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 90%;
    border-radius: 10px;
  }

  .photo-modal-close {
    position: absolute;
    top: 20px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
  }
</style>


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

        <div class="col-md-6 m-auto">
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

      <div class="col-lg-12  ">
             <div class="form-group text-center">
                   <label for="photo" class="form-label">Profile Photo</label>
                      <div style="margin-top: 10px; display: flex; justify-content: center;">
                          
                        <img
                          alt="Profile Photo"
                          width="150"
                          height="150"
                          style="object-fit: cover; border-radius: 50%; border: 1px solid #ddd; cursor: pointer;"
                          id="lphoto"
                          onclick="openPhotoModal()"
                        />

                      </div>
                </div>
         </div>      

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
            <label>Customer-ID</label>
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
            <label>Land Owner Name</label>
            <input type="text" class="form-control" name="sellto_owner_name" id="sellto_owner_name" required>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>Village</label>
            <input type="text" class="form-control" name="sellto_village" id="sellto_village" required>
          </div>
        </div>


        <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_rakaba_acre" class="form-label">Land Acre</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible"  name="kp_rakaba_acre" type="text" id="kp_rakaba_acre" readonly>
                        </div>
                    </div>
                </div>

        <div class="form-group col-md-6">
            <label for="company_id" class="form-label">Company Name</label>
            <select name="company_id" id="company_id" class="form-control select" required onchange="CompanyItems(this.value)">
                <option value="">Select Company Name</option> 
                @foreach($company as $key => $value)
                    <option value="{{ $value->company_id }}">{{ $value->company_name }}</option>
                @endforeach
            </select>
        </div>

       <!-- Product Items Wrapper -->
<div id="item-wrapper">
  <!-- Initial Product Row -->
  <div class="item-group mb-3" style="background-color: #f2f2f2; padding:15px; border-radius:5px;">
    
    <div class="row">
      <div class="col-md-3">
        <label>Sell Item</label>
        <select name="sellto_item_selled[]" class="form-control sellto_item_selled" id="cpm_id" dataid="0" onchange="selectItem(0, this)" required>
          <option value="">Select Item</option>
         
        </select>
      </div>

      <div class="col-md-3">
        <label>Lot No.</label>
        <select class="form-control" name="purchase_lot_no[]" id="purchase_lot_no_0" onchange="checkqty(0)">
          <option value="" hidden>Select Lot no.</option>
        </select>
      </div>

      <div class="col-md-3">
        <label>Quantity</label>
        <input type="number" class="form-control sellto_quantity" name="sellto_quantity[]" id="sellto_quantity_0" value="1" required onkeyup="autofill(0)" onchange="autofill(0)" step="0.01">
      </div>

      <div class="col-md-3">
        <label>Unit</label>
        <select class="form-control" name="purchase_unit[]" id="purchase_unit_0" required>
          <option value="" hidden>Select Unit</option>
          @foreach($units as $value)
            <option value="{{ $value->id }}" {{ $value->name == 'Bag' ? 'selected' : ''}}>{{ $value->name }}</option>
          @endforeach
        </select>
      </div>
    </div> <!-- end row 1 -->

    <div class="row mt-2">
      <div class="col-md-3">
        <label>Rate</label>
        <input type="number" class="form-control sellto_rate" name="sellto_rate[]" id="sellto_rate_0" value="0" onchange="autofill(0)">
      </div>

      <div class="col-md-3 d-none">
        <label>GST</label>
        <input type="number" class="form-control sellto_gst_amount" name="sellto_gst_amount[]" id="sellto_gst_amount_0" value="0" onchange="autofill(0)">
      </div>

      <div class="col-md-3">
        <label>Total</label>
        <input type="number" class="form-control purchase_total" name="sell_total[]" id="purchase_total_0" value="0" required>
      </div>

      <div class="col-md-3">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger form-control" onclick="removeRow(this)">
          <i class="ti ti-trash"></i>
        </button>
      </div>
    </div> <!-- end row 2 -->

  </div>
</div>


<!-- Add More Button -->
<div class="mt-2">
  <button type="button" class="btn btn-primary" onclick="addMoreItem()">+ Add More</button>
</div>


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

<!-- Zoom Image Modal -->
<div id="photoZoomModal" class="photo-modal" onclick="closePhotoModal()">
  <span class="photo-modal-close">&times;</span>
  <img class="photo-modal-content" id="zoomedPhoto">
</div>


<input type="hidden" id="itemsdata" value="{{ json_encode($items) }}">

<script>

  function CompanyItems(cmp_id) {
      $.ajax({
          url: '{{ route('sellto.getItems') }}',
          type: 'GET',
          data: { cmp_id: cmp_id },
          success: function(response) {
            response = JSON.parse(response);


          $(".sellto_item_selled").html(response.items);
          $("#bank_name").html(response.banks)
          
        },
        error: function(xhr) { alert('hi')
          console.error("Error fetching item details");
        }
        })
}

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
  $('#sellto_account_number, #sellto_phone, #sellto_customer_name, #sellto_acc_holder, #sellto_owner_name, #sellto_village, #sellto_gst_amount,#bank_name')
    .prop('readonly', false)
    .val('');
}
function searchLadger() {
  let searchVal = $('#search').val();
  let searchVillage = $('#search_village').val();
  let searchname = $('#search_name').val();
  let searchowner = $('#search_owner').val();
  let all = 'yes';
  $.ajax({
    url: '{{ route('sellto.search') }}',
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
  $.get('{{ route('sellto.search') }}', { searchVal: id, all : 'no' }, function(response) {
    if (response.success && response.data.length > 0) {
      let d = response.data[0];

      const baseUrl = '/storage/app/public/'; // Laravel's public storage path
                    
        $("#lphoto").prop('src', baseUrl + d.photo_path);

      $('#sellto_account_number').val(d.account_id).prop('readonly', true);
      $('#sellto_phone').val(d.phone_number).prop('readonly', true);
      $('#sellto_customer_name').val(d.relational_cust_name).prop('readonly', true);
      $('#sellto_acc_holder').val(d.account_holder).prop('readonly', true);
      $('#sellto_owner_name').val(d.farm_owner_name).prop('readonly', true);
      $('#sellto_village').val(d.village).prop('readonly', true);
      $('#sellto_gst_amount').val(d.gst_num).prop('readonly', true);
      $('#form-fields-wrapper').slideDown();

      $('#kp_rakaba_acre').val(d.farm_area_acre);
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

    $.ajax({
      url: '{{ route('sellto.lotno') }}',
      type: 'GET',
      data: { item: item },
      success: function(response) {
      $("#purchase_lot_no_"+did).html(response);
    },
    error: function(xhr) {
      console.error("Error fetching item details");
    }
    })
  }
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

    if($('#sellto_Credit_amount').val() > 0 && $("#bank_name").val() == ''){

      alert('Bank name is required If credit amount is highr then 0.');

      return false;

    }

    return true;
}

</script>
<script>
var rowIndex1 = $('.item-group').length; // start from existing rows count

function addMoreItem() {
  let $template = $('.item-group').first().clone();

  $template.find('input, select').each(function () {
    let $el = $(this);
    let name = $el.attr('name');
    let oldId = $el.attr('id');
    
    // Always append/replace the number at the end of the ID
    let newId = oldId ? oldId.replace(/\d*$/, rowIndex1) : '';
    if (newId) $el.attr('id', newId);

    $el.val('');
    if (name === 'sellto_quantity[]') $el.val(1);
    if (name === 'sell_total[]') $el.val(0);

    // For item selector
    if ($el.hasClass('sellto_item_selled')) { console.log('hi, Nik Nikku Nikita...')
      $el.attr('dataid', rowIndex1);
      $el.attr('onchange', 'selectItem(' + rowIndex1 + ', this)');
    }

    // For quantity, rate, gst fields
    if (name === 'sellto_quantity[]' || name === 'sellto_rate[]' || name === 'sellto_gst_amount[]') {
      $el.attr('onkeyup', 'autofill(' + rowIndex1 + ')');
      $el.attr('onchange', 'autofill(' + rowIndex1 + ')');
    }
  });

  $('#item-wrapper').append($template);
  rowIndex1++;
}


function removeRow(button) {
  if ($('.item-group').length > 1) {
    $(button).closest('.item-group').remove();
    updateTotalAmount(); // optional: re-calculate total after remove
  } else {
    alert("At least one row is required.");
  }
}

function autofill(id) {

  if(checkqty(id) == false){
    return false;
  }

  let qty = parseFloat($("#sellto_quantity_" + id).val()) || 0;
  let rate = parseFloat($("#sellto_rate_" + id).val()) || 0;
  let gst = parseFloat($("#sellto_gst_amount_" + id).val()) || 0;

  let total = (qty * rate) + gst;
  $("#purchase_total_" + id).val(total.toFixed(2));

  updateTotalAmount();
}

function updateTotalAmount() {
  let grandTotal = 0;
  $(".purchase_total").each(function () {
    grandTotal += parseFloat($(this).val()) || 0;
  });
  $("#sellto_total_amount").val(grandTotal.toFixed(2));
}

function checkqty(sid) {
  let stock = $("#purchase_lot_no_" + sid + " option:selected").attr("dataid");
  let ln = $("#purchase_lot_no_" + sid).val();

  let qty = $("#sellto_quantity_"+sid).val();

  console.log(stock, qty)

  if(parseInt(stock) < parseInt(qty)){
    alert(`Only ${stock} available in lot ${ln}`);

    $("#sellto_quantity_"+sid).val();

    return false;
  }
  return true;

}

function openPhotoModal() {
    const modal = document.getElementById('photoZoomModal');
    const zoomedImg = document.getElementById('zoomedPhoto');
    const originalImg = document.getElementById('lphoto');

    zoomedImg.src = originalImg.src;
    modal.style.display = 'block';
  }

  function closePhotoModal() {
    document.getElementById('photoZoomModal').style.display = 'none';
  }




</script>


