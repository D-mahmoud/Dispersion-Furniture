<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/product.php");

class Products extends Model {
    private $products;
    private $products_search;
    private $dbh;
    private $k;

	function __construct() {
        $this->fillArray();
        $this->fillArray_search();
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
		$sql = "SELECT * FROM product";

		$result = $this->dbh->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
    }

    
    function search($key)
    {   
    if(!empty($_POST["key"])){
    $key=$_REQUEST['key'];
    $this->k=$key;

    $sql="(SELECT * FROM product WHERE ( type LIKE '%".$_POST["key"]."%') OR ( code LIKE '%".$_POST["key"]."%') OR (name LIKE '%".$_POST["key"]."%') OR (cost LIKE '%".$_POST["key"]."%'))" ;
    $result = $this->dbh->query($sql);
    if($result== true){
    if ($result->num_rows > 0){

        return $result;  

    }

    else{
        echo "msh mawgood";
        return $this->readProducts() ;
    }
}else{
    echo "ERROR: Could not able to execute $sql. " .  $this->dbh->getConn()->error;
} 
}
else {
    $key="";
    $this->k=$key;
    $sql = "SELECT * FROM product";

		$result = $this->dbh->query($sql);
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
function insertProduct($type,$name,$cost,$picture,$price){
 $sql = "INSERT INTO product (type, name,cost,picture,price) VALUES ('$type', '$name','$cost','$picture','$price')";
        if($this->dbh->query($sql) === true){
            echo "Records inserted successfully.";
            $this->fillArray();
        } else{
            echo "ERROR: Could not able to execute $sql. " .  $this->dbh->getConn()->error;
        }  
      }

}
		 
	  
	
