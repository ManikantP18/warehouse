{{ Form::open(['url' => 'SellsQuatation/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}
<div class="modal-body">
  <div class="row">

    <!-- Search Fields -->
    <div class="col-12">
      <div class="row align-items-end">
        <div class="col-md-6">
          <div class="form-group">
            <label for="search" class="form-label">CASH/CREDIT</label>
            <input class="form-control" name="Cash/Credit" type="text" id="Cash/Credit" placeholder="Cash/Credit">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="search_name" class="form-label">Account Holders Name</label>
            <input class="form-control" name="Account_holders_name" type="text" id="Account_holders_name" placeholder="Account_holders_Name">
          </div>
        </div>


        <div class="col-md-6">
          <div class="form-group">
            <label for="search_village" class="form-label">Users Name</label>
            <input class="form-control" name="Users_name" type="text" id="Users_name" placeholder="Users_name">
          </div>
        </div>

    


        <div class="col-md-6">
          <div class="form-group">
            <label>Village</label>
            <input type="text" class="form-control" name="Village" id="Village" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="number" class="form-control" name="Contact_no" id="Contact_no" required pattern="[0-9]{10}" maxlength="10">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>ITEM TO BE SALE</label>
            <input type="text" class="form-control" name="Item_To_Be_Sale" id="Item_To_Be_Sale" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" name="Quantity" id="Quantity" required>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>RATE</label>
            <input type="text" class="form-control" name="Rate" id="Rate" required>
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>TOTAL AMOUNT</label>
            <input type="text" class="form-control" name="Total_Amount" id="Total_Amount" required>
          </div>
        </div>


      

        <div class="col-md-6">
          <div class="form-group">
            <label>GST Amount</label>
            <input type="number" class="form-control" name="GST_Amount" id="GST_Amount" required value='0'>
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

<input type="hidden" id="itemsdata" value="{{ json_encode($items) }}">

<script>
function toggleFields() {
  let val = document.getElementById('sellto_farmer/other').value;
  $('.changehide').show();
  if (val === 'other') $('.changehide').hide();
}

