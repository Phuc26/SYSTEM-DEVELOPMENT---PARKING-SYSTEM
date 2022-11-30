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
			<div class="row">
				<div class="col-md-6">
					ADD FORM
				</div>

				<div class="col-md-6">
					ADD FORM
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md">
					<a type="submit" name="action" class="btn btn-primary float-end mt-5 mx-2">Confirm</a>
					<?php echo "<a href='/Dashboard/index' class='btn btn-secondary float-end mt-5 pd-4'>Back</a>" ?>
				</div>
			</div>
		</div>

		<script src="/resources/scripts/scripts.js"></script>

		<!-- Bootstrap JS -->
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

</html>