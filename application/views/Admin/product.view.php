<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
                             <?php 
                            if(isset($_GET['lang']))
{
    ?>
						<?php echo $pro_table ?> 
                            <?php }else {
                                ?>
                               Product Views <small>managed product show</small>
                           <?php }?>
					
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html"><?php echo $home;?></a>
                            <?php 
                            if(isset($_GET['lang']))
{
    ?>
							<i class="fa fa-angle-left"></i>
                            <?php }else {
                                ?>
                               <i class="fa fa-angle-right"></i> 
                           <?php }?>
						</li>
						<li>
							<a href="#"><?php echo $products;?></a>
						         <?php 
                            if(isset($_GET['lang']))
{
    ?>
							<i class="fa fa-angle-left"></i>
                            <?php }else {
                                ?>
                               <i class="fa fa-angle-right"></i> 
                           <?php }?>
						</li>
						<li>
							<a href="#"><?php echo $pro_table?></a>
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
								<i class="fa fa-globe"></i><?php echo $pro_table ; ?>
							</div>
							
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="btn-group">
									<a  href="#large"  data-toggle="modal" id="" class="btn orang">
									<?php echo $add;?>&nbsp;&nbsp;<i class="fa fa-plus"></i>
									</a>
								</div>
						
							</div>
  <table class="table table-striped table-hover  dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
							<thead>
							<tr role="row"><th class="sorting" tabindex="0" aria-controls="sample_editable_1" 
                            rowspan="1" colspan="1"  style="width: 179px;">
									 <?php
                                      echo $Product_namee ;?>
								</th><th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1"  style="width: 226px;">
									
                                    <?php
                                      echo $product_image ;?>
								</th><th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 122px;">
								<?php
                                      echo $price ;?> 
								</th><th>
									<?php
                                      echo $quantity ;?>
								</th><th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1"  style="width: 86px;">
									 <?php
                                      echo $date ;?>
								</th><th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1"" aria-sort="ascending">
								 <?php
                                      echo $del ;?> / <?php
                                      echo $update ;?>
								</th></tr>
							</thead>
							<tbody>
									
							
                             <?php 
                            foreach($product as $pro){
                             ?>                                                        
							<tr >
								<td >
									<?php echo $pro->pro_name;?>
								</td>
								<td class="center">
									<img width="70px" height="50px" class="img-circle" src="../../assets/frontend/pages/img/products/<?php echo $pro->pro_img;?>"/> 
								</td>
								<td class="center">
									<?php echo $pro->pro_prc_bf_dis;?>
								</td>
								<td class="center">
									 <?php echo $pro->pro_quantity;?>
								</td>
								<td class="center">
									<?php echo $pro->modifiy_date;?>
								</td>
								<td style="padding-left:40px;">
                                 <a href="update?id=<?php echo $pro->pro_id; ?>"> <img src="http://www.e-commerce.com/img/icn_edit.png"/></a>
								 / &nbsp;
                                 <a href="#" id="<?php echo $pro->pro_id; ?>" class="delbutton" ><img src="http://www.e-commerce.com/img/icn_trash.png"/></a>
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
			<form   role="form" enctype="multipart/form-data" method="post" id="" action="<?php echo HOST_NAME ;?>admin/product/add" class="form-horizontal">
								
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Add New Product </h4>
                                      
								
							
										</div>
                                			<form   role="form" enctype="multipart/form-data" method="post" id="" action="<?php echo HOST_NAME ;?>admin/product/add" class="form-horizontal">
								
                                <div class="form-body">
                   	
									<div class="form-group">
										<label class="control-label col-md-3">Product Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" data-required="1" class="form-control" required/>
										</div>
									</div>
									<div class="form-group" id="spinner3" style="margin-left: 16%;">
                                    <label class="control-label ">Product Quantity <span class="required">
										*&nbsp;</span>
							<div class="input-inline input-medium">
											
												<div class="input-group" style="width:150px;">
													<div class="spinner-buttons input-group-btn">
                                                    <button type="button" class="btn spinner-down blue-steel">
													
														<i class="fa fa-minus"></i>
														</button>
													</div>
													<input type="text" name="quantity" class="spinner-input form-control" maxlength="3" />
													<div class="spinner-buttons input-group-btn">
															<button type="button" class="btn spinner-up blue-steel">
														<i class="fa fa-plus"></i>
														</button>
													</div>
												</div>
										
											</div>
											</div>
									<div class="form-group" style="margin-left: 22%;">
                                    <label class="control-label ">Price <span class="required">
										*&nbsp;</span>
									<div class="input-inline input-medium">
									<input id="touchspin_demo1" type="text" class=" blue-steel" value="0" name="price" class="form-control ">
											</div>
											</div>
									<div class="form-group">
										<label class="control-label col-md-3">Description&nbsp;&nbsp;</label>
										<div class="col-md-4">
											<textarea name="description" style="height:80px;" type="text" class="form-control"></textarea>
											<span class="help-block">
											optional field </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Category <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select style="color: #95a5a6;" class="form-control" name="cat" id="list-select">
                                            <option id="cat_id" value="-1">Choose Category</option>
											 <?php
						                          foreach( $category as $cat){
	                                            	echo'<option style="color:#95a5a6"   id="cat_id" value="'.$cat->cat_id.'">'.$cat->cat_name.'</option>';
						                              }
                                                   ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Sub Category <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select  style="color: #95a5a6;" class="form-control" name="sub_cat" id="list-target">
                                            
											</select>
										</div>
									</div>
                                    <div class="form-group" style="margin-left: 30%;">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													Select image </span>
													<span class="fileinput-exists">
													Change </span>
													<input type="file" name="file"/>
													</span>
													<a href="#" class="btn blue-steel fileinput-exists" data-dismiss="fileinput">
													Remove </a>
												</div>
											</div>
										</div>
                                         <div style="margin-top: -5px;margin-left: 40%;">     
                                    <button  type="reset"  data-dismiss="modal"  class="btn blue-steel ">Cancel</button>
										<input name="Add" type="submit" class="btn blue-steel"/>
                                      
                                        
										</div>
                                        <input type="hidden " style="margin-top: 10px; border: hidden;"/>
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
<script src="../../assets/admin/pages/scripts/table-editable.js"></script>

<script src="../../assets/admin/pages/scripts/form-validation.js"></script>
<script src="../../assets/admin/pages/scripts/components-form-tools.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="../../assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init() // init quick sidebar
    TableEditable.init();
   ComponentsFormTools.init();
});
</script>
<script>
$(document).ready(function($) {
  var list_target_id = 'list-target'; //first select list ID
  var list_select_id = 'list-select'; //second select list ID
  var initial_target_html = '<option value="">Please select a Category...</option>'; //Initial prompt for target select

  $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option

  $('#'+list_select_id).change(function(e) {
      
    //Grab the chosen value on first select list change
    var selectvalue = $(this).val();

    //Display 'loading' status in the target select list
    $('#'+list_target_id).html('<option value="">Loading...</option>');

    if (selectvalue == "") {
        //Display initial prompt in target select if blank value selected
       $('#'+list_target_id).html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
   
      $.ajax({url: 'getSubCategory?id='+selectvalue,
             success: function(output) {
                //alert(output);
                $('#'+list_target_id).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });
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

          