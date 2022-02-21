<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>CIMS</title>
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>assets/Boostrap 5/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/datatable.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/icons.css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/CSS/fonts.css" /> -->
	<link rel="icon" href="<?php echo base_url() ?>assets/favicon.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/CSS/style.css">
</head>
<style>
	html,
	body {
		/* height: 100%; */
	}

	body {
		display: block;
		align-items: center;
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #f5f5f5;
	}

	.form-signin {
		width: 100%;
		max-width: 500px;
		padding: 15px;
		margin: auto;
	}

	.form-signin .checkbox {
		font-weight: 400;
	}

	.form-signin .form-floating:focus-within {
		z-index: 2;
	}

	.form-signin input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}

	.form-signin input[type="password"] {
		margin-bottom: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
</style>

<body class="text-center">
	<center>
		<form method="post">
			<main class="form-signin">
				<?= $response; ?>
				<div class="card border-dark">
					<div class="card-header bg-dark text-white">
						<h5 class="card-title">PPMIS</h5>
					</div>
					<div class="card-body text-dark">

						<div class="form-floating">
							<input required type="text" name="user" class="form-control form-control-sm" id="floatingInput" autocomplete="off" placeholder="Username">
							<label for="floatingInput">Username</label>
						</div>
						<div class="form-floating">
							<input required type="password" name="pass" class="form-control form-control-sm" id="floatingPassword" autocomplete="off" placeholder="Password">
							<label for="floatingPassword">Password</label>
						</div>
					</div>
					<div class="card-footer bg-transparent bg-dark text-white">
						<button class="w-100 btn btn-sm btn-dark" type="submit" name="btnLogin"><i class="fa fa-sign-in"></i> Sign in</button>
					</div>
				</div>
		</form>
		</main>
	</center>
</body>

</html>