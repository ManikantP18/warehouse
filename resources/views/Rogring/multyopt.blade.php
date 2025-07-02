

{{ Form::label('ladger_id', __('Select Ledgers'), ['class' => 'form-label']) }}<x-required></x-required>
            {{ Form::select('ladger_id[]', $farmers, null, ['class' => 'form-control select2', 'id' => 'choices-multiple1', 'multiple', 'required' => 'required']) }}


            <!-- Warning Section Ends -->
<!-- Required Js -->
<script src="http://127.0.0.1:8081/js/jquery.min.js"></script>
<script src="http://127.0.0.1:8081/js/jquery.form.js"></script>

<script src="http://127.0.0.1:8081/assets/js/plugins/bootstrap.min.js"></script>


<script src="http://127.0.0.1:8081/assets/js/plugins/choices.min.js"></script>

<!-- sweet alert Js -->

<script src="http://127.0.0.1:8081/js/custom.js"></script>

