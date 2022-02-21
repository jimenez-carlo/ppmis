<!-- <h1 class="h2"></h1> -->
<?php if ($_SESSION['current']->role_id != 3) { ?>
	<div>

		<button type="button" class="btn btn-sm btn-dark" id="AddProjects"><i class="fa fa-suitcase"></i> Add Project</button>
	</div>
	<div class="btn-toolbar mb-2 mb-md-0">

		<!-- <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle">
								<i class="fa fa-calendar"></i>
								This week
							</button> -->
	</div>
<?php } ?>