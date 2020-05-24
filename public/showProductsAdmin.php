
<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Products.php");
require_once(__ROOT__ . "controller/ProductsController.php");
require_once(__ROOT__ . "view/productsAdmin.php");

$model = new Products();
$controller = new ProductsController($model);
$view = new AdminProducts($controller, $model);
?>

	
<!doctype html>
<html lang="zxx">
  <script>
  function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
  </script>
    <!-- Header part end-->
	<?php include "../extra/header.html" ?>


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
		 <button type="button" name="hide" id="hide" class="btn_1" onClick='myFunction()'>click To Add</button><br>
		<div id="myDIV">
		  <form action="showProductsAdmin.php?action=add" method="post">
		  Name: <input type="text" name="name" id="name"  placeholder="name" required></input><br>
		   Code: <input type="text" name="code" id="code"  placeholder="Code" required></input><br>
		    Cost: <input type="text" name="cost" id="cost"  placeholder="cost" required></input><br>
			   Type: <input type="text" name="type" id="type"  placeholder="type" required></input><br>
			      picture: <input type="file" name="picture" id="picture"  placeholder="picture" required></input>
			 <button type="submit" name="add"  > add</button>
            </form> 
			 </div><br>
            <div class="row">
	
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
						
                        <?php if (isset($_GET['action']) && !empty($_GET['action'])) {
                                switch($_GET['action']){
		                    case 'delete':
                           $view->deleteonce($_POST['id']);
                           $view->output(); 
                            break;
                          
                            case 'edit':
                              echo $view->EditProduct($_POST['id'],$_POST['name'],$_POST['type'],$_POST['code'],$_POST['cost'],$_POST['picture']);
							case 'search':
							 echo $view->search_output();
							 case'add':
							 echo $view->insertProduct($_POST['name'],$_POST['type'],$_POST['code'],$_POST['cost'],$_POST['picture']);
                                } 
                           }
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