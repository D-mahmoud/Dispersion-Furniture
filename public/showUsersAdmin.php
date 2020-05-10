
<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/usersAdmin.php");

$model = new Users();
$controller = new UsersController($model);
$view = new usersAdmin($controller, $model);
?>

	
<!doctype html>
<html lang="zxx">
    <!-- Header part end-->
	<?php include "../extra/header.html" ?>


    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>User list

                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
	
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
						
                        <?php if (isset($_GET['action']) && !empty($_GET['action'])) {
                                switch($_GET['action']){
		                    case 'delete':
                           $view->deleteUser($_POST['id']);
                           $view->output(); 
                            break;
                          }}
                           
                           else
	                            echo $view->output();
                            ?>

                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                        <?php 
                            
                                echo $view->output();
                            ?>
                         </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <!-- feature part here -->
  
    <!-- feature part end -->

    

    <?php include "../extra/footer.html" ?>  

</body>

</html>