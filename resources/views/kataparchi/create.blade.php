{{ Form::open(['url' => 'kataparchi/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">kataparchi</h6>

    <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12 onlyforformesrs">
            <div class="form-group">
                <label for="search" class="form-label">search</label>
                <div class="form-icon-user">
                    <search>
                        <input class="form-control alwaysvisible" name="search" type="text" id="search">
                    </search>
                </div>
            </div>
        </div>



        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_date" class="form-label">date</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="kp_date" type="text" id="kp_date">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_acc_no" class="form-label">account no.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_acc_no" type="number" id="kp_acc_no">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_rel_name" class="form-label">  customer name </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_rel_name" type="text" id="kp_rel_name">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_acc_holdername" class="form-label">account holder name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_acc_holdername" type="text" id="kp_acc_holdername">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_bhoomiswami_name" class="form-label"> land owner name</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_bhoomiswami_name" type="text" id="kp_bhoomiswami_name">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_vilage" class="form-label">villagel</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_vilage" type="text" id="kp_vilage">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_rakaba_acre" class="form-label"> land acre</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_rakaba_acre" type="text" id="kp_rakaba_acre">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_mo_no" class="form-label">Mobile no. </label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_mo_no" type="number" id="kp_mo_no">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_rogger_name" class="form-label">Rogating agent name</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_rogger_name" type="text" id="kp_rogger_name">
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_varity" class="form-label"> variety</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_varity" type="text" id="kp_varity">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_rstno" class="form-label"> RST no</label>
                <div class="form-icon-user">
                    <input class="form-control onlyforformesrs" required="required" name="kp_rstno" type="text" id="kp_rstno">
                </div>
            </div>
        </div>

          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="kp_vechicle_wight" class="form-label">  vehcle weight</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required, digit" name="kp_vechicle_wight" type="number" id="kp_vechicle_wight">
                </div>
            </div>
        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-6 onlyforformesrs">
            <div class="form-group">
                <label for="kp_godown_name" class="form-label"> Godown name</label>
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