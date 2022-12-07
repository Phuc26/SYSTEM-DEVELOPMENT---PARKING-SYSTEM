<?php
namespace app\filters;

#[\Attribute]
class NoOwner {	

	function execute() {
		if ($_SESSION['role'] == 'owner') {
			header('location:/Dashboard/index');
			return true;
		}
		return false;
	}
}