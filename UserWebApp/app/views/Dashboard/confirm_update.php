<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
		<title>Disable</title>
		<link rel="stylesheet" type="text/css" href="/resources/styles/styles.css">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>
		<?php $this->view('shared/navbar'); ?>

		<div class="container-lg">
			<h1 class="mt-3">Update Fields</h1><hr>
			<form method="post" action="">
				<div class="row">
					<div class="col-md-6">
						<label for="lotName" class="form-label">Parking Lot Name</label>
		                <input type="text" class="form-control mb-2" name="lotName" value="<?php echo $data->lot_name ?>" required>

		                <label for="address" class="form-label">Address</label>
		                <input type="text" class="form-control mb-2" name="address" value="<?php echo $data->address ?>" required>

		                <label for="city" class="form-label">City</label>
		                <input type="text" class="form-control mb-2" name="city" value="<?php echo $data->city ?>" required>

		                <label for="province" class="form-label">Province</label>
		                <input type="text" class="form-control mb-2" name="province" value="<?php echo $data->province ?>" required>

		                <label for="postalCode" class="form-label">Postal Code</label>
		                <input type="text" class="form-control mb-2" name="postalCode" value="<?php echo $data->postal_code ?>" required>
					</div>
					
					<div class="col-md-6">
						<label for="password" class="form-label">Password</label>
		            	<input type="password" class="form-control mb-3" name="password" required>
		            </div>
				</div>

				<div class="row pb-4">
					<div class="col-sm">
						<button type="submit" name="action" class="btn btn-primary float-end mx-2 mt-5">Confirm</button>
						<?php echo "<a href='/Dashboard/update_lot' class='btn btn-danger float-end mt-5 pd-4'>Cancel</a>" ?>
					</div>
				</div>
			</form>
		</div>

		<script src="/resources/scripts/scripts.js"></script>
		
		<!-- Bootstrap JS -->
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

</html>