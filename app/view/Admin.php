<?php
require_once(__ROOT__ . "view/View.php");
class Admin extends View{

public function output()
   {$str="";
    $str= $str . ' <div class="load_more_btn text-center">
    <a href="signup.php?action=insert" class="btn_3">Add New Account</a>
    </div>';
    return $str;
   }
public function view_admin() 
{
    $str="";
    foreach($this->model->getUsers() as $admin)
    {
        if ($admin->getRole()=="admin")
        {
        $str= $str . '<tr>
      '.
        '<td> ' . $admin->getID() . " </td> ".
        '<td> ' . $admin->getFname() . " ".$admin->getLname(). " </td> ".
        '<td> ' . $admin->getEmail() . " </td> ".
        '<td> ' . $admin->getNumber() . " </td> ".
    
        '</tr>';
        }
    }
    return $str;
}
public function view_employee() 
{
    $str="";
    foreach($this->model->getUsers() as $employee)
    {
        if ($employee->getRole()=="employee")
        {
        $str= $str . '<tr>'.
        '<td> ' . $employee->getID() . "</td> ".
        '<td> ' . $employee->getFname() . " ".$employee->getLname(). "</td> ".
        '<td> ' . $employee->getEmail() . "</td> ".
        '<td> ' . $employee->getNumber() . "</td> ".
       '<td></td> '.
        '</tr>';
        }
    }
    return $str;
}
	public function customer_message() 
{ $str="";
    foreach($this->model->getMessages() as $admin)
    {
	    if( $admin->getemp_id()==0){
    $str= $str . '<tr>
    '.
      '<td> ' . "   . ".$admin->getID() . " </td> ".
      '<td> ' .  $admin->getcust_id() ."</td> ".
      '<td> ' .  $admin->getdate()  . " </td> ".
      '<td> ' .$admin->getmessage(). " </td> ".
      '<td> ' .'
      <form  action="Q&A?action=ignore" method="post">
      <input type="hidden" name="id"  value='.$admin->getID().'>
     <button type="submit"  name = "ignore" class="btn_3" >Ignore</button></form>'.
     ' 
      <form  action="answer.php" method="post"  >
      <input type="hidden" name="id"  id="id" value='.$admin->getID().'>
      <input type="hidden" name="customer"  id="customer" value='.$admin->getcust_id().'>
      <button type="submit" class="btn_3" name="submit">Answer</button>
      </form>'." </td> ".

      '</tr>';
      }
    }
      return $str;
}
public function show ($id){
    foreach($this->model->getMessages() as $admin)
{
    if ($admin->getID()==$id){
    $str=  $admin->getmessage();
    }
}
return $str;

}
	
public function reply($id,$customer){
    $str="";
   foreach($this->model->getMessages() as $admin)
    {
        if( $admin->getreply_on()==$id){
           
        $str= $str . '<tr>
        '.
          '<td> ' . ". ".$admin->getID() . " </td> ".
          '<td> ' .  $admin->getdate()  . " </td> ".
          '<td> ' .$admin->getmessage(). " </td> ".
          '<td> ' ."Employer:".$admin->getemp_id(). " </td> ".


          '</tr>';
          
    }
}
      return $str;

}
	
public function write($x,$id)
   {
$str= " <form  action='Q&A?action=send_mess' method='post'>
    <div class='mt-10'>
    <textarea class='single-textarea' name ='message' placeholder='Write here' onfocus='this.placeholder = '''
    onblur='this.placeholder = 'Message'' required></textarea>
    </div> 
    <input type='hidden' name='x' id='x' value=$x>
    <input type='hidden' name='id' id='id' value=$id>
    <button type='submit' class='btn_3' >Send Reply</button>  
    </form> ";
return $str;
   }
	
public function signup(){
    $str='<form action="employees.php?action=insert" method="post">
    <div class="col-md-12 form-group p_star">
                    
   
           <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="fname" name="fname" value=""
                                    placeholder="First Name">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="lname" name="lname" value=""
                                    placeholder="Last Name" required="required">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="username" name="username" value=""
                                required="required" placeholder="UserName">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" value=""
                                required="required"  placeholder="Email" onKeyup=checkemail()>
                                <div id="emailmsg"></div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number" value=""
                                required="required"  placeholder="Phone Number">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add" name="add" value=""
                                required="required" placeholder="Address">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                required="required" placeholder="Password">
                            </div>
                           <div class="col-md-12 form-group p_star">      
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" value=""
                            required="required" placeholder="Confirm your Password">
                             </div>
                             <div class="col-md-12 form-group p_star">      
                             <input type="text" class="form-control" id="role" name="role" value=""
                             required="required" placeholder=" Enter admin/employee">
                              </div>
                            <div class="col-md-12 form-group">
                                
                            <input type="submit" /></div>
                                </form>';
return $str;

}

}
?>
