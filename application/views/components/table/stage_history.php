<table class="table table-hover table-striped table-sm table-bordered">
  <thead>
    <tr>
      <th scope="col">Status</th>
      <th scope="col">Date Created</th>
      <th scope="col">Created By</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($content as $res) { ?>
      <tr>
        <td><?php echo $res['sub_status_name']; ?></td>
        <td><?php echo $res['created_date']; ?></td>
        <td><?php echo $res['fullname']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>