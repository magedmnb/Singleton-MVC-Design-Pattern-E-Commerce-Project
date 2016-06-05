
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
          <div class="col-md-9 col-sm-9">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7" >
							<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo HOST_NAME;  ?>users/updateprofile">
								<div class="form-body" >
									<div class="form-group">
										<label class="col-md-3 control-label">User Name 
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input type="text" value="<?php echo $user['user_name'];?>" name="name" class="form-control" placeholder=""/>	
											</div>                    
									</div>
                                     <div class="form-group">
										<label  class="col-md-3 control-label">Email Address
                                        <span class="require">*&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-envelope"></i>
												</span>
												<input type="email" value="<?php echo $user['user_mail'];?>" name="mail" class="form-control" placeholder=""/>	
											</div>                    
									</div>
                                    
                                    	<div class="form-group">
										<label  class="col-md-3 control-label">Date 
                                        <span class="require">*</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
												</span>
											<input class="form-control" value="<?php echo $user['user_birthday'];?>" name="date" id="mask_date" type="text"/>
											<span class="help-inline">
											day/month/year </span>
                                            
										</div>
									</div>
                                    	<div class="form-group">
										<label class="col-md-3 control-label">Your Job 
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input type="text" name="job" value="<?php echo $user['user_job'];?>"  class="form-control" placeholder=""/>	
											</div>                    
									</div>
                                    	<div class="form-group">
										<label class="col-md-3 control-label">Credit Limit
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input type="text" value="<?php echo $user['user_credit'];?>" name="credit" class="form-control" placeholder=""/>	
											</div>                    
									</div>
                                    
                                    	<div class="form-group">
										<label class="col-md-3 control-label">Your Address 
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input type="text" value="<?php echo $user['user_address'];?>" name="address" class="form-control" placeholder=""/>	
											</div>                    
									</div>
                                    	<div class="form-group">
										<label class="col-md-3 control-label">Your Interstes 
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<textarea  name="interests" value="<?php echo $user['user_interests'];?>" class="form-control" placeholder=""></textarea>	
											</div>                    
									</div>
			
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
                                    <button type="reset" class="btn orang">Reset</button>
										<button type="submit" class="btn orang">Update Profile </button>
										
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

 