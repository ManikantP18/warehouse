{{ Form::open(['url' => 'SalesReturn/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
  <div class="row">

    <div class="col-12">
    
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
        <label for="sellto_phone" class="form-label">Mobile Number</label>
        <input class="form-control onlyforformesrs" required name="sellto_phone" type="tel" pattern="[0-9]{10}" maxlength="10" title="Enter 10-digit mobile number" id="sellto_phone" value="{{$sellto[0]->sell_phone}}">
      </div>
    </div>
    <input type="hidden" value="{{$sellto[0]->sell_id}}" name="cn_id">
    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_customer_name" class="form-label">Customer Name</label>
        <input class="form-control alwaysvisible" required pattern="[A-Za-z ]+" title="Only alphabets are allowed" name="sellto_customer_name" type="text" id="sellto_customer_name" value="{{$sellto[0]->sell_relation_customer}}">
      </div>
    </div>

   

    <div class="col-md-6 changehide">
      <div class="form-group">
        <label for="sellto_owner_name" class="form-label">Land Owner Name</label>
        <input class="form-control onlyforformesrs" required name="sellto_owner_name" type="text" id="sellto_owner_name" value="{{$sellto[0]->sell_property_owner}}" readonly>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="sellto_village" class="form-label">Village</label>
        <input class="form-control onlyforformesrs" required pattern="[A-Za-z ]+" title="Only letters allowed" name="sellto_village" type="text" id="sellto_village" value="{{$sellto[0]->sell_village}}" readonly>
      </div>
    </div>

    <div class="form-group col-md-6">
            <label for="company_id" class="form-label">Company Name</label>
            <select name="company_id" id="company_id" class="form-control select" required>
                 
                @foreach($company as $key => $value)
                    <option value="{{ $value->company_id }}" {{ $value->company_id == $sellto[0]->company_id ? 'selected' : ''}}>{{ $value->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6">
                    <div class="form-group">
                        <label for="rt_date" class="form-label">Sales Return Date</label>
                        
                            <input class="form-control alwaysvisible" required name="rt_date" type="date" id="rt_date" value="{{date('Y-m-d')}}">
                        
                    </div>
              </div>

    <h5>Already Returned Items</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Unit</th>
                    <th>GST</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($returneditems as $item)
                    <tr>
                        <td>{{ $item->pname }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->rate }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->GST_amount }}</td>
                        <td>{{ $item->total_amount }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Returned Items</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    

    
<div class="modal-footer">

<input type="hidden" name="sell_id" value="{{$sellto[0]->sell_id}}">
  <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
  <input type="submit" value="Save" class="btn btn-primary">
</div>
{{ Form::close() }}
<input type="hidden" id="itemsdata" value="{{json_encode($items)}}">




  <script>
    (() => {
      
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

</script>

<script>

function calculateAmt(){
  let sellto_cash_amount = parseFloat($("#sellto_cash_amount").val());
  let sellto_Credit_amount = parseFloat($("#sellto_Credit_amount").val());
  let sellto_total_amount = parseFloat($("#sellto_total_amount").val());

  let remainAmt = sellto_total_amount - sellto_cash_amount - sellto_Credit_amount;

  $("#sellto_Remaining_amount").val(remainAmt)


}



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
  const product = data.find(d => String(d.id) === item);

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
      
      let cqty =  parseFloat($("#sellto_quantity_"+id).val());
      let prevqty =  parseFloat($("#sellto_prev_quantity_"+id).val());
        if(cqty <= 0 || cqty > prevqty) {
          alert('You Can not Return Quantity 0 or Higher than Salled Quantity');
          
        $("#sellto_quantity_"+id).val(prevqty)
        return false;
        }

        let rate = $("#sellto_rate_"+id).val();
        let gst = $("#sellto_gst_amount_"+id).val();

        let total = (parseFloat(cqty) * parseFloat(rate)) + parseFloat(gst);

        $("#purchase_total_"+id).val(total);
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

<script>
let rowIndex = {{ count($selleditems) }};
const itemsData = @json($items);
const unitsData = @json($units);

$(document).on("click", "#addMoreRow", function() {
  let newRow = `
    <div class="row mb-3 sell-row">
      <div class="col-md-2">
        <label>Sell Item</label>
        <select name="sellto_item_selled[]" class="form-control" onchange="selectItem(${rowIndex}, this)">
          <option value="" hidden>Select Item</option>
          ${itemsData.map(item => `<option value="${item.id}">${item.name}</option>`).join('')}
        </select>
      </div>

      <div class="col-md-2">
        <label>Quantity</label>
        <input type="number" class="form-control" name="sellto_quantity[]" id="sellto_quantity_${rowIndex}" 
               value="1" onkeyup="autofill(${rowIndex})" onchange="autofill(${rowIndex})">
      </div>

      <div class="col-md-2">
        <label>Unit</label>
        <select class="form-control" name="purchase_unit[]">
          ${unitsData.map(unit => `<option value="${unit.id}">${unit.name}</option>`).join('')}
        </select>
      </div>

      <div class="col-md-2">
        <label>Rate</label>
        <input type="number" class="form-control" name="sellto_rate[]" id="sellto_rate_${rowIndex}" onchange="autofill(${rowIndex})">
      </div>

      <div class="col-md-2 d-none">
        <label>GST</label>
        <input type="number" class="form-control" name="sellto_gst_amount[]" id="sellto_gst_amount_${rowIndex}" value="0" onchange="autofill(${rowIndex})">
      </div>

      <div class="col-md-1">
        <label>Total</label>
        <input type="number" class="form-control purchase_total" name="purchase_total[]" id="purchase_total_${rowIndex}" value="0">
      </div>

      <div class="col-md-1 d-flex align-items-end">
        <button type="button" class="btn btn-danger removeRow">X</button>
      </div>
    </div>
  `;
  
  $("#newRowsContainer").append(newRow);
  rowIndex++;
});

// Remove dynamic rows
$(document).on("click", ".removeRow", function() {
  $(this).closest(".sell-row").remove();
  autofill();
});

$(document).on('change', '.return-checkbox', function () {
    let index = $(this).data('index');
    let row = $(this).closest('.sell-row');

    if ($(this).is(':checked')) {
        // Enable all inputs in this row
        row.find('input, select').prop('disabled', false);
    } else {
        // Disable all inputs except the checkbox itself
        row.find('input, select').prop('disabled', true);
        $(this).prop('disabled', false); // keep checkbox active
    }
});

</script>
