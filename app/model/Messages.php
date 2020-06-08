
<?php

require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Message.php");


class Messages extends Model {
    private $messages;
    private $id_reply;

	function __construct() {
        $this->fillArray();
    	}

	function fillArray() {
		$this->messages = array();
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
		$result = $this->readMessages();
		while ($row = $result->fetch_assoc()) {
			array_push($this->messages, new Message($row["ID"],$row["message"],$row["Date"],$row["cust_id"],$row["emp_id"],$row["reply_on"]));
		}
	} 

	function getMessages() {
		return $this->messages;
	}

	function readMessages(){
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
		$sql = "SELECT * FROM messages ORDER BY ID  ASC ";
		$result =	$mysqli->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
    }
    
function ignore($id){
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection(); 
    $sql = "DELETE FROM messages WHERE  ID='$id' ";
    $result =	$mysqli->query($sql);
    if($result  == true){
        header("Location:Q&A.php");
        return $result; 
 
    } 
    else{             
        echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;
    }
 
    
}
function send($message,$id){
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection(); 
    $d= date("Y-m-d");
    $sql = "INSERT INTO messages (cust_id,message,Date) VALUES ('$id','$message','$d')";
    $result =$mysqli->query($sql);
    if($result  == true)
    {
        echo "<script type='text/javascript'>alert(\"Message sent successfully\")
        location='mess.php';</script>";
    }
    else{
        echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;
    }
}

function send_mess($message,$emp_id,$cust_id,$mess_id){
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection(); 
    $d= date("Y-m-d");
    $sql = "INSERT INTO messages (cust_id,message,Date,emp_id,reply_on) VALUES ('  $mess_id','$message','$d','$emp_id','$cust_id')";
    $result =$mysqli->query($sql);
    if($result  == true)
    {
        echo "<script type='text/javascript'>alert(\"Message sent successfully .. Continue answering messages\")
       </script>";
    }
    else{
        echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;
    }
}

}  
	
