
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Home <small>WebSite Main Details</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							
						</li>
					
						<li class="pull-right">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="icon-calendar"></i>
								<span></span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
            		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								 	 <?php
                                  global $db;
                        $query = $db->prepare("SELECT COUNT(*) AS count FROM `users` where status=0 ");
	                   $query->execute();
            			$data 			   = $query->fetch();
                        $count = $data['count'];
                        echo $count; 
                                 ?>
							</div>
							<div class="desc">
								 WebSite Users
							</div>
						</div>
					<a class="more" href="<?php echo HOST_NAME ; ?>admin/users/index">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
		
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat orang">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 120089$
							</div>
							<div class="desc">
								 Total Profit
							</div>
						</div>
						<a class="more" href="<?php echo HOST_NAME ; ?>admin/order/index">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php
                                  global $db;
                        $query = $db->prepare("SELECT COUNT(*) AS count FROM `order` ");
	                   $query->execute();
            			$data 			   = $query->fetch();
                        $count = $data['count'];
                        echo $count; 
                                 ?>
							</div>
							<div class="desc">
								  Orders
							</div>
						</div>
					<a class="more" href="<?php echo HOST_NAME ; ?>admin/order/index">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
                    
				</div>
                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-list"></i>
						</div>
						<div class="details">
							<div class="number">
								 	 <?php
                                  global $db;
                        $query = $db->prepare("SELECT COUNT(*) AS count FROM `product` ");
	                   $query->execute();
            			$data 			   = $query->fetch();
                        $count = $data['count'];
                        echo $count; 
                                 ?>
							</div>
							<div class="desc">
								 Product
							</div>
						</div>
						<a class="more" href="<?php echo HOST_NAME ; ?>admin/product/index">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
                
                <div class="col-md-6" style="margin-left: 15%;width: 70%;">
					<!-- Begin: life time stats -->
					<div class="portlet box blue-steel">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-thumb-tack"></i>Overview
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#overview_1" data-toggle="tab">
									Top Selling </a>
								</li>
								<li>
									<a href="#overview_2" data-toggle="tab">
									Most Viewed </a>
								</li>
							
						
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="overview_1">
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered">
										<thead>
										<tr>
											<th>
												 Product Name
											</th>
											<th>
												 Price
											</th>
											<th>
												 orderd
											</th>
											<th>
											</th>
										</tr>
										</thead>
										<tbody>
                                        	 <?php
                                  global $db;
                        
        $query = $db->prepare("SELECT * FROM product
                               where status = 1  ORDER BY pro_id DESC LIMIT 4  ");
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
			foreach($data as $pro)
            {	
                                 ?>
										<tr>
											<td>
												<a href="#">
											<?php echo $pro->pro_name?> </a>
											</td>
											<td>
											<?php echo $pro->pro_prc_bf_dis;?>$
											</td>
                                            	<td>
												<?php echo $pro->orderd;?>
											</td>
                                            
										
											<td>
												<a href="<?php echo HOST_NAME ;?>admin/product/update?id=<?php echo $pro->pro_id?>" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
									<?php } ?>
										</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane" id="overview_2">
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered">
										<thead>
										<tr>
											<th>
												 Product Name
											</th>
											<th>
												 Price
											</th>
											<th>
												 Views
											</th>
											<th>
											</th>
										</tr>
										</thead>
										<tbody>
                                                    <?php         global $db;
                        
        $query = $db->prepare("SELECT * FROM product
                               where status = 1 and view >=10    ");
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Product');
			foreach($data as $pro)
            {	?>
										<tr>
											<td>
												<a href="#">
													<?php echo $pro->pro_name?> </a> </a>
											</td>
											<td>
												 <?php echo $pro->pro_prc_bf_dis ?>$
											</td>
											<td>
												 	<?php echo $pro->view?> </a>
											</td>
											<td>
											<a href="<?php echo HOST_NAME ;?>admin/product/update?id=<?php echo $pro->pro_id?>" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
									<?php }?>
										</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane" id="overview_3">
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered">
										<thead>
										<tr>
											<th>
												 Customer Name
											</th>
											<th>
												 Total Orders
											</th>
											<th>
												 Total Amount
											</th>
											<th>
											</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>
												<a href="#">
												David Wilson </a>
											</td>
											<td>
												 3
											</td>
											<td>
												 $625.50
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Amanda Nilson </a>
											</td>
											<td>
												 4
											</td>
											<td>
												 $12625.50
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Jhon Doe </a>
											</td>
											<td>
												 2
											</td>
											<td>
												 $125.00
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Bill Chang </a>
											</td>
											<td>
												 45
											</td>
											<td>
												 $12,125.70
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Paul Strong </a>
											</td>
											<td>
												 1
											</td>
											<td>
												 $890.85
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Jane Hilson </a>
											</td>
											<td>
												 5
											</td>
											<td>
												 $239.85
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Patrick Walker </a>
											</td>
											<td>
												 2
											</td>
											<td>
												 $1239.85
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane" id="overview_4">
									<div class="table-responsive">
										<table class="table table-striped table-hover table-bordered">
										<thead>
										<tr>
											<th>
												 Customer Name
											</th>
											<th>
												 Date
											</th>
											<th>
												 Amount
											</th>
											<th>
												 Status
											</th>
											<th>
											</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>
												<a href="#">
												David Wilson </a>
											</td>
											<td>
												 3 Jan, 2013
											</td>
											<td>
												 $625.50
											</td>
											<td>
												<span class="label label-sm label-warning">
												Pending </span>
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Amanda Nilson </a>
											</td>
											<td>
												 13 Feb, 2013
											</td>
											<td>
												 $12625.50
											</td>
											<td>
												<span class="label label-sm label-warning">
												Pending </span>
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Jhon Doe </a>
											</td>
											<td>
												 20 Mar, 2013
											</td>
											<td>
												 $125.00
											</td>
											<td>
												<span class="label label-sm label-success">
												Success </span>
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Bill Chang </a>
											</td>
											<td>
												 29 May, 2013
											</td>
											<td>
												 $12,125.70
											</td>
											<td>
												<span class="label label-sm label-info">
												In Process </span>
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Paul Strong </a>
											</td>
											<td>
												 1 Jun, 2013
											</td>
											<td>
												 $890.85
											</td>
											<td>
												<span class="label label-sm label-success">
												Success </span>
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Jane Hilson </a>
											</td>
											<td>
												 5 Aug, 2013
											</td>
											<td>
												 $239.85
											</td>
											<td>
												<span class="label label-sm label-danger">
												Canceled </span>
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">
												Patrick Walker </a>
											</td>
											<td>
												 6 Aug, 2013
											</td>
											<td>
												 $1239.85
											</td>
											<td>
												<span class="label label-sm label-success">
												Success </span>
											</td>
											<td>
												<a href="#" class="btn default btn-xs green-stripe">
												View </a>
											</td>
										</tr>
										</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
		
			</div>
			<!-- END DASHBOARD STATS -->
		
			
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
    
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../../assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="../../assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init() // init quick sidebar
   Index.init();   

   Index.initCalendar(); // init index page's custom scripts
  
});
</script>
<!-- END JAVASCRIPTS -->
	