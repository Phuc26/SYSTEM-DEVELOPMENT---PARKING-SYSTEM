<?php
namespace app\filters;
// Classes in this namespace will have an execute method
// The framework runs execute to ensure the filtering

#[\Attribute]
class Login {

	function execute() {
		if (!isset($_SESSION['user_id'])) {
			header('location:/User/login');
			return true;
		}
		return false;
	}
}