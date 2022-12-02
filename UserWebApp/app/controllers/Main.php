<?php
namespace app\controllers;

class Main extends \app\core\Controller {
	
	public function index() {
		if (isset($_SESSION['user_id'])) {
			header("location: /Dashboard/index");
		} else {
			$this->view('Main/index');
		}
	}
}