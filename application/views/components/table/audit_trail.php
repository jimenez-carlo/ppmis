  <div class="table-responsive table-filter">
    <table class="table table-hover table-striped table-sm table-report" id="myTable">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Module</th>
          <th scope="col">Remarks</th>
          <th scope="col">ActionDate</th>
          <th scope="col">ActionBy</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($content as $res) { ?>
          <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['remarks']; ?></td>
            <td><?php echo $res['module']; ?></td>
            <td><?php echo $res['created_date']; ?></td>
            <td><?php echo $res['fullname']; ?></td>
            <td></td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
  <script src="<?php echo base_url(); ?>assets/JS/table.js"></script>