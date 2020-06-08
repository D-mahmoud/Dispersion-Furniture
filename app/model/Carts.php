
<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/cart.php");

class Carts extends Model {
    private $carts;
   


	function __construct() {
        $this->fillArray();
      
	}

	function fillArray() {
		$this->carts = array();
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection();
		$result = $this->readCarts();
		while ($row = $result->fetch_assoc()) {
		
array_push($this->carts, new Cart($row["c_id"],$row["userid"],$row["quantity"],$row["productid"],$row["name"],$row["cost"],$row["stat"]));
        }
	}

	function getCarts() {
		return $this->carts;
	}

	function readCarts(){

		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
		$sql = "SELECT * FROM cart JOIN product ON cart.productid = product.id 
		 ";
		$result =	$mysqli->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	
    function insert($id,$quantity,$user_id){
		$dbh = DBh::getInstance();
        $mysqli = $dbh->getConnection();   
	$d= date("Y-m-d");
      $sql = "INSERT INTO cart ( productid,userid,quantity,date) VALUES ( '$id','$user_id','$quantity','$d')";
	  $result =	$mysqli->query($sql);  
	  if($result  === true){
		echo "<script type='text/javascript'>alert(\"Item added successfully\")
		location='explore.php';</script>";         
        } else{
            echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;
        }  
      }
   
			 
          } 