{{ Form::open(['url' => 'SalesReturn/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Sales-Return</h6>
    
    
    <div class="row" >
        <div class="col-lg-12">
            <div class="row align-items-end">

                <div class="col-lg-3">
                    <div class="form-group" >
                        <label for="mo_no" class="form-label">Mobile No</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" name="mo_no" type="text" id="mo_no" placeholder="Mobile No" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="r_cust" class="form-label">Farmer Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" name="r_cust" type="text" id="r_cust" placeholder="Farmer Name" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="village" class="form-label">Village Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" name="village" type="text" id="village" placeholder="Village Name"required>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 m-auto">
                    <div class="form-group">
                        <label class="form-label d-none d-sm-block">&nbsp;</label>
                        <button type="button" class="btn btn-primary w-100" onclick="searchLadger()">Search</button>
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <div class="form-icon-user allfarmers"></div>
            </div>
        </div>
        <div id="form-fields-wrapper" style="display: none;">
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Mode of Invoice</label>
                        <select name="cash_credit" id="cash_credit" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="credit">Credit</option>
                        </select>
                    </div> 
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="aadhar_no" class="form-label">Aadhar Number</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible" required name="aadhar_no" type="number" id="aadhar_no" >
                        </div>
                    </div>
                </div>

            <div class="row mb-6">

                
                 <!-- Product Items Wrapper -->
                <div id="item-wrapper">

                <!-- Initial Product Row -->
                <div class="row mb-3 item-group" style="background-color: #f2f2f2; padding:10px; border-radius:5px;">
                    <div class="col-md-2">
                    <label>Sell Item</label>
                    <select name="item_sale[]" class="form-control item_sale" dataid="0" onchange="selectItem(0, this)">
                        <option value="">Select Item</option>
                        @foreach($item as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="col-md-1">
                        <label>Quantity</label>
                        <input type="number" class="form-control quantity" name="quantity" id="quantity" value="1" required onkeyup="autofill(0)" onchange="autofill(0)">
                    </div>

                    <div class="col-md-2">
                    <label>Unit</label>
                    <select class="form-control" name="unit[]" id="unit">
                        <option value="" hidden>Select Unit</option>
                        @foreach($units as $value)
                        <option value="{{$value->id}}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="col-md-2">
                    <label>Rate</label>
                    <input type="number" class="form-control rate" name="rate[]" id="rate" value="0" onchange="autofill(0)">
                    </div>

                    <div class="col-md-2">
                    <label>GST</label>
                    <input type="number" class="form-control GST_amount" name="GST_amount[]" id="GST_amount" value="0" onchange="autofill(0)">
                    </div>

                    <div class="col-md-3">
                    <label>Total</label>
                    <input type="number" class="form-control total_amount" name="total_amount[]" id="total_amount" value="0" required>
                    </div>

                    <div class="col-md-1">
                    <label>&nbsp;</label>
                    <button type="button" class="btn btn-danger form-control" onclick="removeRow(this)">🗑</button>
                    </div>
                </div>
                </div>

                <!-- Add More Button -->
                <div class="mt-2">
                <button type="button" class="btn btn-primary" onclick="addMoreItem()">+ Add More</button>
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
    function searchLadger() {
        let searchVal = $('#mo_no').val();
        let searchVillage = $('#searcvillageh_village').val();
        let searchname = $('#r_cust').val();

        $.ajax({
            url: '{{ route('sellto.search') }}',
            type: 'GET',
            data: { searchVal, searchVillage, searchname },
            success: function (response) {
                if (response.success && response.data.length > 0) {
                    let html = `
                        <label>Select Farmer</label>
                        <select class="form-control alwaysvisible" onchange="selectLadger(this.value)">
                            <option value="">-- Select Farmer --</option>`;

                    response.data.forEach(value => {
                        html += `<option value="${value.account_id}">${value.relational_cust_name} - ${value.farm_owner_name}</option>`;
                    });

                    html += '</select>';
                    $('.allfarmers').html(html);
                    $('#form-fields-wrapper').hide();
                } else {
                    alert("No matching record found.");
                    $('.allfarmers').hide();
                }
            },
            error: function (err) {
                console.error("AJAX error:", err);
            }
        });
    }

    function selectLadger(account_id) {
        if (!account_id) return;

        $.ajax({
            url: '{{ route('sellto.search') }}',
            type: 'GET',
            data: { searchVal: account_id },
            success: function (response) {
                if (response.success && response.data.length > 0) {
                    const data = response.data[0];

                    $('#form-fields-wrapper').slideDown();
                } else {
                    alert("No data found for selected farmer.");
                }
            },
            error: function (err) {
                console.error("AJAX error:", err);
            }
        });
    }

    $(document).ready(function () {
        $('#form-fields-wrapper').hide();
        //$('.allfarmers').hide();
    });


</script>

<script>
    
    //-------------------------------------------------
let rowIndex = 1;

function addMoreItem() {
  let $template = $('.item-group').first().clone();
  
  $template.find('input, select').each(function () {
    let $el = $(this);
    let name = $el.attr('name');
    let oldId = $el.attr('id');
    let newId = oldId ? oldId.replace(/\d+/, rowIndex) : '';

    if (newId) {
      $el.attr('id', newId);
    }

    $el.val('');
    if (name === 'quantity[]') $el.val(1);
    if (name === 'total_amount[]') $el.val(0);
    if ($el.hasClass('item_sale')) {
      $el.attr('dataid', rowIndex);
      $el.attr('onchange', 'selectItem(' + rowIndex + ', this)');
    }

    if (name === 'quantity[]' || name === 'rate[]' || name === 'sellto_gst_amount[]') {
      $el.attr('onkeyup', 'autofill(' + rowIndex + ')');
      $el.attr('onchange', 'autofill(' + rowIndex + ')');
    }
  });

  $('#item-wrapper').append($template);
  rowIndex++;
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
  let qty = parseFloat($("#quantity" + id).val()) || 0;
  let rate = parseFloat($("#rate" + id).val()) || 0;
  let gst = parseFloat($("#sellto_gst_amount_" + id).val()) || 0;

  let total = (qty * rate) + gst;
  $("#total_amount" + id).val(total.toFixed(2));

  updateTotalAmount();
}

function updateTotalAmount() {
  let grandTotal = 0;
  $(".total_amount").each(function () {
    grandTotal += parseFloat($(this).val()) || 0;
  });
  $("#total_amount").val(grandTotal.toFixed(2));
}
</script>