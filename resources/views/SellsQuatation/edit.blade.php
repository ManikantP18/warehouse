{{ Form::open(['url' => 'SellsQuatation/update', 'method' => 'put', 'class'=>'needs-validation','novalidate']) }}


<div class="modal-body">
  <div class="row">
  <input type="hidden" name="id" value="{{ $sellsquatation[0]->id }}">


    <!-- Search Fields -->
    <div class="col-12">
      <div class="row align-items-end">
        <div class="col-md-6">
          <div class="form-group">
            <label for="search" class="form-label">CASH/CREDIT</label>
            <input class="form-control" name="Cash_Credit" type="text" id="Cash_Credit" placeholder="Cash/Credit" value="{{$sellsquatation[0]->Cash_Credit}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="search_name" class="form-label">Account Holders Name</label>
            <input class="form-control" name="Account_holders_name" type="text" id="Account_holders_name" placeholder="Account_holders_Name" value="{{ $sellsquatation[0]->Account_holders_name}}">
          </div>
        </div>


        <div class="col-md-6">
          <div class="form-group">
            <label for="search_village" class="form-label">Users Name</label>
            <input class="form-control" name="Users_name" type="text" id="Users_name" placeholder="Users_name" value="{{$sellsquatation[0]->Users_name}}">
          </div>
        </div>

      
  



        <div class="col-md-6">
          <div class="form-group">
            <label>Village</label>
            <input type="text" class="form-control" name="Village" id="Village" required value="{{$sellsquatation[0]->Village}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="number" class="form-control" name="Contact_no" id="Contact_no" required pattern="[0-9]{10}" maxlength="10" value="{{$sellsquatation[0]->Contact_no}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>ITEM TO BE SALE</label>
            <input type="text" class="form-control" name="Item_To_Be_Sale" id="Item_To_Be_Sale" required value="{{$sellsquatation[0]->Item_To_Be_Sale}}">
          </div>
        </div>
                            
        <div class="col-md-6">
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" name="Quantity" id="Quantity" required value="{{$sellsquatation[0]->Quantity}}">
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>RATE</label>
            <input type="text" class="form-control" name="Rate" id="Rate" required value="{{$sellsquatation[0]->Rate}}">
          </div>
        </div>

        <div class="col-md-6 changehide">
          <div class="form-group">
            <label>TOTAL AMOUNT</label>
            <input type="text" class="form-control" name="Total_Amount" id="Total_Amount" required value="{{$sellsquatation[0]->Total_Amount}}">
          </div>
        </div>


      

        <div class="col-md-6">
          <div class="form-group">
            <label>GST Amount</label>
            <input type="number" class="form-control" name="GST_Amount" id="GST_Amount" required value="{{$sellsquatation[0]->GST_Amount}}">
          </div>
        </div>

      
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
  <input type="submit" value="Update" class="btn btn-primary">
</div>
{{ Form::close() }}


