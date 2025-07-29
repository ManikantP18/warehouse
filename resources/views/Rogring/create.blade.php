
{{ Form::open(['url' => 'Rogring/add', 'method' => 'post', 'class'=>'needs-validation','novalidate']) }}


     <div class="modal-body">

    <h6 class="sub-title">Rogring Creation</h6>

    <div class="row">

        <div class="col-lg-12 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="Rogring_name" class="form-label">Rogrowing Responsible</label>
                <div class="form-icon-user">
                    <select class="form-control alwaysvisible" name="Rogring_name" id="Rogring_name">
                      <option value=''> Select Rogrowing Responsible </option>

                      @foreach($persons as $p)

                        <option value="{{$p->id}}">{{$p->name}}</option>

                      @endforeach

                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row align-items-end">

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label for="search" class="form-label">Account/Mobile No</label>
        <div class="form-icon-user">
          <input class="form-control onlyforformesrs" name="search" type="text" id="search" placeholder="Acc No / Mobile No">
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12">
      <div class="form-group">
        <label for="search_name" class="form-label">Farmer Name</label>
        <div class="form-icon-user">
          <input class="form-control onlyforformesrs" name="search_name" type="text" id="search_name" placeholder="Farmer Name">
        </div>
      </div>
    </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="search_owner" class="form-label">Land Owner Name</label>
                        <input class="form-control" name="search_owner" type="text" id="search_owner" placeholder="Owner Name">
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

    <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
      <div class="form-group">
        <label class="form-label d-none d-sm-block">&nbsp;</label>
        <button type="button" class="btn btn-primary w-100" onclick="searchLadger()">Search</button>
      </div>
    </div>
       

  </div>
</div>

  </div>
</div>

 
    </div>
</div>

<div class=" multy-opt  col-lg-3 col-md-3 col-sm-12 ">
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
   let searchowner = $('#search_owner').val();
  $.ajax({
    url: '{{ route("Rogring.search") }}',
    type: 'GET',
    data: {
      searchVal: searchVal,
      searchVillage: searchVillage,
      searchname: searchname
    },
    success: function (response) {

      $(".multy-opt").html(response)
      
    },
    error: function (err) {
      console.log("AJAX error:", err);
    }
  });
}
</script>

