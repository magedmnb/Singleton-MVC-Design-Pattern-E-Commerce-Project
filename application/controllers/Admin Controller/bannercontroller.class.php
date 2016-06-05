<?php

class BannerController extends AbstractController
{
    public $results;
    public $mnb;
    public function index()
        {
           
            $this->controller="banner";
           $this->rend();
        }
        public function showreport()
        {
            $this->controller="showreport";
           $this->rend();
            
        }
        
         public function myaccount()
        {
            $id=$_SESSION['user_id'];
            $this->controller="myaccount";
             if(Users::showUser($id) !== false)
             {
                $this->results = Users::showUser($id);
                $this->template->users=$this->results; 
            }
           $this->rend();
        }
        
         public function shop_item()
        {
            if(isset($_SESSION['user_id']))
            {
                $id=$_SESSION['user_id'];
            }
            $product_id=$_GET['id'];
            $this->controller="shop_item";
             if(Product::selectProductId($product_id) !== false)
             {
                $this->results = Product::selectProductId($product_id);
                $this->template->product=$this->results; 
            }
               if(Category::showAllCategory() !== false)
            {
                $this->results = Category::showAllCategory();
                $this->template->categorys=$this->results; 
                 
            }
           $this->rend();
        }
        
           public function vieworder()
        {
            $id=$_SESSION['user_id'];
            $this->controller="vieworder";
             if(Cart::showAllOrdersById($id) !== false) 
            {
                $this->results = Cart::showAllOrdersById($id);
                $this->template->orders=$this->results; 
                $this->mnb=Users::selectUserById($id);
                $this->template->user_credit=$this->mnb;
                $this->results = Category::showAllCategory();
                $this->template->category=$this->results; 
            }
           $this->rend();
        }
        
        
           public function viewtransaction()
        {
            $id=$_SESSION['user_id'];
            $this->controller="viewtransaction";
            
                if(Cart::showAllOrdersById($id) !== false) 
            {
                $this->results = Cart::showAllOrdersById($id);
                $this->template->orders=$this->results; 
            }
           $this->rend();
        }
        
        
             public function contact()
        {
            if(isset($_POST['add']))
            {
                $msg = new Message();
              $msg->message =  $_POST['msg'];
                $msg->message_subject =$_POST['sub'];
              $msg->from_name =  $_POST['name'];
               $msg->from_email = $_POST['mail'];
               $msg->sending_date=$this->day();
               $msg->addmsg();
           
               $this->controller="contact";
               echo " <span style='color:green;position: absolute;margin-left:30.5%;margin-top:165px'>Message Send Successfully</span>";
                
            }else
            {
            $id=$_SESSION['user_id'];
            $this->controller="contact";
            
                if(Cart::showAllOrdersById($id) !== false) 
            {
                $this->results = Cart::showAllOrdersById($id);
                $this->template->orders=$this->results; 
            }
            }
           $this->rend();
        }
        
        
          public function search()
        {
            
            $id=$_SESSION['user_id'];
            $this->controller="search";
            $find = trim($_POST['find']);
            $what = trim($_POST['search']);
            if($what=="Category")
            {
               
                if(Product::searchByCategory($find) !== false) 
            {
                 
                $this->results = Product::searchByCategory($find);
                $this->template->search=$this->results; 
            }
            else
            {
              
                 header("location:" . HOST_NAME .'index/search?msg=No Result Found');
               
            }
             
            }else if($what=="Price")
            {
                
                if(Product::searchByPrice($find) !== false) 
            {
                 
                $this->results = Product::searchByPrice($find);
                $this->template->search=$this->results; 
                
            } else
            {
               
               header("location:" . HOST_NAME .'index/search?msg=No Result Found');
            }
                
            }
            
           $this->rend();
        }
        
         public function editaccount()
        {
            $id=$_SESSION['user_id'];
            $this->controller="editaccount";
             if(Users::showUser($id) !== false)
             {
                $this->results = Users::showUser($id);
                $this->template->user=$this->results; 
            }
           $this->rend();
        }
             public function changepass()
        {
            $id=$_SESSION['user_id'];
            $this->controller="changepass";
             if(Users::showUser($id) !== false)
             {
                $this->results = Users::showUser($id);
                $this->template->user=$this->results; 
            }
           $this->rend();
        }
    
    public function login()
    {
         if(isset($_POST['login'])){
            $loginuser = new Users();
            $loginuser->user_mail    = $_POST['email'] ;
            $loginuser->user_password = $_POST['password'] ;
             if($loginuser->checkUserLogin()!== false) { 
                    $login_id=$loginuser->checkUserLogin();
                    $this->result=$loginuser->getImage($login_id);
                    $this->mnb=$loginuser->getCart($login_id);
          	        $_SESSION['user_id'] = $login_id;
                    $_SESSION['img']=$this->result;
                    if(is_array(unserialize($this->mnb)))
                    {
                        $_SESSION['cart']= unserialize($this->mnb);
                    }else
                    {
                        $_SESSION['cart']= array();
                    }
                    
                    $_SESSION['user_name']=$loginuser->user_name;
                     header("location:" . HOST_NAME .'index/index');
                    
             }else{
                $this->controller="login";
                     $this->rend();
                     echo "<p style='position: absolute;color:red;padding-left:43%;margin-top:-55.5%'>Invalid Username or Password</p>"; 
                }
                        
        }else{
         $this->controller="login";
         $this->rend();
        }
    }
    
