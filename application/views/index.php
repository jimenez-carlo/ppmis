<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>PPMIS</title>
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>assets/Boostrap 5/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/datatable.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/icons.css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/fonts.css" /> -->
	<link rel="icon" href="<?php echo base_url() ?>assets/favicon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/CSS/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/CSS/datepicker.css">
</head>

<body>
	<div id="container">
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
				PPMIS
			</a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
			<!-- <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div> -->
		</header>

		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="position-sticky pt-3">
						<!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 ">
          Menu
        </h6> -->
						<ul class="nav flex-column ">
							<li class="nav-item">
								<!-- <a class="nav-link active" aria-current="page" href="#">
             
              Menu
            </a> -->
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" href="#" value="inventory">
									<i class="fa fa-suitcase"></i>
									Inventory
								</a>
							</li> -->
							<!-- <li class="nav-item">
								<a class="nav-link" href="#" value="history">
									<i class="fa fa-history"></i>
									History
								</a>
							</li> -->
							<!-- </li>
							<li class="nav-item">
								<a class="nav-link" href="#" value="category">
									<i class="fa fa-tag"></i>
									Category
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" value="subcategory">
									<i class="fa fa-tags"></i>
									Subcategory
								</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link active" href="#" value="dashboard">
									<i class="fa fa-dashboard"></i>
									Dashboard
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" value="projects">
									<i class="fa fa-paste"></i>
									Projects
								</a>
							</li>
							<?php if ($_SESSION['current']->role_id != 3) { ?>
								<li class="nav-item">
									<a class="nav-link" href="#" value="report">
										<i class="fa fa-file-o"></i>
										Reports
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#" value="audit_trail">
										<i class="fa fa-book"></i>
										Audit Trail
									</a>
								</li>
							<?php } ?>
							<?php if ($_SESSION['current']->role_id == 1) { ?>
								<li class="nav-item">
									<a class="nav-link" href="#" value="users">
										<i class="fa fa-users"></i>
										Users
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#" value="rank">
										<i class="fa fa-wrench"></i>
										Ranks
									</a>
								</li>
							<?php } ?>
							<li class="nav-item">
								<a class="nav-link" href="#" value="book">
									<i class="fa fa-book"></i>
									System Manual
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('/logout') ?>" onclick="return confirm('You are about to Logout?')">
									<i class="fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<form action="" method="post">
						<?php //echo $error; 
						?>
						<!-- <input type="file" name="userfile" >
						<input type="submit" name="submit"> -->
					</form>
					<div id="alert"></div>
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="header">

						<!-- <h3><i class="fa fa-hand-o-left"></i> Select From The Menu To Get Started!</h3> -->
					</div>
					<div id="main">
					</div>
				</main>
			</div>
		</div>

	</div>
	<!-- Modal -->
	<div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal">
		<form action="" method="post">

			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ModalTitle">Import CSV File</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" id="Modal">
						<input type="file" name="CsvFile">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-dark btn-sm" name="ImportCSV"><i class="fa fa-save"></i> Save</button>
						<button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script src="<?php echo base_url(); ?>assets/Boostrap 5/assets/dist/js/bootstrap.bundle.min.js"></script>

	<script src="<?php echo base_url() ?>assets/JS/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/datepicker.js"></script>

	<!-- Data table -->
	<script src="<?php echo base_url() ?>assets/JS/datatable.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/datableboostrap.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/datatablebuttons.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/datatablebuttonsboostrap.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/zip.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/pdf.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/pdffonts.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/html5.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/print.js"></script>
	<script src="<?php echo base_url() ?>assets/JS/colvis.js"></script>



	<script>
		var base_url = '<?php echo base_url() ?>';
	</script>
	<script src="<?php echo base_url() ?>assets/JS/main.js"></script>
	<script>
		$(document).ready(function() {
			LoadHeader('dashboard');
			LoadMain('table', 'dashboard');


		});
	</script>
</body>

</html>