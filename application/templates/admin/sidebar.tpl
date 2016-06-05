   <?php $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
                $end = end((explode('/', rtrim($url, '/'))));
                $pathParts = explode( '/', parse_url($url, PHP_URL_PATH) );

$lastParts = array( array_pop($pathParts), array_pop($pathParts) );

                ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper hidden-xs">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<?php
                        if($lastParts[1]=="index" & $end=="index"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="<?php echo HOST_NAME ;?>admin/index/index">
					<i class="icon-home"></i>
					<span class="title">Home</span>
					<span class=""></span>
					</a>
				</li>
                  <?php
                        if($lastParts[1]=="product"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">Product</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						  <?php
                        if($end=="index"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
							<a href="<?php echo HOST_NAME ;?>admin/product/index">
							<i class="icon-list"></i>
							Product View</a>
						</li>
						  <?php
                        if($end=="add"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
							<a href="<?php echo HOST_NAME ;?>admin/product/add">
							<i class="icon-plus"></i>
							Add Product</a>
						</li>
					</ul>
				</li>
                   <?php
                        if($lastParts[1]=="category" && $lastParts[0] !="sub" && $lastParts[0] !="subadd"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="javascript:;">
					<i class="icon-list"></i>
					<span class="title">Category</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						 <?php
                        if($end=="index"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
							<a href="<?php echo HOST_NAME ;?>admin/category/index">
							<i class="icon-list"></i>
							Category View</a>
						</li>
						 <?php
                        if($end=="add"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
							<a href="<?php echo HOST_NAME ;?>admin/category/add">
							<i class="icon-plus"></i>
							Add Category</a>
						</li>
					</ul>
				</li>
                     <?php
                     
                        if($lastParts[1]=="category" && $lastParts[0] =="sub" || $lastParts[0] =="subadd" ){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">Sub Category</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo HOST_NAME ;?>admin/category/sub">
							<i class="icon-home"></i>
							Sub Category View</a>
						</li>
					  <?php
                        if($lastParts[1]=="category" && $lastParts[0] =="subadd" ){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
							<a href="<?php echo HOST_NAME ;?>admin/category/subadd">
							<i class="icon-plus"></i>
							Add Sub Category</a>
						</li>
					</ul>
				</li>
                        <?php
                        if($lastParts[1]=="order"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">Oreder Report</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo HOST_NAME ;?>admin/order/index">
							<i class="icon-list"></i>
							Order View</a>
						</li>
					</ul>
				</li>
                 <?php
                        if($lastParts[1]=="banners"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="javascript:;">
					<i class="icon-picture"></i>
					<span class="title">Banners</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo HOST_NAME ;?>admin/banner/index">
							<i class="fa fa-picture-o"></i>
							Banners Control</a>
						</li>
					</ul>
				</li>
                      <?php
                        if($lastParts[1]=="inbox"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="javascript:;">
					<i class="fa fa-envelope-o"></i>
					<span class="title">Mseeage</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo HOST_NAME ;?>admin/inbox/index">
							<i class="icon-envelope"></i>
							Message View</a>
						</li>
					</ul>
				</li>
             
                 <?php
                        if($lastParts[1]=="report"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="javascript:;">
					<i class="icon-list"></i>
					<span class="title">Report</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
                        <?php
                        if($end=="index"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
							<a href="<?php echo HOST_NAME ;?>admin/report/showreport">
							<i class="icon-list"></i>
							WebSite Report View</a>
						</li>
                        
					</ul>
                  <?php
                        if($lastParts[1]=="users"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">Users</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
                        <?php
                        if($end=="index"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
							<a href="<?php echo HOST_NAME ;?>admin/users/index">
							<i class="icon-users"></i>
							WebSite Users View</a>
						</li>
                        <?php
                        if($end=="admin"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
							<a href="<?php echo HOST_NAME ;?>admin/users/admin">
							<i class="fa fa-user-secret"></i>
							Admin Users View</a>
						</li>
                        <?php
                        if($end=="add"){
                            echo '<li class="start active ">';
                            }else{ echo '<li>';}
                            ?>
                        	
							<a href="<?php echo HOST_NAME ;?>admin/users/addadmin">
							<i class="fa fa-user-plus"></i>
							Add New Admin </a>
						</li>
					</ul>
				</li>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
						<ul>
							<li class="color-default current tooltips" data-style="default" data-original-title="Default">
							</li>
							<li class="color-darkblue tooltips" data-style="darkblue" data-original-title="Dark Blue">
							</li>
							<li class="color-blue tooltips" data-style="blue" data-original-title="Blue">
							</li>
							<li class="color-grey tooltips" data-style="grey" data-original-title="Grey">
							</li>
							<li class="color-light tooltips" data-style="light" data-original-title="Light">
							</li>
							<li class="color-light2 tooltips" data-style="light2" data-html="true" data-original-title="Light 2">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
						Layout </span>
						<select class="layout-option form-control input-small">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Header </span>
						<select class="page-header-option form-control input-small">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar </span>
						<select class="sidebar-option form-control input-small">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Position </span>
						<select class="sidebar-pos-option form-control input-small">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Footer </span>
						<select class="page-footer-option form-control input-small">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END STYLE CUSTOMIZER -->