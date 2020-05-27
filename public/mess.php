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

    <div class="row">
        <div class="col-12">
          <h2 class="contact-title"></h2>
        </div>
        <div class="col-lg-8">
          <?php  echo $view->user_mess(); ?>
        </div>
     </div>


</html>