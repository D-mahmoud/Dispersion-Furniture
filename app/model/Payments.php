
<?php

require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Payment.php");


class Payments extends Model {
    private $Payments;

	function __construct() {
        $this->fillArray();
    	}

	function fillArray() {
		$this->Payments = array();
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
		$result = $this->readPayments();
		while ($row = $result->fetch_assoc()) { 
               array_push($this->Payments, new Payment ($row["pay_id"], $row["Type"]));

		}
	} 

	function getPayments() { 
		return $this->Payments;
	}

	function readPayments(){
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
        $sql = "SELECT * FROM payment";
        $result =$mysqli->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
    }
 

 
}  
	

