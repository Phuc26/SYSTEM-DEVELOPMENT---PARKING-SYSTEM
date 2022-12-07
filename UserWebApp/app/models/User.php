<?php
namespace app\models;

class User extends \app\core\Model {

	function __construct() {
		parent::__construct();
	}

	function exists() {
		return $this->get($this->username) != false;
	}

	function usedUsername($username) {
		$SQL = 'SELECT * FROM user WHERE username = :username';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		return $STMT->fetch() >= 1;
	}

	function get($username) {
		$SQL = 'SELECT * FROM user WHERE username = :username';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
		return $STMT->fetch();
	}

	function getOwners() {
		$SQL = 'SELECT * FROM user WHERE role = "owner"';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
		return $STMT->fetchAll();
	}

	function insert() {
		$SQL = 
			'INSERT INTO user(
				username, password_hash, first_name, last_name, email, phone_number, role, seeRevenue) 
			VALUES(
				:username, :password_hash, :first_name, :last_name, :email, :phone_number, :role, :seeRevenue)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
			'username'		=>$this->username, 
			'password_hash'	=>$this->password_hash,
			'first_name'	=>$this->first_name,
			'last_name'		=>$this->last_name,
			'email'			=>$this->email,
			'phone_number'	=>$this->phone_number,
			'role'			=>$this->role,
			'seeRevenue'	=>$this->seeRevenue
		]);
	}

	function updateUsername() {
		$SQL = 'UPDATE user SET username = :username WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username, 'user_id'=>$this->user_id]);
	}

	function updatePassword() {
		$SQL = 'UPDATE user SET password_hash = :password_hash WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['password_hash'=>$this->password_hash, 'user_id'=>$this->user_id]);
	}

	function updateFirstname() {
		$SQL = 'UPDATE user SET first_name = :first_name WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name, 'user_id'=>$this->user_id]);
	}

	function updateLastname() {
		$SQL = 'UPDATE user SET last_name = :last_name WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['last_name'=>$this->last_name, 'user_id'=>$this->user_id]);
	}

	function updateEmail() {
		$SQL = 'UPDATE user SET email = :email WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['email'=>$this->email, 'user_id'=>$this->user_id]);
	}

	function updatePhone() {
		$SQL = 'UPDATE user SET phone_number = :phone_number WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['phone_number'=>$this->phone_number, 'user_id'=>$this->user_id]);
	}
}