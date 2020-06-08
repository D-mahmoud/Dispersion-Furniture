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
  
}

?>	
<!doctype html>
<html lang="zxx">
  
    <!-- Header part end-->
	<?php include "../extra/header.php" ?>
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
              <?php 
            if(isset($_POST['id']))	{
              $id=$_REQUEST["id"];//id el product
        
              $dbh = DBh::getInstance();
              $mysqli = $dbh->getConnection(); 

            $sql = "SELECT * FROM product where id='$id' ";
	            //$dbh = new Dbh();
              $result =	$mysqli->query($sql);
              if ($result->num_rows == 1)
              {
                //$row = $dbh->fetchRow();
                foreach ($result as $row ) {

                ?> 
                   <div class="single_product_img">
                   <img src="<?php echo "../img/product/". $row["picture"];?>" class="img-fluid"></img>
                    </div>
                    <h3>
	          <?php echo $row["name"];?></h3>
	             <p>This <?php echo $row["type"];?> name is <?php echo $row["name"];?> it's code number is  <?php echo $row["code"];?></p>
               <p><h3><?php echo $row["cost"];?>EPG</h3></p>

               <div class="card_area">
                <div class="product_count_area">
                    <p>Quantity</p>
                   
                </div>
              <div class="add_to_cart">
              <?php  echo $view->cart_button($id); ?>

              </div>
              <?php	}}
            }
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