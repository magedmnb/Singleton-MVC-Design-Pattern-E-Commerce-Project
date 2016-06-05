
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Orders <small>managed Order view</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Orders</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">WebSite Order View</a>
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
								<i class="fa fa-globe"></i>Order Table
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
  

  
    
 
				
                            
                            <div class="container">
    <div  class="heading">
         <div class="col">Order Id</div>
         <div class="col">User Name</div>
		 <div class="col">Order Total Quantity </div>
         <div class="col">Order Total Price  </div>
         <div class="col">Transaction ID </div>
         <div class="col">Order Date </div>
    </div>
                   <?php 
                            foreach($orders as $order){
                             ?> 
                                  
	<div data-toggle="collapse" data-target="#<?php echo  $order->order_id;?>" class="accordion-toggle table-row  accordion-heading">
         <div class="col"><?php echo $order->order_id;?></div>
         <?php $user =Users::selectUserById($order->user_id); ?>
          <div class="col"><?php echo $user['user_name'];?></div>
	     <div class="col"><?php echo $order->total_quantity;?></div>
         <div class="col">	<?php echo $order->total_price;?></div>
         <div class="col"><?php echo $order->transaction_id;?></div>
         <div class="col"><?php echo $order->order_date;?></div>
         
    </div>
    	<div class="accordion-body   collapse " id="<?php echo $order->order_id;?>">
                           
     <?php $productorder = Cart::selectOrder($order->order_id);
                            foreach($productorder as $proorder)
                            {
                             ?>
                             <div class="container">
                 <div  class="heading1">           
	     <div class="col">Product Name</div>
         <div class="col">Product Quantity</div>
         <div class="col">Product Price</div>
         <div class="col">Total Price</div>

         </div>
         	<div  class=" table-row1 ">
            <?php $Product_name=Product::selectProductId($proorder->product_id);
           ?>
         <div class="col"><?php echo $Product_name['pro_name'];?></div>
	     <div class="col"><?php echo $proorder->product_quantity;?></div>
         <div class="col">	<?php echo $proorder->product_price;?></div>
         <div class="col"><?php echo $proorder->product_quantity*$proorder->product_price;?></div>
       
        
    </div>
    </div>
         
                            <?php } echo " </div>"; ?>

    <?php } ?>

</div>
						
						
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
$(".delbutton").click(function(){
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
   window.location = "admin";
   }
   });        
   }
return false;
});
});
</script>
<style type="text/css">
*{ padding:0px; 
   margin:0px; }
.accordion-heading { background-color:white; color: black; }

.accordion-heading:hover { background-color:#4b77be; color:white;
  -webkit-transition: all 0.5s ease-in-out;
     -moz-transition: all 0.5s ease-in-out;
       -o-transition: all 0.5s ease-in-out;
          transition: all 0.5s ease-in-out; }
          
.accordion-heading  { color:black; 
border-collapse: collapse;
   text-decoration:none; 
   text-transform:uppercase; }
   .container{
    display:table;
    width:90%;
    height:100%;
    border-collapse: collapse;
    }
 .heading{
     font-weight: bold;
     display:table-row;
     background-color:#E64D23;
     text-align: center;
     line-height: 25px;
     font-size: 14px;
     font-family:georgia;
     color:#fff;
     
 }
  .heading1{
     font-weight: bold;
     display:table-row;
     background-color:#3f4b5a;
     text-align: center;
     line-height: 25px;
     font-size: 14px;
     font-family:georgia;
     color:#fff;
     
 }
 .table-row{  
     display:table-row;
     text-align: center;
     height:30px;
     border: 2px solid white;
     border-bottom: 2px solid grey;
 }
  .table-row1{  
     display:table-row;
     text-align: center;
     height:30px;
     border: 2px solid #E64D23;
 }
 .col{ 
	display:table-cell;
    padding: 10px;
 	
 }
</style>

          