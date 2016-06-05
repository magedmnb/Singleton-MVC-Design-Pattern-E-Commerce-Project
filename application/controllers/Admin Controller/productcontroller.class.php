
<?php

class ProductController extends AbstractController
{
    public $results;
    public $mnb;
    public function index()
    {
      
        if(Product::showAllProduct() !== false) 
            {
                $this->results = Product::showAllProduct();
                $this->template->product=$this->results; 
                $this->results = Category::showAllCategory();
                $this->template->category=$this->results; 
            }
       $this->rend();   
    }
    
    public function add()
        {
            
            if (isset($_POST['Add']))
            {
                $pro = new Product();
                $pro->pro_name       = $_POST['name'];
                $pro->cat_id         = $_POST['cat'];
                $pro->sub_cat_id     = $_POST['sub_cat'];
                $pro->pro_prc_bf_dis = $_POST['price'];
                $pro->pro_quantity   = $_POST['quantity'];
                $pro->pro_desc       = $_POST['description'];
                $pro->new =1;
                $pro->pro_img        = ($_FILES['file']['name']);
                $pro->modifiy_date   = $this->day();
                 if(isset($_FILES["file"]["tmp_name"]) !='')
                     {
	                       $image_name = $_FILES["file"]["name"];
	                       $image_path = $_FILES["file"]["tmp_name"];
                           $image_type = $_FILES["file"]["type"];
                           $image_folder="products";
                           DatabaseLib::upload_image($image_name, $image_type, $image_path,$image_folder);
                     }	 
                if($pro->add() == true )
                    {
                        header("location:" . HOST_NAME .'admin/product/index');   
                    }
            }  else if (isset($_POST['update']))
            {
                $pro = new Product();
                $pro->pro_id         =$_POST['pro_id'];
                $pro->pro_name       = $_POST['name'];
                $pro->cat_id         = $_POST['cat'];
                $pro->sub_cat_id     = $_POST['sub_cat'];
                $pro->pro_prc_bf_dis = $_POST['price'];
                $price_af = $_POST['sale'];
                $sale = $price_af * $pro->pro_prc_bf_dis;
                $pro->pro_prc_af_dis = $pro->pro_prc_bf_dis - $sale ;
                $pro->pro_quantity   = $_POST['quantity'];
                $pro->pro_desc       = $_POST['description'];
                $pro->pro_img        = ($_FILES['file']['name']);
                $pro->modifiy_date   = $this->day();
                 if(isset($_FILES["file"]["tmp_name"]) !='')
                     {
	                       $image_name = $_FILES["file"]["name"];
	                       $image_path = $_FILES["file"]["tmp_name"];
                           $image_type = $_FILES["file"]["type"];
                           $image_folder="products";
                           DatabaseLib::upload_image($image_name, $image_type, $image_path,$image_folder);
                     }	 
                $pro->update($pro->pro_id);
                
                        header("location:" . HOST_NAME .'admin/product/index'); 
                   }
            
            else
            {
                $this->controller="addproduct";
                $this->results = Category::showAllCategory();
                $this->template->category=$this->results; 
                $this->rend(); 
            }
        }
        
    public function delete()
        {
            Product::delete_dep($_GET['id']);
        }
        
