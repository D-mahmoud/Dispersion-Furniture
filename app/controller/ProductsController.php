<?php

require_once(__ROOT__ . "controller/Controller.php");

class ProductsController extends Controller{
	public function search() {
		$key = $_REQUEST['key'];
		$this->model->search($key);
	
	}
	
	
}
?>
