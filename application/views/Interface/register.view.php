

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Create new account</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Login/Register</a></li>
            </ul>
          </div>
          <!-- END SIDEBAR -->
          

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7" >
							<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo HOST_NAME;  ?>users/register">
								<div class="form-body" >
									<div class="form-group">
										<label class="col-md-3 control-label">User Name 
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input type="text" name="name" class="form-control" placeholder="" required=""/>	
											</div>                    
									</div>
        	                       <div class="form-group">
										<label class="col-md-3 control-label">Password
                                        <span class="require">* &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-lock"></i>
												</span>
												<input type="password" name="password" class="form-control" placeholder="" required=""/>	
										          	<span class="help-inline" style="color: red;">
											<?php
                                            if(isset($_GET['msg']))
                                            {
                                                echo  $_GET['msg'];
                                            }
                                             ?>
                                             </span>
                                        	</div>                    
									</div>
                                     <div class="form-group">
										<label  class="col-md-3 control-label">Confirm Pass
                                        <span class="require">*&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-lock"></i>
												</span>
												<input type="password" name="confirm" class="form-control" placeholder="" required=""/>	
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
												<input type="email" name="mail" class="form-control" placeholder="" required=""/>	
										        	<span class="help-inline" style="color: red;">
											<?php
                                            if(isset($_GET['msgg']))
                                            {
                                                echo  $_GET['msgg'];
                                            }
                                             ?>
                                             </span>
                                        	</div>                    
									</div>
                                    
                                    	<div class="form-group">
										<label  class="col-md-3 control-label">Date 
                                        <span class="require"></span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
												</span>
											<input class="form-control" name="date" id="mask_date" type="text"/>
											<span class="help-inline">
											day/month/year </span>
                                            
										</div>
									</div>
                                    	<div class="form-group">
										<label class="col-md-3 control-label">Your Job 
                                        <span class="require"> &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input type="text" name="job" class="form-control" placeholder=""/>	
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
												<input type="text" name="credit" class="form-control" placeholder="" required=""/>	
										      	<span class="help-inline" style="color: red;">
											<?php
                                            if(isset($_GET['credit']))
                                            {
                                                echo  $_GET['credit'];
                                            }
                                             ?>
                                             </span>
                                        	</div>                    
									</div>
                                    
                                    	<div class="form-group">
										<label class="col-md-3 control-label">Your Address 
                                        <span class="require"> &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<input type="text" name="address" class="form-control" placeholder=""/>	
											</div>                    
									</div>
                                    	<div class="form-group">
										<label class="col-md-3 control-label">Your Interstes 
                                        <span class="require"> &nbsp;&nbsp;&nbsp;</span>
                                        </label>
										<div class="input-group">
                                        	<span class="input-group-addon">
												<i class="fa fa-user"></i>
												</span>
												<textarea  name="interests" class="form-control" placeholder=""></textarea>	
											</div>                    
									</div>
									<div class="form-group">
										<label for="exampleInputFile" class="col-md-3 control-label">File input</label>
										<div class="col-md-9">
											<input type="file" name="file" id="exampleInputFile">
											<p class="help-block">
												 Upload Profile Picture.
											</p>
										</div>
									</div>
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
                                    
										<button type="submit" class="btn orang">Register Now</button>
										
									</div>
								</div>
							</form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo quat.</p>

                    <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>

                    <button type="button" class="btn btn-default">More details</button>
                  </div>
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
$('#cart').empty();
};
</script>