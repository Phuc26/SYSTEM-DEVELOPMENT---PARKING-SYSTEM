<?php
namespace app\models;

class User extends \app\core\Model {

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
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
		return $STMT->fetch();
	}

	function insert() {
		$SQL = 'INSERT INTO user(username, password_hash, email, address) VALUES(:username, :password_hash, :email, :address)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash, 'email'=>$this->email, 'address'=>$this->address]);
	}
}