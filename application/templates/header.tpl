<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.1.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest (the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Metronic Shop UI</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->
  <!--payment css -->
  <link rel="stylesheet" href="../../assets/frontend/payment_css/style.css">
  <!-- -->
  <!-- Global styles START -->          
  <link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="../../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="../../assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="../../assets/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="../../assets/global/css/components.css" rel="stylesheet">
  <link href="../../assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="../../assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="../../assets/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
  <link href="../../assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="../../assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="../../assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">

    

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                    
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        <li class="langs-block">
                            <a href="javascript:void(0);" class="current">
                            <i class="fa fa-flag-o"></i>
                            English
                             </a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              <a href="javascript:void(0);">
                              <i class="fa fa-flag"></i>
                              Arabic</a>
                            </div></div>
                        </li>
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav" >
                    <ul class="list-unstyled list-inline pull-right">
                    <?php if(isset($_SESSION['user_id'])){?>
                        <li><a href="<?php echo HOST_NAME ;?>index/myaccount">My Account</a></li>
                        <li><a href="shop-wishlist.html">My Wishlist</a></li>
                        <li><a href="<?php echo HOST_NAME; ?>cart/viewcart">Checkout</a></li> 
                         <li><a href="<?php echo HOST_NAME;?>index/logout">Log out</a></li>
                        <?php }else{ ?>
                        <li><a href="<?php echo HOST_NAME;?>index/login">Log In</a></li>
                        <li><a href="<?php echo HOST_NAME;?>index/register">Register</a></li>
                        
                        <?php } ?>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" style="margin-bottom:-65px;" href="<?php  echo HOST_NAME ;?>index/index">
        <img src="../../assets/frontend/layout/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a>

        <a  class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block" id="cartw">
    
          <div class="top-cart-info">
            <a class="top-cart-info-count"><span id="mn">
            <?php if(isset($_SESSION["cart"])) {
                echo count($_SESSION['cart']); }else{ echo "0";} ?> </span>items</a>
            <a class="top-cart-info-value"><span id="all"></span></a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content" id="cart">
                <?php
          if(isset($_SESSION["cart"]))
           {
            $allprice =0;
            echo'<ul class="scroller" style="height: 250px;">';
             foreach($_SESSION['cart'] as $id=>$val){
                $this->results=Product::selectProductById($id);
                    foreach($this->results as $product)
                        {
               echo' <li>
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
                
             if(empty($_SESSION["cart"]))
              {

                echo '&nbsp;&nbsp;&nbsp; Your Cart is empty Choose Product To Add Cart';
             
              }else
              {?>
            </ul>
              <div class="text-right">
                <a href="<?php echo HOST_NAME; ?>cart/viewcart" class="btn btn-default">View Cart</a>
                <a href="<?php echo HOST_NAME; ?>cart/paypal" class="btn btn-primary">Checkout</a>
              </div>
           <?php
           }
          }else{
    echo '&nbsp;&nbsp;&nbsp; Your Cart is empty Choose Product To Add Cart';
    
}            ?>
        </div>
        </div>
        </div>
        <!--END CART -->
 
  

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation ">
          <ul>
          <li class="dropdown ">
             <?php $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
               $end = end((explode('/', rtrim($url, '/'))));
                $pathParts = explode( '/', parse_url($url, PHP_URL_PATH) );

$lastParts = array( array_pop($pathParts), array_pop($pathParts) );
              if($lastParts[1]=="index" & $end=="index"){?>
                        <a style="color:#F54E30;font-weight:bold"  href="<?php echo HOST_NAME ;?>index/index">
                          <?php  }else{ 
                            ?>
              <a style=""  href="<?php echo HOST_NAME ;?>index/index">
              <?php } ?>
                Home
                
              </a>   
            </li>
                        <li class="dropdown dropdown-megamenu">
                        <?php 
                         if($lastParts[1]=="product"){?>
              <a style="color:#F54E30;font-weight:bold" class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
              <?php } else { ?>
                <a  class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
               <?php  
              }?>
                Category
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                    <?php foreach($categorys as $category){ ?>
                      <div class="col-md-4 header-navigation-col">
                        <h4><?php echo $category->cat_name; ?></h4>
                        <ul>
                     <?php $subcategory = Category::showAllSubCategory($category->cat_id);
                foreach($subcategory as $sub)
                {
                   ?>    
                  <li><a  href="<?php echo HOST_NAME ?>product/shoplist?cat_id=<?php echo $category->cat_id; ?>&sub_id=<?php echo $sub->cat_id; ?>">
                  <?php echo $sub->cat_name; ?></a></li>
                <?php } ?>
                        </ul>
                      </div>
                       <?php } ?>
                  
                      
                      <div class="col-md-12 nav-brands">
                        <ul>
                          <li><a href="shop-product-list.html"><img title="esprit" alt="esprit" src="../../assets/frontend/pages/img/brands/esprit.jpg"></a></li>
                          <li><a href="shop-product-list.html"><img title="gap" alt="gap" src="../../assets/frontend/pages/img/brands/gap.jpg"></a></li>
                          <li><a href="shop-product-list.html"><img title="next" alt="next" src="../../assets/frontend/pages/img/brands/next.jpg"></a></li>
                          <li><a href="shop-product-list.html"><img title="puma" alt="puma" src="../../assets/frontend/pages/img/brands/puma.jpg"></a></li>
                          <li><a href="shop-product-list.html"><img title="zara" alt="zara" src="../../assets/frontend/pages/img/brands/zara.jpg"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
         
            
            <li class="dropdown dropdown100 nav-catalogue">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Latest
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                                         <?php
            $h=1;
             foreach($prs as $product){ 
                $tmp_folder ="../../assets/frontend/pages/img/products/temp/"; 
                $folder ="../../assets/frontend/pages/img/products/";
                $id="#".$product->pro_id."h";
                $id2=$product->pro_id."h";
                ?>
                      <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <a href="#"> <img style="height: 300px;" src="<?php echo $folder.$product->pro_img ?>" class="img-responsive" alt="Berry Lace Dress"></a>
                          </div>
                       <h3><a href="<?php echo HOST_NAME ; ?>index/shop_item?id=<?php echo $product->pro_id; ?>"><?php echo $product->pro_name ?></a></h3>
                  <div class="pi-price">$<?php echo $product->pro_prc_bf_dis?></div>
                  <input type="submit"  name="<?php echo $product->pro_id ?>" class="btn btn-default add2cart addcart"  value="Add to cart"/>
               <div class="sticker sticker-new"></div>
                        </div>
                      </div>
               <?php $h++;} ?>
           
                
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            
            
                     
          
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search ">
              <span class="sep"></span>
              <i  class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="<?php echo HOST_NAME; ?>index/search"  method="post">
                  <div class="input-group">
                    <input value="" name="find" type="text" id="se" placeholder="Search" class="form-control">
                    
                    <span class="input-group-btn ">
                      <button class="btn btn-primary" name="searchnow" type="submit">Search</button>
                    </span>
                  
                  </div>
                 &nbsp;<input class="search" type="radio" name="search" value="Category" checked="true"/>&nbsp;Category  &nbsp;&nbsp;<br />
                 &nbsp;<input class="search" type="radio" name="search" value="Price"/>&nbsp;Price 
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
    