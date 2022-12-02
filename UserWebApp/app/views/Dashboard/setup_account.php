<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
		<title>Set Up Account</title>
		<link rel="stylesheet" type="text/css" href="/resources/styles/styles.css">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>
		<?php $this->view('shared/navbar'); ?>

		<div class="container-lg">
			<h1>Set Up an Account</h1><hr>

			<form method="post" action="">
				<div class="row pe-3"> 
					<div class="col-md-6">
						<h2 class="text-muted mb-3">Account Details</h2>

						<label for="username" class="form-label">Username*</label>
	                  	<input type="text" class="form-control mb-2" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" required>

	                  	<label for="password" class="form-label">Password*</label>
						<input type="password" class="form-control mb-2" name="password" required>

	                  	<label for="confirmPassword" class="form-label">Confirm Password*</label>
						<input type="password" class="form-control mb-2" name="confirmPassword" required>

	                  	<label for="role" class="form-label">Role*</label>
						<select class="form-select mb-2" name="role" required>
							<option selected disabled value="">--Choose Role--</option>
							<?php $option = isset($_POST["role"]) ? $_POST['role'] : null ?>
							<option value="admin" <?= $option == "admin" ? "selected" : "" ?> >Administrator</option>
							<option value="technician" <?= $option == "technician" ? "selected" : "" ?> >Technician</option>
							<option value="manager" <?= $option == "manager" ? "selected" : "" ?>>Lot Manager</option>
							<option value="owner" <?= $option == "owner" ? "selected" : "" ?>>Lot Owner</option>
						</select>

	                  	<label for="revenue" class="form-label">Able to see revenue*</label>
						<select class="form-select mb-3" name="revenue" required>
							<option selected disabled value="">--Yes or No--</option>
							<?php $option = isset($_POST["revenue"]) ? $_POST['revenue'] : null ?>
							<option value="0" <?= $option == "0" ? "selected" : "" ?> >No</option>
							<option value="1" <?= $option == "1" ? "selected" : "" ?> >Yes</option>
						</select>
					</div>

					<div class="col-md-6">
						<h2> <div class="text-muted mb-3">Account Details</div> </h2>
						
						<label for="firstname" class="form-label">First Name*</label>
	                  	<input type="text" class="form-control  mb-2" name="firstname" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>" required>

	                  	<label for="lastname" class="form-label">Last Name*</label>
						<input type="password" class="form-control mb-2" name="lastname" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>" required>

	                  	<label for="email" class="form-label">Email Address</label>
						<input type="email" class="form-control mb-2" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">

	                  	<label for="phone" class="form-label">Phone Number*</label>
						<input type="tel" class="form-control mb-3" name="phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>" required>
					</div>
				</div>

				<div class="row pe-3">
					<div class="col-sm-6"> <small>All fields with an asterisk* must be filled out.</small> </div>
					<div class="col-sm-6">
						<button type="submit" name="action" class="btn btn-primary float-end mt-5 mx-2">Confirm</button>
						<?php echo "<a href='/Dashboard/index' class='btn btn-danger float-end mt-5 pd-4'>Cancel</a>" ?>
					</div>
				</div>
			</form>
		</div>

		<script src="/resources/scripts/scripts.js"></script>

		<!-- Bootstrap JS -->
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

</html>