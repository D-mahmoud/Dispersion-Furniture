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
<!DOCTYPE html>
<html lang="en">
<body>
<?php include "../extra/header.php" ?>

<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
        
                        <h2>Register Now</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
	 <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-lg-12">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome! <br>
                                Lets sign up</h3>
                                <?php
                                echo $view->signup();
                                ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	   		<?php include "../extra/footer.html" ?>  
