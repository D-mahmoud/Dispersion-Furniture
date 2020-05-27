<?php
  require_once(__ROOT__ . "model/Model.php");
  
?>

<?php
class Message extends Model {
    private $id;
    private $message;
    private $date;
    private $cust_id;
    private $emp_id;
    private $reply_on;
  

  function __construct($id,$message="",$date="",$cust_id="",$emp_id="",$reply_on="") {
    $this->id = $id;

    if(""===$message){
      $this->readMessages($id);
    }else{
      $this->message = $message;
      $this->date=$date;
      $this->cust_id = $cust_id;
      $this->emp_id = $emp_id;
      $this->reply_on=$reply_on;
    }
  }

  function getmessage() {
    return $this->message;
  }
 
  function setmessage($message) {
    return $this->message = $message;
  } 
  function getreply_on() {
    return $this->reply_on;
  }
 
  function setreply_on($reply_on) {
    return $this->reply_on = $reply_on;
  } 
 
   function getcust_id() {
    return $this->cust_id;
  }
  function setcust_id($cust_id) {
    return $this->cust_id = $cust_id;
  }
  
  function getemp_id() {
    return $this->emp_id;
  }
  function setemp_id($emp_id) {
    return $this->emp_id = $emp_id;
  }
  function getdate() {
    return $this->date;
  }
  function setdate($date) {
    return $this->date = $date;
  }
  
 
  function getID() {
    return $this->id;
  }

  function readMessage($id){
    $dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
    $sql = "SELECT * FROM messages  where id=$id";
		$result =	$mysqli->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->message = $row["message"];
        $this->date=$row["date"];
        $this->cust_id = $row["cust_id"];
        $this->emp_id = $row["emp_id"];
        $this->reply_on =$row["reply_on"];
        
    }
    else {
        $this->$message="";
        $this-> $cust_id="";
        $this->$emp_id="";
        $this->$picture="";
        $this->date="";
        $this->reply_on="";
   

    }
  }
 	 
}