
<?php

require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Request.php");


class Requests extends Model {
    private $requests;

	function __construct() {
        $this->fillArray();
    	}

	function fillArray() {
		$this->requests = array();
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
		$result = $this->readRequests();
		while ($row = $result->fetch_assoc()) {
               array_push($this->requests, new Request ($row["ID"], $row["cart_ID"],$row ["status"],$row["id"],$row["productid"],$row["userid"],$row["quantity"],$row["Date"],$row["id"],$row["name"],$row["code"],$row["cost"],$row["picture"]));

		}
	} 

	function getRequests() {
		return $this->requests;
	}

	function readRequests(){
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
        $sql = "SELECT * FROM request JOIN cart  ON request.cart_ID = cart.id
        JOIN product P ON P.id =cart.productid  
        ORDER BY cart.Date";
        $result =$mysqli->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
    }
 
function confirm($status,$id,$product_id,$user_id,$total,$quantity)
{
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection();
    $sql = " UPDATE request SET status = '$status' WHERE ID='$id' ";
    $result =	$mysqli->query($sql);
    if($result == true){
        echo "<script type='text/javascript'>alert(\"Thank you . Your Response has been saved\")
		location='status.php';</script>";
	if($status=="confirm")	{
	$d= date("Y-m-d");
	$sql2="INSERT INTO orders (user_id, product_id,total,Date,quantity) VALUES ('$user_id','$product_id','$total','$d','$quantity')";
    $result2 =	$mysqli->query($sql2);
	if($result2 != true)
	{
		echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;

	}
	} 
}
    else
    {             
    echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;
    }
    
}


 
}  
	

