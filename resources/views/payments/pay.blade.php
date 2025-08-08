{{ Form::open(['url' => 'payment/create', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title">IN/OUT Payment</h6>

    <div class="row">

        
            

        <div class="col-lg-10 col-md-10 col-sm-10 m-auto">
            <div class="form-group">
                <label for="company_name" class="form-label">Transition Type</label>
                <div class="form-icon-user">
                    <select class="form-control"  name="tr_type" id="tr_type" onchange="showHideFields()">
                        <option value="cash">Cash</option>
                        <option value="bank">Bank</option>
                        <option value="both">Both</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="total_amount" class="form-label">Total Amount</label>
                <div class="form-icon-user">
                    <input class="form-control"  name="total_amount" type="number" id="total_amount" step="0.01" value="{{$total[0]->amount}}">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="cash_amount" class="form-label">Cash Amount</label>
                <div class="form-icon-user">
                    <input class="form-control"  name="cash_amount" type="number" id="cash_amount" step="0.01" onkeyup="remAmount()">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 ">
            <div class="form-group"  style="display:none">
                <label for="bank_name" class="form-label">Bank Name</label>
                <div class="form-icon-user">
                    <select class="form-control"  name="bank_name" id="bank_name">
                        @foreach($bank as $val):
                        <option value="{{$val->account_id}}">{{$val->bank_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
       

         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group" style="display:none">
                <label for="bank_amount" class="form-label">Bank Amount</label>
                <div class="form-icon-user">
                    <input class="form-control"  name="bank_amount" type="number" value="0" id="bank_amount" step="0.01" onkeyup="remAmount()">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="remaining_amount" class="form-label">Remaining Amount</label>
                <div class="form-icon-user">
                    <input class="form-control"  name="remaining_amount" type="number" id="remaining_amount" step="0.01">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="remark" class="form-label">Remark</label>
                <div class="form-icon-user">
                    <textarea class="form-control"  name="remark" id="remark"></textarea>
                </div>
            </div>
        </div>
        <input type="hidden" name="pay_ladger_id" id="pay_ladger_id"  value="{{$total[0]->pay_ladger_id}}">
         <input type="hidden" name="sell_id" id="sell_id"  value="{{$total[0]->sell_id}}">
         <input type="hidden" name="purchase_id" id="purchase_id"  value="{{$total[0]->purchase_id}}">
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Pay" class="btn btn-primary">
</div>
</form>
<script>
    function showHideFields() {
        var trType = document.getElementById("tr_type").value;

        var cashAmount = document.getElementById("cash_amount").closest(".form-group");
        var bankName = document.getElementById("bank_name").closest(".form-group");
        var bankAmount = document.getElementById("bank_amount").closest(".form-group");

        if (trType === "cash") {
            cashAmount.style.display = "block";
            bankName.style.display = "none";
            bankAmount.style.display = "none";
        } else if (trType === "bank") {
            cashAmount.style.display = "none";
            bankName.style.display = "block";
            bankAmount.style.display = "block";
        } else if (trType === "both") {
            cashAmount.style.display = "block";
            bankName.style.display = "block";
            bankAmount.style.display = "block";
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        showHideFields();
    });

    function remAmount() {

        let bank_amount = parseInt($("#bank_amount").val());
        let cash_amount = parseInt($("#cash_amount").val());
        let total_amount = parseInt($("#total_amount").val());

        let remainAmt = total_amount - cash_amount - bank_amount;

        $("#remaining_amount").val(remainAmt)

    }

</script>
