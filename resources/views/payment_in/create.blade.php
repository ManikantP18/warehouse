{{ Form::open(['url' => 'payment_in/add', 'method'=>'post', 'class'=>'needs-validation','novalidate','onsubmit'=>'return validForm()']) }}

<!-- 🔍 Search Section -->
<div class="card mb-3">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Account/Mobile No</label>
                <input class="form-control" name="search" type="text" id="search" placeholder="Acc No / Mobile No">
            </div>
            <div class="col-md-6">
                <label class="form-label">Farmer Name</label>
                <input class="form-control" name="search_name" type="text" id="search_name" placeholder="Farmer Name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Land Owner</label>
                <input class="form-control" name="search_owner" type="text" id="search_owner" placeholder="Owner Name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Village Name</label>
                <input class="form-control" name="search_village" type="text" id="search_village" placeholder="Village Name">
            </div>
        </div>

        <div class="row mt-3 text-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-success px-5" onclick="searchLadger()">Search</button>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="allfarmers"></div>
</div>

<!-- 📝 Farmer + Payment Form Section (Hidden by default) -->
<div id="payment-form-wrapper" style="display:none;">
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <!-- Company -->
                <div class="col-md-6">
                    <label class="form-label">Company</label>
                    <select class="form-control" name="comp_id" id="comp_id" onchange="selectCompany(this.value)">
                        <option value="">Select Company</option>
                        @foreach($company as $value)
                            <option value="{{$value->company_id}}">{{$value->company_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Ladger Balance</label>
                    <input class="form-control" type="text" id="ladger_balance" value="0" readonly>
                </div>


                <!-- Bank -->
                <div class="col-md-6">
                    <label class="form-label">Bank Name</label>
                    <select class="form-control" name="bank_id" id="bankslist">
                        <option value="">Select Bank</option>
                    </select>
                </div>

                <!-- Cash -->
                <div class="col-md-6">
                    <label class="form-label">Cash Amount</label>
                    <input class="form-control" name="cash_amt" type="number" step="0.1" placeholder="Cash Amount">
                </div>

                <!-- Bank -->
                <div class="col-md-6">
                    <label class="form-label">Bank Amount</label>
                    <input class="form-control" name="bank_amt" type="number" step="0.1" placeholder="Bank Amount">
                </div>

                <!-- Date -->
                <div class="col-md-6">
                    <label class="form-label">Payment Date</label>
                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>
            </div>

            <input type="hidden" name="ladger_id" id="selectedLadger1" value="">

            <div class="row mt-4 text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary px-5">Receive Payment</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{ Form::close() }}

<script>
function searchLadger() {
    let searchVal = $('#search').val();
    let searchVillage = $('#search_village').val();
    let searchname = $('#search_name').val();
    let searchowner = $('#search_owner').val();
    let all = 'no';

    $.ajax({
        url: '{{ route('payment_in.search') }}',
        type: 'GET',
        data: { searchVal, searchVillage, searchname, searchowner, all },
        success: function(response) {
            if (response.success && response.data.length > 0) {
                let html = `
                <div class="card mb-3 form-control">
                    <div class="card-body">
                        <label class="form-label">Select Farmer</label>
                        <select class="form-control" onchange="fillFarmer(this)" id="selectedLadger">
                            <option value="">Select Farmer</option>`;
                response.data.forEach(d => {
                    html += `<option value="${d.account_id}" 
                                 data-name="${d.relational_cust_name}" 
                                 data-owner="${d.farm_owner_name}" 
                                 data-village="${d.village}">
                            ${d.relational_cust_name} - ${d.farm_owner_name} (${d.village})
                         </option>`;
                });
                html += `</select>
                    </div>
                </div>`;
                $('.allfarmers').html(html).show();
            } else {
                alert("No matching record found.");
            }
        }
    });
}

function fillFarmer(el) {

    $.ajax({
        url: '{{ route('payment_out.getladgerbalance') }}',
        type: 'GET',
        data: { cust: $(el).val(), comp_id : '' },
        success: function(response) {
            $("#ladger_balance").val(response);
        },
        error: function() {
            alert("Ladger Balance load करने में error आया");
        }
    });

    if ($(el).val()) {
        $("#payment-form-wrapper").show();
        $("#selectedLadger1").val($(el).val());
    } else {
        $("#payment-form-wrapper").hide();
        $("#selectedLadger1").val('');
    }
}

function selectCompany(cid) {

     $.ajax({
        url: '{{ route('payment_out.getladgerbalance') }}',
        type: 'GET',
        data: { cust: $("#selectedLadger1").val(), comp_id: cid },
        success: function(response) {
            $("#ladger_balance").val(response);
        },
        error: function() {
            alert("Ladger Balance load करने में error आया");
        }
    });
    if (!cid) {
        $("#bankslist").html('<option value="">Select Bank</option>');
        return;
    }

    $.ajax({
        url: '{{ route('payment_in.searchbanks') }}',
        type: 'GET',
        data: { cid },
        success: function(response) {
            $("#bankslist").html(response);
        },
        error: function() {
            alert("Bank list load करने में error आया");
        }
    });
}
</script>
