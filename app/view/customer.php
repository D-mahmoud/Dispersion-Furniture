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
    foreach($this->model->getOrders() as $cust)
    {  if ($cust->getuserid()==$_SESSION['ID'])
        {
        if ( $cust->getstatus()=="approved"){
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
            '<td> ' . "<h6>". $cust->getstatus() ."<h6>"."</td> ".
    
          '</tr>';
               
         }
         
    }
}
    return $str;

}


}
?>
