<?php

class CategoryController extends AbstractController
{
    public $results;
    public $mnb;
    public function index(){
        if(Category::showAllCategory() !== false) 
        {
            $this->results = Category::showAllCategory();
            $this->template->category=$this->results; 
        }
             $this->rend();   
    }
    
        public function sub(){
            $this->controller="sub";
        if(Category::showAllSub() !== false) 
        {
            $this->results = Category::showAllSub();
            $this->template->subs=$this->results; 
        }
          if(Category::selectCategoryById($id) !== false) 
        {
            $this->results = Category::selectCategoryById($id);
            $this->template->cursub=$this->results; 
        }
          if(Category::showAllCategory() !== false) 
        {
            $this->results = Category::showAllCategory();
            $this->template->category=$this->results; 
        }
             $this->rend();   
    }
    
    
        public function updatesub(){
            $this->controller="updatesub";
            $id= $_GET['id'];
            
        if(Category::slectParent($id) !== false) 
        {
            $this->results = Category::slectParent($id);
            $this->template->parent=$this->results; 
        }
         if(Category::selectCategoryById($id) !== false) 
        {
            $this->results = Category::selectCategoryById($id);
            $this->template->cursub=$this->results; 
        }
          if(Category::showAllCategory() !== false) 
        {
            $this->results = Category::showAllCategory();
            $this->template->category=$this->results; 
        }
             $this->rend();   
    }
        public function subadd(){
          
            if (isset($_POST['Add']))
            {
                  $sub = new Category();
            $sub->cat_name       = $_POST['sub'];
            $sub->parent_cat_id=$_POST['cat'];
            $sub->add(); 
            header("location:" . HOST_NAME . 'admin/category/sub');   
            }else    if (isset($_POST['update']))
            {
                  $sub = new Category();
            $sub->cat_id       = $_POST['sub_id'];
            $sub->cat_name       = $_POST['sub'];
            $sub->parent_cat_id=$_POST['cat'];
            $sub->updateSub($sub->cat_id);
            header("location:" . HOST_NAME . 'admin/category/sub');   
            }else
            {
                  $this->controller="addsub";
        if(Category::showAllCategory() !== false) 
        {
            $this->results = Category::showAllCategory();
            $this->template->category=$this->results; 
        }
        }
             $this->rend();   
    }
    
    public function add(){
        if (isset($_POST['Add']))
        {
            $cat = new Category();
            $cat->cat_name       = $_POST['name'];
            $cat->cat_desc       = $_POST['description'];
              $cat->modifiy_date   = $this->day();
            if($cat->add()!==false)
            {
                $last_id =$cat->add();
                $cat->cat_id=$last_id;
                 $sub_cat_name   = ($_POST['category']);
            foreach ($sub_cat_name as $value) 
                {
                
                $parent_cat_id=$last_id;
                $modifiy_date=$this->day();
                $cat->addSub($value,$modifiy_date,$parent_cat_id);
                }
                $id=$last_id-1;
                $cat->del($id);
            }
           
                
                
         header("location:" . HOST_NAME . 'admin/category/index');
            
            
        }else  if (isset($_POST['update']))
        {
            $cat = new Category();
            $cat->cat_name       = $_POST['name'];
            $cat->cat_desc       = $_POST['description'];
            $cat_id=$_POST['cat_id'];
            
              $cat->modifiy_date   = $this->day();
            $cat->update_cat($cat->cat_id);
              
                $parent = $cat_id;
                 $sub_cat_name   = ($_POST['category']);
              $i=0;
            foreach ($sub_cat_name as $value) 
                {
                @$sub_id = $_POST['sub'.$i];
                $modifiy_date=$this->day();
                if(isset($sub_id))
                {
                    
                $cat->update_sub($value,$sub_id,$parent,$modifiy_date);
                }else
                {
                   
                    $cat->addSub($value,$modifiy_date,$parent);
                }
                $i++;
                }
              
            
           
                
                
        header("location:" . HOST_NAME . 'admin/category/index');
            
            
        }else{
        $this->controller="addcategory";
        $this->results = Category::showAllCategory();
        $this->template->category=$this->results; 
        $this->rend(); 
        }
        }
      public function delete()
        {
        Category::delete_cat($_GET['id']);
        }
        
      public function update(){
        $this->controller="productupdate";
        echo $_GET['id'];
       $this->rend(); 
        }
        
         public function getSubCategory(){
       if(Category::showAllSubCategory($_GET['id']))
       {
       $this->results = Category::showAllSubCategory($_GET['id']);
       $this->template->subcategory=$this->results;
         foreach( $this->results as $sub){
	   	echo'<option  id="subcat" value="'.$sub->cat_id.'">'.$sub->cat_name.'</option>';
		 }
         }else
         {
       echo'<option  id="subcat" value="-1">No Sub Category </option>';
         }			  
        }
   
}