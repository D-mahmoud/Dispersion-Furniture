<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/carts.php");
require_once(__ROOT__ . "controller/CartController.php");
require_once(__ROOT__ . "view/Shop.php");

$model = new Carts();
$controller = new CartController($model);
$view = new Shop($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
   
    
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php include "../extra/header.html" ?>

 <!-- breadcrumb part start-->
 <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>cart list</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

                                <?php
                                echo $view->viewcart();
                                ?>

	   		<?php include "../extra/footer.html" ?>  
