{{ Form::open(['url' => 'packing/update', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <h6 class="sub-title"> Edit Packing</h6>

    <div class="row">
        <input type="hidden" value="{{ $packing[0]->packing_id }}" name="packing_id">

        <!-- Farmer Name -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Farmer Name</label>
                <input class="form-control" required name="farmer_name" type="text" value="{{ $packing[0]->farmer_name }}" readonly>
            </div>
        </div>

        <!-- Land Owner -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Land Owner</label>
                <input class="form-control" required name="land_owner" type="text" value="{{ $packing[0]->land_owner }}" readonly>
            </div>
        </div>

        <!-- Verity -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Verity</label>
                <select class="form-control" required name="verity" readonly>
                    <option value="{{ $packing[0]->id }}">{{ $packing[0]->name }}</option>
                </select>
            </div>
        </div>

        <!-- Gredded Quantity -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Gredded Quantity (Quintal)</label>
                <input class="form-control" required name="Gredded_qty" type="text" value="{{ $packing[0]->packing_gredded_quantity }}" readonly>
            </div>
        </div>

        <!-- Pay for Packing -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Pay for Packing</label>
                <input class="form-control" required name="packing_pay" type="text" value="{{ $packing[0]->packing_pay }}" readonly>
                <small class="text-muted">Auto-calculated based on graded quantity and packing price per kwintal</small>
            </div>
        </div>

        <!-- Lot No -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Lot No.</label>
                <input class="form-control" required name="lot_no" type="text" value="{{ $packing[0]->lot_no }}" readonly>
            </div>
        </div>

        <!-- Gredding Stage No -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Gredding Stage No.</label>
                <input class="form-control" required name="staging_stage_no" type="text" value="{{ $packing[0]->gred_stage_no }}" readonly>
            </div>
        </div>

        <!-- Packing Stage No -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Packing Stage No.</label>
                <input class="form-control" required name="stage_no" type="text" value="{{ $packing[0]->packing_stage_no }}">
            </div>
        </div>

        <!-- Final Weight -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Final Weight</label>
                <input class="form-control" required name="final_weight" type="text" value="{{ $packing[0]->final_weight }}" readonly>
            </div>
        </div>

        <!-- Company Name -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Company Name</label>
                <select name="company_id" class="form-control" required>
                    <option value="" hidden>Select Company Name</option> 
                    @foreach($company as $value)
                        <option value="{{ $value->company_id }}" {{ $value->company_id == $packing[0]->cmp ? 'selected' : '' }}>
                            {{ $value->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Godown -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Godown Name</label>
                <select class="form-control" required name="godown" readonly>
                   @foreach($branch as $val)
                        <option value="{{ $val->branch_id }}" {{ $packing[0]->packing_godown == $val->branch_id ? 'selected' : '' }}>
                            {{ $val->branch_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Gredding No. of Bag -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Gredding No. of Bag</label>
                <input class="form-control" required name="staging_total_bag" type="text" value="{{ $packing[0]->gred_no_bag }}" readonly>
            </div>
        </div>

        <!-- Packing Date -->
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Packing Date</label>
                <input class="form-control" required name="packing_date" type="date" value="{{ $packing[0]->packing_date ?: date('Y-m-d') }}">
                <div class="invalid-feedback">Please select a packing date.</div>
            </div>
        </div>

        <!-- Dynamic Bag Rows -->
        @php
            $rows = [];
            if($packing[0]->packing_40 > 0) $rows[] = ['kg'=>40, 'bags'=>$packing[0]->packing_40];
            if($packing[0]->packing_30 > 0) $rows[] = ['kg'=>30, 'bags'=>$packing[0]->packing_30];
            if($packing[0]->packing_20 > 0) $rows[] = ['kg'=>20, 'bags'=>$packing[0]->packing_20];
            if($packing[0]->packing_5  > 0) $rows[] = ['kg'=>5,  'bags'=>$packing[0]->packing_5];
            if(empty($rows)) $rows[] = ['kg'=>'', 'bags'=>'']; // First edit case
        @endphp

        <div id="bagRows" class="mt-3">
        @foreach($rows as $row)
            <div class="row bag-row mb-2">
                <div class="col-lg-3">
                    <select class="form-control bag-select" name="bags_kg[]">
                        <option value="">Select KG</option>
                        <option value="40" {{ $row['kg']==40 ? 'selected' : '' }}>40 KG</option>
                        <option value="30" {{ $row['kg']==30 ? 'selected' : '' }}>30 KG</option>
                        <option value="20" {{ $row['kg']==20 ? 'selected' : '' }}>20 KG</option>
                        <option value="5"  {{ $row['kg']==5  ? 'selected' : '' }}>5 KG</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <input type="number" class="form-control bag-count" name="bags_count[]" min="0" value="{{ $row['bags'] }}" placeholder="Enter Quantity....">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control total-kg" name="total_kg[]" readonly placeholder="Total KG....">
                </div>
                <div class="col-lg-3">
                    <button type="button" class="btn btn-danger remove-row">- Remove</button>
                </div>
            </div>
        @endforeach
        </div>

        <div class="mt-2">
            <button type="button" id="addRow" class="btn btn-primary">+ Add More</button>
        </div>

        <div class="mt-3">
            <label>Remaining Quantity (KG)</label>
            <input type="text" name="remaing_qty" id="remainingQty" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="Update" class="btn btn-primary">
</div>
</form>

<script>
$(function() {
    const greddedQtyKG = (parseFloat("{{ $packing[0]->packing_gredded_quantity }}") || 0) * 100;

    function calculateTotals() {
        let totalUsed = 0;
        $('.bag-row').each(function() {
            const kg = parseFloat($(this).find('.bag-select').val()) || 0;
            const bags = parseFloat($(this).find('.bag-count').val()) || 0;
            const total = kg * bags;
            $(this).find('.total-kg').val(total > 0 ? total + ' KG' : '');
            totalUsed += total;
        });

        const remaining = greddedQtyKG - totalUsed;
        if (remaining < 0) {
            alert("Quantity exceeded available stock!");
            $(':focus').val('');
            calculateTotals();
            return;
        }
        
        $('#remainingQty').val(remaining + ' KG');
    }

    $(document).on('change', '.bag-select', function() {
        const selectedVal = $(this).val();
        if (selectedVal) {
            let duplicate = false;
            $('.bag-select').not(this).each(function() {
                if ($(this).val() === selectedVal) {
                    duplicate = true;
                    return false;
                }
            });
            if (duplicate) {
                alert("This KG value is already selected!");
                $(this).val('');
                return;
            }
        }
        calculateTotals();
    });

    $(document).on('keyup change', '.bag-count', calculateTotals);

    $(document).on('click', '#addRow', function() {
        let newRow = $('.bag-row:first').clone();
        newRow.find('select').val('');
        newRow.find('.bag-count').val('');
        newRow.find('.total-kg').val('');
        $('#bagRows').append(newRow);
    });

    $(document).on('click', '.remove-row', function() {
        if ($('.bag-row').length > 1) {
            $(this).closest('.bag-row').remove();
            calculateTotals();
        }
    });

    // Initialize calculations on page load
    calculateTotals();
});
</script>
