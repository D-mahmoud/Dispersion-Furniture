<?php
require_once(__ROOT__ . "view/View.php");
class Shop extends View{
    public function output()

    {
        $str="";
        $i=2;
       # foreach(array_slice($this->model->getProducts() , 0, $i)as $product){

      foreach($this->model->getProducts() as $product){
             $str= $str . '<div class="col-lg-6 col-sm-6">';
             $str .=' <div class="single_product_item">';
             $str .='<img src=../img/product/' . $product->getpicture() . ' </img> ' ;
             $str .='<h3> <p>'.$product->getCost().'EPG </p></h3>';
            $str .='
            <form  action="single-product copy.php" method="post">
            <input type="hidden" name="id"  value='.$product->getID().'>
            <button type="submit"  name = "details" class="btn_3" >'.$product->getName().'</button>  </div> </div>
            </form> ';
        # <form  action="single-product?action=details.php" method="post">

        
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

public function single_ptoduct()
{$str="";
    foreach($this->model->getproducts_details() as $product){      
      $str=$str .' <div class="single_product_img">';
      $str .='<img src=../img/product/' . $product->getpicture() . ' </img> 
      </div>
       <h3>'
       .$product->getName().'</h3>
    <p>This '.$product->getType().'name is'  .$product->getName().' its code number is'  .$product->getCode().'</p>
  <div class="card_area">
   <div class="product_count_area">
       <p>Quantity</p>
       <div class="product_count d-inline-block">
           <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
           <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
           <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
       </div>
       <p>' .$product->getCost().'EPG</p>
   </div>
 <div class="add_to_cart">
     <a href="#" class="btn_3">add to cart</a>
 </div>
 <?php	}
}';



}
}

public function search_output(){
    $str=""; 
    
    foreach($this->model->getProducts_search() as $product){
        $str= $str . '<div class="col-lg-6 col-sm-6">';
        $str .=' <div class="single_product_item">';
        $str .='<img src=../img/product/' . $product->getpicture() . ' </img> ' ;
        $str .='<h3> <p>'.$product->getCost().'EPG </p></h3>';
       $str .='
       <form  action="single-product.php?action=details" method="post">
       <button type="submit" class="btn_3" >'.$product->getName().'</button>  </div> </div>
       <input type="hidden" name="id"  value='.$product->getID().'>

       </form>';
    
    }
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

public function cart_button($id){
  $str='<form  action=cart.php?action=insert  method="post">
  
 <div class="product_count d-inline-block">
  <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
  <input class="product_count_item input-number" type="text" value="1" min="0" max="10"  name="amount">
  <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
</div>
<br><br>
        <input type="hidden" name="id"  value='.$id.'>
        <button type="submit" name="submit" class="btn_3" >Add to cart</button>  
        </form>';
    return $str;
}

/*public function order(){
  foreach($this->model->getCarts()as $cart){
    if($cart->getuserid()==$_SESSION['ID']){
      if($cart->getstatus()==""){
  $str='<form  action=cart.php?action=order  method="post">

  <input type="hidden" name="product_id"  value='.$cust->getproductid().'>
  <input type="hidden" name="user_id"  value='.$cust->getuserid().'>
  <input type="hidden" name="quantity"  value='.$cust->getquantity().'>
  <input type="hidden" name="total"  value='. $cust->getCost() * $cust->getquantity().'>

  <button type="submit">Place Order</button>
  </form>';
  return $str;
      }}
}
}*/

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
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>';
           

            foreach($this->model->getCarts()as $cart){
              if($cart->getuserid()==$_SESSION['ID'] &&  $cart->getcart_id()==""){
                // if($cart->getstat()==""){
              $str= $str .'<td>';
              $str .='<h3> <p>'.$cart->getproductname().'</p>';
                   $str= $str .'</td>
                   
              <td>';
              
              $str .='<h3> <p>'.$cart->getcost().'</p>';
              
              $str= $str .'</td>
              <td>
               ';
               $str .='<h3> <p>'.$cart->getquantity().'</p>';  
                
               $str= $str .'</td>
                  
                
                 
                </div>
              </td>

              <td>';
              $str .='<h3> <p>'.$cart->getcost()*$cart->getquantity().'</p>   </td>';
            $str .= ' <td> ' .' <form  action="status.php?action=req" method="post">
              <input type="radio" id="order" name="check" value="order">
              <label for="order"><h6>order</h6></label>
              <input type="radio" id="cancel" name="check" value="cancel">
              <label for="cancel"><h6>cancel</h6></label>
      
            
              <input type="hidden" name="id"  value='. $cart->getID().'>
      
              <input type="submit" value="Submit">
              </form>';
              
              $str .= " </td> ".
            '</tr>'; 
            
          // }
          }
            }$str= $str .' 
               
            
           
            <tr class="bottom_button">
              <td>
              <a class="btn_1" href="explore.php">Continue Shopping</a>
              </td>
              <td></td>
              <td></td>
              
            </tr>
            
          </tbody>
        </table>
        
  
';
return $str;


              }
            }
