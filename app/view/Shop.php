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
            <form  action="single-product.php" method="post">
            <button type="submit" class="btn_3" >'.$product->getName().'</button>  </div> </div>
            <input type="hidden" name="id"  value='.$product->getID().'>

            </form>';

        
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
}
