<?php

class Product
{
    public $pro_id;
    public $cat_id; 
    public $sub_cat_id; 
    public $pro_name;
    public $pro_img;
    public $pro_desc;
   	public $pro_quantity;
   	public $pro_prc_bf_dis;
   	public $pro_prc_af_dis; 
       public $new ;
       public $sale;
       public $orderd;	
    public $unique_number; 	
    public $modifiy_date;

    
    public static $tableName = 'product';
    
    public static $columns = array(
            'pro_name',
            'pro_desc','pro_prc_bf_dis','modifiy_date',
            'cat_id','sub_cat_id','pro_img','pro_quantity','new'
    );
    
    private function prepareAttributeList()
    {
        $str = array();
        foreach (self::$columns as $column) {
             $str[] = $column . "='" .$this->$column . "'";
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
        $sql .= ' SET ' . implode(', ', self::prepareAttributeList());
        if($db->exec($sql) > 0) {
            return true;
        }
        return false;
    }
    
    
     public static function showAllSale()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and sale=1 ORDER BY pro_id DESC LIMIT 15 ");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
    
    public static function showAllAuthors()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and sale=0 and new =1 ORDER BY pro_id DESC LIMIT 15  ");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
    
    
        public static function selectProductById($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and pro_id='$id'");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
    
      public static function selectCategoryById($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM category
                               where status = 1 and cat_id='$id'");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
       public static function selectProductId($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and pro_id='$id'");
				
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
    
    
     public static function searchByCategory($what)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and sub_cat_id in (SELECT sub_cat_id FROM category where cat_name like '%" . $what .  "%')   ");
			
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
            
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
    
       public static function searchByPrice($what)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and pro_prc_bf_dis <= '" . $what .  "' ");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
            
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
    
  
    
    
        public static function showProductByCategoryId($cat_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and cat_id ='".$cat_id."'  ORDER BY pro_id ASC");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
    
    
         public static function showAllProductWithSortItem($start, $per_page,$cat_id,$sort,$sub_id,$sale,$new)
    {
        global $db;
       $query = $db->prepare("SELECT * FROM product
        where cat_id='".$cat_id."' and sale='".$sale."' and new='".$new."' and sub_cat_id='".$sub_id."' and status = 1  LIMIT $start, $per_page");
         
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
    
    
    
     public static function showAllProductWithSort($start, $per_page,$cat_id,$sort,$sub_id)
    {
        global $db;
          if($sort=="low")
                        {
                            
                            $query = $db->prepare("SELECT * FROM product
                               where cat_id='".$cat_id."' and sub_cat_id='".$sub_id."' and status = 1 and new =0 and sale =0 order by pro_prc_bf_dis ASC LIMIT $start, $per_page");
                        }
        else if($sort=="high")
        {
            $query = $db->prepare("SELECT * FROM product
                               where cat_id='".$cat_id."' and sub_cat_id='".$sub_id."' and status = 1 and new =0 and sale =0 order by pro_prc_bf_dis  DESC LIMIT $start, $per_page");
            
        } else if($sort=="A")
        {
            $query = $db->prepare("SELECT * FROM product
                               where cat_id='".$cat_id."' and sub_cat_id='".$sub_id."' and  status = 1 and new =0 and sale =0 order by pro_name  DESC LIMIT $start, $per_page");
            
        }else if($sort=="a")
        {
            $query = $db->prepare("SELECT * FROM product
                               where cat_id='".$cat_id."' and sub_cat_id='".$sub_id."' and status = 1 and new =0 and sale =0 order by pro_name  ASC LIMIT $start, $per_page");
            
        }else if($sort=="d")
        {
            $query = $db->prepare("SELECT * FROM product
                               where cat_id='".$cat_id."' and sub_cat_id='".$sub_id."' and status = 1 and new =0 and sale =0 LIMIT $start, $per_page");
            
        }
        
        
        
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
       public static function showAllProductWithLimit($start, $per_page,$cat_id,$sub_id)
    {
        global $db;

                            
                            $query = $db->prepare("SELECT * FROM product
                               where cat_id='".$cat_id."' and sale=0 and new=0 and sub_cat_id='".$sub_id."' and status = 1 order by pro_id DESC  LIMIT $start, $per_page");
         
        
        
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
    
         public static function showLimit()
    {
        global $db;

                            
                            $query = $db->prepare("SELECT * FROM product
                               where  status = 1 order by pro_id DESC  LIMIT 0,4 ");
         
        
        
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
    
      public static function showAllProductWithFilter($start, $per_page,$cat_id,$to,$from,$sub_id)
    {
        global $db;

                            
                            $query = $db->prepare("SELECT * FROM product
                               where cat_id='".$cat_id."' and sub_cat_id='".$sub_id."' and status = 1 and  `pro_prc_bf_dis` BETWEEN  '".$from."'  AND '".$to."' LIMIT $start, $per_page");
         
        
        
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
     public static function showAllProduct()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1  ORDER BY pro_id DESC ");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
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
    
  
    	    	public  function update($pro_id) {
		  
	    global $db;
		$query = $db->prepare(" UPDATE `product` SET `cat_id`='".$this->cat_id."',
        `sub_cat_id`='".$this->cat_id."',`pro_name`='".$this->pro_name."',`pro_img`='".$this->pro_img."',
        `pro_desc`='".$this->pro_desc."',
        `pro_quantity`='".$this->pro_quantity."',`pro_prc_bf_dis`='".$this->pro_prc_bf_dis."',
        `pro_prc_af_dis`='".$this->pro_prc_af_dis."',`sale`=1,
        `modifiy_date`='".$this->modifiy_date."',`status`=1 WHERE pro_id='".$pro_id."'");
	   
		  
		try
		{
			$query->execute();	 	
		}
		
		catch(PDOException $e)
		{
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