<?php if (!isset($_SESSION)) {
session_start();
}?>
                            <html>
							<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
	
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
                                    <a class='nav-link' href='../past_orders.php'>My Past Orders</a>
                                     </li>
                                     <li class='nav-item'>
                                    
                                    <a class='nav-link' href='../public/explore.php'> products</a>
                                                         
                                </li>
                                <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' href='../blog.html' id='navbarDropdown_3'
                                        role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        pages
                                    </a>
                                    <div class='dropdown-menu' aria-labelledby='navbarDropdown_2'>
                                        <a class='dropdown-item' href='../public/login.php'> 
                                            login
                                            
                                        </a>
                                        <a class='dropdown-item' href='../checkout.html'>product checkout</a>
                                        <a class='dropdown-item' href='../cart.html'>shopping cart</a>
                                        <a class='dropdown-item' href='../confirmation.html'>confirmation</a>
                                        <a class='dropdown-item' href='../elements.html'>elements</a>
                                         </div>
                                          </li>
                                          <li class='nav-item'>
                                    <a class='nav-link' href='../Track_Order.php'>Track Order</a>
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
                    
                                        <li class='nav-item dropdown'>
                                         <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown_2'
                                        role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        Admin Panel
                                          </a>
                                         <div class='dropdown-menu' aria-labelledby='navbarDropdown_2'>
                                        <a class='dropdown-item' href='../Update_Product.php'> Update Products</a>
                                        <a class='dropdown-item' href='../Update_Employee.php'>Update Employee List</a>
										<a class='dropdown-item' href='../view_feedback.php'>View Feedback</a>

                                             </div>
                                             </li>
                                             <li class='nav-item'>
                                             <a class='nav-link' href='../Track_Order.php'>Track Order</a>
                                             </li>
                                             <li class='nav-item'>
                                             <a class='nav-link' href='../public/employees'>Employees </a>
                                             </li>
                                             <li class='nav-item'>
                                             <a class='nav-link' href='index.php?action=signOut'>SignOut</a>
                                             </li>";
                                     }
                                    else   {
                                                echo"<ul class='navbar-nav'>
                              
                                             <li class='nav-item dropdown'>
                                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown_4'
                                            role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            Employee Panel
                                             </a>
                                             <div class='dropdown-menu' aria-labelledby='navbarDropdown_4'>
                                        <a class='dropdown-item' href='../Delete_customer.php'> Delete Customer</a>
                                        <a class='dropdown-item' href='../confirm_order.php'>Confirm Order</a>
										<a class='dropdown-item' href='../Track_Order._employee.php'>Track Order</a>
									    <a class='dropdown-item' href='../Update_Product.php'> Update Products</a>
						             	<a class='dropdown-item' href='../View_feedback.php'>View Feedback</a>
										<a class='dropdown-item'href='../Message.php'>Answer Messages</a>

                                        
                                     </div>
                                        </li>
                                         <li class='nav-item'>
                                    <a class='nav-link' href='../Track_Order.php'>Track Order</a>
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
                            <a href='cart.html'>
                                <i class='flaticon-shopping-cart-black-shape'></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class='search_input' id='search_input_box'>
            <div class='container '>
                <form class='d-flex justify-content-between search-inner'>
                    <input type='text' class='form-control' id='search_input' placeholder='Search Here'>
                    <button type='submit' class='btn'></button>
                    <span class='ti-close' id='close_search' title='Close Search'></span>
                </form>
            </div>
        </div>";
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
