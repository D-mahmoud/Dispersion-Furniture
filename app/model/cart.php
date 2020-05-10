<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class Cart extends Model {
    private $id;
    private $userid;
    private $quantity;
    private $productid;
    private $productname;
    private $cost;
    private $type;

    
   

  function __construct($id,$userid="",$quantity="",$productid="",$productname="",$cost="",$type="") {
    $this->id = $id;
	    $this->db = $this->connect();

    if(""===$userid){
      $this->readCart($id);
    }else{
      $this->userid = $userid;
      $this->quantity = $quantity;
      $this->productid = $productid;
      $this->$productname = $productname;
      $this->cost = $cost;
      $this->$type = $type;
    
      
    }
  }
  function getuserid() {
    return $this->userid;
  }
 
  function setuserid($userid) {
    return $this->userid = $userid;
  } 
  function getproductname() {
    return $this->productname;
  }
 
  function setproductname($productname) {
    return $this->productname = $productname;
  } 
 
   function getquantity() {
    return $this->quantity;
  }
  function setquantity($quantity) {
    return $this->quantity = $quantity;
  }
  
  function getproductid() {
    return $this->productid;
  }
  function setproductid() {
    return $this->productid = $productid;
  }

  function getcost() {
    return $this->cost;
  }
  function setcost() {
    return $this->cost = $cost;
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

  function readCart($id){
    $dbh = DBh::getInstance();
    $sql = "SELECT * FROM cart JOIN product WHERE cart.userid = $id and cart.productid = product.id";
    
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->quantity = $row["quantity"];
        $this->productid = $row["productid"];
        $this->productname = $row["name"];
        $this->userid = $row["userid"];
        $this->cost = $row["cost"];
        $this->type=$row["type"];
        $this->picture = '<img src= "../img/product/"'.$row["picture"].'>';
        
    }
    else {
       
        $this->$quantity="";
        $this->$productid="";
        $this-> $code="";
        $this->$cost="";
        $this->$picture="";
        $this->type="";
        $this->productname="";
   

    }
  }


  
	 
}