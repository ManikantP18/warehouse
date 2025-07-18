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
                            <input class="form-control onlyforformesrs" name="mo_no" type="text" id="mo_no" placeholder="Mobile No">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="r_cust" class="form-label">Farmer Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" name="r_cust" type="text" id="r_cust" placeholder="Farmer Name" >
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="village" class="form-label">Village Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" name="village" type="text" id="village" placeholder="Village Name">
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3">
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
                        <label for="cash_credit" class="form-label">CASH / CREDIT</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible"  name="cash_credit" type="text" id="cash_credit" >
                        </div>
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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="item_sale" class="form-label">ITEM TO BE SALE</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="item_sale" type="text" id="item_sale" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="quantity" class="form-label">QUANTITY</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="quantity" type="text" id="quantity" >
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="rate" class="form-label">RATE</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="rate" type="number" id="rate" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="total_amount" class="form-label">TOTAL AMOUNT</label>
                        <input class="form-control onlyforformesrs"  name="total_amount" id="total_amount" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="GST_amount" class="form-label">GST AMOUNT</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible"  name="GST_amount" type="text" id="GST_amount" >
                        </div>
                    </div>
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

                    //$('#kp_acc_no').val(data.account_id);
                   // $('#kp_rel_name').val(data.relational_cust_name);
                  //  $('#kp_acc_holdername').val(data.account_holder);
                   // $('#kp_bhoomiswami_name').val(data.farm_owner_name);
                   // $('#kp_vilage').val(data.village);
                  //  $('#kp_rakaba_acre').val(data.farm_area_acre);
                   // $('#kp_mo_no').val(data.phone_number);
                  //  $('#kp_rogger_name').val(data.Rogring_name || '');

                    let opt = `<option value=""> select Item </option>`;

                    response.products.forEach((variety) =>{
                        opt += `<option value="${variety.id}">${variety.name}</option>`;
                    })

                    $('#kp_varity').html(opt);

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