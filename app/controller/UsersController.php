<?php

require_once(__ROOT__ . "controller/Controller.php");

class UsersController extends Controller{
	
	public function insert() {
		
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$number = $_REQUEST['number'];
		$address = $_REQUEST['add'];
		$role=$_REQUEST['role'];
		$password = $_REQUEST['password'];
		$confirm_password= $_REQUEST['confirm_password'];
if($password==$confirm_password){
		$this->model->insertUser($fname,$lname,$email,$number, $address,$password,$username,$role);
	}
	else{
		$this->model->error();
	}
}
public function login(){
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
$this->model->login($username,$password);
}
public function deleteUser(){
$id=$_REQUEST['id'];
$this->model->deleteUser($id);
}
	
}
?>
