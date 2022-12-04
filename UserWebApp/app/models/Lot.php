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
		$SQL = 'INSERT INTO lot(user_id, lot_name, address, city, province, postal_code, disabled, start_date, end_date) VALUES(:user_id, :lot_name, :address, :city, :province, :postal_code, :disabled, :start_date, :end_date)';
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