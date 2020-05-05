<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Products.php");
require_once(__ROOT__ . "controller/ProductsController.php");
require_once(__ROOT__ . "view/Shop.php");

$model = new Products();
$controller = new ProductsController($model);
$view = new Shop($controller, $model);
if (isset($_GET['action']) && !empty($_GET['action'])) {
  $controller->{$_GET['action']}();
 
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

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
              <img src="../img/product/single_product.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="../img/product/single_product.png" alt="#" class="img-fluid">
            </div>
           <?php echo $view->details();?> 
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <?php 
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php include "../extra/footer.html" ?>  
</body>

</html>