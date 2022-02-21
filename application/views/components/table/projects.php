<div class="table-responsive">
  <table class="table table-hover table-striped table-sm" id="myTable">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Project Name</th>
        <th scope="col">Supplier</th>
        <th scope="col">Target Start Date</th>
        <th scope="col">Target Complete Date</th>
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
          <td><?php echo $res['t_start_date']; ?></td>
          <td><?php echo $res['t_complete_date']; ?></td>
          <td><?php echo $res['a_start_date']; ?></td>
          <td><?php echo $res['a_complete_date']; ?></td>
          <td><?php echo $res['status_name']; ?></td>
          <td>
            <?php if ($_SESSION['current']->role_id != 3) { ?>
              <button class="btn btn-dark btn-sm" id="EditProjects" value="<?php echo $res['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
              <button class="btn btn-dark btn-sm" id="DeleteProjects" value="<?php echo $res['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php } else { ?>
              <button class="btn btn-dark btn-sm" id="EditProjects" value="<?php echo $res['id']; ?>"><i class="fa fa-eye"></i> View</button>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="<?php echo base_url(); ?>assets/JS/table.js"></script>