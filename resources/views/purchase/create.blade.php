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
</script>