<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
		<title>View Revenue</title>
		<link rel="stylesheet" type="text/css" href="/resources/styles/styles.css">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body>
		<?php $this->view('shared/navbar'); ?>

		<div class="container-lg">
			<h1>View a Parking Lot's Revenue</h1><hr>

			<?php
			if (isset($_POST['search'])) {
				$lots = new \app\models\Lot();
				$data = $lots->searchLots($_POST['search']);
			}
			?>
			
			<div class="row align-items-center">
				<div class="col-md-4 pb-2">
					<form method="post" action="">
						<?php $this->view('shared/search') ?>
					</form>
				</div>

				<div class="col-md-4 pb-2">
					<b>Results - <span id="totalLots"><?= count($data) ?></span></b>
				</div>
			</div>

			<div class="row">
				<div class="col-md pe-4 pb-4">
					<table class="table table-hover">
						<thead>
							<tr>
								<th width="5%">ID</th>
								<th width="25%">Parking Lot Name</th>
								<th width="12%">Date</th>
								<th width="12%">Daily Revenue ID</th>
								<th width="12%">Daily Revenue</th>
								<th width="20%">Monthly Revenue ID</th>
								<th width="12%">Monthly Revenue</th>
							</tr>
						</thead>

						<tbody>
							<?php 
							foreach ($data as $lot) {
								$isDisabled = $lot->disabled == 0 ? 'No' : 'Yes';
								$endDate = $lot->end_date == null ? 'None' : $lot->end_date;

								echo 
								"<tr>
									<td>$lot->lot_id</td>
									<td>$lot->lot_name</td>
									<td>$lot->daily_revenue_id</td>
									<td>$lot->daily_lot_revenue</td>
									<td>$lot->monthly_rate_id</td>
									<td>$lot->monthly_revenue</td>
									<td>$isDisabled</td>
									<td>$lot->start_date</td>
									<td>$endDate</td>
								</tr>";
							} ?>
						</tbody>
					</table>
				</div>
			</div>



			<div class="row pb-4">
				<div class="col-md pe-4 pb-2">
					<?php echo "<a href='/Dashboard/index' class='btn btn-secondary float-end mt-5 pd-4'>Back</a>" ?>
				</div>
			</div>
		</div>
		
		<script src="/resources/scripts/scripts.js"></script>

		<!-- Bootstrap JS -->
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>

</html>