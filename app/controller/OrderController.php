<?php

require_once(__ROOT__ . "controller/Controller.php");

class OrderController extends Controller
{
public function approve()
{	
    $id=$_REQUEST['id_app'];
    $this->model->approve($id);
}
public function disaprove()
{
    $id=$_REQUEST['id_dis'];
	$this->model->disapprove($id);
}
public function confirm(){
    $status=$_REQUEST['check'];
    $id=$_REQUEST['id'];
    $product_id=$_REQUEST['product_id'];
    $user_id=$_REQUEST['user_id'];
    $total=$_REQUEST['total'];
    $quantity=$_REQUEST['quantity'];

    $this->model->confirm($status,$id,$product_id,$user_id,$total,$quantity);
}

public function pay(){
		
    $check=$_REQUEST["check"];
    $order_id=$_REQUEST["id"];
    $this->model->pay($check,$order_id);
    
    }

}
?>
