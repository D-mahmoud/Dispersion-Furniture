<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class Request  extends Model {
    private $order_id;//dah primary key id el f table request
    private $cart_id;//dah el foreign key cart_id el f table request
    private $status;
    private $id;//dah id el primary el f table cart
    private $productid;//dah el gowa el cart table foreign key
    private $userid;//gowa cart table foreign key 
    private $quantity;
    private $date;
    private $product_id;//product table primary key
    private $code;
    private $name;
    private $cost;
    private $picture;
  //  private $type; 
   

  function __construct($order_id,$cart_id="",$status="",$id="",$productid="",$userid="",$quantity="",$date="",$product_id="",$name="",$code="",$cost="",$picture="") {
    $this->order_id = $order_id;

    if(""===$quantity){
      $this->readRequest($order_id);
    }else{
      $this->userid = $userid;    
      $this->productid = $productid;
      $this->quantity = $quantity;
      $this->date = $date;
      $this->id = $id;
      $this->status = $status;
      $this->cart_id = $cart_id;
      $this->product_id = $product_id;
      $this->name = $name;
      $this->code = $code;
      $this->cost = $cost;
     // $this->type=$type;
      $this->picture = $picture;
      
    }
  }
  function getuserid() {
    return $this->userid;
  }
 
  function setuserid() {
    return $this->userid = $userid;
  } 

  function getproductid() {
    return $this->productid;
  
  }
 
  function setproductid() {
    return $this->productid = $productid;

  } 
 
   function getquantity() {
    return $this->quantity;
  }
  function setquantity($quantity) {
    return $this->quantity = $quantity;
  }
  
  function getdate() {
    return $this->date;
  }
  function setdate($date) {
    return $this->date = $date;
  }

  function getid() {
    return $this->id;
  }
  function setid() {
    return $this->id = $id;
  }

  function getstatus() {
    return $this->status;
  }

  function setstatus($status) {
    return $this->status = $status;
  }
  
  function setcart_id() {
    return $this->cart_id = $cart_id;
  }
  function getcart_id() {
    return $this->cart_id;
  }
 
  function setproduct_id() {
    return $this->product_id = $product_id;
  }
  function getproduct_id() {
    return $this->product_id;
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
 /* function getType() {
    return $this->type;
  }
  function setType($type) {
    return $this->type = $type;
  }*/
  
  function getpicture() {
    return $this->picture;
  }

  function setpicture($picture) {
    return $this->picture = $picture;
  }
  
  function getorder_id() {
    return $this->order_id;
  }
  
  function readRequests($order_id){
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection(); 
    $sql = "SELECT * FROM request JOIN cart  ON request.cart_ID = cart.id
             JOIN product P ON P.id =cart.productid Where request.ID=$order_id";

		$result =	$mysqli->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->$cart_id = $row["cart_ID"];
        $this->$status = $row["status"];
        $this->id = $row["id"];
        $this->productid = $row["productid"];
        $this->userid = $row["userid"];
        $this->quantity = $row["quantity"];
        $this->date=$row["Date"];
        $this->product_id=$row["id"];
        $this->code = $row["code"];
        $this->name = $row["name"];
        $this->cost = $row["cost"];
       // $this->type=$row["type"];
        $this->picture = '<img src= "../img/product/"'.$row["picture"].'>';
        
    }
    else {
      $this->cart_id="";
      $this->status="";
      $this->$id="";
        $this->$productid="";
        $this->$userid="";
        $this-> $quantity="";
        $this->$date="";
        $this->product_id="";
        $this->$name="";
        $this-> $code="";
        $this->$cost="";
        $this->$picture="";
      //  $this->type="";
   

    }
  }


  
	 
}