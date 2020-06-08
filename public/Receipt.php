<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Orders.php");
require_once(__ROOT__ . "model/Payments.php");
require_once(__ROOT__ . "controller/OrderController.php");
require_once(__ROOT__ . "view/customer.php");


$model = new Orders();
$controller = new OrderController($model);
$view = new customer($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();   
}

include "../extra/header.php" ;
?>
  <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Your Receipt</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      
      <div class="cupon_area">
        
        
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
          <?php echo $view->billing(); ?>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a >Product
                    <span>Total</span>
                  </a>
                </li>
                <table>
                   <?php echo $view-> product(); ?>
                </table>
                </ul>
              <ul class="list list_2">
                <li>
                  <a>Subtotal
                    <span> <?php echo $view->subtotal(); ?></span>
                  </a>

                </li>
                <li>
                  <a>Shipping
                    <span>standard Across Egypt</span>
                  </a>
                </li>
                <li>
                  <a>Total
                    <span><?php echo $view->subtotal(); ?></span>
                  </a>
                </li>
              </ul>


              <div class="payment_item">

               
                <div class="radion_btn">
       
               This is the Receipt so only the orders that you checked out appear .
              </div>
            
               
              </div>

             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</html>




                