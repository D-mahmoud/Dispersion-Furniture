
<?php

require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Order.php");


class Orders extends Model {
    private $orders;

	function __construct() {
		$this->fillArray();
    	}

	function fillArray() {
		$this->orders = array();
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
		$result = $this->readOrders();
		while ($row = $result->fetch_assoc()) { 
               array_push($this->orders, new Order ($row["order_id"], $row["name"],$row ["total"],$row["product_id"],$row["user_id"],$row["quantity"],$row["fname"],$row["lname"],$row["email"],$row["number"],$row["address"],$row["payment"]));

		}
	} 

	
	function getOrders() {
		return $this->orders;
	}

	function readOrders(){
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
        $sql = "SELECT * FROM product JOIN orders  ON product.id = orders.product_id
		JOIN user P ON P.ID =orders.user_id  ";
        $result =$mysqli->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
    }
 
function pay($check,$order_id)
{
	$dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection();
    $sql = " UPDATE orders SET payment = '$check' WHERE order_id='$order_id' ";
    $result =	$mysqli->query($sql);
    if($result == true){
        echo "<script type='text/javascript'>alert(\"Thank you . Your Response has been saved\")
		location='Receipt.php';</script>";
		return $result;
	}
	else{
		echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;

	}

}

 
}  
	

