<?php
  require_once("config.php");
 
class DBh{
    private $_connection;
    private static $_instance; //The single instance
	
    private $servername;
    private $username;
    private $password;
    private $dbname;
    #trials start
    private $_count=0;
    private $_mysqli,$_query,$_results=array(); 
   #trial end
    function __construct() {
        #$this->_connection = new mysqli(
         $this->_mysqli = new mysqli(
        $this->servername = DB_SERVER,
        $this->username = DB_USER,
        $this->password = DB_PASS,
        $this->dbname = DB_DATABASE
        // $this->connect();
    );}
    public static function getInstance() {
        if(!self::$_instance) { 
            // If no instance then make one
          //  self::$_instance = new self();
          self::$_instance = new DBh();
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
    #return $this->_connection;
    return $this->_mysqli;

}
#trial start
public function query($sql){
    if($this->_query=$this->_mysqli->query($sql)){
        while($row=$this->_query->fetch_object()){
            $this->_results[] =$row;

        }
        $this->_count=$this->_query->num_rows;
    }
    return $this;
}
public function count(){
    return $this->_count;
}
public function results(){
    return $this->_results;
}
#trial end
}


?>
