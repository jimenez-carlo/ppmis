<form action="">
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Role</label>
    <div class="col-sm-8">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" required name="role_id">
        <?php foreach ($roles as $res) { ?>
          <option value="<?php echo $res['id'] ?>"><?php echo strtoupper($res['role_name']); ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="user" placeholder="Username" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control form-control-sm" name="pass" placeholder="Password" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Confirm Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control form-control-sm" name="conpass" placeholder="Retype Password" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*First name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" placeholder="Firstname" name="first" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Middle name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" placeholder="Middle name" name="middle" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Last name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" placeholder="Last name" name="last" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Email</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" placeholder="Email" require name="email">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Rank</label>
    <div class="col-sm-8">
      <select name="rank" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <?php foreach ($ranks as $res) { ?>
          <?php echo "<option value=" . $res['id'] . ">" . $res['rank_name'] . "</option>"; ?>
        <?php } ?> </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-sm btn-dark" name="SaveUser"> <i class="fa fa-user-plus"></i> Create User</button>
    </div>
  </div>
</form>