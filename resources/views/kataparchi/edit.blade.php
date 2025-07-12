{{ Form::open(['url' => 'kataparchi/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">Kataparchi</h6>

    <div class="row">
            

           <div class="col-lg-12 col-md-12 col-sm-12">
 

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="kp_date" class="form-label">date</label>

                        <div class="form-icon-user">
                            <input class="form-control alwaysvisible"
                            required
                            name="kp_date"
                            type="text"
                            id="kp_date"
                            value="{{$kataparchi[0]->kp_date}}"
                            >

                        </div>
                    </div>
                </div>

            </div>
            

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_acc_no" class="form-label">account no.</label>
                    <div class="form-icon-user">
                        <input class="form-control "
                        required
                        name="kp_acc_no"
                        type="text"
                        id="kp_acc_no"
                        value="{{$kataparchi[0]->kp_acc_no}}"
                        >
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_rel_name" class="form-label">Customer Name</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" required pattern="[A-Za-z ]+" title="Only alphabets are allowed" name="kp_rel_name" type="text" id="kp_rel_name" value="{{$kataparchi[0]->kp_rel_name}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_acc_holdername" class="form-label">Aadhar number</label>
                    <div class="form-icon-user">
                        <input class="form-control alwaysvisible" required="required" name="kp_acc_holdername" type="text" id="kp_acc_holdername" value="{{$kataparchi[0]->kp_acc_holdername}}">
                    </div>
                </div>
            </div>

            
            <div class="col-lg-6 col-md-6 col-sm-6 changehide">
                <div class="form-group">
                    <label for="kp_bhoomiswami_name" class="form-label">land owner name</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="kp_bhoomiswami_name" type="text" id="kp_bhoomiswami_name" value="{{$kataparchi[0]->kp_bhoomiswami_name}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_vilage" class="form-label"> Village </label>
                    <div class="form-icon-user">
                        <input class="form-control " required pattern="[A-Za-z ]+" title="Only letters allowed" name="kp_vilage" type="text" id="kp_vilage" value="{{$kataparchi[0]->kp_vilage	}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_rakaba_acre" class="form-label">land acre</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="kp_rakaba_acre" type="text" id="kp_rakaba_acre" value="{{$kataparchi[0]->kp_rakaba_acre}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_khasra_no" class="form-label">Khasra No.</label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="kp_khasra_no" type="text" id="kp_khasra_no" value="{{$kataparchi[0]->kp_rakaba_acre}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_mo_no" class="form-label"> Mobile no.  </label>
                    <div class="form-icon-user">
                        <input class="form-control " required="required" name="kp_mo_no" type="text" id="kp_mo_no" value="{{$kataparchi[0]->kp_mo_no}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_rogger_name" class="form-label"> Rogating agent name </label>
                    <div class="form-icon-user">
                        <input class="form-control " required pattern="[A-Za-z ]+" title="Only letters allowed" name="kp_rogger_name" type="text" id="kp_rogger_name" value="{{$kataparchi[0]->kp_rogger_name	}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_varity" class="form-label">variety </label>
                    <div class="form-icon-user">
                        <input class="form-control "  name="kp_varity" type="text" id="kp_varity" value="{{$kataparchi[0]->kp_verity}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_rstno" class="form-label"> RST no </label>
                    <div class="form-icon-user">
                        <input class="form-control "  title="Only letters allowed" name="kp_rstno" type="text" id="kp_rstno" value="{{$kataparchi[0]->kp_rstno}}">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_vehicle_wight" class="form-label">Total weight </label>
                    <div class="form-icon-user">
                        <input class="form-control "  title="Only letters allowed" name="kp_vehicle_wight" type="text" id="kp_vehicle_wight" value="{{$kataparchi[0]->kp_vehicle_wight}}">
                    </div>
                </div>
            </div>

             <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_only_vechicle_w" class="form-label">only vehcle weight</label>
                    <div class="form-icon-user">
                        <input class="form-control "  title="Only letters allowed" name="kp_only_vechicle_w" type="text" id="kp_only_vechicle_w" value="{{$kataparchi[0]->kp_only_vechicle_w}}">
                    </div>
                </div>
            </div>
            
             <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_pure_wigth" class="form-label">pure weight</label>
                    <div class="form-icon-user">

                        <input class="form-control" title="Auto-calculated" name="kp_pure_wigth" type="text" id="kp_pure_wigth" readonly>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="kp_godown_name" class="form-label"> Godown name</label>
                    <div class="form-icon-user">
                        <input class="form-control " required pattern="[A-Za-z ]+" title="Only letters allowed" name="kp_godown_name" type="text" id="kp_godown_name" value="{{$kataparchi[0]->kp_godown_name}}">
                    </div>
                </div>
            </div>
        
        
      <input type="hidden" name="kp_id" value="{{$kataparchi[0]->kp_id}}">
        
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
</form>

<script>
    function calculatePureWeight() {
        const totalWeight = parseFloat(document.getElementById('kp_vehicle_wight').value) || 0;
        const vehicleWeight = parseFloat(document.getElementById('kp_only_vechicle_w').value) || 0;

        const pureWeight = totalWeight - vehicleWeight;
        document.getElementById('kp_pure_wigth').value = pureWeight.toFixed(2);
    }

    // Attach events to update the pure weight on input
    document.getElementById('kp_vehicle_wight').addEventListener('input', calculatePureWeight);
    document.getElementById('kp_only_vechicle_w').addEventListener('input', calculatePureWeight);
</script>




