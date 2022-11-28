<?php
namespace app\controllers;

class Dashboard extends \app\core\Controller {
	
	public function index(){	
		$this->view('Dashboard/index');
	}
}