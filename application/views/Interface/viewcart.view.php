  <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Shopping cart</h1>
                        <?php
                      if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                      
                        
           ?>
            <div class="goods-page">

              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
                  <tr>
                    <th class="goods-page-image">Image</th>
                    <th class="goods-page-description">Description</th>
                    <th class="goods-page-ref-no">Ref No</th>
                    <th class="goods-page-quantity">Quantity</th>
                    <th class="goods-page-price">Unit price</th>
                    <th class="goods-page-total" colspan="2">Total</th>
                  </tr>
                  <?php 
         
            $allprice =0; 
            $i=0;
            foreach($_SESSION['cart'] as $id=>$val){
                  $this->results=Product::selectProductById($id);
                  
                    foreach($this->results as $product)
                      
                        {
                            
                             $allprice += $product->pro_prc_bf_dis * $val ;
                            
            ?>
                  <tr>
                    <td class="goods-page-image">
                      <a href="#"><img src="../../assets/frontend/pages/img/products/<?php echo $product->pro_img; ?>" alt="Berry Lace Dress"></a>
                    </td>
                    <td class="goods-page-description">
                      <h3><a href="#">Cool green dress with red bell</a></h3>
                      <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                      <em>More info is here</em>
                    </td>
                    <td class="goods-page-ref-no">
                      <?php echo $product->pro_name;?>
                    </td>
                    <td class="goods-page-quantity">
                      <div class="product-quantity">
                            
                            <input type="hidden" name="<?php echo $product->pro_id; ?>" id="c<?php echo $i; ?>" value="<?php echo $product->pro_prc_bf_dis*$val ;?>"/>
                            <input type="hidden" class="c<?php echo $i; ?>" value="<?php echo($product->pro_prc_bf_dis); ?>"/>
                          <input style="width: 80px;height: 30px;" class="#c<?php echo $i; ?>" name=".c<?php echo $i; ?>" id="quantity"  type="number" value="<?php echo $val ;?>"
                            max="10" min="1">
                      </div>
                    </td>
                    <td class="goods-page-price">
                      <strong><span>$</span><?php echo $product->pro_prc_bf_dis  ; ?></strong>
                    </td>
                    <td class="goods-page-total">
                      <strong><span>$</span><span class="c<?php echo $i; ?>" ><?php echo $product->pro_prc_bf_dis*$val ;?></span></strong>
                    </td>
                    <td class="del-goods-col">
                      <a id='<?php echo $product->pro_id ;?>'  class="del-goods del_car" >&nbsp;</a>
                    </td>
                  </tr>
                  
                    <?php $i++; }}?>
                </table>
                </div>

                <div class="shopping-total">
                  <ul>
                    <li class="shopping-total-price">
                      <em>Total Price</em>
                      <strong class="price"><span>$</span><span value="<?php echo $allprice ; ?>" id="totalprice"><?php echo $allprice ; ?></span> </strong>
                    </li>
                  </ul>
                </div>
              </div>
              <a href="<?php echo HOST_NAME; ?>index/index" class="btn btn-default" type="submit">Continue shopping <i class="fa fa-shopping-cart"></i></a>
              <a href="<?php echo HOST_NAME; ?>cart/paypal" class="btn btn-primary" type="submit">Checkout <i class="fa fa-check"></i></a>
            </div>
            <?php }else{ echo "Your shopping cart is empty!";?>
            <br/><br />
            
            <a href="<?php echo HOST_NAME; ?>index/index" class="btn blue" type="submit">Continue shopping <i class="fa fa-shopping-cart"></i></a>
         <?php } ?>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

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
                  <div  class="pi-img-wrapper">
                     <img src="<?php echo $folder.$product->pro_img ?>" class="img-responsive" alt="Berry Lace Dress">
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