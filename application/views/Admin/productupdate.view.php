
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Form Validation <small>form validation</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>Actions</span><i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
							</ul>
						</li>
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Product</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Edit Product</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			
		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue-steel">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Basic Validation
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
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form   role="form" enctype="multipart/form-data" method="post" id="" action="<?php echo HOST_NAME ;?>admin/product/add" class="form-horizontal">
								<div class="form-body">
                                	<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
            	
		</div><?php foreach($products as $pro) { ?>
        
        <input type="hidden" value="<?php echo $pro->pro_id?>" name="pro_id"/>
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Product Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" value="<?php echo $pro->pro_name;?> " name="name" data-required="1" class="form-control" required/>
										</div>
									</div>
									<div class="form-group" id="spinner3" style="margin-left: 13.5%;">
                                    <label class="control-label ">Product Quantity <span class="required">
										*&nbsp;</span>
							<div class="input-inline input-medium">
											
												<div class="input-group" style="width:150px;">
													<div class="spinner-buttons input-group-btn">
                                                    <button type="button" class="btn spinner-down blue-steel">
													
														<i class="fa fa-minus"></i>
														</button>
													</div>
													<input type="text" value="<?php echo $pro->pro_quantity;?> " name="quantity" class="spinner-input form-control" maxlength="3" />
													<div class="spinner-buttons input-group-btn">
															<button type="button" class="btn spinner-up blue-steel">
														<i class="fa fa-plus"></i>
														</button>
													</div>
												</div>
										
											</div>
											</div>
									<div class="form-group" style="margin-left: 20.4%;">
                                    <label class="control-label ">Price <span class="required">
										*&nbsp;</span>
									<div class="input-inline input-medium">
									<input id="touchspin_demo1"value="<?php echo $pro->pro_prc_bf_dis;?> " type="text"  name="price" class="form-control">
											</div>
											</div>
                                            	<div class="form-group" style="margin-left: 20.4%;">
                                    <label class="control-label ">Sale <span class="required">
										*&nbsp;</span>
									<div class="input-inline input-medium">
									<input id="touchspin_demo2" type="text" value="0" name="sale" class="form-control">
											</div>
											</div>
									<div class="form-group">
										<label class="control-label col-md-3">Description&nbsp;&nbsp;</label>
										<div class="col-md-4">
											<textarea name="description"  style="height:80px;" type="text" class="form-control"><?php echo $pro->pro_desc;?></textarea>
											<span class="help-block">
											optional field </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Category <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select style="color: blue;" class="form-control" name="cat" id="list-select">
                                            
											 <?php
						                          foreach( $category as $cat){
						                              if($cat->cat_id == $pro->cat_id)
                                                      {
                                                  	echo'<option style="color:red"   id="cat_id" value="'.$cat->cat_id.'" selected>'.$cat->cat_name.'</option>';
                                                        
                                                      }else
                                                      {
	                                            	echo'<option style="color:red"   id="cat_id" value="'.$cat->cat_id.'">'.$cat->cat_name.'</option>';
						                              }
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
											<select  style="color: blue;" class="form-control" name="sub_cat" id="list-target">
                                            <?php
                                               if(Category::showAllSubCategory($pro->cat_id))
       {
       $this->results = Category::showAllSubCategory($pro->cat_id);
       
         foreach( $this->results as $sub){
         
	   	echo'<option name="sub_cat"  id="subcat" value="'.$sub->cat_id.'" selected>'.$sub->cat_name.'</option>';
		 
         } 
         }                                 ?>
											</select>
										</div>
									</div>
                                    <?php 
                                    $folder ="../../assets/frontend/pages/img/products/";
                                    ?>
                                    <div class="form-group" style="margin-left: 30%;">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
												<img src="<?php echo $folder.$pro->pro_img; ?>" style="max-height: 142px;"/>
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
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<input name="update" type="submit" class="btn blue-steel"/>
										<button  type="reset" class="btn blue-steel">Cancel</button>
									</div>
								</div>
                                <?php }?>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div>
			
			
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
<script type="text/javascript" src="../../assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-markdown/lib/markdown.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
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

<!-- END PAGE LEVEL STYLES -->
<script>
jQuery(document).ready(function() {   
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init() // init quick sidebar
   FormValidation.init();
    ComponentsFormTools.init();
		});
</script>
<script>
$('#list-select').trigger('change');
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