   public function shoplist()
        {
             $this->controller="shoplist";
          $id= $_GET['cat_id'];
             if(Product::showProductByCategoryId($id) !== false) 
                  {
                    $this->results = Product::showProductByCategoryId($id);
                    $this->template->products=$this->results; 
                  }
                   if(Category::selectCategoryById($id) !== false) 
                  {
                    $this->results = Category::selectCategoryById($id);
                    $this->template->cat=$this->results; 
                    
                  }
                  if(Category::showAllCategory() !== false)
            {
                $this->results = Category::showAllCategory();
                $this->template->categorys=$this->results; 
                }
             $this->rend();
           
        }
   public function ajax()
        {
            
            
             if(isset($_POST['to']))
                {
                    $from = $_POST['from'];
                        $to = $_POST['to'];
                        $cat_id= $_POST['cat_id'];
                          $sub_id = $_POST['sub_id'];
                        $perpage= $_POST['perpage'];
                        $page=1;
                    $cur_page = $page;
                    $page -= 1 ;
                    if(isset($_POST['perpage']))
                        {
                            $per_page = $_POST['perpage'];
                            
                        }else
                        {
                            $per_page = 6;
                        }
                        $previous_btn = true;
                        $next_btn = true;
                        $first_btn = true;
                        $last_btn = true;
                        $start = $page * $per_page;
                        
                             $this->results = Product::showAllProductWithFilter($start, $per_page,$cat_id,$to,$from,$sub_id);
                        
                        $msg = "";
                        $i=0;
                        foreach ($this->results as $product) 
                            {
                                  $tmp_folder ="../../assets/frontend/pages/img/products/temp/"; 
                $folder ="../../assets/frontend/pages/img/products/";
                $id="#".$product->pro_id;
                $id2=$product->pro_id;
                                $htmlmsg=htmlentities($product->pro_name);
                                $msg .= '
                   <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div style="height: 300px;width: 240px;" class="pi-img-wrapper">
                     <img style="height: 300px;" src="'. $folder.$product->pro_img .'" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="'. $folder.$product->pro_img .'" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="'.$id.'" class="btn btn-default fancybox-fast-view">View</a>
                      
                    </div>
                  </div>
                  <h3><a href="'. HOST_NAME.'index/shop_item?id='. $product->pro_id.'&view=1">'. $product->pro_name .'</a></h3>
                  <div class="pi-price">$'.$product->pro_prc_bf_dis.'</div>
                <input style="margin-left:20px;margin-top:-6px;" type="submit" id="idd'.$i.'" name="'. $product->pro_id.'" class="btn btn-default add2cart addcart"  value="Add to cart"/>
               <div class="sticker sticker-new"></div>
                                </div>
                                </div>
                                </div>
                                <!-- PRODUCT ITEM END -->         
                                    
                                ';
                            $i++;  }
                /* --------------------------------------------- */
                        global $db;
                        $query = $db->prepare("SELECT COUNT(*) AS count FROM product where status =1 and cat_id='".$cat_id."' and sub_cat_id='".$sub_id."'");
	                   $query->execute();
            			$data 			   = $query->fetch();
                        $count = $data['count'];
                        $no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= '<div class="row"><div class="col-md-8 col-sm-8"><br/><ul  style="margin-left:40%;position:absluote" class="pagination pull-right">';

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>&laquo&laquo;</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>&laquo&laquo;</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>&laquo;</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>&laquo;</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active'>&raquo;</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>&raquo;</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active'>&raquo&raquo;</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>&raquo&raquo;</li>";
}  
$goto = "<div class='col-md-4 col-sm-4 items-info'>
<input type='text' class='goto' size='1' />
<input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span></div></div></div>";
$msg = $msg . "</ul>" . $goto . $total_string ; // Content for pagination
echo $msg;
}
            
