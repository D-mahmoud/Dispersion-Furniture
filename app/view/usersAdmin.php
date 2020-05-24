<?php
require_once(__ROOT__ . "view/View.php");
class usersAdmin extends View{
    public function output()
    {
        $str="";
       
      foreach($this->model->getUsers() as $user){
              $str= $str . '<div class="row-lg-6  ">';
            $str .='
            <form  action="showUsersAdmin.php?action=delete" method="post">
            <button style="width:100%" type="button" name = "details" class="btn_3"   >'.$user->getFName().'</button>
			<button type="button"   >Name:   '.$user->getLName().'</button>
			<button type="button"   >Username:  '.$user->getUsername().'</button>
			<button type="button"   >Address:  '.$user->getAddress().'</button>
			<button type="button"  >Email:  '.$user->getEmail().'</button>
            <input type="hidden" name="id"  value='.$user->getID().'>
			<button style="width:50%" type="submit" name = "details" class="btn_1"  > Delete</button>

            </form><br>
			</div>
			';
			
        
        
    }
    return $str;
    }
	 public function deleteUser($id){
        $this->model->deleteUser($id);
        
        }
	}