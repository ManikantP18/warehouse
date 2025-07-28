@php
    $plan = \App\Models\Utility::getChatGPTSettings();
@endphp
{{ Form::open(['url' => 'productservice', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
    <div class="row">
        @if (isset($plan->enable_chatgpt)  && $plan->enable_chatgpt == 'on')
            <div>
                <a href="#" data-size="md" data-ajax-popup-over="true"
                    data-url="{{ route('generate', ['product & service']) }}" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __('Generate') }}" data-title="{{ __('Generate content with AI') }}"
                    class="btn btn-primary btn-sm float-end">
                    <i class="fas fa-robot"></i>
                    {{ __('Generate with AI') }}
                </a>
            </div>
        @endif
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}<x-required></x-required>
                <div class="form-icon-user">
                    {{ Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) }}
                </div>
            </div>
        </div>
        

        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('sale_price', __('Sale Price'), ['class' => 'form-label']) }}<x-required></x-required>
                <div class="form-icon-user">
                    {{ Form::number('sale_price', '', ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) }}
                </div>
            </div>
        </div>
       
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('purchase_price', __('Purchase Price'), ['class' => 'form-label']) }}<x-required></x-required>
                <div class="form-icon-user">
                    {{ Form::number('purchase_price', '', ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) }}
                </div>
            </div>
        </div>
        
        <div class="form-group col-md-6">
            {{ Form::label('tax_id', __('Tax'), ['class' => 'form-label']) }}<x-required></x-required>
            {{ Form::select('tax_id[]', $tax, null, ['class' => 'form-control select2', 'id' => 'choices-multiple1', 'multiple', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('category_id', __('Category'), ['class' => 'form-label']) }}<x-required></x-required>
            {{ Form::select('category_id', $category, null, ['class' => 'form-control select', 'required' => 'required']) }}

            <div class=" text-xs">
                {{ __('Please add constant category. ') }}<a
                    href="{{ route('product-category.index') }}"><b>{{ __('Add Category') }}</b></a>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="unit_id" class="form-label">Primary Unit<span class="text-danger">*</span></label>
            <select name="unit_id" id="unit_id" class="form-control select" required onchange="toggle()">
                <option value="">Select Unit</option> {{-- Optional default --}}
                @foreach($unit as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div id="sec_unit_wrapper" class="form-group col-md-6" style="display: none;">
            <label for="sec_unit" class="form-label">Secondary Unit<span class="text-danger">*</span></label>
            <select name="sec_unit" id="sec_unit" class="form-control select" required onchange="secToggle()">
                @foreach($unit as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

         <div id="first-unit" class="form-group col-md-2 unitconver d-none">
            <label for="first-unit" class="form-label"><span class="text-danger">*</span></label>
             <input type="text" name="first_unit" class="form-control" required /> <span class="fw-bold first-unit"></span>
        </div>

       <div class="form-group col-md-1 unitconver d-none mt-4 text-center">
        <label for="second-unit" class="form-label"><span class="text-danger"></span></label>
        =
        </div> 

         <div id="second-unit" class="form-group col-md-2 unitconver d-none">
            <label for="second-unit" class="form-label"><span class="text-danger">*</span></label>
            <input type="text" name="second_unit" class="form-control" required /> <span class="fw-bold second-unit"></span>
        </div>




        <!-- <div class="form-group col-md-6">
            {{ Form::label('quantity', __('Quantity'), ['class' => 'form-label']) }}<x-required></x-required>
            {{ Form::text('quantity', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="btn-box">
                    <label class="d-block form-label">{{ __('Type') }}</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="customRadio5" name="type"
                                    value="Product" checked="checked" onclick="hide_show(this)">
                                <label class="custom-control-label form-label"
                                    for="customRadio5">{{ __('Product') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="customRadio6" name="type"
                                    value="Service" onclick="hide_show(this)">
                                <label class="custom-control-label form-label"
                                    for="customRadio6">{{ __('Service') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <input type="hidden" class="form-check-input type" id="customRadio5" name="type"
                               value="Product">
                               
        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
        @if (!$customFields->isEmpty())
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="tab-pane fade show" id="tab-2" role="tabpanel">
                    @include('customFields.formBuilder')
                </div>
            </div>
        @endif
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{ __('Cancel') }}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Create') }}" class="btn  btn-primary">
</div>
{{ Form::close() }}

<script>
$(document).on('click', 'input[name="type"]', function () {
    var type = $(this).val(); // Get the selected type value
    if (type === 'Product') {
        // Show quantity field and make it required
        $('.quantity').removeClass('d-none').addClass('d-block');
        $('input[name="quantity"]').prop('required', true);
    } else if (type === 'Service') {
        // Hide quantity field, clear its value, and remove required attribute
        $('.quantity').addClass('d-none').removeClass('d-block');
        $('input[name="quantity"]').val('').prop('required', false);
    }
});

function toggle() {
    const selected = document.getElementById('unit_id').value;
    const secUnitWrapper = document.getElementById('sec_unit_wrapper');

    if (selected) {
        secUnitWrapper.style.display = 'block';

        $(".first-unit").html($("#unit_id option:selected").text());
    } else {
        secUnitWrapper.style.display = 'none';
    }
}

function secToggle() {
    const selectedValue = document.getElementById('sec_unit').value;

    $('.unitconver').addClass('d-none');

    if (selectedValue) {
        $('.unitconver').removeClass('d-none');

        $(".second-unit").html($("#sec_unit option:selected").text())
    }
}


</script>