<?php

class Cart
{
    public $order_id;
    public $user_id;
    public $transaction_id;
    public $total_price;
    public $total_quantity;
    public $product_id;
    public $order_date;
    public  $product_quantity;
       public  $product_price;
  

    
    public static $tableName = 'order';
    
    public static $columns = array(
            'user_id',
            'order_date'
    );
    
    private function prepareAttributeList()
    {
        $str = array();
        foreach (self::$columns as $column) {
           {             
             $str[] = $column . "='" . $this->$column . "'";
        }
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
        $sql ="INSERT INTO `order`( `user_id`,`transaction_id`, `order_date`, `total_price`, `total_quantity`)
                             VALUES('".$this->user_id."','".$this->transaction_id."','".$this->order_date."','".$this->total_price."','".$this->total_quantity."')";
        if($db->exec($sql) > 0);
        {
            return $this->order_id=$db->lastInsertId(); 
        }
        return false ;
        
    }
    
       public function addOrder()
    {
        global $db;
        $sql ="INSERT INTO `product_order`(`order_id`, `product_id`, `product_quantity`, `product_price`)
                VALUES ('".$this->order_id."','".$this->product_id."','".$this->product_quantity."','".$this->product_price."')";
        if($db->exec($sql) > 0);
        {
            return true; 
        }
        return false ;
        
    }
    
    
       public static function selectOrder($id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM product_order where order_id='$id'");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Cart');
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
    
    
    public static function showAllOrdersById($user_id)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM `order` where user_id='".$user_id."' order by `order_id` DESC ");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Cart');
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
    public static function showAllOrders()
    {
        global $db;
        $query = $db->prepare("SELECT * FROM `order` order by `order_id` DESC ");
				
		try{
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Cart');
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
}