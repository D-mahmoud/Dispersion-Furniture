<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Payments.php");
require_once(__ROOT__ . "controller/OrderController.php");
require_once(__ROOT__ . "view/customer.php");

$model = new Payments();
$controller = new OrderController($model);
$view = new customer($controller, $model);




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
        
               <h2>Choose How You want to Pay</h2>
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
                            <p>Choose the method you feel most comfortable with.</p>
                        </div>
                    </div>
                </div>
                <!--ra7 3aml signup-->
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Glad to hear from you  <br>
                               </h3>
                               <?php
                               if (isset($_POST['submit']))
                               {    
                                $id=$_REQUEST["id"]; 
                                echo $id; 
                              echo $view-> method($id);   
                               }               
                                ?>
                                Online payment will be available soon
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "../extra/footer.html" ?>  

</body>
    
</html>