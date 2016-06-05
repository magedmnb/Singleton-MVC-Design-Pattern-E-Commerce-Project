<?php

class Template
{
    public c ;
    private $css =array(
                    'animate.css','bootstrap.min.css','font-awesome.min.css',
                    'main (2).css','prettyPhoto.css','main.css','price-range.css',
                    'responsive.css'
                   );
                   
    protected $templates = array('header.tpl','content.tpl' , 'footer.tpl');
                   
   private $js =array(
                      'jquery.js','bootstrap.min.js','jquery.scrollUp.min.js','price-range.js','jquery.prettyPhoto.js',
                      'main.js'
                   );
                   
                   
  
                   
    public function render() {
        echo '<!DOCTYPE html><html><head><html lang="en">';
        $this->setTitle('sdd');
        $this->setCss();
        
        echo '</head><body>';
        $this->setTemplates();
        $this->setJs();
        echo '</body></html>';
        
    }
    
      private function setTemplates() {
        foreach ($this->templates as $template) {
            if (file_exists(TEMPLATES_PATH . $template)) {
                require_once TEMPLATES_PATH . $template;
              }
         }
    }
                                   
    public function setJs() {
        foreach($this->js as $js){ 
            if (file_exists(JS_PATH . $js)) {
            echo  '<script type="text/javascript" src="'.JS_DIR.$js.'"></script>';
            }
        }
    }
                   
    public function setCss(){
        foreach($this->css as $css){
            if (file_exists(CSS_PATH . $css)) {
            echo '<link href="'.CSS_DIR.$css.'" rel="stylesheet">';
            }
        }
       
        
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

   /**
 *  public function renderView(){//function call which view
 *         
 *             $view=(isset($_GET['view'])) ? $_GET['view']: 'default' ;
 *             require_once VIEWS_PATH.DS.'interface'.DS.$view.'.view.php';
 *         
 *     }
 */


}



?>