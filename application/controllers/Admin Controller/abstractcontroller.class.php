<?php

abstract class AbstractController
{
       public $controller ; 
       public $template;
       public $admin;       
        
    public function __construct($controller,$admin=0) {
        $this->controller=$controller;
        $this->admin=$admin;
        $this->template = new Template();
        $this->results = Category::showAllCategory();
            $this->template->category=$this->results;
            
              if(Product::showLimit() !== false)
             {
                $this->results = Product::showLimit();
                $this->template->prs=$this->results; 
            } 
        
        if(Message::showAllMsg() !== false) {
                $this->results = Message::showAllMsg();
                $this->template->unread_msgs_count=$this->results;
                $this->results = Message::showAllReadMsg();
                $this->template->read_msgs_count=$this->results; 
                $this->results = Message::selectAllUnreadMsg();
                $this->template->show_unread_msgs=$this->results;
            
        }else{
                $this->template->unread_msgs_count="0";
                $this->template->show_unread_msgs=NULL;
        }
       
    }
     public function day() 
	  {
	     date_default_timezone_set('Africa/Cairo');
         $day = date("Y-m-d");
		 return($day);
	  }
	  
	  public function time_now() 
	  {
	     date_default_timezone_set('Africa/Cairo');
         $time = date("H:i:s");
		 return($time);
	  }
      
    public function rend()
    {
        
         $this->template->render($this->controller,$this->admin);
    }
    
    public function rendAdminLogin()
    {
        
         $this->template->renderAdminLogin($this->controller,$this->admin);
    }
       public function rendUserLogin()
    {
        
         $this->template->renderUserLogin($this->controller,$this->admin);
    }
    
        public function rendUserRegister()
    {
        
         $this->template->renderUserRegister($this->controller,$this->admin);
    }
    
    
    public abstract function index();
}
