<?php

class Template
{
  
    public $var=array();
    public $view_name ;
    public $view_admin;
    public $admin_view_name;
        
    private $css =  array(
                    'animate.css','bootstrap.min.css','font-awesome.min.css',
                    'main (2).css','prettyPhoto.css','main.css','price-range.css',
                    'responsive.css'
                   );
                   
    protected $templates = array(
                    'header.tpl','sidebar.tpl',
                    'content.tpl' , 'footer.tpl'
                    );
    protected $another_templates = array(
                    'header.tpl',
                    'content.tpl' , 'footer.tpl'
                    );
                   
   private $js =array(
                      'jquery.js','bootstrap.min.js',
                      'jquery.scrollUp.min.js','price-range.js',
                      'jquery.prettyPhoto.js','main.js'
                    );
                   
                   
  
                   
  public function render($view,$admin)
        {
            $this->view_name=$view;
            $this->view_admin=$admin;
            if( $view=="admin" ||$admin=="admin")
                {
                    $this->setTemplates();
            
                }else
                {     
                    echo '<!DOCTYPE html><html><head><html lang="en">';
                    $this->setTitle('Mansoura Shop');
                    $this->setCss();
                    echo '</head><body>';
                    $this->setTemplates();
                    $this->setJs();
                    echo '</body></html>';
                }
        
          }
    
    public function renderAdminLogin($view,$admin)
         {
            include VIEWS_PATH.DS.'Admin'.DS.'login.view.php' ;
         }
   
    public function renderUserLogin($view,$admin) 
        {
            include VIEWS_PATH.DS.'Interface'.DS.'login.view.php' ;
        }
        
 
    
   private function setTemplates() 
        {
            if($this->view_name=="admin" || $this->view_admin=="admin")
                {
                    foreach ($this->templates as $template) 
                        {
                             if (file_exists(ADMIN_TEMPLATES_PATH . $template)) 
                                {
                                    foreach ($this->var as $key=>$value)
                                         {
                                              $$key=$value;
                                         }
                                    require_once ADMIN_TEMPLATES_PATH . $template;
                                }
                        }
                } else if($this->view_name!="index" )
                {
                    foreach ($this->another_templates as $template) 
                        {
                             if (file_exists(TEMPLATES_PATH . $template)) 
                                {
                                    foreach ($this->var as $key=>$value)
                                         {
                                              $$key=$value;
                                         }
                                    require_once TEMPLATES_PATH . $template;
                                }
                        }
                }
                else
                    {
                        foreach ($this->templates as $template) 
                             {
                                if (file_exists(TEMPLATES_PATH . $template))
                                     {
                                        foreach ($this->var as $key=>$value)
                                             {
                                                $$key=$value;
                                             }
                                    require_once TEMPLATES_PATH . $template;
                                     }
                             }
                    }
          }
                                   
    public function setJs() {
            if($this->view_name=="admin")
            {

            }else
            {
                 foreach($this->js as $js){ 
            if (file_exists(JS_PATH . $js)) {  
            echo  '<script type="text/javascript" src="'.JS_DIR.$js.'"></script>';
            }
           } 
        }
    }
                   
    public function setCss(){
             if($this->view_name=="admin")
            {

            }else
            {
                 foreach($this->css as $css){
            if (file_exists(CSS_PATH . $css)) {
            echo '<link href="'.CSS_DIR.$css.'" rel="stylesheet">';
            }
           } 
        }
       
        
    }
    
        public function __set($name, $value) {
        $this->var[$name] = $value;
        
        
    }
    

    public function __get($name) {
        return $this->var[$name];
    }
    
   
      public function addMeta($name,$content){
       echo' <meta name="'.$name.'" content="'.$content.'">  ';
      }

 
    public function setTitle($title) {
        echo '<title>'.$title.'</title>';
    }
   
      public function setWebEncoding($encoding="utf-8")
    {
        echo '<meta charset="'.$encoding.'">';
    }

       public function showRenderInContentTpl() {
        if(isset($_GET['lang']))
        {
            require 'ar.php '; 
        }else
        {
            require'en.php';
        }

         
                foreach ($this->var as $key=>$value) {
                $$key=$value;
            }
          
        if($this->view_name=="admin"){
              $this->admin_view_name="index";
            if (is_readable(VIEWS_PATH .DS.'Admin'.DS. $this->admin_view_name . '.view.php')) {
           
            include VIEWS_PATH .DS.'Admin'.DS. $this->admin_view_name . '.view.php';
        } else {
            throw new Exception("Can not find View ".$this->admin_view_name);
        }
        
        }else if ($this->view_admin=="admin"){
            
            
               if (is_readable(VIEWS_PATH .DS.'Admin'.DS. $this->view_name . '.view.php')) {
          
            include VIEWS_PATH .DS.'Admin'.DS. $this->view_name . '.view.php';
        } else {
            throw new Exception("Can not find View ".$this->admin_view_name);
        }
        }
        else{
          
        if (is_readable(VIEWS_PATH .DS.'interface'.DS. $this->view_name . '.view.php')) {
              
          
       
        
        
            include VIEWS_PATH .DS.'interface'.DS. $this->view_name . '.view.php';
        } else {
            throw new Exception("Can not find View ".$this->view_name);
        }
        }
    }
  
      
 


}



?>