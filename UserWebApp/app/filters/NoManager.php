<?php
namespace app\filters;

#[\Attribute]
class NoManager {	

	function execute() {
		if ($_SESSION['role'] == 'manager') {
			header('location:/Dashboard/index');
			return true;
		}
		return false;
	}
}