<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
		<title>User Account</title>
		<link rel="stylesheet" type="text/css" href="/resources/styles/style.css">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>
		<?php $this->view('shared/navbar'); ?>

		<div class="container-lg">
			<h1>User Account</h1><hr>
			<div class="row justify-content-center">
				<div class="col-md">
					<h2> <div class="text-muted mb-3">Account Details</div> </h2>

					<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control mb-3" name="username" value="Placeholder" readonly>

					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control mb-3" name="password" value="Placeholder" readonly>
				</div>

				<div class="col-md">
					<h2> <div class="text-muted mb-3">Personal Information</div> </h2>

					<label for="firstName" class="form-label">First Name</label>
					<input type="text" class="form-control mb-3" name="firstName" value="John" readonly>

					<label for="lastName" class="form-label">Last Name</label>
					<input type="text" class="form-control mb-3" name="lastName" value="Smith" readonly>

					<label for="email" class="form-label">Email Adress</label>
					<input type="email" class="form-control mb-3" name="email" value="mistersmith@example.com" readonly>

					<label for="phone" class="form-label">Phone Number</label>
					<input type="tel" class="form-control" name="lastName" value="054-942-7762" readonly>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md">
					<button type="submit" name="action" class="btn btn-primary float-end mt-5 mx-2">Update</button>
					<button type="submit" name="action" class="btn btn-danger float-end mt-5 pd-4">Back</button>
				</div>
			</div>
		</div>
		
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

</html>