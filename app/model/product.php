<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class product extends Model {
    private $id;
    private $code;
    private $name;
    private $cost;
    private $picture;
    private $type;
    private $key;
   

  function __construct($id,$name="",$type="",$code="",$cost="",$picture="") {
    $this->id = $id;
	    $this->db = $this->connect();

    if(""===$name){
      $this->readProduct($id);
    }else{
      $this->name = $name;
      $this->code = $code;
      $this->cost = $cost;
      $this->type=$type;
      $this->picture = $picture;
      
    }
  }

  function getName() {
    return $this->name;
  }
 
  function setName($name) {
    return $this->name = $name;
  } 
 
   function getCode() {
    return $this->code;
  }
  function setCode($code) {
    return $this->code = $code;
  }
  
  function getCost() {
    return $this->cost;
  }
  function setCost($cost) {
    return $this->cost = $cost;
  }
  function getType() {
    return $this->type;
  }
  function setType($type) {
    return $this->type = $type;
  }
  
  function getpicture() {
    return $this->picture;
  }

  function setpicture($picture) {
    return $this->picture = $picture;
  }
  function getID() {
    return $this->id;
  }

  function details($id)
{
    $sql = "SELECT * FROM product where id='$id'";
  
    
}

  function readProduct($id){
    $sql = "SELECT * FROM product where id=$id";
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->code = $row["code"];
        $this->name = $row["name"];
        $this->cost = $row["cost"];
        $this->type=$row["type"];
        $this->picture = '<img src= "../img/product/"'.$row["picture"].'>';
        
    }
    else {
        $this->$name="";
        $this-> $code="";
        $this->$cost="";
        $this->$picture="";
        $this->type="";
   

    }
  }


  


  
 
	 
}