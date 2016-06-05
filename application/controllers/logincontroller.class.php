<?php

class loginController extends AbstractController
{
    public $result ;
    public function index(){
        $this->rend();
    }
    
    public function add(){
          if(isset($_POST['submit'])) {
             $name=$_POST['name'];
             $mail=$_POST['mail'];
             $user = new User();
             $user->user_name=$name;
             $user->user_mail=$mail;
          
          if($user->checkLogin()) {
            $login_id=$user->checkLogin();
            $this->result=$user->getImage($login_id);
          	$_SESSION['user_id'] = $login_id;
            $_SESSION['img']=$this->result;
            $_SESSION['user_name']=$user->user_name;
            header("location:" . HOST_NAME . 'index');
           
     
          }
        }
         $this->rend(); 
    }
    
        public function logout() {
        unset($_SESSION['cart']);
        unset($_SESSION['user_id']);
        session_destroy();
        header("location:" . HOST_NAME . 'index');
    }
}
?>