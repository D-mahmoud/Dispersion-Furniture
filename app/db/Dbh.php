<?php
  require_once("config.php");
 
class DBh{
    private $_connection;
    private static $_instance; //The single instance
	
    private $servername;
    private $username;
    private $password;
    private $dbname;

   // private $conn;
    //private $result;
    //public $sql;

    function __construct() {
        $this->_connection = new mysqli(
        $this->servername = DB_SERVER,
        $this->username = DB_USER,
        $this->password = DB_PASS,
        $this->dbname = DB_DATABASE
        // $this->connect();
    );}
    public static function getInstance() {
        if(!self::$_instance) { 
            // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
       
    
    // Error handling
    if(mysqli_connect_error()) {
        trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
             E_USER_ERROR);
    }
}
// Magic method clone is empty to prevent duplication of connection
private function __clone() { }
// Get mysqli connection
public function getConnection() {
    return $this->_connection;
}
}
/*
    public function connect(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function getConn(){
        return $this->conn;
    }

    function query($sql){
        if (!empty($sql)){
                $this->sql = $sql;
                $this->result = $this->conn->query($sql);

                return $this->result;
        }else{
                return false;
        }
}

    function fetchRow($result=""){
            if (empty($result)){ $result = $this->result; }
            return $result->fetch_assoc();
    }

    function __destruct(){
        $this->conn->close();
    }

}

*/

?>
