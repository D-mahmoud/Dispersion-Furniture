<?php
  require_once(__ROOT__ . "model/Model.php");
  
?>

<?php
class Payment extends Model {
    private $pay_id;
    private $Type;
   

  function __construct($pay_id,$Type="") {
    $this->pay_id = $pay_id;

    if(""===$Type){
      $this->readPayment($pay_id);
    }else{
      $this->Type = $Type;
     
    }
  }

  function getType() {
    return $this->Type;
  }
 
  function setType($Type) {
    return $this->Type = $Type;
  } 
 
  
  function getID() {
    return $this->pay_id;
  }

  function readPayment($pay_id){
    $dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
    $sql = "SELECT * FROM Payments   ";
		$result =	$mysqli->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->Type = $row["Type"];
       
    }
    else {
        $this->$Type="";
       

    }
  }
 	 
}