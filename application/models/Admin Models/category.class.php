<?php

class Category
{
    public  $cat_id;
    public $cat_name;
    public $sub_cat_name;
    public $cat_desc; 
    public	$modifiy_date;
    public	$parent_cat_id;
  

    
    public static $tableName = 'category';
    
    public static $columns = array(
            'cat_id',
            'cat_name',
            'sub_cat_name',
            'cat_desc',
            'modifiy_date',
            'parent_cat_id'
    );
    
    private function prepareAttributeList()
    {
        $str = array();
        foreach (self::$columns as $column) {
             $str[] = $column . "='" . $this->$column . "'";
        }
        return $str;
    }
    
    public function showWelcome()
    {
        return 'Welcome to our store, ' . $this->name;
    }
    
    public function add()
    {
        global $db;
        $sql = 'INSERT INTO ' . self::$tableName;
        $sql .= ' SET ' . implode(', ', $this->prepareAttributeList());
        if($db->exec($sql) > 0) {
            
            return   $db->lastInsertId(); 
        }
        return false;
    }
    
      public function addSub($sub,$modifiy,$parent)
    {
        global $db;
        $sql = 'INSERT INTO `category`(`cat_name`, `modifiy_date`, `parent_cat_id`) 
        VALUES ("'.$sub.'","'.$modifiy.'","'.$parent.'")';
        if($db->exec($sql) > 0) {
            
            return  true; 
        }
        return false;
    }
    
    
        public static function selectCategoryById($cat_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM category
                               where status = 1 and cat_id ='".$cat_id."' ");
				
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
    public static function showAllCategory()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM `category`
                                 where parent_cat_id = 0 
                                 and  status = 1 ");		
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Category');
          
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
    
     public static function showAllSub()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM `category`
                                 where parent_cat_id != 0 
                                 and  status = 1 ORDER BY cat_id DESC ");		
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Category');
          
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
     public static function showAllSubCategory($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM category
                              where parent_cat_id = '".$id."'");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Category');
          
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
    
    
         public static function slectParent($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM `category` as sub inner join `category` as cat on cat.`cat_id` = sub.`parent_cat_id` 
        WHERE sub.`cat_id`='".$id."'");
				
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
  
        // Delete category 
        	public  function update_cat($cat_id) {
                global $db;
                $query = $db->prepare("  UPDATE `category` SET `cat_name`='".$this->cat_name."',
    `cat_desc`='".$this->cat_desc."',`modifiy_date`='".$this->modifiy_date."',`parent_cat_id`=0,
    `status`=1 WHERE cat_id = '".$cat_id."'"); 
		          try
		          {
		              	$query->execute();	 	
		          }
		
                  catch(PDOException $e)
                  {
		            die($e->getMessage());
	              }	
            }
            
            	public  function update_sub($value,$cat_id,$parent,$modifiy_date) {
                global $db;
                $query = $db->prepare("  UPDATE `category` SET `cat_name`='".$value
                ."',
    `modifiy_date`='".$modifiy_date."',
    `status`=1 WHERE cat_id = '".$cat_id."' and parent_cat_id ='".$parent."'"); 
		          try
		          {
		              	$query->execute();	 	
		          }
		
                  catch(PDOException $e)
                  {
		            die($e->getMessage());
	              }	
            }
          	public  function updateSub($cat_id) {
                global $db;
                $query = $db->prepare("UPDATE  `category` SET  `cat_name` =  '".$this->cat_name."',`parent_cat_id` =  '".$this->parent_cat_id."'
		                                       WHERE  `cat_id` = '$cat_id'"); 
		          try
		          {
		              	$query->execute();	 	
		          }
		
                  catch(PDOException $e)
                  {
		            die($e->getMessage());
	              }	
            }
        
    	public static function delete_cat($cat_id) {
                global $db;
                $query = $db->prepare("UPDATE  `category` SET  `status` =  '-1'
		                                       WHERE  `cat_id` = '$cat_id'"); 
		          try
		          {
		              	$query->execute();	 	
		          }
		
                  catch(PDOException $e)
                  {
		            die($e->getMessage());
	              }	
            }
            
            	public static function del($id) {
                global $db;
                $query = $db->prepare("DELETE FROM `category` WHERE cat_id ='".$id."'"); 
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