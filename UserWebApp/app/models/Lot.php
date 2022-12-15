<?php
namespace app\models;

class Lot extends \app\core\Model {

	function __construct() {
		parent::__construct();
	}

	function exists() {
		return $this->get($this->lot_name) != false;
	}

	function getAll() {
		$SQL = 'SELECT * FROM lot';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Lot");
		return $STMT->fetchAll();
	}

	function getFromOwner($user_id) {
		$SQL = 'SELECT * FROM lot WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Lot");
		return $STMT->fetchAll();
	}

	function get($lot_id) {
		$SQL = 'SELECT * FROM lot WHERE lot_id = :lot_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['lot_id'=>$lot_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Lot");
		return $STMT->fetch();
	}

	function insert() {
		$SQL = 
			'INSERT INTO lot(
				user_id, lot_name, address, city, province, postal_code, disabled, start_date, end_date) 
			VALUES(
				:user_id, :lot_name, :address, :city, :province, :postal_code, :disabled, :start_date, :end_date)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
			'user_id'		=>$this->user_id,
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
		$SQL = 'UPDATE lot SET lot_name = :lot_name, address = :address, city = :city, province = :province, postal_code = :postal_code WHERE lot_id = :lot_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
			'lot_name'		=>$this->lot_name, 
			'address'		=>$this->address, 
			'city'			=>$this->city, 
			'province'		=>$this->province, 
			'postal_code'	=>$this->postal_code, 
			'lot_id'		=>$this->lot_id
		]);
	}

	function changeStatus() {
		$SQL = 'UPDATE lot SET disabled = :disabled, end_date = :end_date WHERE lot_id = :lot_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['disabled'=>$this->disabled, 'end_date'=>$this->end_date, 'lot_id'=>$this->lot_id]);
	}

	function searchLots($text) {
		$SQL = "SELECT * FROM lot WHERE lot_name LIKE '%$text%' ORDER BY lot_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Lot");
        return $STMT->fetchAll();
    }
}