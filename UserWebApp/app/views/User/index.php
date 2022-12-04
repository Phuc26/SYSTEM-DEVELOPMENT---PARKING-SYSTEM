<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
		<title>User Account</title>
		<link rel="stylesheet" type="text/css" href="/resources/styles/styles.css">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>
		<?php $this->view('shared/navbar'); ?>

		<div class="container-lg">
			<h1>User Account</h1><hr>

			<div class="row">

				<!-- Account Information -->
				<div class="col-md-6 pe-4">
					<h2> <div class="text-muted mb-3">Account Information</div> </h2>

					<!-- Username -->
					<label for="username" class="form-label">Username</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" value="<?= $data->username ?>" readonly>
						<a href="/User/update_username" class="btn btn-outline-secondary">Change</a>
					</div>

					<!-- Password (HIDDEN) -->
					<label for="password" class="form-label">Password</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control text-muted" name="password" value="-- Hidden --" readonly>
						<a href="/User/update_password" class="btn btn-outline-secondary">Change</a>
					</div>

					<!-- Role -->
					<label for="role" class="form-label">Role</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="role" value="<?= $data->role ?>" readonly>
					</div>
				</div>

				<!-- Personal Information -->
				<div class="col-md-6 pe-4">
					<h2> <div class="text-muted mb-3">Personal Information</div> </h2>

					<!-- First Name -->
					<label for="firstname" class="form-label">First Name</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="firstname" value="<?= $data->first_name ?>" readonly>
						<a href="/User/update_firstname" class="btn btn-outline-secondary">Change</a>
					</div>

					<!-- Last Name -->
					<label for="lastname" class="form-label">Last Name</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="lastname" value="<?= $data->last_name ?>" readonly>
						<a href="/User/update_lastname" class="btn btn-outline-secondary">Change</a>
					</div>

					<!-- Email Address -->
					<label for="email" class="form-label">Email Address</label>
					<div class="input-group mb-3">
						<input type="email" class="form-control" name="email" value="<?= $data->email ?>" readonly>
						<a href="/User/update_email" class="btn btn-outline-secondary">Change</a>
					</div>

					<!-- Phone Number -->
					<label for="phone" class="form-label">Phone Number</label>
					<div class="input-group">
						<input type="tel" class="form-control" name="lastName" value="<?= $data->phone_number ?>" readonly>
						<a href="/User/update_phone" class="btn btn-outline-secondary">Change</a>
					</div>
				</div>
			</div>

			<div class="row pb-3">
				<div class="col-md pe-4 pb-2">
					<a href="/Dashboard/index" class="btn btn-secondary float-end mt-5">Back</a>
				</div>
			</div>
		</div>
		
		<script src="/resources/scripts/scripts.js"></script>

		<!-- Bootstrap JS -->
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

</html>