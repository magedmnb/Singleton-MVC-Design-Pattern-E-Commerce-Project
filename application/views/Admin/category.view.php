
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Category Views <small>managed Category view</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Category</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Category Views</a>
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
					<div class="portlet box blue-steel">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Category View
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
								<div class="btn-group">
									<a href="#large"  data-toggle="modal" id="sample_editable_1_new" class="btn orang">
									Add New Category <i class="fa fa-plus"></i>
									</a>
								</div>
						
							</div>
						<table class="table table-striped flip-content " id="sample_1">
							<thead class="flip-content">
							<tr>
								<th>
									 Category Name
								</th>
								<th>
									 Category Description
								</th>
								<th class="numeric">
									 Sub Category 
								</th>
								<th class="numeric">
									 Modifiy Date
								</th>
								<th class="numeric">
									 Update Date
								</th>
								<th class="numeric">
									 Update / Delete
								</th>
							
							</tr>
							</thead>
							<tbody>
                             <?php 
                            foreach($category as $cat){
                             ?>                                                        
							<tr >
								<td class="center">
									<?php echo $cat->cat_name;?>
								</td>
								<td class="center">
									 <?php echo $cat->cat_desc;?>
								</td>
								<td class="center">
									<?php echo $cat->cat_name;?>
								</td>
								<td class="center">
									 <?php echo $cat->modifiy_date;?>
								</td>
								<td class="center">
									<?php echo $cat->modifiy_date;?>
								</td>
								<td style="padding-left:40px;">
                                 <a href="<?php echo HOST_NAME ;?>admin/product/updatecategory?id=<?php echo $cat->cat_id; ?>"> <img src="http://www.e-commerce.com/img/icn_edit.png"/></a>
								 / &nbsp;
                                 <a href="#" id="<?php echo $cat->cat_id; ?>" class="delbutton" ><img src="http://www.e-commerce.com/img/icn_trash.png"/></a>
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
                            	<form  action="<?php echo HOST_NAME ;?>admin/category/add" enctype="" method="post" class="form-horizontal" role="form">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add New Category </h4>
                                        
										</div>
                                        
					
								<div class="form-body">
									<div class="form-group">
										<label  class="col-md-3 control-label">Category Name <span class="required">
										*</span></label>
										<div class="col-md-9">
											<input style="width:40%;" name="name" id="name" type="text" required="" class="form-control input" placeholder=""/>
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
											<input name="category[]" style="width:40%;" type="text" class="form-control input" placeholder=""/>
                                            <a style="position: absolute;margin-left: 39%;margin-top:-4.9%;" href="#" id="addcategory" class="btn green">
                                                    Add More 
                                            <i class="fa fa-plus"></i>
                                            </a>
										</div>
									</div>
                                          <div style="margin-left: 30%;"> 
                                                <button data-dismiss="modal"   class="btn blue-steel ">Cancel</button>
										<input name="Add" type="submit" value="Add Category" class="btn blue-steel"/>
                                        
                                        </div>
                                        <input style="border: hidden;" type="text"/>
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

<script type="text/javascript">
 $(function() {
   $("#add").click(function()
   {
   var name = $('#name').attr('value');
    var qun = $('#qun').attr('value');
     var price = $('#price').attr('value');
      var cat = $('#cat_id').text();
    var subcat = $('#subcat').attr('value');
    alert(cat);
    });
            });
</script> 
  <script type="text/javascript">
 $(function() {
    var i =0;
   $("#addcategory").click(function()
    {
        if(i==0){i="More Sub Category...."}else{i=""}
        var n= ''+i+'<div id="new"><input name="category[]"  style="width:40%;" type="text" class="form-control input" placeholder=""/>'+' <a href="#" style="margin-left: 33%;" id="remScnt">Remove</a></div';
		$("#moresubcategory").append(n);
        i++;
    });
   });
</script> 

<script>
	$(function() {
	   $(document).on('click', '#remScnt', function() {
            $(this).parents('#new').remove();
            return false;
        });
});
</script>
          