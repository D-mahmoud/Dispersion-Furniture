<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Messages.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/Admin.php");

$model = new Messages();
$controller = new UsersController($model);
$view = new Admin($controller, $model);


if(isset($_POST['submit']))	{
$id=$_REQUEST["id"];
$x=$_REQUEST["customer"];

echo $x;
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
  Question asked: <?php echo $view->show($id);?>  </h2>
  <br>
 

<table  class="table table-hover" id ="result" >
					  <thead class="thead-dark">
                           <tr>
						                  <th>Message ID</th>
						                 <th>Date sent</th>
                              <th>Reply</th>
                              <th>Answered By</th>
						   </tr>
						   </thead>
						<tbody>
            <?php 
          
            echo $view->reply($id,$x);?>
  </tbody>
</table>
  <?php  
   echo $view->write($id,$x);?>

</div>
</html>