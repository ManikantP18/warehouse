<!-- Product Items Wrapper -->
<div id="item-wrapper">

  <!-- Initial Item Row -->
  <div class="row mb-3 item-group" style="background-color: #c6c6c6; padding:10px; border-radius:5px;">

    <div class="col-md-2">
      <div class="form-group">
        <label>Sell Item</label>
        <select name="sellto_item_selled[]" class="form-control sellto_item_selled" dataid="0" onchange="selectItem(0, this)">
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
        <input type="number" class="form-control sellto_quantity" name="sellto_quantity[]" id="sellto_quantity_0" value="1" required onkeyup="autofill(0)" onchange="autofill(0)">
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
        <input type="number" class="form-control sellto_rate" name="sellto_rate[]" id="sellto_rate_0" value="0" onchange="autofill(0)">
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label>GST</label>
        <input type="number" class="form-control sellto_gst_amount" name="sellto_gst_amount[]" id="sellto_gst_amount_0" value="0" onchange="autofill(0)">
      </div>
    </div>

    <div class="col-md-1">
      <div class="form-group">
        <label>Total</label>
        <input type="number" class="form-control purchase_total" name="sell_total[]" id="purchase_total_0" value="0" required>
      </div>
    </div>

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
  <button type="button" class="btn btn-primary" onclick="addMoreItem()">+ Add More</button>
</div>
<script>let rowIndex = 1;

function addMoreItem() {
  let $wrapper = $('#item-wrapper');
  let $template = $wrapper.find('.item-group').first().clone();

  $template.find('input, select').each(function () {
    let $el = $(this);
    let name = $el.attr('name');
    let id = $el.attr('id');

    // Update id & event bindings
    if (id) {
      let newId = id.replace(/\d+/, rowIndex);
      $el.attr('id', newId);
    }

    // Reset values
    if ($el.is('input')) $el.val($el.hasClass('sellto_quantity') ? 1 : 0);
    else $el.val('');

    // Update event attributes
    if (name === 'sellto_quantity[]' || name === 'sellto_rate[]' || name === 'sellto_gst_amount[]') {
      $el.attr('onkeyup', 'autofill(' + rowIndex + ')');
      $el.attr('onchange', 'autofill(' + rowIndex + ')');
    }

    if ($el.hasClass('sellto_item_selled')) {
      $el.attr('dataid', rowIndex);
      $el.attr('onchange', 'selectItem(' + rowIndex + ', this)');
    }
  });

  $wrapper.append($template);
  rowIndex++;
}

function removeRow(button) {
  if ($('.item-group').length > 1) {
    $(button).closest('.item-group').remove();
  } else {
    alert("At least one item is required.");
  }

  // Optionally recalculate total
  $(".purchase_total").each(() => autofill());
}


function searchLadger() {
  let searchVal = $('#search').val();
  let searchVillage = $('#search_village').val();
  let searchname = $('#search_name').val();
  let all = 'yes';
  $.ajax({
    url: '{{ route('purchase.search') }}',
    type: 'GET',
    data: { searchVal, searchVillage, searchname, all },
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
  $.get('{{ route('purchase.search') }}', { searchVal: id, all : 'no' }, function(response) { 
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