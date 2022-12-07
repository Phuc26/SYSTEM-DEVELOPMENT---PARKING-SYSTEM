<?php
namespace app\filters;

#[\Attribute]
class NoTechnician {	

	function execute() {
		if ($_SESSION['role'] == 'technician') {
			header('location:/Dashboard/index');
			return true;
		}
		return false;
	}
}