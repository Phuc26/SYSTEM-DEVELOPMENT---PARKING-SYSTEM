<?php
namespace app\models;

class Revenue extends \app\core\Model {

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

	function getMonthlyRevenue($lot_id) {
		$SQL = 'SELECT * FROM monthly_revenue WHERE lot_id = :lot_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['monthly_rate_id'=>$monthly_rate_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Revenue");
		return $STMT->fetch();
	}

	function getDailyRevenue($lot_id) {
		$SQL = 'SELECT * FROM daily_revenue WHERE lot_id = :lot_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['monthly_rate_id'=>$monthly_rate_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Revenue");
		return $STMT->fetch();
	}

	function searchLots($text) {
		$SQL = "SELECT * FROM lot WHERE lot_name LIKE '%$text%' ORDER BY lot_id DESC";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Lot");
        return $STMT->fetchAll();
    }
}