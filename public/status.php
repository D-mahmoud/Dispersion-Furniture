<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Orders.php");
require_once(__ROOT__ . "controller/OrderController.php");
require_once(__ROOT__ . "view/customer.php");

$model = new Orders();
$controller = new OrderController($model);
$view = new customer($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();   
}

include "../extra/header.php" ;
?>
 <!-- breadcrumb part start-->
 <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Your Orders status</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <div class="container">
   
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
		  <br>
            <h3>All orders</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" >Order id</th>
                  <th scope="col">Product id</th>
				   <th scope="col">Product name</th>
				   <th scope="col">Quantity</th>
                   <th scope="col">Date Order placed</th>
                   <th scope="col">Status</th>
				   <th scope="col">Total</th>
				   <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
              <?php 
                echo $view->order_status();
                 ?>
          </tbody>
          </table>
        </div>
     </div>


</html>




                