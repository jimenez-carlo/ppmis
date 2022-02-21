<div class="table-responsive">
  <table class="table table-hover table-striped table-sm" id="myTable">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Rank</th>
        <th scope="col">Full Name</th>
        <th scope="col">Role</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($content as $res) { ?>
        <tr>
          <td><?php echo $res['id']; ?></td>
          <td><?php echo ($res['rank']); ?></td>
          <td><?php echo $res['fullname']; ?></td>
          <td><?php echo ($res['role_name']); ?></td>
          <td><?php echo $res['email']; ?></td>
          <td>
            <button class="btn btn-dark btn-sm" id="EditUser" value="<?php echo $res['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-dark btn-sm" id="DeleteUser" value="<?php echo $res['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="<?php echo base_url(); ?>assets/JS/table.js"></script>