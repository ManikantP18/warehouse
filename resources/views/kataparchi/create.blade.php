{{ Form::open(['url' => 'kataparchi/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">kataparchi</h6>

    <div class="row">

     <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row align-items-end">

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label for="search" class="form-label">Account/Mobile No</label>
        <div class="form-icon-user">
          <input class="form-control onlyforformesrs"  name="search" type="text" id="search" placeholder="Acc No / Mobile No">
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label for="search_name" class="form-label">Farmer Name</label>
        <div class="form-icon-user">
          <input class="form-control onlyforformesrs"  name="search_name" type="text" id="search_name" placeholder="Farmer Name">
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label for="search_village" class="form-label">Village Name</label>
        <div class="form-icon-user">
          <input class="form-control onlyforformesrs"  name="search_village" type="text" id="search_village" placeholder="Village Name">
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label class="form-label d-none d-sm-block">&nbsp;</label>
        <button type="button" class="btn btn-primary w-100" onclick="searchLadger()">Search</button>
      </div>
    </div>

  </div>

  <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                
                    <div class="form-icon-user allfarmers">
                        
                    </div>
                </div>
            </div>
</div>

    <div class="row">


        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_date" class="form-label">Date</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="kp_date" type="date" id="kp_date">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_acc_no" class="form-label">Account No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="kp_acc_no" type="text" id="kp_acc_no">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_rel_name" class="form-label"> Customer Name </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_rel_name" type="text" id="kp_rel_name">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_acc_holdername" class="form-label">Account Holder Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_acc_holdername" type="text" id="kp_acc_holdername">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_bhoomiswami_name" class="form-label">Land Owner Name</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_bhoomiswami_name" type="text" id="kp_bhoomiswami_name">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_vilage" class="form-label">Village</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_vilage" type="text" id="kp_vilage">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_rakaba_acre" class="form-label">Land Acre</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_rakaba_acre" type="text" id="kp_rakaba_acre">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_mo_no" class="form-label">Mobile No. </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_mo_no" type="number" id="kp_mo_no">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_rogger_name" class="form-label">Rogring By</label>

                <input class="form-control onlyforformesrs" required="required" name="kp_rogger_name"  id="kp_rogger_name">

            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_varity" class="form-label"> Variety</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_varity" type="text" id="kp_varity">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_rstno" class="form-label"> RST No</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_rstno" type="text" id="kp_rstno">
                </div>
            </div>
        </div>

          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_vechicle_wight" class="form-label">Vehcle Weight</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_vechicle_wight" type="number" id="kp_vechicle_wight">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_godown_name" class="form-label">Godown Name</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_godown_name" type="text" id="kp_godown_name">
                </div>
            </div>
        </div>
    

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Create" class="btn btn-primary">
</div>
</form>

<script>
    function searchLadger() {

            let searchVal = $("#search").val();
            let searchVillage = $("#search_village").val();
            let searchname = $("#search_name").val();
            $.ajax({
            url : '{{route('sellto.search')}}',
            type : 'GET',
            data : {
                searchVal : searchVal,
                searchVillage : searchVillage,
                searchname : searchname
            },
            success: function(response) {
            if (response.success && response.data) {
                 let data = response.data;

                 console.log(data)

                 let html = `
                    <select name="sellto_farmer/other" id="sellto_farmer/other" class="form-control alwaysvisible"  onchange="selectLadger(this.value)">
                    <option value=""> Select Farmer </option>`;

                data.map((value) =>{

                    html += `<option value="${value.account_id}">${value.relational_cust_name} - ${value.farm_owner_name}</option>`;

                })

                html += `</select>`;

                $('.allfarmers').html(html);

                //         $('#sellto_account_number').val(data.account_id);
                //         $('#sellto_phone').val(data.phone_number);
                //         $('#sellto_customer_name').val(data.relational_cust_name);

                //         $('#sellto_acc_holder').val(data.account_holder);

                //         $('#sellto_owner_name').val(data.farm_owner_name);
                //         $('#sellto_village').val(data.village);
                //         $('#sellto_gst_amount').val(data.gst_num);
            } else {
                alert("No matching record found.");
            }
        },
        error: function(err) {
            console.log("AJAX error:", err);
        }

        })
        }


        function selectLadger(searchVal) {
            let searchVillage = '';
            let searchname = '';
            $.ajax({
            url : '{{route('sellto.search')}}',
            type : 'GET',
            data : {
                searchVal : searchVal,
                searchVillage : searchVillage,
                searchname : searchname
            },
            success: function(response) {
            if (response.success && response.data) {
                 let data = response.data;

                 console.log(data);

                        $('#kp_acc_no').val(data[0].account_id);

                        $('#sellto_phone').val(data[0].phone_number);

                        $('#kp_rel_name').val(data[0].relational_cust_name);
                        $('#kp_acc_holdername').val(data[0].account_holder);
                        $('#kp_bhoomiswami_name').val(data[0].farm_owner_name);

                        $('#Rogring_name').val(data[0].Rogring_name);
                        $('#kp_rogger_name').val(data[0].Rogring_name);

                        $('#kp_vilage').val(data[0].village);
                        $('#kp_rakaba_acre').val(data[0].farm_area_acre);
                        $('#kp_mo_no').val(data[0].phone_number);

                        $('#kp_mo_no').val(data[0].phone_number);
                        $('#kp_rogger_name').val(data[0].Rogring_name ?? '');
            } else {
                alert("No matching record found.");
            }
        },
        error: function(err) {
            console.log("AJAX error:", err);
        }

        })
        }
</script>