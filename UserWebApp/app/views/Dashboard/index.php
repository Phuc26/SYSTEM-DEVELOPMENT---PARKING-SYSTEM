<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
		<title>Dashboard</title>
		<link rel="stylesheet" href="/resources/styles/styles.css">


		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>
		<?php $this->view('shared/navbar'); ?>

		<div class="container">		
			<h1>Dashboard</h1><hr>

			<!-- First row -->
			<div class="row justify-content-center">

				<!-- ADMIN / TECHNICAN: Set up lot -->
				<?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'technician') { $this->view('Dashboard/buttons/setup'); } ?>

				<!-- ALL: View lot -->
				<?php $this->view('Dashboard/buttons/view'); ?>

				<!-- ADMIN / TECHNICAN: Update lot -->
				<?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'technician') { $this->view('Dashboard/buttons/update'); } ?>

				<!-- ADMIN / TECHNICAN: Disable lot -->
				<?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'technician') { $this->view('Dashboard/buttons/disable'); } ?>
			</div>

			<!-- Second row -->
			<div class="row justify-content-center pb-4"> 

				<!-- ADMIN / TECHNICAN / MANAGER: Change rates -->
				<?php if ($_SESSION['role'] != 'owner') { $this->view('Dashboard/buttons/rates'); } ?>

				<!-- IF seeRevenue == 1: View revenue -->
				<?php if ($_SESSION['seeRevenue'] == 1) { $this->view('Dashboard/buttons/revenue'); } ?>

				<!-- ADMIN / TECHNICAN: Set up account -->
				<?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'technician') { $this->view('Dashboard/buttons/account'); } ?>
			</div>
		</div>
		
		<script src="/resources/scripts/scripts.js"></script>

		<!-- Bootstrap JS -->
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

</html>