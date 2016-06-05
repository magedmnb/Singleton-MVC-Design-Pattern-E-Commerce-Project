
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Edit Account Page</li>
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
                <li><a style="color: red;" href="<?php echo HOST_NAME ;?>index/changepass">Change  password</a></li>
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
          <div class="col-md-9 col-sm-9">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7" >
							<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo HOST_NAME;  ?>users/changepass">
								<div class="form-body" >
						    	<span class="help-inline" style="color: red;margin-left: 180px;">
											<?php
                                            if(isset($_GET['error']))
                                            {
                                                echo  $_GET['error'];
                                            }
                                             ?>
                                             </span>
                                             	<span class="help-inline" style="color: green;margin-left: 180px;">
											<?php
                                            if(isset($_GET['msg']))
                                            {
                                                echo  $_GET['msg'];
                                            }
                                             ?>
                                             </span>
                         	     <div class="form-group">
										<label class="col-md-3 control-label">Old Password
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-lock"></i>
												</span>
												<input type="password" name="old_password" class="form-control" placeholder=""required=""/>	
											</div>                    
									</div>
        	                       <div class="form-group">
										<label class="col-md-3 control-label">New Password
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-lock"></i>
												</span>
												<input type="password" name="new_password" class="form-control" placeholder="" required=""/>	
											</div>                    
									</div>
                                     <div class="form-group">
										<label  class="col-md-3 control-label">Confirm New Password
                                        <span class="require">*&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-lock"></i>
												</span>
												<input type="password" name="confirm_new" class="form-control" placeholder="" required=""/>	
											</div>                    
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
                                    <button type="reset" class="btn orang">Reset</button>
										<button type="submit" class="btn orang">Change Pass</button>
										
									</div>
								</div>
							</form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
              
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

        <script type="text/javascript">
    window.onload = function(){    
$('#cartw').empty();
};
</script>