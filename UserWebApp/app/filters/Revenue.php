<?php
namespace app\filters;

#[\Attribute]
class Revenue {	

	function execute() {
		if ($_SESSION['seeRevenue'] == '0') {
			header('location:/Dashboard/index');
			return true;
		}
		return false;
	}
}