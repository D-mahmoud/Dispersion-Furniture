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
<style>

</style>
<!doctype html>
<html lang="zxx">

<div class="row">

  <p> " "</p><h2> Customer Messages</h2>
<table  class="table table-hover" id ="result" >
					  <thead class="thead-dark">
                           <tr>
						                  <th>Message ID</th>
						                  <th>Customer ID</th>
						                 <th>Date sent</th>
                              <th>Message</th>
                              <th>Action</th>

						   </tr>
						   </thead>
						<tbody>
               
  <?php echo $view->customer_message();?>

  </tbody>
</table>
</div>
</html>