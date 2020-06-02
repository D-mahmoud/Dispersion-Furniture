<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Messages.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/Admin.php");

$model = new Messages();
$controller = new UsersController($model);
$view = new Admin($controller, $model);

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
                        <h2>Messages</h2>
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
            <h3>Messages</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" >Message ID</th>
                  <th scope="col">Date Sent</th>
				   <th scope="col">Messsage</th>
				   <th scope="col">BY</th>
                </tr>
              </thead>
              <tbody>
          <?php  echo $view->message($id); ?>
          </tbody>
          </table>
          <?php  echo $view->output(); ?>

        </div>
     </div>


</html>
