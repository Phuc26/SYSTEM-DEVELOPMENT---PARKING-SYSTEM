<?php
namespace app\models;

class Main extends \app\core\Model {

	function __construct() {
		parent::__construct();
	}

	function exists() { 
		return $this->get($this->username) != false;
	}

	function get($username) {
		$SQL = 'SELECT * FROM user WHERE username = :username';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
		return $STMT->fetch();
	}
	
	function getUsername($user_id){
		$SQL = 'SELECT username FROM user WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
		return $STMT->fetch();
	}
	
	function insert(){
		$SQL = 'INSERT INTO user(username,password_hash) VALUES(:username,:password_hash)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username,'password_hash'=>$this->password_hash]);
	}
}