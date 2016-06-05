  <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
          <br />
          <br />
            <h1>Shopping cart</h1>
                Your Checkout succesfully done Wait for your product to be deliverd <br />
                and you will have message soon... 
                
            <br/><br />
            
            <a href="<?php echo HOST_NAME; ?>index/index" class="btn orang" type="submit">Continue shopping <i class="fa fa-shopping-cart"></i></a>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
<br />
<br />
<br />
<br />
        <!-- BEGIN SIMILAR PRODUCTS -->
        <div class="row margin-bottom-40">
     <div class="col-md-12 sale-product">
            <h2>Most Viewed Item</h2>
            <div  class="owl-carousel owl-carousel5">
<?php global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and view >=10");
			
			$query->execute();
			$products 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product'); 
          
            $f=1000;
             foreach($products as $product){ 
                $tmp_folder ="../../assets/frontend/pages/img/products/temp/"; 
                $folder ="../../assets/frontend/pages/img/products/";
                $id="#".$product->pro_id;
                $id2=$product->pro_id;
                ?>
              <div>
                <div class="product-item">
                  <div style="height: 300px;width: 240px;" class="pi-img-wrapper">
                     <img style="height: 300px;" src="<?php echo $folder.$product->pro_img ?>" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo $folder.$product->pro_img ?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="<?php echo $id;?>" class="btn btn-default fancybox-fast-view">View</a>
                      
                    </div>
                  </div>
                 
                  <h3><a href="<?php echo HOST_NAME ; ?>index/shop_item?id=<?php echo $product->pro_id; ?>&view=1"><?php echo $product->pro_name ?></a></h3>
                  <div class="pi-price">$<?php echo $product->pro_prc_bf_dis?></div>
                  <a type="submit" value="0" id="idd<?php echo $f;?>" name="<?php echo $product->pro_id ?>" class="btn btn-default add2cart addcart"  >
                  Add to cart
                  
                  </a>
            
                </div>
              </div>
            
             <!-- BEGIN fast view of a product -->
    <div id="<?php echo $id2;?>" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="<?php echo $folder.$product->pro_img ?>" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="<?php echo $folder.$product->pro_img ?>"></a>
                    
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2><?php echo $product->pro_name; ?></h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span><?php echo $product->pro_prc_bf_dis?></strong>
                    </div>
                    <div class="availability">
                      Availability:<?php echo $product->pro_quantity; ?> <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p><?php echo $product->pro_desc;?></p>
                  </div>
                  <div class="product-page-options">
                    
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
 <input  style="width: 70px;height: 40px;" min="1" max="<?php echo $product->pro_quantity;  ?>" id="value" type="number" value="1"  name="product-quantity" class=""/>
                    </div>
                    <button class="btn btn-default add2cart "  name="<?php echo $product->pro_id ?>" value="<?php echo $product->pro_id;?>" id="cart" >Add to cart</button>
                    <a href="<?php echo HOST_NAME ; ?>index/shop_item?id=<?php echo $product->pro_id; ?>" class="btn btn-default">More details</a>
                  </div>
                </div>
              </div>
            </div>
    </div>
    <!-- END fast view of a product -->
              <?php $f++;} ?>
      
            </div>
          </div>
        </div>
        <!-- END SIMILAR PRODUCTS -->
      </div>
    </div>

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
      <script type="text/javascript">
    window.onload = function(){    
$('#cartw').empty();
};
</script>