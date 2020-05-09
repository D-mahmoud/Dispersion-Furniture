<?php
require_once(__ROOT__ . "view/View.php");
class Shop extends View{
    public function output()

    {$str="";
        $i=3;
        foreach(array_slice($this->model->getProducts() , 0, $i)as $product){
            $str= $str . '<div class="col-lg-6 col-sm-6">';
            $str .=' <div class="single_product_item">';
            $str .='<img src=../img/product/' . $product->getpicture() . ' </img> ' ;
            $str .='<h3> <p>'.$product->getCost().'</p>';
            $str .='<a href="single-product.html">'.$product->getName().'</a> </h3> </div> </div>';
          
        }
    return $str;
    }
   
public function search(){
    $str='
    <form action="explore.php?action=search" method="post">
    <input type="text" name="key" id="key" placeholder="Search keyword">
    <i class="ti-search"></i>
</form>';
return $str;

}
public function search_output(){
    $str=""; 
    
    foreach($this->model->getProducts_search() as $product){
        $str= $str . '<div class="col-lg-6 col-sm-6">';
        $str .=' <div class="single_product_item">';
        $str .='<img src=    ../img/product/' . $product->getpicture(). 'class="img-fluid">';
        $str .='<h3> <p>'.$product->getCost().'</p>';
        $str .='<a href="single-product.html">'.$product->getName().'</a> </h3> </div> </div>';
    }
  # $str=$str. $this->model->getProducts_search() ;
return $str;
}

    public function feature()
{
    
$str='
    <section class="feature_part section_padding">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <div class="feature_part_tittle">
                    <h3>Credibly innovate granular
                    internal or organic sources
                    whereas standards.</h3>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="feature_part_content">
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <div class="single_feature_part">
                    <img src="../img/icon/feature_icon_1.svg" alt="#">
                    <h4>Credit Card Support</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_feature_part">
                    <img src="../img/icon/feature_icon_2.svg" alt="#">
                    <h4>Online Order</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_feature_part">
                    <img src="../img/icon/feature_icon_3.svg" alt="#">
                    <h4>Free Delivery</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_feature_part">
                    <img src="../img/icon/feature_icon_4.svg" alt="#">
                    <h4>Product with Gift</h4>
                </div>
            </div>
        </div>
    </div>
</section>';
return $str;

}


public function viewcart(){

    $str='
    <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>';
              $i=3;
              foreach(array_slice($this->model->getCarts(), 0, $i)as $cart){
                $str= $str .'<td>
                 
                   
                  ';
                    $str .='<h3> <p>'.$cart->getproductname().'</p>';

                    $str= $str .' 
                  
                </td>
                <td>';
                $str .='<h3> <p>'.$cart->getproductid().'</p>';
                
                $str= $str .'</td>
                <td>
                 ';
                 $str .='<h3> <p>'.$cart->getquantity().'</p>';  
                  
                 $str= $str .'</td>
                    
                  
                   
                  </div>
                </td>
                <td>';
                $str .='<h3> <p>'.$cart->getcost().'</p>';

               } $str= $str .' 
                 
                </td>
              </tr>
             
              <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="#">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>$2160.00</h5>
                </td>
              </tr>
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                  <div class="shipping_box">
                    <ul class="list">
                      <li>
                        Flat Rate: $5.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Free Shipping
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Flat Rate: $10.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li class="active">
                        Local Delivery: $2.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                    </ul>
                    <h6>
                      Calculate Shipping
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                    <select class="shipping_select">
                      <option value="1">Bangladesh</option>
                      <option value="2">India</option>
                      <option value="4">Pakistan</option>
                    </select>
                    <select class="shipping_select section_bg">
                      <option value="1">Select a State</option>
                      <option value="2">Select a State</option>
                      <option value="4">Select a State</option>
                    </select>
                    <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                    <a class="btn_1" href="#">Update Details</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
';
return $str;

              }
            }