            else if(isset($_POST['page']))
                {
                    $new=0;
                    $sale=0;
                    
                    if(isset($_POST['sort']))
                    {
                        $sort = $_POST['sort'];
                      
                    }
                     if(isset($_POST['sort_item']))
                    {
                        
                        $sort_item = $_POST['sort_item'];
              
                        if($sort_item=="new")
                        {
                            $new = 1;
                            $sale=0;
                        } else if($sort_item=="sale")
                        {
                            
                            $new = 0;
                            $sale = 1;
                        }else if ($sort_item == "feature")
                        {
                            $new=0;
                            $sale=0;
                        }
                      
                    }
                    
                    $page = $_POST['page'];
                    $cat_id = $_POST['cat_id'];
                     $sub_id = $_POST['sub_id'];
                    $cur_page = $page;
                    $page -= 1 ;
                    if(isset($_POST['perpage']))
                        {
                            $per_page = $_POST['perpage'];
                            
                        }else
                        {
                            $per_page = 6;
                        }
                        $previous_btn = true;
                        $next_btn = true;
                        $first_btn = true;
                        $last_btn = true;
                        $start = $page * $per_page;
                         if(isset($_POST['sort']))
                    {
                        $this->results = Product::showAllProductWithSort($start, $per_page,$cat_id,$sort,$sub_id);
                        }else if(isset($_POST['sort_item']))
                    {

                    
                        $this->results = Product::showAllProductWithSortItem($start, $per_page,$cat_id,$sort,$sub_id,$sale,$new);
                        }else
                        {
                             $this->results = Product::showAllProductWithLimit($start, $per_page,$cat_id,$sub_id);
                        }
                        $msg = "";
                         $i=1;
             foreach($this->results as $product){ 
                $tmp_folder ="../../assets/frontend/pages/img/products/temp/"; 
                $folder ="../../assets/frontend/pages/img/products/";
                $id="#".$product->pro_id;
                $id2=$product->pro_id;
                                $htmlmsg=htmlentities($product->pro_name);
                                $msg .= '
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div style="height: 300px;width: 240px;" class="pi-img-wrapper">
                     <img style="height: 300px;" src="'. $folder.$product->pro_img .'" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="'. $folder.$product->pro_img .'" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="'.$id.'" class="btn btn-default fancybox-fast-view">View</a>
                      
                    </div>
                  </div>
                  <h3><a style="color:#F54E28" href="'. HOST_NAME.'index/shop_item?id='. $product->pro_id.'&view=1">'. $product->pro_name .'</a></h3>
                  <div class="pi-price">$'.$product->pro_prc_bf_dis.'</div>
                  <input style="margin-left:20px;margin-top:-6px;" type="submit" id="idd'.$i.'" name="'. $product->pro_id.'" class="btn btn-default add2cart addcart"  value="Add to cart"/>
               ';
               if ($product->new == 1)
               {
              $msg .='  <div class="sticker sticker-new"></div>';
               }else if($product->sale == 1)
               {
              $msg .='  <div class="sticker sticker-sale"></div>';
               }else
               {
               $msg .=' <div class=""></div>';
               }
               
                               $msg .=' </div>
                                </div>
                                </div>
                                <!-- PRODUCT ITEM END -->
                                
                                
                                  
                           ';
                             $i++; }
                /* --------------------------------------------- */
                        global $db;
                        $query = $db->prepare("SELECT COUNT(*) AS count FROM product where status =1 and cat_id='".$cat_id."' and sub_cat_id='".$sub_id."'");
	                   $query->execute();
            			$data 			   = $query->fetch();
                        $count = $data['count'];
                        $no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= '<div class="row"><div class="col-md-8 col-sm-8"><br/><ul  style="margin-left:40%;position:absluote" class="pagination pull-right">';

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>&laquo&laquo;</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>&laquo&laquo;</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>&laquo;</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>&laquo;</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active'>&raquo;</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>&raquo;</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active'>&raquo&raquo;</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>&raquo&raquo;</li>";
}  
$goto = "<div class='col-md-4 col-sm-4 items-info'>
<input type='text' class='goto' size='1' />
<input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span></div></div></div>";
$msg = $msg . "</ul>" . $goto . $total_string ; // Content for pagination
echo $msg;
}


       
           
        }
        
        
        
      public function update(){
        $this->controller="productupdate";
        $id= $_GET['id'];
            if(Product::selectProductById($id) !== false) 
            {
                $this->results = Product::selectProductById($id);
                $this->template->products=$this->results; 
            }
       $this->rend(); 
        }
        
        
        public function updatecategory(){
        $this->controller="updatecategory";
        $id= $_GET['id'];
            if(Product::selectCategoryById($id) !== false) 
            {
                $this->results = Product::selectCategoryById($id);
                $this->template->cats=$this->results; 
            }
       $this->rend(); 
        }
        
         public function getSubCategory(){
       if(Category::showAllSubCategory($_GET['id']))
       {
       $this->results = Category::showAllSubCategory($_GET['id']);
       $this->template->subcategory=$this->results;
         foreach( $this->results as $sub){
	   	echo'<option name="sub_cat"  id="subcat" value="'.$sub->cat_id.'" >'.$sub->cat_name.'</option>';
		 }
         }else
         {
       echo'<option  name="sub_cat" id="subcat" value="-1">No Sub Category </option>';
         }			  
        }
   
}