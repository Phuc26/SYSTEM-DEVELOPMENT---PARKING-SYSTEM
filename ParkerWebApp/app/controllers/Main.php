<?php
namespace app\controllers;

class Main extends \app\core\Controller {
	
	public function index() {
		if (isset($_POST['action'])){
		if(isset($_POST['license'])And(isset($_POST['totalPrice']))){
 			$transaction = new \app\models\Main();
 			$transaction->license=$_POST['license'];
 			$transaction->location=$_POST['location'];
 			$transaction->duration=$_POST['duration'];
 			$transaction->totalPrice=$_POST['totalPrice'];

 			$data = $transaction;
			$this->view('Main/confirmation',$data);
                   
                   /* $transaction->insert();
                    $_SESSION['license'] = $_POST[license];
$transaction->getTransaction($_POST[license]);
if(isset($transaction->transaction_id)){
 header('location:/Main/confirmation?transaction_id='.($transaction->transaction_id).'');}
else{
 header('location:/Main/index?error=Something went wrong, please try again.');}
 */
  } 



                   /*
			$_SESSION['license'] 	= strtoupper($_POST['license']);
			$_SESSION['location']	= $_POST['location'];
			$_SESSION['duration']	= $_POST['duration'];
			*/

		} else {

			$this->view('Main/index');
		}
	}

	public function confirmation() {	
		$this->view('Main/confirmation');
	}

}