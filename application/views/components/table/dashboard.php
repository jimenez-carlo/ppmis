<div class="row row-cols-4 row-cols-md-4 mb-4 text-center">
  <div class="col">
    <div class="card mb-3 rounded-3 shadow-sm">
      <div class="card-header py-3 text-white bg-dark">
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?= $content->projectTotal; ?></h1>
        <ul class="list-unstyled mt-3 mb-3">
          <li>
            <h4> <i class="fa fa-suitcase"></i> Total Projects</h4>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mb-3 rounded-3 shadow-sm">
      <div class="card-header py-3 text-white bg-dark">
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?= $content->projectPending; ?></h1>
        <ul class="list-unstyled mt-3 mb-3">
          <li>
            <h4> <i class="fa fa-clock-o"></i> Pending Projects</h4>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mb-3 rounded-3 shadow-sm">
      <div class="card-header py-3 text-white bg-dark border-dark">
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?= $content->projectInprogress; ?></h1>
        <ul class="list-unstyled mt-3 mb-3">
          <li>
            <h4> <i class="fa fa-clock-o"></i> In Progress Project</h4>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mb-3 rounded-3 shadow-sm">
      <div class="card-header py-3 text-white bg-dark border-dark">
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?= $content->projectCompleted; ?><small class="text-muted fw-light">/<?= $content->projectTotal; ?></small></h1>
        <ul class="list-unstyled mt-3 mb-3">
          <li>
            <h4> <i class="fa fa-check-square-o"></i> Completed Projects</h4>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<div class="row row-cols-4 row-cols-md-4 mb-4 text-center">
  <div class="col">
    <div class="card mb-3 rounded-3 shadow-sm">
      <div class="card-header py-3 text-white bg-dark">
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?= $content->userTotal; ?></h1>
        <ul class="list-unstyled mt-3 mb-3">
          <li>
            <h4> <i class="fa fa-users"></i> Users</h4>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mb-3 rounded-3 shadow-sm">
      <div class="card-header py-3 text-white bg-dark">
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?= $content->projectCreated; ?></h1>
        <ul class="list-unstyled mt-3 mb-3">
          <li>
            <h4> <i class="fa fa-suitcase"></i> My Projects</h4>
          </li>
        </ul>
      </div>
    </div>
  </div>

</div>