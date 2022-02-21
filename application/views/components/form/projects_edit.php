<form action="">
  <h4>Project</h4>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Project ID</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" value="<?= $default->id; ?>" disabled>
      <input type="hidden" class="form-control form-control-sm" name="id" value="<?= $default->id; ?>">
    </div>
    <label for="" class="col-sm-2 col-form-label">*Status</label>
    <div class="col-sm-4">
      <input type="hidden" name="oldstatus" value="<?= $default->status_id; ?>">
      <?php if ($default->status_id == 3) { ?>
        <input type="hidden" name="status" value="<?= $default->status_id; ?>">
        <?php foreach ($statuses as $res) { ?>
          <?php if ($default->status_id == $res['id']) { ?>
            <input type="text" class="form-control form-control-sm" value="<?= $res['status_name']; ?>" disabled>
          <?php } ?>
        <?php } ?>
      <?php } else { ?>
        <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
          <?php foreach ($statuses as $res) { ?>
            <?php echo ($default->status_id == $res['id']) ?
              "<option value=" . $res['id'] . " selected>" . $res['status_name'] . "</option>" :
              "<option value=" . $res['id'] . ">" . $res['status_name'] . "</option>" ?> <?php } ?> </select>
      <?php } ?>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Project Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" name="name" placeholder="Project Name" value="<?= $default->name; ?>" required>
    </div>
    <label for="" class="col-sm-2 col-form-label">*Supplier</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" name="supplier" placeholder="Supplier" value="<?= $default->supplier; ?>" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Target Start Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" name="tstart" placeholder="Target Start Date" value="<?= $default->t_start_date; ?>" required autocomplete="off">
    </div>
    <label for="" class="col-sm-2 col-form-label">*Target Complete Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" placeholder="Target Complete Date" name="tcomplete" value="<?= $default->t_complete_date; ?>" required autocomplete="off">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Actual Start Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" placeholder="Actual Start Date" name="astart" value="<?= $default->a_complete_date; ?>" required autocomplete="off">
    </div>
    <label for="" class="col-sm-2 col-form-label">*Actual Complete Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" placeholder="Actual Complete Date" name="acomplete" value="<?= $default->a_complete_date; ?>" required autocomplete="off">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Remarks</label>
    <div class="col-sm-4">
      <textarea class="form-control form-control-sm" name="remarks"><?= $default->remarks; ?></textarea>
    </div>
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
      <?php if ($_SESSION['current']->role_id != 3) { ?>
        <button type="submit" class="btn btn-sm btn-dark" name="UpdateProject"> <i class="fa fa-save"></i> Update Project</button>
      <?php } ?>
    </div>
  </div>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="tab" data-bs-target="#stage">Stages</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="#" data-bs-toggle="tab" data-bs-target="#history">Status History</a>
    </li>

  </ul>
  <div class="tab-content border ">
    <div class="tab-pane active" id="stage" role="tabpanel" aria-labelledby="stage-tab">
      <h4>Stages <button class="btn btn-sm btn-dark btn-refresh" type="button" data-target-id="<?= $default->id; ?>" data-target-type="table" data-target-name="project_stages" data-target-div="project_stages"> <i class="fa fa-refresh"></i> </button></h4>
      <div id="project_stages">
      </div>
    </div>
    <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
      <h4>Status History <button class="btn btn-sm btn-dark btn-refresh" type="button" data-target-id="<?= $default->id; ?>" data-target-type="table" data-target-name="project_history" data-target-div="project_history"> <i class="fa fa-refresh"></i> </button></h4>
      <div id="project_history">

      </div>
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