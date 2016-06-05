
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					WebSite Users View <small>managed caegory view</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Users</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">WebSite Users View</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Users View
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
							<div class="table-toolbar">
							
								<div class="btn-group pull-right">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
											Print </a>
										</li>
										<li>
											<a href="#">
											Save as PDF </a>
										</li>
										<li>
											<a href="#">
											Export to Excel </a>
										</li>
									</ul>
								</div>
							</div>
						<table class="table table-striped flip-content " id="sample_1">
							<thead class="flip-content">
							<tr>
								<th class="accordion-inner">
									 User Name
								</th>
								<th>
									 User Image
								</th>
								<th class="numeric">
									 User  Mail 
								</th>
								<th class="numeric">
									 User credit
								</th>
								<th class="numeric">
									 Modifiy Date
								</th>
								<th class="numeric">
									Delete
								</th>
							
							</tr>
							</thead>
							<tbody>
                             <?php 
                            foreach($users as $user){
                             ?>                                                        
							<tr >
								<td class="center">
									<?php echo $user->user_name;?>
								</td>
								<td class="center">
							<img width="70px" height="50px" class="img-circle" src="../../assets/frontend/pages/img/users/<?php echo $user->user_img;?>"/>
								</td>
								<td class="center">
									<?php echo $user->user_mail;?>
								</td>
								<td class="center">
									 <?php echo $user->user_credit;?>
								</td>
								<td class="center">
									<?php echo $user->modifiy_date;?>
								</td>
								<td style="padding-left:20px;">
                                
                                 <a href="#" id="<?php echo $user->user_id; ?>" class="delbutton" ><img src="http://www.e-commerce.com/img/icn_trash.png"/></a>
								</td>                                 
							</tr>
                            <?php } ?>                                                        
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
            
            <!-- /.modal -->
							<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add New Product </h4>
										</div>
                                        
										<form  action="#" enctype="" class="form-horizontal" role="form">
								<div class="form-body">
									<div class="form-group">
										<label  class="col-md-3 control-label">Category Name</label>
										<div class="col-md-9">
											<input style="width:40%;" id="name" type="text" class="form-control input" placeholder=""/>
										</div>
									</div>
                                    	<div class="form-group">
										<label class="col-md-3 control-label">Category Description</label>
										<div class="col-md-9">
											<textarea style="width:40%;" name="description" type="text" class="form-control"> </textarea>
											<span class="help-block">
											optional field </span>
										</div>
									</div>
								
                                    
									<div class="form-group">
										<label class="col-md-3 control-label">Sub Category</label>
										<div id="moresubcategory" class="col-md-9">
											<input style="width:40%;" type="text" class="form-control input" placeholder=""/>
                                            <a href="#" id="addcategory" class="btn green">
                                                    Add More 
                                            <i class="fa fa-plus"></i>
                                            </a>
										</div>
									</div>
								</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button"  id="add" class="btn blue">Save changes</button>
										</div>
                                        </form>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
		
			<!-- END PAGE CONTENT-->
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
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/table-managed.js"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="../../assets/admin/pages/scripts/ui-toastr.js"></script>
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init() // init quick sidebar
   TableManaged.init();
    
});
</script>


    <script type="text/javascript">
$(function() {
$(document).on('click', '.delbutton', function() {

//Save the link in a variable called element
var element = $(this);
//Find the id of the link that was clicked
var del_id = element.attr("id");
//Built a url to send
var info = 'id=' + del_id;
 if(confirm("are you sure to delete this image category !?"))
		  {
   $.ajax({
   type: "GET",
   url: "delete",
   data: 'id=' + del_id,
   success: function()
   {   
   window.location = "index";
 
   }
   });        
   }
return false;
});
});
</script>


          