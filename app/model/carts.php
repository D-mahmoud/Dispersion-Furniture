<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/cart.php");

class Carts extends Model {
    private $carts;
    private $dbh;
    private $k;


	function __construct() {
        $this->fillArray();
      
	}

	function fillArray() {
		$this->carts = array();
		$this->dbh = $this->connect();
		$result = $this->readCarts();
		while ($row = $result->fetch_assoc()) {
			array_push($this->carts, new Cart($row["id"],$row["productid"],$row["userid"],$row["quantity"]));
		}
	}

	function getCarts() {
		return $this->carts;
	}

	function readCarts(){
		$sql = "SELECT * FROM cart";

		$result = $this->dbh->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	
    function insertCarts($id,$productid,$userid, $quantity){
      $sql = "INSERT INTO cart (id, productid,userid,quantity) VALUES ('$id', '$productid','$userid','$quantity')";
        if($this->dbh->query($sql) === true){
            echo "Records inserted successfully.";
            $this->fillArray();
        } else{
            echo "ERROR: Could not able to execute $sql. " .  $this->dbh->getConn()->error;
        }  
      }
   
			 
          }  
          