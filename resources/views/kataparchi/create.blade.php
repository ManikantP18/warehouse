{{ Form::open(['url' => 'kataparchi/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">kataparchi</h6>
    
    
    <div class="row" >
        <div class="col-lg-12">
            <div class="row align-items-end">
                <div class="col-lg-3">
                    <div class="form-group" >
                        <label for="search" class="form-label">Account/Mobile No</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" name="search" type="text" id="search" placeholder="Acc No / Mobile No">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="search_name" class="form-label">Farmer Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" name="search_name" type="text" id="search_name" placeholder="Farmer Name" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="search_village" class="form-label">Village Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" name="search_village" type="text" id="search_village" placeholder="Village Name">
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
                        <label for="kp_date" class="form-label">Date</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible" required name="kp_date" type="date" id="kp_date" value="{{date('d-m-y')}}">
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_acc_no" class="form-label">Account No.</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible"  name="kp_acc_no" type="text" id="kp_acc_no" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_rel_name" class="form-label">Customer Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="kp_rel_name" type="text" id="kp_rel_name" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_acc_holdername" class="form-label">Aadhar Number</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible" required name="kp_acc_holdername" type="number" id="kp_acc_holdername">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_bhoomiswami_name" class="form-label">Land Owner Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="kp_bhoomiswami_name" type="text" id="kp_bhoomiswami_name" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_vilage" class="form-label">Village</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="kp_vilage" type="text" id="kp_vilage" readonly>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_mo_no" class="form-label">Mobile No.</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs"  name="kp_mo_no" type="number" id="kp_mo_no" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_rogger_name" class="form-label">Rogring By</label>
                        <input class="form-control onlyforformesrs"  name="kp_rogger_name" id="kp_rogger_name" readonly>
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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_khasra_no" class="form-label">Khasra No.</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible"  name="kp_khasra_no" type="text" id="kp_khasra_no" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_varity" class="form-label">Variety</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible" required name="kp_varity" type="text" id="kp_varity">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_rstno" class="form-label">RST No</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" required name="kp_rstno" type="text" id="kp_rstno">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_vehicle_wight" class="form-label">Total  weight</label>
                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible" required name="kp_vehicle_wight" type="number" id="kp_vehicle_wight">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kp_godown_name" class="form-label">Godown Name</label>
                        <div class="form-icon-user">
                            <input class="form-control onlyforformesrs" required name="kp_godown_name" type="text" id="kp_godown_name">
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
        let searchVal = $('#search').val();
        let searchVillage = $('#search_village').val();
        let searchname = $('#search_name').val();

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

                    $('#kp_acc_no').val(data.account_id);
                    $('#kp_rel_name').val(data.relational_cust_name);
                    $('#kp_acc_holdername').val(data.account_holder);
                    $('#kp_bhoomiswami_name').val(data.farm_owner_name);
                    $('#kp_vilage').val(data.village);
                    $('#kp_rakaba_acre').val(data.farm_area_acre);

                    $('#kp_khasra_no').val(data.khasra_no);

                    $('#kp_mo_no').val(data.phone_number);
                    $('#kp_rogger_name').val(data.Rogring_name || '');
                    $('#kp_varity').val(data.variety || '');

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