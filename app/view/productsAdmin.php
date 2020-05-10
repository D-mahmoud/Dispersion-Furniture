

<?php
require_once(__ROOT__ . "view/View.php");
class AdminProducts extends View{
    public function output()
    {
	
        $str="";
        $i=2;
      foreach($this->model->getProducts() as $product){
             $str= $str . '<div class="row-sm-6 col-sm-6">';
             $str .=' <div class="single_product_item">';
             $str .='<img src=../img/product/' . $product->getpicture() . ' </img> ' ;
            
            $str .='
            <form  action="showProductsAdmin.php?action=edit" method="post">
           Name: <input type="text" name="name"  value="'.$product->getName().'"></input>
			Cost:<input type="text" name="cost"   value="'.$product->getCost().'" ></input>
			Code:<input type="text" name="code"   value="'.$product->getCode().'"></input>
			Type:<input type="text" name="type"   value="'.$product->getType().'"></input>
			Picture:<input type="file" name="picture"   value="'.$product->getPicture().'"></input>
            <input type="hidden" name="id"  value='.$product->getID().'>
			<button type="submit" class="btn_2" > Edit</button>

            </form>
			<form action="showProductsAdmin.php?action=delete" method="post">
			  <input type="hidden" name="id"  value='.$product->getID().'>
			 <button type="submit" name="delete" class="btn_2" > delete</button>

            </form> 
			
			</div> </div>';
        
    }
    return $str;
    }
	public function search_output(){
    $str=""; 
    
     foreach($this->model->getProducts() as $product){
             $str= $str . '<div class="col-lg-6 col-sm-6">';
             $str .=' <div class="single_product_item">';
             $str .='<img src=../img/product/' . $product->getpicture() . ' </img> ' ;
             $str .='<h3> <p>'.$product->getCost().'EPG </p></h3>';
            $str .='
            <form  action="showProductsAdmin.php?action=edit" method="post">
            <button type="button"  >'.$product->getName().'</button>  </div> </div>
            <input type="hidden" name="id"  value='.$product->getID().'>
			<button type="submit"  > Edit</button>

            </form><br>
			<form action="showProductsAdmin.php?action=delete" method="post">
			  <input type="hidden" name="id"  value='.$product->getID().'>
			 <button type="submit" > delete</button>

            </form> <br>
			
			<form action="showProductsAdmin.php?action=edit" method="post">
			  <input type="hidden" name="id"  value='.$product->getID().'>
			 <button type="submit" > Edit</button>

            </form>';
			
        
    }
    return $str;
    }

	 public function deleteonce($id){
        $this->model->delete($id);
        
        }
    public function insertProduct($name,$type,$code,$cost,$picture){
	$this->model->insertProduct($name,$type,$code,$cost,$picture);
	}
	 public function editProduct($id,$name,$type,$code,$cost,$picture){
	$this->model->insertProduct($id,$name,$type,$code,$cost,$picture);
	}
	}