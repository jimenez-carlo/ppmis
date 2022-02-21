<form action="">
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*UserID</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" disabled value="<?= $default->id; ?>">
      <input type="hidden" name="user_id" value="<?php echo $default->id; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Role</label>
    <div class="col-sm-8">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" required name="role_id">
        <?php foreach ($roles as $res) { ?>
          <?php echo ($default->role_id == $res['id']) ?
            "<option value=" . $res['id'] . " selected>" . strtoupper($res['role_name']) . "</option>" :
            "<option value=" . $res['id'] . ">" . strtoupper($res['role_name']) . "</option>" ?>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" name="user" placeholder="Username" value="<?= $default->username; ?>" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control form-control-sm" name="pass" placeholder="Password">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*First name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" placeholder="Firstname" name="first" value="<?= $default->first; ?>" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Middle name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" placeholder="Middle name" name="middle" value="<?= $default->middle; ?>" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Last name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" placeholder="Last name" name="last" value="<?= $default->last; ?>" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Email</label>
    <div class="col-sm-8">
      <input type="text" class="form-control form-control-sm" placeholder="Email" require name="email" value="<?= $default->email; ?>" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">*Rank</label>
    <div class="col-sm-8">
      <!-- <input type="text" class="form-control form-control-sm" placeholder="Rank" name="rank" value="<?= $default->rank_id; ?>" required> -->
      <select name="rank" class="form-select form-select-sm" aria-label=".form-select-sm example">
        <?php foreach ($ranks as $res) { ?>
          <?php echo ($default->rank_id == $res['id']) ?
            "<option value=" . $res['id'] . " selected>" . $res['rank_name'] . "</option>" :
            "<option value=" . $res['id'] . ">" . $res['rank_name'] . "</option>" ?> <?php } ?> </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-sm btn-dark" name="UpdateUser"> <i class="fa fa-save"></i> Update User</button>
    </div>
  </div>
</form>