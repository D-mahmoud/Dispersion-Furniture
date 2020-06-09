
<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Products.php");
require_once(__ROOT__ . "controller/ProductsController.php");
require_once(__ROOT__ . "view/Shop.php");

$model = new Products();
$controller = new ProductsController($model);
$view = new Shop($controller, $model);
?> 

	
<!doctype html>
<html lang="zxx">
  
    <!-- Header part end-->
	<?php include "../extra/header.php" ?>


    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>product list

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
                        <?php  echo $view->search();
                        
                        ?>

                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                        <?php if (isset($_GET['action']) && !empty($_GET['action'])) {
                                switch($_GET['action']){
		                    case 'search':
                            echo $view->search_output();
                            
                            break;
                          
                            default:
                                echo $view->output();
                                } 
                           }
                           else
	                            echo $view->output();
                            ?>
                         </div>
                        <div class="load_more_btn text-center">
                            <!-- <a href="#" class="btn_3">Load More</a>-->
                            <button type="button" class="btn_3" name="load" id="load" onClick='load_data()'>Load More !</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <!-- feature part here -->
    <?php
         echo $view->feature();
     ?>
    <!-- feature part end -->

    

    <?php include "../extra/footer.html" ?>  

</body>

</html>
