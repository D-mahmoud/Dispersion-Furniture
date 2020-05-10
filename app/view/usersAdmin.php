<?php
require_once(__ROOT__ . "view/View.php");
class usersAdmin extends View{
    public function output()
    {
	
        $str="";
        $i=2;
      foreach($this->model->getUsers() as $user){
              $str= $str . '<div class="row-sm-6 ">';
            $str .='
            <form  action="showUsersAdmin.php?action=delete" method="post">
            <button type="button" class="btn_2"  >'.$user->getFName().'</button>
			<button type="button"  >'.$user->getLName().'</button>
			<button type="button"  >'.$user->getUsername().'</button>
			<button type="button"  >'.$user->getAddress().'</button>
			<button type="button"  >'.$user->getEmail().'</button>
            <input type="hidden" name="id"  value='.$user->getID().'>
			<button type="submit"  > Delete</button>

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