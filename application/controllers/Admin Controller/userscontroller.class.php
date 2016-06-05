<?php

class UsersController extends AbstractController
{
    public $results;
    public $mnb;
    public function index(){
   
  
        if(Users::showAllUsers() !== false) {
            $this->results = Users::showAllUsers();
            $this->template->users=$this->results; 
        }
       $this->rend();   
    }
    
      public function register(){
        if($_POST['password']!=$_POST['confirm'])
        {
             header("location:" . HOST_NAME .'index/register?msg=password not Match'); 
           
        }else if(!is_numeric($_POST['credit']))
        {
            header("location:" . HOST_NAME .'index/register?credit=Must be number'); 
            
        }else
        {
            $user = new Users();
            $user->user_name = $_POST['name'];
             $user->user_password = $_POST['password'];
              $confirm_password = $_POST['confirm'];
               $user->user_mail = $_POST['mail'];
                $user->user_birthday = $_POST['date'];
                 $user->user_job = $_POST['job'];
                 $user->user_img   = ($_FILES['file']['name']);
                  $user->user_credit = $_POST['credit'];
                  $user->user_interests=$_POST['interests'];
                   $user->user_address= $_POST['address'];
                   $user->modifiy_date=$this->day();
                   
                    if(Users::getMail($user->user_mail) != true) {
                        header("location:" . HOST_NAME .'index/register?msgg=E-mail already exist'); 
            
           
        }else
        {
                     if(isset($_FILES["file"]["tmp_name"]) !='')
                     {
	                       $image_name = $_FILES["file"]["name"];
	                       $image_path = $_FILES["file"]["tmp_name"];
                           $image_type = $_FILES["file"]["type"];
                           $image_folder="users";
                           DatabaseLib::upload_image($image_name, $image_type, $image_path,$image_folder);
                     }
                  if($user->addNewUser() == true )
                    {
                        header("location:" . HOST_NAME .'users/registersucces');   
                    }
                    }
                    }
      
      
    }
    
    
    
      public function registersucces(){
    
        $this->controller="registersucces";
       $this->rend();   
    }
      public function admin(){
        if(Users::showAllAdminUsers() !== false) {
            $this->results = Users::showAllAdminUsers();
            $this->template->users=$this->results; 
        }
        $this->controller="adminview";
       $this->rend();   
    }
    
         public function addadmin(){
            if(isset($_POST['Add']))
            {
                $name =$_POST['name'];
                $pass =$_POST['pass'];
                $mail = $_POST['email'];
                Users::addAdmin($name,$pass,$mail);
                  if(Users::showAllAdminUsers() !== false) {
            $this->results = Users::showAllAdminUsers();
            $this->template->users=$this->results; 
            header("location:" . HOST_NAME .'admin/users/addadmin');
        }
                
            }else{
        if(Users::showAllAdminUsers() !== false) {
            $this->results = Users::showAllAdminUsers();
            $this->template->users=$this->results; 
        }
        $this->controller="addadmin";
       $this->rend();   
    }
    }
    
    public function add(){
        if (isset($_POST['ADD']))
        {
            Product::add();
            echo $_POST['name'];
            echo $_POST['list-select'];
            echo $_POST['list-target'];
            echo $_POST['price'];
            echo $_POST['quantity'];
            echo $_POST['describtion'];
            echo($_FILES['file']['name']);
            
        }else{
        $this->controller="addproduct";
        $this->results = Category::showAllCategory();
        $this->template->category=$this->results; 
        $this->rend(); 
        }
        }
      public function delete(){
        Users::delete_user($_GET['id']);
        }
        
      public function update(){
        $this->controller="productupdate";
        echo $_GET['id'];
       $this->rend(); 
        }
        
        public function updateprofile(){
            $id =$_SESSION['user_id'];
            
        $user = new Users();
            $user->user_name = $_POST['name'];
               $user->user_mail = $_POST['mail'];
                $user->user_birthday = $_POST['date'];
                 $user->user_job = $_POST['job'];
                  $user->user_credit = $_POST['credit'];
                  $user->user_interests=$_POST['interests'];
                   $user->user_address= $_POST['address'];
                   $user->modifiy_date=$this->day();
                   if(Users::getCurMail($user->user_mail,$_POST['name']) == true) {
                        header("location:" . HOST_NAME .'users/editaccount?mail='); 
            
           
        }else{
                   $user->updateUser($id);
                    header("location:" . HOST_NAME .'users/editaccount?succes="Done "');
        }
        }
        
        
        public function changepass(){
        $user_id=$_SESSION['user_id'];
        $old_pass=$_POST['old_password'];
        $new_pass=$_POST['new_password'];
       $confirm_pass=$_POST['confirm_new'];   
        if($new_pass==$confirm_pass)
        {
            if(Users::changePass($user_id,$old_pass) !== false) {
        
        
        if(Users::updatePass($user_id,$new_pass) !== false) {
            header("location:" . HOST_NAME .'index/changepass?msg="Password Change Succsesfully"');
            }
            
        } else
        {
             header("location:" . HOST_NAME .'index/changepass?error="Password  not Valid "');
        }
            
        }else {
                header("location:" . HOST_NAME .'index/changepass?error="Password Not Match "');
            }
          
            
    
        }
        
        public function editaccount(){
             $id=$_SESSION['user_id'];
            if(isset($_GET['succes']))
            {
               
                echo '<span style="position: absolute;margin-left:600px;margin-top:180px;color:red;">Done</span>';
                $this->controller="editaccount";
                  if(Users::showUser($id) !== false)
             {
                $this->results = Users::showUser($id);
                $this->template->user=$this->results; 
            }
            }else   if(isset($_GET['mail']))
            {
               
                echo '<span style="position: absolute;margin-left:600px;margin-top:180px;color:red;">E-mail already exist</span>';
                $this->controller="editaccount";
                  if(Users::showUser($id) !== false)
             {
                $this->results = Users::showUser($id);
                $this->template->user=$this->results; 
            }
            }else{
        $this->controller="editaccount";
             if(Users::showUser($id) !== false)
             {
                $this->results = Users::showUser($id);
                $this->template->user=$this->results; 
            }
    }
       $this->rend(); 
       
        }
         public function getSubCategory(){
       if(Category::showAllSubCategory($_GET['id']))
       {
       $this->results = Category::showAllSubCategory($_GET['id']);
       $this->template->subcategory=$this->results;
         foreach( $this->results as $sub){
	   	echo'<option  id="cat_id" value="'.$sub->cat_id.'">'.$sub->cat_name.'</option>';
		 }
         }else
         {
       echo'<option  id="cat_id" value="'.$sub->cat_id.'">No Sub Category </option>';
         }			  
        }
   
}