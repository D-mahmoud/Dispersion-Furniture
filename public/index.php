<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/Register.php");

$model = new Users();
$controller = new UsersController($model);
$view = new Register($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
   // $controller->{$_GET['action']}();
   switch($_GET['action']){
    case 'signOut':
            session_destroy();
            header("Location:index.php");

    break;

}
}
    

?>





	
<!doctype html>
<html lang="zxx">
  
    <!-- Header part end-->
	<?php include "../extra/header.php" ?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Comfort.
                                Happiness.
                                    Home.</h1>
                            <p>Our name is the promise of standard and quality.</p>
                            <?php if (empty($_SESSION["ID"])){?>
                          
                                <a href="login.php" class="btn_1">shop now</a>

                                <?php }
                               else{?>
                            <a href="explore.php" class="btn_1">shop now</a>

                            <?php }?>
                            <a href="explore.php" class="btn_1">Explore</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="../img/banner.jpg" alt="#" class="img-fluid">
            <img src="../img/banner_pattern.png " alt="#" class="pattern_img img-fluid">
        </div>
    </section>
    

    <!-- feature part here -->
    <?php
         echo $view->feature();
     ?>
    <!-- Message/subscribe part -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Write us a message</h2>
<p>Write to us and we will get back to you as soon as we can</p>     
<div class="mt-10">
							<textarea class="single-textarea" placeholder="Write here" onfocus="this.placeholder = ''"
								onblur="this.placeholder = 'Message'" required></textarea>
						</div>                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->

    <?php include "../extra/footer.html" ?>  

    
</body>

</html>
