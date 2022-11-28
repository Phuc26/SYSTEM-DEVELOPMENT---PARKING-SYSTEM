<?php
namespace app\models;

class Main extends \app\core\Model {

	function __construct() {
		parent::__construct();
	}

	function exists() { 
		return $this->get($this->username) != false;
	}
	
	function insert(){
		$SQL = 'INSERT INTO transaction() VALUES(:)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([]);
	}
}