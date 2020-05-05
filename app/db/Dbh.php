<?php
  require_once("config.php");
  //echo dirname("config.php");

//echo $_SERVER['DOCUMENT_ROOT'];
class DBh{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    private $conn;
    private $result;
    public $sql;

    function __construct() {
        $this->servername = DB_SERVER;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->dbname = DB_DATABASE;
        $this->connect();
      }

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


// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
// $conn->close();
?>