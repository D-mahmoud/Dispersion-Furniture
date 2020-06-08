<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class Order  extends Model {
    private $ID;//dah primary key total el f table orders
    private $product_name;
    private $total;
    private $productid;//dah el gowa el orders table foreign key
    private $userid;//gowa orders table foreign key 
    private $quantity;
    private $fname;
    private $lname;//product table primary key
    private $email;
    private $number;
    private $address;
   private $payment;
   
   

  function __construct($ID,$product_name="",$total="",$productid="",$userid="",$quantity="",$fname="",$lname="",$number="",$email="",$address="",$payment="") {
    $this->ID = $ID;

    if(""===$quantity){
      $this->readOrder($ID);
    }else{
      $this->userid = $userid;    
      $this->productid = $productid;
      $this->quantity = $quantity;
      $this->fname = $fname;
      $this->total = $total;
      $this->product_name = $product_name;
      $this->lname = $lname;
      $this->number = $number;
      $this->email = $email;
      $this->address = $address;
      $this->payment = $payment;

      
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
  
  function getfname() {
    return $this->fname;
  }
  function setfname($fname) {
    return $this->fname = $fname;
  }

  function getTotal() {
    return $this->total;
  }
  function setTotal() {
    return $this->total = $total;
  }

  
  function setproduct_name() {
    return $this->product_name = $product_name;
  }
  function getproduct_name() {
    return $this->product_name;
  }
 
  function setlname() {
    return $this->lname = $lname;
  }
  function getlname() {
    return $this->lname;
  }
 
  function getNum() {
    return $this->number;
  }
 
  function setNum($number) {
    return $this->number = $number;
  } 
 
   function getEmail() {
    return $this->email;
  }
  function setEmail($email) {
    return $this->email = $email;
  }
  
  function getAdd() {
    return $this->address;
  }
  function setAdd($address) {
    return $this->address = $address;
  }
  function getPay() {
    return $this->payment;
  }
  function setPay($payment) {
    return $this->payment = $payment;
  }
  
  
  function getID() {
    return $this->ID;
  }
  
  function readRequests($ID){
    $dbh = DBh::getInstance();
    $mysqli = $dbh->getConnection(); 
    $sql = "SELECT * FROM product JOIN orders  ON product.id = orders.product_id
    JOIN user P ON P.ID =orders.user_id  ";

		$result =	$mysqli->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->$product_name = $row["name"];
        $this->total = $row["total"];
        $this->productid = $row["product_id"];
        $this->userid = $row["user_id"];
        $this->quantity = $row["quantity"];
        $this->fname=$row["fname"];
        $this->lname=$row["lname"];
        $this->email = $row["email"];
        $this->number = $row["number"];
        $this->address = $row["address"];
        $this->payment = $row["payment"];

    }
    else {
      $this->product_name="";
      $this->$total="";
        $this->$productid="";
        $this->$userid="";
        $this-> $quantity="";
        $this->$fname="";
        $this->lname="";
        $this->$number="";
        $this-> $email="";
        $this->$address="";
        $this->$payment="";


    }
  }


  
	 
}