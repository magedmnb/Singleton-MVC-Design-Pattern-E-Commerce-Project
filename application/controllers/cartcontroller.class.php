<?php

class CartController extends AbstractController
    {
     public function index()
        {
            $this->rend();
        }
    public function paypal()
        {
            
            $this->controller="payment";
            $this->rend();
            }
            
                  public function error_page()
        {
            $this->controller="error_page";
            $this->rend();
            }
            
            
    public function process_sale()
        {
            if (METHOD_TO_USE == "AIM") 
                { 
                    $user_id =  $_SESSION['user_id'];
                    $name = $_POST['name'];
                      $mail = $_POST['mail'];
                        $tel = $_POST['tel'];
                          $fax = $_POST['fax'];
                            $company = $_POST['company'];
                              $add = $_POST['add'];
                                $country = $_POST['country'];
                                  $city = $_POST['city'];
                                    $post = $_POST['post'];
                                    
                    $transaction = new AuthorizeNetAIM;
                    $transaction->setSandbox(AUTHORIZENET_SANDBOX);
                    $transaction->setFields(
                    array(
                    'amount' => "23", 
                    'card_num' => $_POST['x_card_num'], 
                    'exp_date' => $_POST['x_exp_date'],
                    'first_name' => $_POST['x_first_name'],
                    'address' => $_POST['x_address'],
                    'city' => $_POST['x_city'],
                    'state' => $_POST['x_state'],
                    'country' => $_POST['x_country'],
                    'zip' => $_POST['x_zip'],
                    'card_code' => $_POST['x_card_code'],
                        )
                    );
                    $response = $transaction->authorizeAndCapture();
                    if ($response->approved) 
                        {
                              global $db;
        $query = $db->prepare("INSERT INTO `delivery`(`d_user_id`, `d_user_name`, `d_mail`,`tel`, `d_fax`, `d_company`, 
        `d_address`, `d_city`, `d_post`, `d_country`) VALUES 
        ('".$user_id."','".$name."','".$mail."','".$tel."','".$fax."','".$company."','".$add."','".$city."',
        '".$post."','".$country."') ");
			$query->execute();
                        // Transaction approved! Do your logic here.
                        if(isset($_SESSION["cart"]))
                            {
                                $allprice=0;
                                $quantity= 0;
                                foreach($_SESSION['cart'] as $id=>$val)
                                    {
                                        $this->results=Product::selectProductById($id);
                                        foreach($this->results as $product)
                                            {
                                                $allprice += $product->pro_prc_bf_dis * $val ;
                                                 $quantity +=  $val ;
                                            }
                                    }
                                        $one =Users::showUser($_SESSION['user_id']);
                                   
                                    $creditlimit=$one['user_credit']-($allprice-6);
                                     $new_cart=new Cart();
                                $new_cart->order_date=$this->day();
                                $new_cart->user_id=$_SESSION['user_id'];
                                $new_cart->transaction_id=$response->transaction_id;
                                $new_cart->total_price=$allprice;
                                $new_cart->total_quantity=$quantity;
                                $order_id= $new_cart->add();            
                                foreach($_SESSION['cart'] as $id=>$val)
                                    {
                                        $this->results=Product::selectProductById($id);
                                        foreach($this->results as $product)
                                            {
                                                $new_cart->product_id=$product->pro_id;
                                                $new_cart->order_id=$order_id;
                                                $new_cart->product_price= $product->pro_prc_bf_dis*$val;
                                                $new_cart->product_quantity= $val;
                                                $new_cart->addOrder(); 
                                            }
                                    }
                                    
                                    
                                    unset($_SESSION['cart']); 
                                   Users::updateCatNow($_SESSION['user_id'],serialize(array()),$creditlimit);
                                   echo "checkoutsucces?transaction_id=' . $response->transaction_id";
                                $_SESSION['cart']=array();
                                  
                               
                                
                                 
                                             
                            } 
                            
                            
                        }else
                        {
                            echo "error_page?response_reason_code='.$response->response_reason_code.'";
                         }
                }elseif (count($_POST))
                     {
                        $response = new AuthorizeNetSIM;
                        if ($response->isAuthorizeNet()) 
                            {
                                if ($response->approved) 
                                    {
                                    // Transaction approved! Do your logic here.
                                    // Redirect the user back to your site.
                                        echo "thank_you_page?transaction_id=' . $response->transaction_id)";
                                    } else {
                                    // There was a problem. Do your logic here.
                                    // Redirect the user back to your site.
                                         echo "error_page?response_reason_code='.$response->response_reason_code.'&response_code='.$response->response_code.'&response_reason_text=' .$response->response_reason_text";
                                            }
                                    echo AuthorizeNetDPM::getRelayResponseSnippet($return_url);
                            } else {
                                echo "MD5 Hash failed. Check to make sure your MD5 Setting matches the one in config.php";
            }
    }
     

            }

    public function check()
        {
                     
        }
        
        
     public function viewcart()
        {
            $this->controller="viewcart";
            $this->rend();
        }
         public function checkoutsucces()
        {
            $this->controller="checkoutsucces";
            $this->rend();
        }
        
           public function addtocart()
        {
               $user_id= $_SESSION['user_id'];
               $new_val= $_GET['val'];
               
            
        $prod_id = ($_GET['id']);
      
        
               if(array_key_exists($prod_id, $_SESSION['cart'])){
            $val = $_SESSION['cart'][$prod_id];
            $_SESSION['cart'][$prod_id] = $new_val;
             Users::updateCat($user_id,serialize($_SESSION['cart']));
            
        
        }
        }
        
         public function removefromcart(){
             unset($_SESSION['cart'][$_GET['id']]);
             $user_id= $_SESSION['user_id'];
             Users::updateCat($user_id,serialize($_SESSION['cart']));
        
        }
        
        
        
            
    
}
?>