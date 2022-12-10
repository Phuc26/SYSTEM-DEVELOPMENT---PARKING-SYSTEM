<?php
namespace app\controllers;

class Main extends \app\core\Controller {
	
	public function index() {
		if (!isset($_POST['action'])) {
			$this->view('Main/index');
		} else {
			$_SESSION['license'] 	= strtoupper($_POST['license']);
			$_SESSION['location']	= $_POST['location'];
			$_SESSION['duration']	= $_POST['duration'];
			header("location:/Main/confirmation");
		}
	}

	public function confirmation() {	
		$this->view('Main/confirmation');
	}
}