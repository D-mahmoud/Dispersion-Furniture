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

}
?>