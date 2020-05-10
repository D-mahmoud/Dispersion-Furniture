<?php

require_once(__ROOT__ . "controller/Controller.php");

class ProductsController extends Controller{
	public function search() {
		$key = $_REQUEST['key'];
		$this->model->search($key);
	
	}
	
	public function details(){
		$id=$_REQUEST["id"];
		
		$this->model->details($id);
	}
	public function delete(){
		$id=$_REQUEST["id"];
		
		$this->model->delete($id);
	
}
public function insertProduct(){
$name=$_REQUEST["name"];
$type=$_REQUEST["type"];
$code=$_REQUEST["code"];
$cost=$_REQUEST["cost"];
$picture=$_REQUEST["picture"];
$this->model->insertProduct($name,$type,$code,$cost,$picture);

}
public function editProduct(){
$name=$_REQUEST["name"];
$type=$_REQUEST["type"];
$code=$_REQUEST["code"];
$cost=$_REQUEST["cost"];
$id=$_REQUEST['id'];
$picture=$_REQUEST["picture"];
$this->model->editProduct($id,$name,$type,$code,$cost,$picture);

}
}
?>
