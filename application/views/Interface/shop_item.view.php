<?php $view = $_GET['view'];
$id=$_GET['id'];
	    global $db;
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and pro_id='$id'");
			$query->execute();
			$data 			   = $query->fetch();
            $newview = $data['view'];
            $newview=$view+$newview;
	    global $db;
		$query = $db->prepare("UPDATE  `product` SET  `view` =  '".$newview."'
		                                                   
		                                                   WHERE  `pro_id` = '$id'");
			$query->execute();	 	
		
?>
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active"><?php echo $product['pro_name']?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
             
        <ul class="list-group margin-bottom-25 sidebar-menu">
               <?php foreach($categorys as $category){ ?>
              <li class="list-group-item clearfix dropdown" > 
                <a href="#" style="font-size: 25px;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="3000" data-close-others="true">
                  <i class="fa fa-angle-right"></i>
                  <?php echo $category->cat_name; ?>
                  
                </a>
                <ul class="dropdown-menu" id="mnb" role="menu">
                <?php $subcategory = Category::showAllSubCategory($category->cat_id);
                foreach($subcategory as $sub)
                {
                   ?>    
                  <li><a style="color: red;" href="shop-product-list.html"><i class="fa fa-angle-right"></i> <?php echo $sub->cat_name; ?></a></li>
                <?php } ?>
                </ul>
                
              </li>
              
              <?php } ?>
              
    
              
             </ul>

        
          </div>
          <!-- END SIDEBAR -->
<?php  $folder ="../../assets/frontend/pages/img/products/"; ?>
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="product-main-image">
                    <img src="<?php echo $folder.$product['pro_img'] ?>" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="<?php echo $folder.$product['pro_img'] ?>">
                  </div>
                  <div class="product-other-images">
                    <a href="<?php echo $folder.$product['pro_img'] ?>" class="fancybox-button" rel="photos-lib">
                    <img alt="Berry Lace Dress" src="<?php echo $folder.$product['pro_img'] ?>"></a>
                   
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h2><?php echo $product['pro_name']; ?></h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span><?php echo $product['pro_prc_bf_dis']; ?></strong>
                      <em>$<span><?php echo $product['pro_prc_af_dis']; ?></span></em>
                    </div>
                    <div class="availability">
                      Availability: <?php echo $product['pro_quantity']; ?><strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p><?php echo $product['pro_desc']; ?></p>
                  </div>
                  <div class="product-page-options">
                  
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                    <input type="hidden"  id="p_id" />
            <input  style="width: 70px;height: 40px;" min="1" max="<?php echo $product['pro_quantity'];  ?>" id="value" type="number" value="1"  name="product-quantity" class="">
                    </div>
                    <button class="btn btn-primary" value="<?php echo $product['pro_id']; ?>"  id="cart" >Add to cart</button>
                  </div>
      
                 
                </div>

                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li><a href="#Description" data-toggle="tab">Description</a></li>
                    <li><a href="#Information" data-toggle="tab">Information</a></li>
                    <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade" id="Description">
                      <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. </p>
                    </div>
                    <div class="tab-pane fade" id="Information">
                      <table class="datasheet">
                        <tr>
                          <th colspan="2">Additional features</th>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 1</td>
                          <td>21 cm</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 2</td>
                          <td>700 gr.</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 3</td>
                          <td>10 person</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 4</td>
                          <td>14 cm</td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Value 5</td>
                          <td>plastic</td>
                        </tr>
                      </table>
                    </div>
                    <div class="tab-pane fade in active" id="Reviews">
                      <!--<p>There are no reviews for this product.</p>-->
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Maged</strong>
                          <em>30/12/2013 - 07:37</em>
                          <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                        </div>
                      </div>
                   

                      <!-- BEGIN FORM-->
                      <form action="#" class="reviews-form" role="form">
                        <h2>Write a review</h2>
                        <div class="form-group">
                          <label for="name">Name <span class="require">*</span></label>
                          <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                          <label for="review">Review <span class="require">*</span></label>
                          <textarea class="form-control" rows="8" id="review"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="email">Rating</label>
                          <input type="range" value="4" step="0.25" id="backing5">
                          <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                          </div>
                        </div>
                        <div class="padding-top-20">                  
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </form>
                      <!-- END FORM--> 
                    </div>
                  </div>
                </div>

               
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h2>Most popular products</h2>
            <div class="owl-carousel owl-carousel4">
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="../../assets/frontend/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="../../assets/frontend/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="#" class="btn btn-default add2cart">Add to cart</a>
                  <div class="sticker sticker-new"></div>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="../../assets/frontend/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="../../assets/frontend/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress2</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="#" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="../../assets/frontend/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="../../assets/frontend/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress3</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="#" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="../../assets/frontend/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="../../assets/frontend/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress4</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="#" class="btn btn-default add2cart">Add to cart</a>
                  <div class="sticker sticker-sale"></div>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="../../assets/frontend/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="../../assets/frontend/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress5</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="#" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="../../assets/frontend/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="../../assets/frontend/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress6</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="#" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END SIMILAR PRODUCTS -->
      </div>
    </div>