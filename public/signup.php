<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/Register.php");
require_once(__ROOT__ . "view/Admin.php");


$model = new Users();
$controller = new UsersController($model);
$view = new Register($controller, $model);
$view_admin= new Admin($controller, $model);


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
                       <?php
                        if  (empty($_SESSION['role']))
                        {?>
                            <h3>Welcome! <br>
                            Lets sign up</h3>
                            <?php
                            echo $view->signup();
                        }
                        else{
                        if (($_SESSION['role']) == 'customer' )
                         {?>
                            <h3>Welcome! <br>
                                Lets sign up</h3>
                                <?php
                                echo $view->signup();
                                } 
                                else{?>
                                 <h3>Welcome! <br>
                               sign up a new Employee</h3>
                                <?php
                                    echo $view_admin->signup();
   
                                }
                            }?>
                                

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	   		<?php include "../extra/footer.html" ?>  
