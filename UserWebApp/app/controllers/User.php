<?php
namespace app\controllers;

class User extends \app\core\Controller {
	
	#[\app\filters\Login]
	public function index(){
		$user = new \app\models\User();
		$user = $user->get($_SESSION['username']);
		$this->view('User/index', $user);
	}

	function login() {
		if (!isset($_POST['action'])) {
			$this->view('User/login');
		} else {
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);
			if ($user != false) {
				if (password_verify($_POST['password'], $user->password_hash)) {
					$_SESSION['user_id'] 	= $user->user_id;
					$_SESSION['username'] 	= $user->username;
					$_SESSION['role'] 		= $user->role;
					$_SESSION['seeRevenue'] = $user->seeRevenue;
					header("location: /Dashboard/index");
				} else {
					$this->view('User/login', 'Incorrect username/password combination.');
					echo '<script>alert("Incorrect username/password combination")</script>';
				}
			} else {
				$this->view('User/login', 'Incorrect username/password combination.');
				echo '<script>alert("Incorrect username/password combination.")</script>';
			}
		}
	}

	#[\app\filters\Login]
	function update_username() {
		$users = new \app\models\User();
		$user = $users->get($_SESSION['username']);
		
		if (!isset($_POST['action'])) {
			$this->view('User/update_username');
		} else {
			if (!$users->usedUsername($_POST['newUsername']) && password_verify($_POST['password'], $user->password_hash)) {
				$user->username = $_POST['newUsername'];
				$user->updateUsername();
				$_SESSION['username'] = $user->username;
				header('location:/User/index');
			} else {
				$this->view('User/update_username');
				echo '<script>alert("Incorrect password.")</script>';
			}
		}
	}

	#[\app\filters\Login]
	function update_password() {
		$user = new \app\models\User();
		$user = $user->get($_SESSION['username']);
		
		if (!isset($_POST['action'])) {
			$this->view('User/update_password');
		} else {
			if (password_verify($_POST['password'], $user->password_hash) && $_POST['newPassword'] == $_POST['confirmPassword']) {
				$user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
				$user->updatePassword();
				header('location:/User/index');
			} elseif ($_POST['newPassword'] != $_POST['confirmPassword']) {
				$this->view('User/update_password');
				echo '<script>alert("New passwords do not match.")</script>';
			} else {
				$this->view('User/update_password');
				echo '<script>alert("Incorrect password.")</script>';
			}
		}
	}

	#[\app\filters\Login]
	function update_firstname() {
		$user = new \app\models\User();
		$user = $user->get($_SESSION['username']);
		
		if (!isset($_POST['action'])) {
			$this->view('User/update_firstname');
		} else {
			if (password_verify($_POST['password'], $user->password_hash)) {
				$user->first_name = $_POST['newFirstname'];
				$user->updateFirstname();
				header('location:/User/index');
			} else {
				$this->view('User/update_password');
				echo '<script>alert("Incorrect password.")</script>';
			}
		}
	}

	#[\app\filters\Login]
	function update_lastname() {
		$user = new \app\models\User();
		$user = $user->get($_SESSION['username']);
		
		if (!isset($_POST['action'])) {
			$this->view('User/update_lastname');
		} else {
			if (password_verify($_POST['password'], $user->password_hash)) {
				$user->last_name = $_POST['newLastname'];
				$user->updateLastname();
				header('location:/User/index');
			} else {
				$this->view('User/update_lastname');
				echo '<script>alert("Incorrect password.")</script>';
			}
		}
	}

	#[\app\filters\Login]
	function update_email() {
		$user = new \app\models\User();
		$user = $user->get($_SESSION['username']);
		
		if (!isset($_POST['action'])) {
			$this->view('User/update_email');
		} else {
			if (password_verify($_POST['password'], $user->password_hash)) {
				$user->email = $_POST['newEmail'];
				$user->updateEmail();
				header('location:/User/index');
			} else {
				$this->view('User/update_email');
				echo '<script>alert("Incorrect password.")</script>';
			}
		}
	}

	#[\app\filters\Login]
	function update_phone() {
		$user = new \app\models\User();
		$user = $user->get($_SESSION['username']);
		
		if (!isset($_POST['action'])) {
			$this->view('User/update_phone');
		} else {
			if (password_verify($_POST['password'], $user->password_hash)) {
				$user->phone_number = $_POST['newPhone'];
				$user->updatePhone();
				header('location:/User/index');
			} else {
				$this->view('User/update_phone');
				echo '<script>alert("Incorrect password.")</script>';
			}
		}
	}

	#[\app\filters\Login]
	function logout() {
		session_destroy();
		header('location:/Main/index');
	}
}