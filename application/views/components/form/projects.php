<form action="">
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Project Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" name="name" placeholder="Project Name" required>
    </div>
    <label for="" class="col-sm-2 col-form-label">*Supplier</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" name="supplier" placeholder="Supplier" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Target Start Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" name="tstart" placeholder="Target Start Date" required autocomplete="off">
    </div>
    <label for="" class="col-sm-2 col-form-label">*Target Complete Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" placeholder="Target Complete Date" name="tcomplete" required autocomplete="off">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Actual Start Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" placeholder="Actual Start Date" name="astart" required autocomplete="off">
    </div>
    <label for="" class="col-sm-2 col-form-label">*Actual Complete Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" placeholder="Actual Complete Date" name="acomplete" required autocomplete="off">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Remarks</label>
    <div class="col-sm-8">
      <textarea class="form-control form-control-sm" name="remarks"></textarea>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-sm btn-dark" name="SaveProject"> <i class="fa fa-suitcase"></i> Create Project</button>
    </div>
  </div>
</form>

<script>
  $(document).ready(function() {
    $('.date').datepicker({
      format: "yyyy-mm-dd"
    });
  });
</script>