   public function register()
    {
         if(isset($_POST['login'])){
            $loginuser = new Users();
            $loginuser->user_mail    = $_POST['email'] ;
            $loginuser->user_password = $_POST['password'] ;
             if($loginuser->checkUserLogin()!== false) { 
                    $login_id=$loginuser->checkUserLogin();
                    $this->result=$loginuser->getImage($login_id);
          	        $_SESSION['user_id'] = $login_id;
                    $_SESSION['img']=$this->result;
                    $_SESSION['user_name']=$loginuser->user_name;
                     header("location:" . HOST_NAME .'index/index');
                    
             }else{
                     $this->rendUserLogin();
                     echo "<p style='position: absolute;color:red;padding-left:43%;margin-top:-40.5%'>Invalid Username or Password</p>"; 
                }
                        
        }else{
         $this->controller="register";
         $this->rend();
        }
    }
    
     public function cart(){
        
      
            $user_id= $_SESSION['user_id'];
         
        @$prod_id = ($_GET['id']);
       
        if(array_key_exists($prod_id, $_SESSION['cart'])){
            $val = $_SESSION['cart'][$prod_id];
               if(isset($_GET['val']))
            {
             $new_val= $_GET['val'];
             $_SESSION['cart'][$prod_id] = $new_val;
            }else
            {
            $_SESSION['cart'][$prod_id] = ++$val;
        }
        }else{
        
            $_SESSION['cart'][$prod_id] = 1;
        }
        Users::updateCat($user_id,serialize($_SESSION['cart']));
        $msg="";
        
        $msg .='<div class="top-cart-info">
            <a class="top-cart-info-count"><span id="count">'. count($_SESSION['cart']).' </span>items</a>
            <a   class="top-cart-info-value"><span id="allprice">$0</span></a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content" id="cartw">';
                
          if(isset($_SESSION["cart"]))
           {
            $allprice =0;
            $msg .='<ul class="scroller" style="height: 250px;">';
               foreach($_SESSION['cart'] as $id=>$val){
                $this->results=Product::selectProductById($id);
                    foreach($this->results as $product)
                        {
               $msg .= ' <li>
                  <img src="../../assets/frontend/pages/img/products/'.$product->pro_img.'" alt="Rolex Classic Watch" width="37" height="34">
                  <span class="cart-content-count">x '.$val.'</span>
                  <strong><a href="shop-item.html">'.$product->pro_name.'</a></strong>
                  <em>$'.$product->pro_prc_bf_dis * $val.'</em>
                  <a  id='.$product->pro_id.' class="del-goods del">&nbsp;</a>
                </li>';
                $allprice += $product->pro_prc_bf_dis * $val ;
                
               }
               
               }
             
               $allprice = "$".$allprice;
              $msg .='</ul>
              <script>
              $("#allprice").text("'.$allprice.'");
              </script>';
              if(empty($_SESSION["cart"]))
              {
                $msg .= '&nbsp;&nbsp;&nbsp; Your Cart is empty Choose Product To Add Cart';
              
              }else
              {
              $msg .='<div class="text-right">
               <a href="'.HOST_NAME.'cart/viewcart" class="btn btn-default">View Cart</a>
                <a href="'.HOST_NAME.'cart/paypal" class="btn btn-primary">Checkout</a>
              </div>';
           
           }
           }else{
    $msg .= '&nbsp;&nbsp;&nbsp; Your Cart is empty Choose Product To Add Cart';
}       
       $msg .= ' </div>
        </div>' 
        ;
                
echo $msg ;
    
        }
    
       public function removefromcart(){
             unset($_SESSION['cart'][$_GET['id']]);
             $user_id= $_SESSION['user_id'];
             Users::updateCat($user_id,serialize($_SESSION['cart']));
        $msg="";
        $allprice =0;
        $msg .='<div class="top-cart-info">
            <a  class="top-cart-info-count"><span id="count">'. count($_SESSION['cart']).' </span>items</a>
            <a  id="allprice" class="top-cart-info-value">$0</a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content" id="cartw">';
                
          if(isset($_SESSION["cart"]))
           {
            $msg .='<ul class="scroller" style="height: 250px;">';
               foreach($_SESSION['cart'] as $id=>$val){
                $this->results=Product::selectProductById($id);
                    foreach($this->results as $product)
                        {
               $msg .= ' <li>
                  <img src="../../assets/frontend/pages/img/products/'.$product->pro_img.'" alt="Rolex Classic Watch" width="37" height="34">
                  <span class="cart-content-count">x '.$val.'</span>
                  <strong><a href="shop-item.html">'.$product->pro_name.'</a></strong>
                  <em>$'.$product->pro_prc_bf_dis * $val.'</em>
                  <a  id='.$product->pro_id.' class="del-goods del">&nbsp;</a>
                  </li>';
                  $allprice += $product->pro_prc_bf_dis * $val ;
                
               }
               
               }
             
               $allprice = "$".$allprice;
              $msg .='</ul>
              <script>
              $("#allprice").text("'.$allprice.'");
              </script>';
              if(empty($_SESSION["cart"]))
              {
                $msg .= '&nbsp;&nbsp;&nbsp; Your Cart is empty Choose Product To Add Cart';
              
              }else
              {
              $msg .='<div class="text-right">
               <a href="'.HOST_NAME.'cart/viewcart" class="btn btn-default">View Cart</a>
                <a href="'.HOST_NAME.'cart/paypal" class="btn btn-primary">Checkout</a>
              </div>';
           
           }
           }else{
    $msg .= '&nbsp;&nbsp;&nbsp; Your Cart is empty Choose Product To Add Cart';
}       
       $msg .= ' </div>
        </div>' 
        ;
                
echo $msg ;
        }
    
    public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['cart']);
            header("location:" . HOST_NAME . 'index/index');
        }
}