<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/Register.php");

$model = new Users();
$controller = new UsersController($model);
$view = new Register($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();   
}



?>
<!doctype html>
<html lang="zxx">
    <body>
<?php include "../extra/header.php" ?>
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
        
               <h2>login </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Our Mission?</h2>
                            <p>To offer people everything they we'll ever need .Home is Dispersion.Dispersion is home.</p>
                            <br>
                            <h2>Our Vision?</h2>
                            <p>Having our products in every home </p>
                        </div>
                    </div>
                </div>
                <!--ra7 3aml signup-->
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Employee Sign In</h3>
                                <?php
                              
                                echo $view->login_employee();
                                                      
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "../extra/footer.html" ?>  

</body>
    
</html>