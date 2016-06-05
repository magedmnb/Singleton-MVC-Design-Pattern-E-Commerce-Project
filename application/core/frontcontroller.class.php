<?php

class FrontController 
{
    
    const DEFAULT_CONTROLLER = 'index';
    const DEFAULT_ACTION = 'index';
    
    private $controller;
    private $action;
    private $admin;
    
    public function __construct()
    {
        $this->parseUrl();
    }
    
    public function parseUrl()
    {
        // TODO:: AVOID NOTICES HERE
        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        
            $n=explode('/', $url);
        if (count($n) > 1) {
            list($controller,$action) = $n;
            }
            list($controller) = $n;
        
        
        
        if(isset($controller) && !empty($controller)) {
            $this->controller = $controller;
         } else {
            $this->controller = self::DEFAULT_CONTROLLER;
        }
        
        
        if(isset($action) && !empty($action)) {
            $this->action = $action;
        } else {
            $this->action = self::DEFAULT_ACTION;
        }
        
        
        if($controller=="admin"){
        if(count($n)==1 && $controller=="admin")
        {
            list($controller)=$n;
            $this->controller=$controller;
            }else{
            list($admin,$controller,$action)=$n;
            $this->admin=$admin;
            $this->controller=$controller;
            $this->action=$action;
        }
        }
      }
    
    
    public function load()
    {
        $class = ucfirst(strtolower($this->controller)) . 'Controller'; //LoginController
        if(class_exists($class)) {
            $contol = new $class($this->controller,$this->admin);
            $contol->controller = $this->controller;
            $contol->action = $this->action;
            $method = strtolower($this->action) ;
            if(method_exists($contol, $method)) {
                $contol->$method();
            }
        } else {
            throw new Exception('Sorry controller ' . $class . 'does not exist');
        }
    }
}