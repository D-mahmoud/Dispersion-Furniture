<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/product.php");

class Products extends Model {
    private $products;
    private $products_search;
    private $products_details;
    private $k;
    private $k2;

	function __construct() {
        $this->fillArray();
        $this->fillArray_search();
        $this->fillArray_details();
    }

   	function fillArray() {
		$this->products = array();
		$this->dbh = $this->connect();
		$result = $this->readProducts();
		while ($row = $result->fetch_assoc()) {
			array_push($this->products, new Product($row["id"],$row["name"],$row["type"],$row["code"],$row["cost"],$row["picture"]));
		}
    }
	function getProducts() {
		return $this->products;
	}

	function readProducts(){
        $dbh = DBh::getInstance();
        $mysqli = $dbh->getConnection();   
		$sql = "SELECT * FROM product";
		$result =	$mysqli->query($sql);

		//$result = $this->dbh->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
    }
    function delete($id){
	//echo $id;
     $dbh = DBh::getInstance();
     $mysqli = $dbh->getConnection();  
       // $sql="Delete from product where id='$id' ";
      $sql=" DELETE FROM product WHERE  id='$id'";
       
        $result =	$mysqli->query($sql);

        //$result = DBh::getInstance()->getConnection()->query($sql);
          if($result  == true){
                echo "deleted successfully.";
                     return $result;  
            } 
            else{
                echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;
            }
        }

function details($id){
   
        $this->k2=$id;
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection();
    $sql = "SELECT * FROM product where id='$id' ";  
    $result =	$mysqli->query($sql);
    if($result== true){
     return $result;  
    
    }else{
        echo $id;
    } 
  
}
function fillArray_details() {
    $this->products_details = array();
    $this->dbh = $this->connect();
    $result = $this->details($this->k2);
    while ($row = $result->fetch_assoc()) {
        array_push($this->products_details, new Product($row["id"],$row["name"],$row["type"],$row["code"],$row["cost"],$row["picture"]));
    }
}

function getproducts_details() {
    return $this->products_details;
    
} 

    function search($key)
    {   
    if(!empty($_POST["key"])){
    $key=$_REQUEST['key'];
    $this->k=$key;
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection();  

    $sql="(SELECT * FROM product WHERE ( type LIKE '%".$_POST["key"]."%') OR ( code LIKE '%".$_POST["key"]."%') OR (name LIKE '%".$_POST["key"]."%') OR (cost LIKE '%".$_POST["key"]."%'))" ;
		$result =	$mysqli->query($sql);
    if($result== true){
    if ($result->num_rows > 0){

        return $result;  

    }

    else{
        echo "msh mawgood";
        return $this->readProducts() ;
    }
}else{
    echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;
} 
}
else {
    $key="";
    $this->k=$key;
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection(); 
    $sql = "SELECT * FROM product";
    $result =	$mysqli->query($sql);
			return $result;
		}
}

function fillArray_search() {
    $this->products_search = array();
    $this->dbh = $this->connect();
    $result = $this->search($this->k);
    while ($row = $result->fetch_assoc()) {
        array_push($this->products_search, new Product($row["id"],$row["name"],$row["type"],$row["code"],$row["cost"],$row["picture"]));
    }
}

function getProducts_search() {
    return $this->products_search;
    
}
function insertProduct($name,$type,$code,$cost,$picture){
$dbh = DBh::getInstance();
        $mysqli = $dbh->getConnection();   
		$sql="INSERT INTO product (name, type,code,cost,picture) VALUES ('$name', '$type','$code','$cost','$picture')";
		 $result =	$mysqli->query($sql);
		if( $result === true){
            echo "Records inserted successfully.";
            $this->fillArray();
        } else{
            echo "ERROR: Could not able to execute $sql. " .  $this->dbh->getConn()->error;
        }  
}
function editProduct($id,$name,$type,$code,$cost,$picture){

 $mysqli = $dbh->getConnection();   
		$sql="UPDATE product  SET name='$name',type='$type',code='$code',cost='$cost',picture='$picture'
		WHERE id='$id'";
		 $result =	$mysqli->query($sql);
		if( $result === true){
            echo "Records inserted successfully.";
            $this->fillArray();
        } else{
            echo "ERROR: Could not able to execute $sql. " .  $this->dbh->getConn()->error;
        }  

}
}		 
	  
	
