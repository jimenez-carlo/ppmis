<table class="table table-hover table-striped table-sm table-bordered" id="myTable">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Stage Details</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Created By</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $old = $all = 0; ?>
    <?php foreach ($content as $res) { ?>
      <?php if (2 > $old && $old != 0) {
        $all = 99;
      } ?>
      <tr>
        <td><?php echo $res['sequence']; ?></td>
        <td><?php echo $res['details']; ?></td>
        <td><?php echo $res['assigned_date']; ?></td>
        <td><?php echo $res['sub_status_name']; ?></td>
        <td><?php echo $res['fullname']; ?></td>
        <td>
          <?php if ($all == 99) { ?>
            <button class="btn btn-danger btn-sm" disabled><i class="fa fa-lock"></i> View</button>
          <?php } else { ?>
            <button class="btn btn-dark btn-sm" id="EditStage" value="<?php echo $res['id']; ?>" data-project-id="<?= $res['project_id']; ?>"><i class="fa fa-unlock"></i> View</button>
          <?php } ?>

        </td>
      </tr>
      <?php $old = $res['sub_status_id']; ?>
    <?php } ?>

  </tbody>
</table>