<?php
require_once(__ROOT__ . "view/View.php");
class customer extends View{

public function output()
   {
$str= "   <form  action='mess.php?action=send' method='post'>
    <div class='mt-10'>
    <textarea class='single-textarea' name ='message' placeholder='Write here' onfocus='this.placeholder = '''
    onblur='this.placeholder = 'Message'' required></textarea>
    </div> 
    <button type='submit' class='btn_3' >Send</button>  
    </form> ";
return $str;
   }
public function message($id)
    {
        $str="";
        foreach($this->model->getMessages() as $cust)
        {   if( $cust->getcust_id()==$id){
            if( $cust->getemp_id()==0){
        $str= $str . '<tr>
        '.
          '<td> ' .$cust->getID() . " </td> ".
          '<td> ' .  $cust->getdate() ."</td> ".
          '<td> ' .  $cust->getmessage()  . " </td> ".
          '<td> ' .  "YOU"  . " </td> ".

          '</tr>';
          }
          else{
                $str= $str . '<tr>
        '.
          '<td> ' .$cust->getID() . " </td> ".
          '<td> ' .  $cust->getdate() ."</td> ".
          '<td> ' .  $cust->getmessage()  . " </td> ".
          '<td> ' .  "Employee"  . " </td> ".

          '</tr>';
          }
        }
    }
          return $str;
    
    }
 

public function order_status()
{
    $str="";
    foreach($this->model->getRequests() as $cust)
    {  if ($cust->getuserid()==$_SESSION['ID'])
        {
        if ( $cust->getstatus()=="approve"){
        $str= $str . '<tr>'.
        '<td> ' .".". $cust->getorder_id() . "</td> ".
        '<td> ' . $cust->getproductid()  ."</td> ".
        '<td> ' . $cust->getName() . "</td> ".
        '<td> ' . $cust->getquantity() . "</td> ".
        '<td> ' . $cust->getDate() . "</td> ".
        '<td> ' . $cust->getstatus() . "</td> ".
        '<td> ' . $cust->getCost() * $cust->getquantity(). "</td> ".
        '<td> ' .' <form  action="status?action=confirm" method="post">
        <input type="radio" id="confrim" name="check" value="confirm">
        <label for="confirm"><h6>confirm</h6></label>
        <input type="radio" id="cancel" name="check" value="cancel">
        <label for="cancel"><h6>cancel</h6></label>

        <input type="hidden" name="id"  value='.$cust->getorder_id().'>
        <input type="hidden" name="product_id"  value='.$cust->getproductid().'>
        <input type="hidden" name="user_id"  value='.$cust->getuserid().'>
        <input type="hidden" name="quantity"  value='.$cust->getquantity().'>
        <input type="hidden" name="total"  value='. $cust->getCost() * $cust->getquantity().'>

        <input type="submit" value="Submit">
        </form>'.
        
      " </td> ".
      '</tr>'; 
         }
         else{
            $str= $str . '<tr>'.
            '<td> ' .".". $cust->getorder_id() . "</td> ".
            '<td> ' . $cust->getproductid()  ."</td> ".
            '<td> ' . $cust->getName() . "</td> ".
            '<td> ' . $cust->getquantity() . "</td> ".
            '<td> ' . $cust->getDate() . "</td> ".
            '<td> ' . $cust->getstatus() . "</td> ".
            '<td> ' .  $cust->getCost() * $cust->getquantity()  ."</td> ".
            '<td> ' . "<h6>". $cust->getstatus(). "</h6>" ."</td> ".
    
          '</tr>';
               
         }
         
    }
}
    return $str;

}
public function billing()
{          
       $str=" <h5> ". "Dear "."". $_SESSION['username'].",<h5> "." ". "You do not have any confrimed Orders "."</h5>";

    foreach($this->model->getOrders() as $cust)
    {  if ($cust->getuserid()==$_SESSION['ID'])
        {
            $str= " <div class='col-md-6 form-group p_star'>
        <h5>" ."First Name <br>".  $cust->getfname()."</h5>
        </div>
        <div class='col-md-6 form-group p_star'>
         <h5> "."Last Name <br>".   $cust->getlname()."</h5>
         </div>
         <div class='col-md-12 form-group'>
        <h5> "."Address <br>".  $cust->getAdd()."</h5>
         </div>
         <div class='col-md-12 form-group p_star'>
         <h5> ". "Mobile <br>". $cust->getNum()."</h5>
         </div>
         <div class='col-md-12 form-group p_star'>
         <h5> ". "Email <br>". $cust->getEmail()."</h5>
         </div>";
        }
        
    }
    return $str;

}
public function product()
{ $str="";
    foreach($this->model->getOrders() as $cust)
    {  if ($cust->getuserid()==$_SESSION['ID'] &&  $cust->getpay()!="")
        {
            $str= $str . '<tr>'.
            
             ' <th>'.$cust->getproduct_name().'</th>'
             .'<td> &nbsp;' .'x'. $cust->getquantity().'</td>'
             .'<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $cust->getTotal().'</td>'
             .'</tr>';
        } 
    }
    return $str;
}

public function subtotal(){
    $subt=0;
    foreach($this->model->getOrders() as $cust)
    { 
         if ($cust->getuserid()==$_SESSION['ID'] &&  $cust->getPay()!="")
        {
            $subt=$cust->getTotal()+$subt;
            
        }
    }
    return $subt;
}

public function product_checkout()
{ $str="";
    foreach($this->model->getOrders() as $cust)
    {  if ($cust->getuserid()==$_SESSION['ID'] &&  $cust->getpay()=="")
        {
            $str= $str . '<tr>'.
            
             ' <th>'.$cust->getproduct_name().'</th>'
             .'<td> &nbsp;' .'x'. $cust->getquantity().'</td>'
             .'<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $cust->getTotal().'</td>'
             .'</tr>';
        } 
    }
    return $str;
}


public function subtotal_checkout(){
    $subt=0;
    foreach($this->model->getOrders() as $cust)
    { 
         if ($cust->getuserid()==$_SESSION['ID'] && $cust->getpay()=="")
        {
            $subt=$cust->getTotal()+$subt;
        }
    }
    return $subt;
}

public function payment()
{ 
    foreach($this->model->getOrders() as $cust)
    {  
        if ($cust->getuserid()==$_SESSION['ID']  && $cust->getpay()=="")
    {
        $str='<form  action=pay.php  method="post">
        <input type="hidden" name="id"  value='.$cust->getID().'>
        <button type="submit" name="submit" class="btn_3" >Click to choose payment method</button>  
        </form>';
    }
    }
   
    return $str;
}

public function method($id)
{
   // foreach($this->model->getPayments() as $pay)
   // by2ra men database a5r entry bas mesh 3arfa leah 

       $str=' <form  action=checkout.php?action=pay  method="post">
        <input type="radio" id="premises" name="check" value="premises">
        <label for="premises"><h6>ON premises</h6></label><br>
        <input type="radio" id="delivery" name="check" value="delivery">
        <label for="delivery"><h6>On Delivery</h6></label><br>
        <input type="submit" name="payy" value="Submit">
        <input type="hidden" name="id" id="id" value='.$id.'>
        </form>';
return $str;
}   
}

?>
