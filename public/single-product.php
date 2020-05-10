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
	<?php include "../extra/header.html" ?>
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <!--img-->
            <?php
           echo $view->single_ptoduct();
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "../extra/footer.html" ?>  
</body>
</html>
