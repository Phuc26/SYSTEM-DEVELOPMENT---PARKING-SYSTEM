<?php
namespace app\models;

class Lot extends \app\core\Model {

	function __construct() {
		parent::__construct();
	}

	function exists() {
		return $this->get($this->lot_name) != false;
	}

	function get($lot_name) {
		$SQL = 'SELECT * FROM lot WHERE lot_name = :lot_name';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['lot_name'=>$lot_name]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Lot");
		return $STMT->fetch();
	}

	function insert() {
		$SQL = 'INSERT INTO lot(lot_name, address, city, province, postal_code, disabled, start_date, end_date) VALUES(:lot_name, :address, :city, :province, :postal_code, :disabled, :start_date, :end_date)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
			'lot_name'		=>$this->lot_name, 
			'address'		=>$this->address, 
			'city'			=>$this->city, 
			'province'		=>$this->province, 
			'postal_code'	=>$this->postal_code,
			'disabled'		=>$this->disabled, 
			'start_date'	=>$this->start_date,
			'end_date'		=>$this->end_date
		]);
	}

	function update() {
		$SQL = 'UPDATE user SET lot_name = :lot_name, address = :address, city = :city, province = :province, postal_code = :postal_code WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
			'lot_name'		=>$this->lot_name, 
			'address'		=>$this->address, 
			'city'			=>$this->city, 
			'province'		=>$this->province, 
			'postal_code'	=>$this->postal_code, 
			'user_id'		=>$this->user_id
		]);
	}

	function enable() {
		$SQL = 'UPDATE user SET disabled = 0 WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);
	}

	function disable() {
		$SQL = 'UPDATE user SET disabled = 1 WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);
	}
}