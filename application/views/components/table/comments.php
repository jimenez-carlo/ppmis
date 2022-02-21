<div class="coment-bottom bg-white p-2 px-4 border">
  <?php foreach ($content as $res) { ?>
    <div class="commented-section mt-2 ">
      <div class="d-flex flex-row align-items-center commented-user">
        <p class="text-black" style="margin:unset"><?= ucwords($res['fullname']); ?></p>
      </div>
      <div class="d-flex flex-row align-items-center commented-user">
        <em style="color:black;font-size:10px"><?= $res['created_date']; ?></em>
      </div>
      <div class="comment-text-sm">
        <span>
          <?= $res['message']; ?>
        </span>
      </div>
    </div>
  <?php } ?>

  <?php if (empty(count($content))) { ?>
    <div class="commented-section mt-2 ">
      <div class="d-flex flex-row align-items-center commented-user">
        <p class="text-black" style="margin:unset"></p>
      </div>
      <div class="d-flex flex-row align-items-center commented-user">
        <em style="color:black;font-size:10px"></em>
      </div>
      <div class="comment-text-sm">
        <?php echo "No Comments Yet!"; ?>
      </div>
    </div>

  <?php } ?>
</div>