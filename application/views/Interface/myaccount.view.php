
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
                <li><a href="<?php echo HOST_NAME ;?>index/vieworder">View  orders </a></li>
                <li><a href="<?php echo HOST_NAME ;?>index/viewtransaction">Your Transactions</a></li>
              </ul>
            </div>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
                    
          <div class="col-md-9 col-sm-7">
            <img src="../../assets/frontend/pages/img/users/<?php echo $users['user_img']; ?>" style="width: 100px;height: 120px;" alt="ws"/>
        <br /><br />
         <div style="margin-top:-140px;margin-left: 100px;position: absolute;">
          <label >&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;font-size: 15px;">My Name :</span>&nbsp;&nbsp;<?php echo $users['user_name'];?></label><br />
            <label >&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;font-size: 15px;">My E-mail :</span>&nbsp;&nbsp;<?php echo $users['user_mail'];?></label><br />
          <label>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;font-size: 15px;">My Job :</span>&nbsp;&nbsp;<?php echo $users['user_job'];?></label><br />
          <label>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;font-size: 15px;">My Interstes :</span>&nbsp;&nbsp;<?php echo $users['user_interests'];?></label><br />
          <label>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;font-size: 15px;">My Address :</span>&nbsp;&nbsp;<?php echo $users['user_address'];?></label><br />
          <label>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;font-size: 15px;">My Birthday :</span>&nbsp;&nbsp;<?php echo $users['user_birthday'];?></label><br />
           <label>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;font-size: 15px;">My Credit :</span>&nbsp;&nbsp;<?php echo $users['user_credit'];?></label>
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
