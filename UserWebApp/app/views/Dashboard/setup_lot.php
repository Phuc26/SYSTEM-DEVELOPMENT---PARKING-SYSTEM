<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
		<title>Set Up Parking Lot</title>
		<link rel="stylesheet" type="text/css" href="/resources/styles/styles.css">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>
		<?php $this->view('shared/navbar'); ?>

		<div class="container-lg">
			<h1>Set Up a Parking Lot</h1><hr>

			<form method="post" action="">
				<div class="row">
					<h2 class="text-muted mb-3">Parking Lot Details</h2>

					<div class="col-md-6">
						<label for="lotName" class="form-label">Parking Lot Name*</label>
		                <input type="text" class="form-control mb-2" name="lotName" value="<?php echo isset($_POST["lotName"]) ? $_POST["lotName"] : ''; ?>" required>

		                <label for="owner" class="form-label">Owner*</label>
		                <select class="form-select mb-2" name="owner" required>
		                	<option selected disabled value="">--Choose Owner--</option>
		                	<?php
		                		$option = isset($_POST["owner"]) ? $_POST['owner'] : null;
		                		foreach($data as $owner) {
		                			echo "<option value='$owner->user_id' $option == $owner->user_id ? 'selected' : ''>$owner->first_name $owner->last_name</option>";
		                		}
		                	?>
		                </select>

		                <label for="startDate" class="form-label">Start Date*</label>
		                <input type="date" class="form-control mb-3" name="startDate" min="<?= date('Y-m-d'); ?>" value="<?php echo isset($_POST["startDate"]) ? $_POST["startDate"] : ''; ?>" required>
					</div>

					<div class="col-md-6">
						<label for="address" class="form-label">Address*</label>
		                <input type="text" class="form-control mb-2" name="address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>" required>

		                <label for="city" class="form-label">City*</label>
		                <input type="text" class="form-control mb-2" name="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>" required>

		                <label for="province" class="form-label">Province*</label>
		                <input type="text" class="form-control mb-2" name="province" value="<?php echo isset($_POST["province"]) ? $_POST["province"] : ''; ?>" required>

		                <label for="postalCode" class="form-label">Postal Code*</label>
		                <input type="text" class="form-control mb-3" name="postalCode" value="<?php echo isset($_POST["postalCode"]) ? $_POST["postalCode"] : ''; ?>" required>
					</div>

					<div class="row pb-4">
						<div class="col-sm"> <small>All fields with an asterisk* must be filled out.</small> </div>
						<div class="col-md">
							<button type="submit" name="action" class="btn btn-primary float-end mx-2 mt-5">Confirm</button>
							<?php echo "<a href='/Dashboard/index' class='btn btn-danger float-end mt-5'>Cancel</a>" ?>
						</div>
					</div>
				</div>
			</form>
		</div>

		<script src="/resources/scripts/scripts.js"></script>

		<!-- Bootstrap JS -->
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

</html>