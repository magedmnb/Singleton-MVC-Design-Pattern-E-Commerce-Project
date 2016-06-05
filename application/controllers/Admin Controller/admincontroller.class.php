<?php

class AdminController extends AbstractController
{
    public $results;
    public function index()
    {
        $this->rend();
    }
    
    public function login()
    {
         if(isset($_POST['login'])){
            $loginuser = new Users();
            $loginuser->user_name     = $_POST['username'] ;
            $loginuser->user_password = $_POST['password'] ;
             if($loginuser->checkAdminLogin()!== false) { 
                    $login_id=$loginuser->checkAdminLogin();
                    $this->result=$loginuser->getImage($login_id);
          	        $_SESSION['admin_id'] = $login_id;
                    $_SESSION['img']=$this->result;
                    $_SESSION['user_name']=$loginuser->user_name;
                     header("location:" . HOST_NAME .'admin/admin/index');
                    
             }else{
                     $this->rendAdminLogin();
                     echo "<p style='color:red;padding-left:43%;margin-top:-9.5%'>Invalid Username or Password</p>"; 
                }
                        
        }else{
         $this->controller="login";
         $this->rendAdminLogin();
        }
    }
    
    
    public function logout()
     {
        unset($_SESSION['admin_id']);
        header("location:" . HOST_NAME . 'admin/admin/login');
    }
}
  
