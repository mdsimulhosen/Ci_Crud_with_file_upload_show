<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Student List Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<div class="w-75 mx-auto mt-5 text-center text-uppercase">
		<h1>Student List</h1>
	</div>
	<?php
	$admin_name = $this->session->userdata('admin_name');
	$message = $this->session->userdata('message');
	echo "<p class='bg-info py-3 text-uppercase text-center fw-bold'>Login as : $admin_name</p>";
	if ($message) {
		echo "<p class='alert alert-danger py-3 text-center fw-bold'>$message </p>";
		$this->session->unset_userdata('message');
	}
	?>
	<div class="px-5">
		<a href="<?php echo base_url() ?>add_student" class="btn btn-primary mb-4 float-end">Add Student</a>
		<table id="tab_owner" class="table table-hover table-responsive table-bordered text-center">
			<thead>

				<tr>
					<th class="text-uppercase">Student Name</th>
					<th class="text-uppercase">Student Roll</th>
					<th class="text-uppercase">Student Phone</th>
					<th class="text-uppercase">Action</th>
				</tr>


			</thead>
			<tbody>
				<?php
				foreach ($all_student_info as $view_info) { ?>
					<tr>
						<td><?php echo $view_info->student_name; ?></td>
						<td><?php echo $view_info->student_phone; ?></td>
						<td><?php echo $view_info->student_roll; ?></td>
						<td>
							<div class="d-flex justify-content-around">
								<div><a href="<?php echo base_url() ?>edit_student/<?php echo $view_info->id ?>"><i class="fa-solid fa-edit text-success p-1"></i></a></div>
								<div><a href="<?php echo base_url() ?>delete_student/<?php echo $view_info->id ?>" class=""><i class="fa-solid fa-trash-can text-danger p-1"></i></a></div>
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="<?php echo base_url() ?>logout" class="btn btn-danger float-end text-white font-size-20 text-dark text-center">Logout</a>
	</div>

	<a href="<?php echo base_url() ?>admin/manage_admin">Manage Admin</a>

	<script src="<?php echo base_url() ?>assets/js/pages/jquery-3.2.1.min.js"></script>


</body>

</html>