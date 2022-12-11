<?php
namespace app\controllers;

#[\app\filters\Login]
class Dashboard extends \app\core\Controller {
	
	public function index() {	
		$this->view('Dashboard/index');
	}

	function setup_lot() {
		$user = new \app\models\User();
		$owners = $user->getOwners();

		if (!isset($_POST['action'])) {
			$this->view('Dashboard/setup_lot', $owners);
		} else {
			$lot = new \app\models\Lot();
			$lot->user_id 		= $_POST['owner'];
			$lot->lot_name 		= $_POST['lotName'];
			$lot->address 		= $_POST['address'];
			$lot->city 			= $_POST['city'];
			$lot->province 		= $_POST['province'];
			$lot->postal_code 	= $_POST['postalCode'];
			$lot->disabled 		= 0;
			$lot->start_date 	= $_POST['startDate'];
			$lot->end_date 		= null;

			if (!$lot->exists()) {
			 	$lot->insert();
			 	header('location:/Dashboard/index');
			} else {
				$this->view('Dashboard/setup_account', $owners);
				echo '<script>alert("This parking lot already exists.")</script>';
			}
		}
	}

	function view_lot() {
		$lots = new \app\models\Lot();

		if ($_SESSION['role'] == 'owner') {
			$lots = $lots->getFromOwner($_SESSION['user_id']);
			$this->view('Dashboard/view_lot', $lots);
		} else {
			$lots = $lots->getAll();
			$this->view('Dashboard/view_lot', $lots);
		}
	}

	function update_lot() {	
		$lots = new \app\models\Lot();
		$lots = $lots->getAll();
		$this->view('Dashboard/update_lot', $lots);
	}

	function view_daily_revenue() {
		$dailyRevenue = new \app\models\Revenue();
		$dailyRevenue = $dailyRevenue->getDailyRevenue();
		$monthlyRevenue = new \app\models\Revenue();
		$monthlyRevenue = $monthlyRevenue->getDailyRevenue();
		$this->view('Dashboard/view_revenue');
	}

	function view_monthly_revenue() {
		$revenue = new \app\models\Revenue();
		$dailyRevenue = $dailyRevenue->getDailyRevenue();
		$monthlyRevenue = new \app\models\Revenue();
		$monthlyRevenue = $monthlyRevenue->getDailyRevenue();
		$this->view('Dashboard/view_revenue');
	}

	function confirm_update($lot_id) {
		$user = new \app\models\User();
		$user = $user->get($_SESSION['username']);

		$lot = new \app\models\Lot();
		$lot = $lot->get($lot_id);

		if (!isset($_POST['action'])) {
			$this->view('Dashboard/confirm_update', $lot);
		} else {
			if (password_verify($_POST['password'], $user->password_hash)) {
				$lot->lot_name 		= $_POST['lotName'];
				$lot->address 		= $_POST['address'];
				$lot->city 			= $_POST['city'];
				$lot->province 		= $_POST['province'];
				$lot->postal_code 	= $_POST['postalCode'];
				$lot->update();
				header('location:/Dashboard/update_lot');
			 	echo '<script>alert("This lot has been updated.")</script>';
			} else {
				$this->view('Dashboard/confirm_update', $lot);
				echo '<script>alert("Incorrect Password.")</script>';
			}
		}
	}

	function disable_lot() {
		$lots = new \app\models\Lot();
		$lots = $lots->getAll();
		$this->view('Dashboard/disable_lot', $lots);
	}

	function confirm_disable($lot_id) {
		$user = new \app\models\User();
		$user = $user->get($_SESSION['username']);

		$lot = new \app\models\Lot();
		$lot = $lot->get($lot_id);

		if (!isset($_POST['action'])) {
			$this->view('Dashboard/confirm_disable', $lot);
		} else {
			if (password_verify($_POST['password'], $user->password_hash)) {
				$lot->disabled = 1;
				$lot->end_date = $_POST['endDate'];
			 	$lot->changeStatus();
			 	header('location:/Dashboard/disable_lot');
			 	echo '<script>alert("This lot has been disabled.")</script>';
			} else {
				$this->view('Dashboard/confirm_disable', $lot);
				echo '<script>alert("Incorrect Password.")</script>';
			}
		}
	}

	function setup_account() {	
		if (!isset($_POST['action'])) {
			$this->view('Dashboard/setup_account');
		} else {
			$user = new \app\models\User();
			$user->username 	= $_POST['username'];
			$user->role 		= $_POST['role'];
			$user->seeRevenue 	= $_POST['revenue'];
			$user->first_name 	= $_POST['firstname'];
			$user->last_name 	= $_POST['lastname'];
			$user->email 		= $_POST['email'];
			$user->phone_number = $_POST['phone'];

			if (!$user->exists() && $_POST['password'] == $_POST['confirmPassword']) {
			 	$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			 	$user->insert();
			 	header('location:/Dashboard/index');
			} elseif ($user->exists()) {
				$this->view('Dashboard/setup_account');
				echo '<script>alert("A user is already using that username.")</script>';
			} else {
				$this->view('Dashboard/setup_account');
				echo '<script>alert("Passwords do not match.")</script>';
			}
		}
	}

	function searchView() {
		$lots = new \app\models\Lot();
		$result = $lots->searchLots($_POST['search']);
		$this->view('Dashboard/view_lot', $result);
  	}

  	function searchUpdate() {
		$lots = new \app\models\Lot();
		$result = $lots->searchLots($_POST['search']);
		$this->view('Dashboard/update_lot', $result);
  	}

  	function searchDisable() {
		$lots = new \app\models\Lot();
		$result = $lots->searchLots($_POST['search']);
		$this->view('Dashboard/disable_lot', $result);
  	}	
}