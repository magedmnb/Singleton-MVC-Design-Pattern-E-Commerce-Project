<?php

class Users
{
    public $user_id;
    public $user_name;
    public $user_img;
    public $user_password;
    public $user_mail;
    public $user_birthday;
    public $user_job;
    public $user_credit;
    public $user_address;
    public $user_interests;
    public $cart;
    public $modifiy_date;
    
    public static $tableName = 'users';
    
    public static $columns = array(
            'user_name', 'user_password', 'user_img', 
            'user_birthday', 'user_job', 'user_mail', 'user_credit',
             'user_address', 'user_interests', 'cart', 'modifiy_date'
                  );
    
    private function prepareAttributeList()
    {
        $str = array();
        foreach (self::$columns as $column) {
             $str[] = $column . "='" . $this->$column . "'";
        }
        return $str;
    }
    
      public function addNewUser()
    {
        global $db;
        $sql = 'INSERT INTO ' . self::$tableName;
        $sql .= ' SET ' . implode(', ', self::prepareAttributeList());
        if($db->exec($sql) > 0) {
            return true;
        }
        return false;
    }
    
    
    
      public static function showAllUsers()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM users
                               where status = 0");		
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Users');
			if($data>0){	
				return $data  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
    
      public static function showUser($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM users
                               where status = 0 and user_id = '".$id."'");		
		try{
			
			$query->execute();
			$data 			   = $query->fetch();
			if($data>0){	
				return $data  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
    
        public static function changePass($id,$old_pass)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM users
                               where status = 0 and user_id = '".$id."' and user_password ='".$old_pass."'");		
		try{
			
			$query->execute();
			$data 			   = $query->fetch();
			if($data>0){	
				return true  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
    
       	public static function updatePass($user_id,$new_pass) 
        {	  
	       global $db;
           $query = $db->prepare("UPDATE  `users` SET  `user_password` =  '".$new_pass."'
		                               WHERE  `user_id` = '$user_id'");
	   	       try
		          {
			         $query->execute();	 	
		          }		
		      catch(PDOException $e)
		          {
                     die($e->getMessage());
		          }	
	   }
          
    
    
        public static function showAllAdminUsers()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM users
                               where status = 2");		
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Users');
			if($data>0){	
				return $data  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
    	public static function delete_user($user_id) 
        {	  
	       global $db;
           $query = $db->prepare("UPDATE  `users` SET  `status` =  '-1'
		                               WHERE  `user_id` = '$user_id'");
	   	       try
		          {
			         $query->execute();	 	
		          }		
		      catch(PDOException $e)
		          {
                     die($e->getMessage());
		          }	
	   }
       
       
       
           	public static function updateCatNow($user_id,$cart,$credit) 
        {	  
	       global $db;
           $query = $db->prepare("UPDATE  `users` SET  `cart` =  '$cart',`user_credit` =  '$credit'
		                               WHERE  `user_id` = '$user_id'");
	   	       try
		          {
			         $query->execute();	 	
		          }		
		      catch(PDOException $e)
		          {
                     die($e->getMessage());
		          }	
	   }
       
       
           	public  function updateUser($id) 
        {	  
	       global $db;
           $query = $db->prepare("UPDATE `users` SET `user_name`='".$this->user_name."',
           `user_birthday`='".$this->user_birthday."',`user_job`='".$this->user_job."',
           `user_mail`='".$this->user_mail."',`user_credit`='".$this->user_credit."',`user_address`='".$this->user_address."',
           `user_interests`='".$this->user_interests."' WHERE user_id ='".$id."'");
	   	       try
		          {
			         $query->execute();	 	
		          }		
		      catch(PDOException $e)
		          {
                     die($e->getMessage());
		          }	
	   }
       
      
       
                	public static function updateCat($user_id,$cart) 
        {	  
	       global $db;
           $query = $db->prepare("UPDATE  `users` SET  `cart` =  '$cart'
		                               WHERE  `user_id` = '$user_id'");
	   	       try
		          {
			         $query->execute();	 	
		          }		
		      catch(PDOException $e)
		          {
                     die($e->getMessage());
		          }	
	   }
       
       
       
                	public static function addAdmin($name,$pass,$mail) 
        {	  
	       global $db;
           $query = $db->prepare(" INSERT INTO `users`( `user_name`, `user_password`, `user_mail`,
          `status`) 
         VALUES ('".$name."','".$pass."','".$mail."',2)");
	   	       try
		          {
			         $query->execute();	 	
		          }		
		      catch(PDOException $e)
		          {
                     die($e->getMessage());
		          }	
	   }
       
  public function checkUserLogin()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM users
                                where user_mail =?
                                and user_password=? 
                                and status = 0 ");
   	    $query->bindValue(1, $this->user_mail);
		$query->bindValue(2, $this->user_password);
				
		try{			
			$query->execute();
			$data 			   = $query->fetchAll();
            $result            =array_shift($data);
			$this->user_id     = $result['user_id'];
            $stored_mail       =$result['user_mail'];
            $stored_password   =$result['user_password'];
			if($stored_mail === ($this->user_mail) && $stored_password === ($this->user_password))
                {	
				    return $this->user_id  ;	
                }else
                {
				    return false;	
                }
            }
       	catch(PDOException $e)
           {
                die($e->getMessage());
           }
      } 
    
    
    
    public function checkAdminLogin()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM users
                                where user_name =?
                                and user_password=? 
                                and status = 1 ");
   	    $query->bindValue(1, $this->user_name);
		$query->bindValue(2, $this->user_password);
				
		try{			
			$query->execute();
			$data 			   = $query->fetchAll();
            $result            =array_shift($data);
			$this->user_id      = $result['user_id'];
            $stored_name        =$result['user_name'];
            $stored_password    =$result['user_password'];
			if($stored_name === ($this->user_name) && $stored_password === ($this->user_password))
                {	
				    return $this->user_id  ;	
                }else
                {
				    return false;	
                }
            }
       	catch(PDOException $e)
           {
                die($e->getMessage());
           }
      }  
        
     public function getImage($id){
        global $db;
        $query = $db->prepare("SELECT * FROM users
                                where user_id =? ");
   	    $query->bindValue(1, $id);
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll();
            $result            =array_shift($data);
            $stored_img        =$result['user_img'];
			if($result>0){	
				return $stored_img  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
    
        public function getCurMail($mail,$name){
        global $db;
        $query = $db->prepare("SELECT user_mail FROM users
                                where user_mail =? and user_name != '".$name."' ");
   	    $query->bindValue(1, $mail);
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchColumn();
			if($data){	
				return true  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
       public function getMail($mail){
        global $db;
        $query = $db->prepare("SELECT user_mail FROM users
                                where user_mail =? ");
   	    $query->bindValue(1, $mail);
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchColumn();
			if($data=1){	
				return true  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
    
         public function getCart($id){
        global $db;
        $query = $db->prepare("SELECT * FROM users
                                where user_id =? ");
   	    $query->bindValue(1, $id);
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll();
            $result            =array_shift($data);
            $stored_cart       =$result['cart'];
			if($result>0){	
				return $stored_cart  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
    public static function selectUserById($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM users
                                where user_id='$id'");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetch();
			if($data>0){	
				return $data  ;	
			}
		    else{
				return false;	
			}
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
    }
    
    
    	public static function logged_in () {
		return(isset($_SESSION['admin_id'])) ? true : false;
	}

	   public static function logged_in_protect() {
		if (self::logged_in() === true) 
		{
			header("location:" . HOST_NAME .'admin/admin/index');
			exit();		
		}
		
	}
	 
	public static function logged_out_protect() {
		if (self::logged_in() === false) {
			header("location:" . HOST_NAME .'admin/admin/login');
			exit();
		}	
	}
}


?>