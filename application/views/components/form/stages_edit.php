<form action="">
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Project ID</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" disabled value="<?= $default->project_id; ?>">
    </div>
    <label for="" class="col-sm-2 col-form-label">*Project Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" placeholder="Project Name" disabled value="<?= $default->name; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Stage ID</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" disabled value="<?= $default->id; ?>">
      <input type="hidden" value="<?= $default->id; ?>" name="id">
    </div>
    <label for="" class="col-sm-2 col-form-label">*Stage Status</label>
    <div class="col-sm-4">
      <input type="hidden" name="oldstatus" value="<?= $default->sub_status_id; ?>">
      <?php if ($default->sub_status_id == 3) { ?>
        <input type="hidden" name="status" value="<?= $default->sub_status_id; ?>">
        <?php foreach ($statuses as $res) { ?>
          <?php if ($default->sub_status_id == $res['id']) { ?>
            <input type="text" class="form-control form-control-sm" value="<?= $res['sub_status_name']; ?>" disabled>
          <?php } ?>
        <?php } ?>
      <?php } else { ?>
        <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
          <?php foreach ($statuses as $res) { ?>
            <?php echo ($default->sub_status_id == $res['id']) ?
              "<option value=" . $res['id'] . " selected>" . $res['sub_status_name'] . "</option>" :
              "<option value=" . $res['id'] . ">" . $res['sub_status_name'] . "</option>" ?> <?php } ?> </select>
      <?php } ?>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Stage Details </label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm" placeholder="Stage Details" name="details" value="<?= $default->details; ?>" autocomplete="off">
    </div>
    <label for="" class="col-sm-2 col-form-label">*Date</label>
    <div class="col-sm-4">
      <input type="text" class="form-control form-control-sm date" placeholder="Date" value="<?= $default->assigned_date; ?>" name="dt" required autocomplete="off">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Remarks</label>
    <div class="col-sm-4">
      <textarea class="form-control form-control-sm" name="remarks"></textarea>
    </div>
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
      <?php if ($_SESSION['current']->role_id != 3) { ?>
        <button type="submit" class="btn btn-sm btn-dark" name="UpdateStage"> <i class="fa fa-save"></i> Update Stage</button>
      <?php } ?>
    </div>
  </div>
</form>

<form>
  <div class="mb-3 row">
    <h4>Comments <button class="btn btn-sm btn-dark btn-refresh" type="button" data-target-id="<?= $default->id; ?>" data-target-type="table" data-target-name="comments" data-target-div="comments"> <i class="fa fa-refresh"></i> </button></h4>
    <div class="col-sm-6" id="comments">
    </div>
    <div class="col-sm-6">
      <textarea class="form-control msg" placeholder="Enter comment here" name="msg"></textarea>
      <div class="d-grid col-12 mx-auto">
        <?php if ($_SESSION['current']->role_id != 3) { ?>
          <button class="btn btn-sm btn-dark" type="submit" value="<?= $default->id; ?>" name="CommentStage"><i class="fa fa-comments-o"></i> Comment</button>
        <?php } else { ?>
          <button class="btn btn-sm btn-dark" type="button" disabled><i class="fa fa-comments-o"></i> Comment</button>
        <?php } ?>
      </div>
      <br>
      <h4>History <button class="btn btn-sm btn-dark btn-refresh" type="button" data-target-id="<?= $default->id; ?>" data-target-type="table" data-target-name="stage_history" data-target-div="stage_history"> <i class="fa fa-refresh"></i> </button></h4>
      <div id="stage_history">
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