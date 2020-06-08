<?php if (!isset($_SESSION)) {
session_start();
}?>
    <!-- 6/6 8ayarat customer w cart mazbbtsh github -->

                            <html>
							<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <title>pillloMart</title>
    <link rel='icon' href='../img/d.jpeg'>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='../css/bootstrap.min.css'>
    <!-- animate CSS -->
    <link rel='stylesheet' href='../css/animate.css'>
    <!-- owl carousel CSS -->
    <link rel='stylesheet' href='../css/owl.carousel.min.css'>
    <!-- font awesome CSS -->
    <link rel='stylesheet' href='../css/all.css'>
    <!-- flaticon CSS -->
    <link rel='stylesheet' href='../css/flaticon.css'>
    <link rel='stylesheet' href='../css/themify-icons.css'>
    <!-- font awesome CSS -->
    <link rel='stylesheet' href='../css/magnific-popup.css'>
    <!-- swiper CSS -->
    <link rel='stylesheet' href='../css/slick.css'>
    <!-- style CSS -->
    <link rel='stylesheet' href='../css/style.css'>
</head>

							<header class='main_menu home_menu'>
        <div class='container'>
            <div class='row align-items-center justify-content-center'>
                <div class='col-lg-12'>
                    <nav class='navbar navbar-expand-lg navbar-light'>
                        <a class='navbar-brand' href='../index.html'> <img src='../img/d.jpeg' alt='logo'> </a>
                            <button class='navbar-toggler' type='button' data-toggle='collapse'
                            data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
                            aria-expanded='false' aria-label='Toggle navigation'>
                            <span class='menu_icon'>
                            <i class='fas fa-bars'></i></span>
                            </button>
                        <?php
                        if (!empty($_SESSION['ID'])) {
                           
			
                       echo" <div class='collapse navbar-collapse main-menu-item' id='navbarSupportedContent'>";
                            
                                 if (($_SESSION['role']) == 'customer') 
                                {
                               echo" <ul class='navbar-nav'>
                                 <li class='nav-item'>
                                    <a class='nav-link' href='../public/index.php'>Home</a>
                                    </li>
								    
                                     <li class='nav-item'>
                                    
                                    <a class='nav-link' href='../public/explore.php'> products</a>
                                                         
                                </li>
                              
                                <li class='nav-item'>
                                <a class='nav-link' href='../public/status.php'>Active Orders</a>
                                    </li>
                                    
                                       
                                    <li class='nav-item'>
                                    <a class='nav-link' href='../public/checkout.php'>Checkout</a>
                                        </li>
                                        
                                    
                                     <li class='nav-item'>
                                    
                                     <a class='nav-link' href='../public/mess.php'> Messages</a>
                                                          
                                 </li>
                                             <li class='nav-item'>
                                             <a class='nav-link' href='index.php?action=signOut'>SignOut</a>
                                         </li>
                                          </ul>";
                                    }
                                  
                                     else if(($_SESSION['role']) == 'admin')  {
                                      echo"<ul class='navbar-nav'>
                                      <li class='nav-item'>
                                      <a class='nav-link' href='../public/index.php'>Home</a>
                                      </li>                                              
                                             <li class='nav-item'>
                                             <a class='nav-link' href='../public/employees'>Employees </a>
                                             </li>
                                             <li class='nav-item'>
                                             <a class='nav-link' href=../public/showUsersAdmin.php '>Remove Customers</a>
                                                 </li>
                                                 <li class='nav-item'>
                                             <a class='nav-link' href=#'>Update Employees</a>
                                                 </li>

                                                 <li class='nav-item'>
                                                 <a class='nav-link' href=# '>View Feedback</a>
                                                     </li>
                                             <li class='nav-item'>
                                    
                                             <a class='nav-link' href='../public/Q&A.php'> Messages</a>
                                                                  
                                         </li>
                                             <li class='nav-item'>
                                             <a class='nav-link' href='index.php?action=signOut'>SignOut</a>
                                             </li>";
                                     }
                                    else   {
                                                echo"<ul class='navbar-nav'>
                              
                                                <li class='nav-item'>
                                                <a class='nav-link' href='../public/index.php'>Home</a>
                                                </li>
                                         <li class='nav-item'>
                                    <a class='nav-link' href=../public/showProductsAdmin.php'> Update Products</a>
                                        </li>
					<li class='nav-item'>
                                    <a class='nav-link' href=../public/request.php'> Requested Orders</a>
                                        </li>
                                        <li class='nav-item'>
                                    <a class='nav-link' href=../public/showUsersAdmin.php '>Remove Customers</a>
                                        </li>
                                        <li class='nav-item'>
                                    
                                        <a class='nav-link' href='../public/Q&A.php'> Messages</a>                
                                    </li>
                                    <li class='nav-item'>
                                    <a class='nav-link' href=# '>View Feedback</a>
                                        </li>
                                 <li class='nav-item'>
                                    <a class='nav-link' href='index.php?action=signOut'>SignOut</a>
                                </li>
                                </ul>";
                                         }
                           echo"
                        
                        </div>
                        <div class='hearer_icon d-flex align-items-center'>
                            <a id='search_1' href='javascript:void(0)'><i class='ti-search'></i></a>
                            <a href='../public/cart.php'>
                                <i class='flaticon-shopping-cart-black-shape'></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        ";
        }
                     else{
                            
                          echo"
                          <ul class='navbar-nav'>
                            <div class='collapse navbar-collapse main-menu-item' id='navbarSupportedContent'>
                                
                            <ul class='navbar-nav'>
                            <li class='nav-item'>
                                    
                                    <a class='nav-link' href='../public/login.php'> login</a>
                                                         
                                </li>        
                            <li class='nav-item'>
                                    <a class='nav-link' href='../public/index.php'>Home</a>
                                </li>
                                
                                
                            </ul>
                        </div>";
                            }?>
    </header>
</html>
