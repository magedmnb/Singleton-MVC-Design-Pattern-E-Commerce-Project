
 <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">
            <h2>Search Item</h2>
            <div  class="owl-carousel owl-carousel5">
            <?php
            $i=1;
             foreach($search as $product){ 
                $tmp_folder ="../../assets/frontend/pages/img/products/temp/"; 
                $folder ="../../assets/frontend/pages/img/products/";
                $id="#".$product->pro_id;
                $id2=$product->pro_id;
                ?>
              <div>
                <div class="product-item">
                <?php 
                if(isset($_GET['msg']))
                {
                    echo $_GET['msg'];
                }
                ?>
                  <div style="height: 300px;width: 240px;" class="pi-img-wrapper">
                     <img style="height: 300px;" src="<?php echo $folder.$product->pro_img ?>" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="<?php echo $folder.$product->pro_img ?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="<?php echo $id;?>" class="btn btn-default fancybox-fast-view">View</a>
                      
                    </div>
                  </div>
                  <h3><a href="<?php echo HOST_NAME ; ?>index/shop_item?id=<?php echo $product->pro_id; ?>"><?php echo $product->pro_name ?></a></h3>
                  <div class="pi-price">$<?php echo $product->pro_prc_bf_dis?></div>
                  <input type="submit" id="idd<?php echo $i;?>" name="<?php echo $product->pro_id ?>" class="btn btn-default add2cart addcart"  value="Add to cart"/>
               <div class="sticker sticker-new"></div>
                </div>
              </div>

    <!-- END fast view of a product -->
              <?php $i++;} ?>
            </div>
          </div>
          
          <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

     
        <!-- END SIDEBAR & CONTENT -->

             
        <!-- END TWO PRODUCTS & PROMO -->
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
