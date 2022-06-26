<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet">
	<link href="<?php base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<div class="w-50 mx-auto mt-5 text-center p-5 bg-info rounded-3">
		<form action="<?php echo base_url() ?>admin_login" class="" method="post">
			<h1 class="text-uppercase fw-bold mb-2">Login</h1>
			<?php
			$message = $this->session->userdata('message');
			if ($message) {
				echo "<p class='alert alert-danger'>$message</p>";
				$this->session->unset_userdata('message');
			}
			?>
			<div class="mb-2">
				<label for="">Username</label>
				<input type="email" name="email" class="form-control bg-light" required /><br>
			</div>
			<div class="mb-2">
				<label for="">Passowerd</label>
				<input type="password" name="password" class="form-control bg-light" required />
			</div>
			
			<input type="submit" class="btn btn-primary mt-3 me-3" value="Submit" />
			<input type="reset" class="btn btn-danger mt-3" value="Clear" />
		</form>
		<div class="text-center mt-3">
			<a href="<?php echo base_url() ?>admin_registration" class="text-dark text-decoration-none text-center">Register Account</a>
		</div>
	</div>



</body>
<script src="<?php echo base_url() ?>assets/js/pages/jquery-3.2.1.min.js"></script>

</html>