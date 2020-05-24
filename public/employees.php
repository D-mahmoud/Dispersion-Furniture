<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/Admin.php");

$model = new Users();
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
<br>
<a href="signup.php" class="btn_3">Add New Account</a>
<br>
<div class="row">

  <div class="column col-md-6 " id="admin">
  <h2>Admins</h2>
  <table  class="table table-hover" id ="result" >
					  <thead class="thead-dark">
                           <tr>
						   <th>Id</th>
						   <th>Full Name</th>
						   <th>Email</th>
                           <th>Mobile number</th>
						   </tr>
						   </thead>
						<tbody>
                        

  <?php echo $view->view_admin();?>
  
  </tbody>
</table>
  </div>

  <div class="column col-md-6 " id="employee">
  <h2>Employees</h2>
  <table  class="table table-hover" id ="result" >
					  <thead class="thead-dark">
                           <tr>
						   <th>Id</th>
						   <th>Full Name</th>
						   <th>Email</th>
                           <th>Mobile number</th>
						   </tr>
						   </thead>
						<tbody>
                        

  <?php echo $view->view_employee();?>
  
  </tbody>
  </table>

  </div>
</div>

</html>