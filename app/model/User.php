<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class User extends Model {
    private $ID;
    private $fname;
    private $lname;
    private $role;
    private $username;
    private $address;
	private $password;
    private $number;
    private $email;

  function __construct($ID,$lname="",$fname="",$username="",$email="",$number="",$address="",$password="",$role="") {
    $this->ID = $ID;
   // $this->role="user";
   $dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
	    //$this->db = $this->connect();

    if(""===$username){
      $this->readUser($ID);
    }else{
      $this->fname = $fname;
      $this->lname = $lname;
      $this->username = $username;
      $this->number = $number;
      $this->address = $address;
      $this->number = $number;
	  $this->password=$password;
      $this->email = $email;
      $this->role = $role;
    }
  }

  function getLName() {
    return $this->lname;
  }
  function getFName() {
    return $this->fname;
  }
  function setFName($fname) {
    return $this->fname = $fname;
  } 
  function setLName($lname) {
    return $this->lname = $lname;
  }
  
   function getPassword() {
    return $this->password;
  }
  function setPassword($password) {
    return $this->password = $password;
  }
  
  function getEmail() {
    return $this->email;
  }
  function setEmail($email) {
    return $this->email = $email;
  }
  
  function getNumber() {
    return $this->number;
  }
  function setNumber($number) {
    return $this->number = $number;
  }

  function getUsername() {
    return $this->username;
  }
  function setUsername($username) {
    return $this->username = $username;
  }
  function getAddress() {
    return $this->address;
  }
  function setAddress($address) {
    return $this->address = $address;
  }
  function getRole() {
    return $this->role;
  }
  function setRole($role) {
    return $this->role = $role;
  }
 
  function getID() {
    return $this->ID;
  }

  function readUser($ID){
    $dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
    $sql = "SELECT * FROM user where ID=.$ID";
    //$db = $this->connect();
    $result =	$mysqli->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->lname = $row["lname"];
        $this->fname = $row["fname"];
        $this->email = $row["email"];
        $this->address = $row["address"];
        $this->username = $row["username"];
		$_SESSION["Name"]=$row["username"];
		$this->password=$row["Password"];
        $this->number = $row["number"];
		$this->role = $row["role"];
    }
    else {
        $this->lname = "";
        $this->fname = "";
        $this->address = "";
        $this->number = "";
		$this->email="";
        $this->username = "";
    $this->role = "";
    $this->password = "";

    }
  }


  
  function deleteUser(){
    $dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
    $sql="delete from user where ID=$this->ID;";
    $result =	$mysqli->query($sql);
	  if($result === true){
            echo "deletet successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
	}
	 
}