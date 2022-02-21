<!-- <h1 class="h2"></h1> -->
<?php if (isset($id)) { ?>
  <button type="button" class="btn btn-sm btn-dark" id="EditProjects" value="<?= $id; ?>"><i class="fa fa-chevron-left"></i> Back</button>
<?php } else { ?>
  <button type="button" class="btn btn-sm btn-dark" id="BackProjects"><i class="fa fa-chevron-left"></i> Back</button>
<?php } ?>