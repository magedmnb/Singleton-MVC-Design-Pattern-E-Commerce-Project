<?php

class Message
{ 
    public $msg_id;
    public $from_name; 
    public $message_subject;
    public $message;
    public $from_email;
   	public $sending_date;
   	public $seen_date;


    
    public static $tableName = 'messages';
    
    public static $columns = array(
            'from_name',
            'message_subject',
            'message',
            'from_email','sending_date'
    );
    
    private static function prepareAttributeList()
    {
        $str = array();
        foreach (self::$columns as $column) {
             $str[] = $column . "='" . $column . "'";
        }
        return $str;
        
    }
    
     	public  function addmsg() {
		  
	    global $db;
		$query = $db->prepare("INSERT INTO `messages`( `from_name`, `message_subject`, `message`, `from_email`,
         `sending_date`)
         VALUES ('".$this->from_name."','".$this->message_subject."','".$this->message."','".$this->from_email."'
         ,'".$this->sending_date."')");
	   
		  
		try
		{
			$query->execute();	 	
		}
		
		catch(PDOException $e)
		{
			die($e->getMessage());
		}	
	}
    public function showWelcome()
    {
        return 'Welcome to our store, ' . $this->name;
    }
    
    public static function add()
    {
        global $db;
        $sql = 'INSERT INTO ' . self::$tableName;
        $sql .= ' SET ' . implode(', ', self::prepareAttributeList());
        if($db->exec($sql) > 0) {
            return true;
        }
        return false;
    }
    
    public static function showAllMsg()
    {
        global $db;
        $query = $db->prepare("SELECT count(msg_id) FROM Messages
                               where status = 0 or status = 1");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchColumn(0);
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
    
     public static function selectAllUnreadMsg()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Messages
                               where status = 0");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Message');
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
    
     public static function showAllReadMsg()
    {
        global $db;
        $query = $db->prepare("SELECT count(msg_id) FROM Messages
                               ");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchColumn(0);
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
    	public static function delete_dep($pro_id) {
		  
	    global $db;
		$query = $db->prepare("UPDATE  `product` SET  `status` =  '-1'
		                                                   
		                                                   WHERE  `pro_id` = '$pro_id'");
	   
		  
		try
		{
			$query->execute();	 	
		}
		
		catch(PDOException $e)
		{
			die($e->getMessage());
		}	
	}
}