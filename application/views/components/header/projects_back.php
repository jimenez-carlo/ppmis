<!-- <h1 class="h2"></h1> -->
<div>
  <button type="button" class="btn btn-sm btn-dark" id="BackProjects" value="<?= $id; ?>"><i class="fa fa-chevron-left"></i> Back</button>
  <?php if ($_SESSION['current']->role_id != 3) { ?>
    <button type="button" class="btn btn-sm btn-dark" id="ExportProjects" value="<?= $id; ?>"><i class="fa fa-download"></i> Export</button>
  <?php } ?>
</div>