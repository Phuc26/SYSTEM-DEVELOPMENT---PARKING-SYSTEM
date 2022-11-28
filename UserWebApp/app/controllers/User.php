<?php
namespace app\controllers;

class User extends \app\core\Controller {
	
	public function index(){
		/*$user = new app\models\User();
		$user = $user->get($_SESSION['username']);	*/
		$this->view('User/index');
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
}