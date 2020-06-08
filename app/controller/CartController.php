<?php

require_once(__ROOT__ . "controller/Controller.php");

class CartController extends Controller{
	public function search() {
		$key = $_REQUEST['key'];
		$this->model->search($key);
	
	}
	

public function insert() {
			
$id = $_REQUEST['id'];
$quantity =$_REQUEST['amount'];
$user_id=$_SESSION["ID"];
		
$this->model->insert($id,$quantity,$user_id);

	}



}
?>
