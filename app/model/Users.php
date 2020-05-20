
<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");


class Users extends Model {
    private $users;
   // private $dbh;
 
	
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->users = array();
		$this->dbh = $this->connect();
		$result = $this->readUsers();
		while ($row = $result->fetch_assoc()) {
			array_push($this->users, new User($row["ID"],$row["lname"],$row["fname"],$row["username"],$row["email"],$row["number"],$row["address"],$row["password"],$row["role"]));
		}
	}

	function getUsers() {
		return $this->users;
	}

	function readUsers(){
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
		$sql = "SELECT * FROM user Where role='user'";
		$result =	$mysqli->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	
   function insertUser($fname,$lname,$email,$number, $address,$password,$username){
		$dbh = DBh::getInstance();
        $mysqli = $dbh->getConnection();   

      	$password=md5($password);
if ($_SESSION["role"]="" ||$_SESSION["role"]="customer")
{
$role="customer";
}

	  $sql = "INSERT INTO user (fname, lname,email,number,address,password,username,role) VALUES ('$fname', '$lname','$email','$number','$address','$password','$username','$role')";
	 	  $result =	$mysqli->query($sql);

	    if( $result === true){
            echo "Records inserted successfully.";
            $this->fillArray();
        } else{
            echo "ERROR: Could not able to execute $sql. " .  $this->dbh->getConn()->error;
        }  
      }
    
      function error(){
        echo"Sorry the passwords do not match please re-confirm again";
	  }
	  
	function login($username,$password){
		$dbh = DBh::getInstance();
		$mysqli = $dbh->getConnection(); 
		$password=md5($password);
		$select= DBh::getInstance()->query("SELECT * FROM user where username='$username' and password='$password'");
        if($select== true)
        {          
            if ($select->count())
        {
            foreach($select->results()as $row)
            {
            $row = get_object_vars($row);
            
       $_SESSION["ID"]=$row["ID"];
       echo   $_SESSION["ID"];
		$_SESSION["username"]=$row["username"];
		echo   $_SESSION["username"];
      // header("Location:explore.php");
            }
        }
        else {
            echo "<script type='text/javascript'>alert(\"Wrong Username or Password please re-try\")
            location='login.php';</script>";
        }   
}

			 
		   }
			 
		   function deleteUser($id){
		    $dbh = DBh::getInstance();
     $mysqli = $dbh->getConnection();  
      $sql=" DELETE FROM user WHERE  id='$id'";
       
        $result =	$mysqli->query($sql);

          if($result  == true){
                echo "deleted successfully.";
                     return $result;  
            } 
            else{
                echo "ERROR: Could not able to execute $sql. " .  $dbh->getConnection()->error;
            }
		   
		   }
			 
		 }  
	
