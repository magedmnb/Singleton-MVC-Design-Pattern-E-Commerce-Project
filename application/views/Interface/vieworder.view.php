
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">My Account Page</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
              <h1>My Account Page</h1>
            <div class="content-page">
              <h3>My Account</h3>
              <ul>
                <li><a href="<?php echo HOST_NAME; ?>index/editaccount">Edit  account </a></li>
                <li><a href="<?php echo HOST_NAME ;?>index/changepass">Change  password</a></li>
                <li><a  href="<?php echo HOST_NAME ;?>index/contact">Contact  Us</a></li>
              </ul>
              <hr>

              <h3>My Orders</h3>
              <ul>
                <li><a style="color: red;" href="<?php echo HOST_NAME ;?>index/vieworder">View  orders </a></li>
                <li><a href="<?php echo HOST_NAME ;?>index/viewtransaction">Your Transactions</a></li>
              </ul>
            </div>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
                    
          <div class="col-md-9 col-sm-7">
                  <div class="container">
    <div  class="heading">
         <div class="col">Order Id</div>
         <div class="col">User Name</div>
		 <div class="col">Order Total Quantity </div>
         <div class="col">Order Total Price  </div>
         <div class="col">Your Credit Limit  </div>
         <div class="col">Order Date </div>
    </div>
                   <?php 
                            foreach($orders as $order){
                             ?> 
                                  
	<div data-toggle="collapse" data-target="#<?php echo  $order->order_id;?>" class="accordion-toggle table-row  accordion-heading">
         <div class="col"><?php echo $order->order_id;?></div>
         <?php $user =Users::selectUserById($order->user_id); ?>
          <div class="col"><?php echo $user['user_name'];?></div>
	     <div class="col"><?php echo $order->total_quantity;?></div>
         <div class="col">	<?php echo $order->total_price;?></div>
         <div class="col"><?php echo $user_credit['user_credit']?></div>
         <div class="col"><?php echo $order->order_date;?></div>
         
    </div>
    	<div class="accordion-body   collapse " id="<?php echo $order->order_id;?>">
                           
     <?php $productorder = Cart::selectOrder($order->order_id);
                            foreach($productorder as $proorder)
                            {
                             ?>
                             <div class="container">
                 <div  class="heading">           
	     <div class="col">Product Name</div>
         <div class="col">Product Quantity</div>
         <div class="col">Product Price</div>
         <div class="col">Total Price</div>

         </div>
         	<div  class=" table-row ">
            <?php $Product_name=Product::selectProductId($proorder->product_id);
           ?>
         <div class="col"><?php echo $Product_name['pro_name'];?></div>
	     <div class="col"><?php echo $proorder->product_quantity;?></div>
         <div class="col">	<?php echo $proorder->product_price;?></div>
         <div class="col"><?php echo $proorder->product_quantity*$proorder->product_price;?></div>
       
        
    </div>
    </div>
         
                            <?php } echo " </div>"; ?>

    <?php } ?>

</div>
						
						
						</div>
          </div>
          
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <!-- BEGIN BRANDS -->
    <div class="brands">
      <div class="container">
            <div class="owl-carousel owl-carousel6-brands">
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/next.jpg" alt="next" title="next"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/next.jpg" alt="next" title="next"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
              <a href="shop-product-list.html"><img src="../../assets/frontend/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
            </div>
        </div>
    </div>
    <!-- END BRANDS -->

    <!-- BEGIN STEPS -->
    <div class="steps-block steps-block-red">
      <div class="container">
        <div class="row">
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-truck"></i>
            <div>
              <h2>Free shipping</h2>
              <em>Express delivery withing 3 days</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-gift"></i>
            <div>
              <h2>Daily Gifts</h2>
              <em>3 Gifts daily for lucky customers</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-phone"></i>
            <div>
              <h2>477 505 8877</h2>
              <em>24/7 customer care available</em>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END STEPS -->
    <style type="text/css">
*{ padding:0px; 
   margin:0px; }
.accordion-heading { color: black; }

.accordion-heading:hover {  color:black; background: #FCE2DC;
  -webkit-transition: all 0.5s ease-in-out;
     -moz-transition: all 0.5s ease-in-out;
       -o-transition: all 0.5s ease-in-out;
          transition: all 0.5s ease-in-out; }
          
.accordion-heading  {  
    background: white;
border-collapse: collapse;
   text-decoration:none; 
   text-transform:uppercase; }
   .container{
    display:table;
    width:90%;
    height:100%;
    border-collapse: collapse;
    }
 .heading{
     font-weight: bold;
     display:table-row;
     background: c;
     text-align: center;
     line-height: 25px;
     font-size: 14px;
     font-family:georgia;
     
     
 }
 .table-row{  
     display:table-row;
     text-align: center;
     height:30px;
     border-bottom: 2px solid #E84D1C;
 }
 .col{ 
	display:table-cell;
    padding: 10px;
 	
 }
</style>
