  <div class="table-responsive table-filter">
    <table class="table table-hover table-striped table-sm table-report" id="myTable">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Project Name</th>
          <th scope="col">Supplier</th>
          <th scope="col">Actual Start Date</th>
          <th scope="col">Actual Complete Date</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($content as $res) { ?>
          <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['supplier']; ?></td>
            <td><?php echo $res['a_start_date']; ?></td>
            <td><?php echo $res['a_complete_date']; ?></td>
            <td><?php echo $res['status_name']; ?></td>
            <td>
              <button class="btn btn-dark btn-sm" id="ViewProjectAudit" value="<?php echo $res['id']; ?>"><i class="fa fa-eye"></i> View </button>
            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
  <script src="<?php echo base_url(); ?>assets/JS/table.js"></script>