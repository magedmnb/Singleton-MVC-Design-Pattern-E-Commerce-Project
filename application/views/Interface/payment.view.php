<?php if (isset($_SESSION['user_id']))
{
    

?>
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Checkout</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Checkout</h1>
            <!-- BEGIN CHECKOUT PAGE -->
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

             

            
              <!-- BEGIN SHIPPING ADDRESS -->
              <div id="shipping-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-address-content" class="accordion-toggle">
                      Step 1: Delivery Details
                    </a>
                  </h2>
                </div>
                <div id="shipping-address-content" class="panel-collapse collapse in">
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="firstname-dd">First Name <span class="require">*</span></label>
                        <input type="text" name="name" id="firstname" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="lastname-dd">Last Name <span class="require">*</span></label>
                        <input type="text" id="lastname-dd" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="email-dd">E-Mail <span class="require">*</span></label>
                        <input type="text" name="mail" id="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="telephone-dd">Telephone <span class="require">*</span></label>
                        <input type="text" name="tel" id="telephone" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="fax-dd">Fax</label>
                        <input type="text" name="fax" id="fax" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="company-dd">Company</label>
                        <input type="text" name="company" id="company" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="address1-dd">Address 1</label>
                        <input type="text" name="add" id="address1" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="address2-dd">Address 2</label>
                        <input type="text" id="address2-dd" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="city-dd">Country <span class="require">*</span></label>
                        <input type="text" name="country" id="country" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="city-dd">City <span class="require">*</span></label>
                        <input type="text" name="city" id="city" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="post-code-dd">Post Code <span class="require">*</span></label>
                        <input type="text" name="code" id="post" class="form-control">
                      </div>
                   
                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-primary  pull-right" type="submit" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-method-content">Continue</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END SHIPPING ADDRESS -->

              
              <!-- BEGIN PAYMENT METHOD -->
              <div id="payment-method" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle">
                      Step 2: Payment Method
                    </a>
                  </h2>
                  
                </div>
                
                <div id="payment-method-content" class="panel-collapse collapse ">
                <img style="margin-left: 40%;"alt="Credit Card Logos" title="" src="http://www.credit-card-logos.com/images/multiple_credit-card-logos-1/credit_card_logos_8.gif" width="251" height="50" border="0" />
                  <div class="panel-body row">
      <?php
        if (METHOD_TO_USE == "AIM") {
        ?>
        <form method="post" action="#" id="checkout_form">
        <input type="hidden" name="size" value="">
        <?php
    } else {
        ?>
        <form method="post" action="<?php echo (AUTHORIZENET_SANDBOX ? AuthorizeNetDPM::SANDBOX_URL : AuthorizeNetDPM::LIVE_URL)?>" id="checkout_form">
        <?php
        $time = time();
        $fp_sequence = $time;
        $fp = AuthorizeNetDPM::getFingerprint(AUTHORIZENET_API_LOGIN_ID, AUTHORIZENET_TRANSACTION_KEY, $amount, $fp_sequence, $time);
        $sim = new AuthorizeNetSIM_Form(
            array(
            'x_amount'        => $amount,
            'x_fp_sequence'   => $fp_sequence,
            'x_fp_hash'       => $fp,
            'x_fp_timestamp'  => $time,
            'x_relay_response'=> "TRUE",
            'x_relay_url'     => $coffee_store_relay_url,
            'x_login'         => AUTHORIZENET_API_LOGIN_ID,
            'x_test_request'  => TEST_REQUEST,
            )
        );
        echo $sim->getHiddenFieldString();
    }
    ?>
      <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
      <fieldset>
        <div class="form-group">
          <label>Credit Card Number</label>
          <input type="text" class="text required creditcard" id="x_card_num" size="15" name="x_card_num" value="6011000000000012"></input>
        </div>
        <div>
          <label>Exp.</label>
          <input type="text" class="text required" size="4" id="x_exp_date" name="x_exp_date" value="04/15"></input>
        </div>
        <div class="form-group">
          <label>CCV</label>
          <input type="text" class="text required" size="4" id="x_card_code" name="x_card_code" value="782"></input>
        </div>
      </fieldset>
      <fieldset>
        <div class="form-group">
          <label>First Name</label>
          <input type="text" class="text required" size="15" id="x_first_name" name="x_first_name" value="Maged"></input>
        </div>
      </fieldset>
      <fieldset>
        <div class="form-group">
          <label>Address</label>
          <input type="text" class="text required" size="26" id="x_address" name="x_address" value="6 mans"></input>
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" class="text required" size="15" id="x_city" name="x_city" value="Mansoura"></input>
        </div>
      </fieldset>
      <fieldset>
        <div class="form-group">
          <label>State</label>
          <input type="text" class="text required" size="4" id="x_state" name="x_state" value="CA"></input>
        </div>
       <div class="form-group">
          <label>Zip Code</label>
          <input type="text" class="text required" size="9" id="x_zip" name="x_zip" value="94133"></input>
        </div>
        <div class="form-group">
          <label>Country</label>
          <input type="text" class="text required" size="22" id="x_country" name="x_country" value="Egypt"></input>
        </div>
      </fieldset>
      </div>
      </div>
   
    </form>
      <button class="btn btn-primary  pull-right" type="submit" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">Confirm</button>
                  </div>
                </div>
              </div>
              <!-- END PAYMENT METHOD -->

              <!-- BEGIN CONFIRM -->
              <div id="confirm" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                      Step 3: Confirm Order
                    </a>
                  </h2>
                </div>
                <div id="confirm-content" class="panel-collapse collapse">
                  <div class="panel-body row">
                    <div class="col-md-12 clearfix">
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
                          <label style="width: 80px;height: 30px;margin-left: 30px;" ><?php echo $val ;?></label>
                            
                      </div>
                    </td>
                    <td class="goods-page-price">
                      <strong><span>$</span><?php echo $product->pro_prc_bf_dis  ; ?></strong>
                    </td>
                    <td class="goods-page-total">
                      <strong><span>$</span><span class="c<?php echo $i; ?>" ><?php echo $product->pro_prc_bf_dis*$val ;?></span></strong>
                    </td>
                  
                  </tr>
                  
                    <?php $i++; }}?>
                </table>
                </div>

            <?php }else{ echo "Your shopping cart is empty!";?>
            <br/><br />
            
            <a href="<?php echo HOST_NAME; ?>index/index" class="btn blue" type="submit">Continue shopping <i class="fa fa-shopping-cart"></i></a>
         <?php } ?>
                      <div class="checkout-total-block">
                        <ul>
                          <li>
                            <em>Shipping cost</em>
                            <strong class="price"><span>$</span>3.00</strong>
                          </li>
                          <li>
                            <em>Eco Tax (-2.00)</em>
                            <strong class="price"><span>$</span>3.00</strong>
                          </li>
                          <li class="checkout-total-price">
                            <em>Total</em>
                            <strong class="price"><span>$</span><span value="<?php echo $allprice 
                            
                            ; ?>" id="totalprice"><?php echo $allprice+6 ; ?></span> </strong>
                          </li>
                        </ul>
                      </div>
                      <div class="clearfix"></div>
                      <button class="btn btn-primary pull-right" type="submit" id="buy">Confirm Order</button>
                       <a href="<?php echo HOST_NAME; ?>index/index" class="btn btn-default pull-right margin-right-20">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END CONFIRM -->
              

            </div>
            <!-- END CHECKOUT PAGE -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
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
    <?php 
    }else
    {
          header("location:" . HOST_NAME .'index/login');
    }
    ?>
      <script type="text/javascript">
    window.onload = function(){    
$('#cartw').empty();
};
</script>
