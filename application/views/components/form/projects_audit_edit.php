<form action="">
  <h4>Project Audit</h4>
  <div class="table-responsive">
    <table class="table table-hover table-striped table-sm table-bordered" id="myTable">
      <thead>
        <tr>
          <th scope="col">Description</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Date</th>
          <th scope="col">Updated By</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($project_changes as $res) { ?>
          <tr>
            <td><?php echo $res['remarks']; ?></td>
            <td><?php echo ($res['column_name'] == 'status') ? $status_array[$res['from']] : $res['from']; ?></td>
            <td><?php echo ($res['column_name'] == 'status') ? $status_array[$res['to']] : $res['to']; ?></td>
            <td><?php echo $res['created_date']; ?></td>
            <td><?php echo $res['fullname']; ?></td>
            <!-- <td>
              <button class="btn btn-dark btn-sm" id="EditCategory" value="<?php echo $res['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
              <button class="btn btn-dark btn-sm" id="DeleteCategory" value="<?php echo $res['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
            </td> -->
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>

  <h4>Stage Audit</h4>
  <div id="project_stages">
  </div>

</form>