<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");

class Users extends Model {
    private $users;
    private $dbh;

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
		$sql = "SELECT * FROM user";

		$result = $this->dbh->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	
    function insertUser($fname,$lname,$email,$number, $address,$password,$username,$role){
       /* $fname = $this->dbh->getConn()->$fname;
        $lname = $this->dbh->getConn()->$lname;
        $email = $this->dbh->getConn()->real_escape_string($email);
        $number = $this->dbh->getConn()->real_escape_string($number);
        $address = $this->dbh->getConn()->real_escape_string($address);
        $password = $this->dbh->getConn()->real_escape_string($password);
      */
	    $password=md5($password);
	    $sql = "INSERT INTO user (fname, lname,email,number,address,password,username,role) VALUES ('$fname', '$lname','$email','$number','$address','$password','$username','$role')";
        if($this->dbh->query($sql) === true){
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
		#$username= $_REQUEST['username'];	
		$password=md5($password);
			 $sql = "SELECT ID FROM user where username='$username' and password='$password'";
			 $result = $this->dbh->query($sql);
			 if($result== true){
			 if ($result->num_rows ==1){
					 $row =  $this->dbh->fetchRow();
					 $_SESSION["ID"]=$row["ID"];
					 $_SESSION["username"]="$username";
					 header("Location:explore.php");
					
				 }
			else {
				echo "<script type='text/javascript'>alert(\"Wrong Username or Password please re-try\")
				location='login.php';</script>";
			}
				}else{
					echo "ERROR: Could not able to execute $sql. " .  $this->dbh->getConn()->error;
				}  
			
			 
		   }
			 
		 }  
	
