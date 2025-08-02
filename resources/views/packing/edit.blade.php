{{ Form::open(['url' => 'packing/update', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title"> Edit Packing</h6>

    <div class="row">

        
            

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="farmer_name" class="form-label">Farmer Name</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required="required" name="farmer_name" type="text" id="farmer_name" value="{{$packing[0]->farmer_name}}" readonly>
                </div>
            </div>
        </div>
<input type="hidden" value="{{$packing[0]->packing_id}}" name="packing_id" id="packing_id">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="land_owner" class="form-label">Land Owner</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="land_owner" type="text" id="land_owner" value="{{$packing[0]->land_owner}}" readonly>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="verity" class="form-label">Verity</label>
                <div class="form-icon-user">
                    <select class="form-control alwaysvisible" required name="verity" type="text" id="verity" readonly>
                        <option value="{{ $packing[0]->id }}">{{ $packing[0]->name }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="Gredded_qty" class="form-label">Gredded Quantity</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="Gredded_qty" type="text" id="Gredded_qty" value="{{$packing[0]->packing_gredded_quantity}}" readonly>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="total_bag" class="form-label">Total Bag</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="total_bag" type="text" id="total_bag" value="{{$packing[0]->packing_no_of_begs}}" readonly>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="packing_pay" class="form-label">Pay for Packing</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="packing_pay" type="text" id="packing_pay" value="{{$packing[0]->packing_pay}}" readonly>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="rst_no" class="form-label">Rst No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="rst_no" type="text" id="rst_no" value="{{$packing[0]->rst_no}}" readonly>
                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="stage_no" class="form-label">Stage No.</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="stage_no" type="text" id="stage_no" value="{{$packing[0]->packing_stage_no}}" readonly>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="final_weight" class="form-label">Final Weight</label>
                <div class="form-icon-user">
                    <input class="form-control alwaysvisible" required name="final_weight" type="text" id="final_weight" value="{{$packing[0]->final_weight}}" readonly>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="godown" class="form-label">Godown Name</label>
                <div class="form-icon-user">
                    <select class="form-control alwaysvisible" required name="godown" type="text" id="godown" readonly>
                       @foreach($branch as $val)
                            <option value="{{ $val->branch_id }}"  {{$packing[0]->packing_godown == $val->branch_id ? 'selected' : 'hidden'}}>{{ $val->branch_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

       
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
</form>