<?php
namespace app\controllers;

#[\app\filters\Login]
class Dashboard extends \app\core\Controller {
	
	public function index() {	
		$this->view('Dashboard/index');
	}

	function setup_lot() {	
		$this->view('Dashboard/setup_lot');
	}

	function view_lot() {	
		$this->view('Dashboard/view_lot');
	}

	function update_lot() {	
		$this->view('Dashboard/update_lot');
	}

	function disable_lot() {	
		$this->view('Dashboard/disable_lot');
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
			$user->phone 		= $_POST['phone'];

			if (!$user->exists() && $_POST['password'] == $_POST['passwordconfirm']) {
			 	$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			 	$user->insert();
			 	header('location:/Dashboard/index');
			} elseif ($user->exists()) {
				$this->view('Dashboard/setup_account', 'Username is taken');
				echo '<script>alert("A user is already using that username.")</script>';
			} else {
				$this->view('Dashboard/setup_account', 'Passwords do not match');
				echo '<script>alert("Passwords do not match.")</script>';
			}
		}
	}
}