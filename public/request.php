<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Requests.php");
require_once(__ROOT__ . "controller/OrderController.php");
require_once(__ROOT__ . "view/Admin.php");

$model = new Requests();
$controller = new OrderController($model);
$view = new Admin($controller, $model);


if (isset($_GET['action']) && !empty($_GET['action'])) {
  $controller->{$_GET['action']}();   
}

include "../extra/header.php" ;
?>
<style>

</style>
<!doctype html>
<html lang="zxx">

<div class="row">

  <p> " "</p>
  <h2>      
  orders pending approval</h2> 

<table  class="table table-hover" id ="result" >
					  <thead class="thead-dark">
                           <tr>
                            <th>   Order ID</th>
						                 <th>Product ID</th>
                              <th>Customer ID</th>
                              <th>Date requested</th>
                              <th>Action</th>
						   </tr>
						   </thead>
						<tbody>
                      
  <?php 
  echo $view->request();
  
  ?>

  </tbody>
</table>
  

</div>
</html>
