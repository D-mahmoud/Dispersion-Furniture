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
		$password = $_REQUEST['password'];
		$confirm_password= $_REQUEST['confirm_password'];
		if($password==$confirm_password)
		{  if  (empty($_SESSION['role']))
			{
				$role="customer";
			}
		else
		{
			if (($_SESSION['role']) == 'customer')
		{
			$role="customer";
		}
		else
		{
			if ($_REQUEST['role'] =="customer" || $_REQUEST['role'] =="admin")
			{
			$role=$_REQUEST['role'];
			}
			else
			{        
				$role="";
			}
		}
		}
		$this->model->insertUser($fname,$lname,$email,$number, $address,$password,$username,$role);

	}
	else{
		$this->model->error();
	}
}
public function login(){
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	if(isset($_POST["login_employee"]))
	{
		$this->model->login_employee($username,$password);
	}
	if(isset($_POST["login"]))
	{
		$this->model->login($username,$password);
	}
}
public function deleteUser(){
$id=$_REQUEST['id'];
$this->model->deleteUser($id);
}

	public function ignore(){

	$id=$_REQUEST['id'];
	$this->model->ignore($id);

}

public function send(){
$message=$_REQUEST['message'];
$id=$_SESSION["ID"];
$this->model->send($message,$id);

}
}
?>
