<?php

class OrderController extends AbstractController
{
     public function index()
        {
            $this->controller="orderview";
            if(Cart::showAllOrders() !== false) 
            {
                $this->results = Cart::showAllOrders();
                $this->template->orders=$this->results; 
                $this->results = Category::showAllCategory();
                $this->template->category=$this->results; 
            }
            $this->rend();
        }
        
        
        
        
        
            
    
}
?>