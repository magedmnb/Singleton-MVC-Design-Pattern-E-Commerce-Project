
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Inbox <small>user inbox</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
				
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Extra</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Inbox</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<div class="row inbox">
	<div class="col-md-2">
					<ul class="inbox-nav margin-bottom-10">
						<li class="compose-btn">
							<a href="#" id="compose" data-title="Compose" class="btn">
							<i class="fa fa-edit"></i> Compose </a>
						</li>
						<li class="inbox active">
							<a id="inbox" href="javascript:;" class="btn bluebgfull" data-title="Inbox">
							Inbox(<?php  global $db;
        $query = $db->prepare("SELECT count(msg_id) FROM Messages
                               ");

			
			$query->execute();
			$data 			   = $query->fetchColumn(0);echo $data; ?>) </a>
							<b></b>
						</li>
						<li class="sent">
							<a class="btn" href="javascript:;" data-title="Sent">
							Sent </a>
							<b></b>
						</li>
					
					</ul>
				</div>
                	<div class="col-md-10" id="inbox_control">
				
<table id="tb" class="table table-striped table-advance table-hover ">
<thead>
<tr >
	<th colspan="3" style="background-color:#364150;" class="blue-madison">
		<input type="checkbox" class="mail-checkbox mail-group-checkbox">
		<div class="btn-group">
			<a  class="btn btn-sm " href="#" data-toggle="dropdown">
			More <i class="fa fa-angle-down"></i>
			</a>
			<ul class="dropdown-menu">
			
				<li>
					<a href="#">
					<i class="fa fa-trash-o"></i> Delete </a>
				</li>
			</ul>
		</div>
	</th>
	<th class="pagination-control"style="background-color:#364150 ;" colspan="3">
		<span style="color: #E64D23;" class="pagination-info">
		1 - <?php  global $db;
        $query = $db->prepare("SELECT count(msg_id) FROM Messages
                               ");

			
			$query->execute();
			$data 			   = $query->fetchColumn(0);echo $data; ?> </span>
		<a class="btn btn-sm ">
		<i class="fa fa-angle-left"></i>
		</a>
		<a class="btn btn-sm ">
		<i class="fa fa-angle-right"></i>
		</a>
	</th>
</tr>
</thead>
<tbody>
	<?php
   
   
                   $x=1;
                                  global $db;
        $query = $db->prepare("SELECT * FROM Messages
                               where status = 0 or status=-1 ");
				
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Message');
            foreach($data as $msg) { 
                $id="#msg_id".$x;
                $idd="msg_id".$x;
                ?>
<tr id="row"  name="<?php echo $id; ?>" class="unread" data-messageid="1">
	<td class="inbox-small-cells">
		<input type="checkbox" class="mail-checkbox">
        <input type="hidden"  id="<?php echo $idd; ?>" value="<?php echo $msg->msg_id; ?>"/>
	</td>
	<td class="view-message hidden-xs">
		<?php echo $msg->from_name ;?>
	</td>
	<td class="view-message ">
	<?php echo $msg->from_email ;?>
	</td>
	<td class="view-message text-right">
		<?php echo $msg->sending_date ; ?>
	</td>
</tr>
 <?php $x++; } ?>
</tbody>
</table>
			
     	<!-- END inbox -->
        <!-- -->
        
        	<div class="portlet box gry" id="content" style="display: none;">
      
        </div>
       <!-- -->
        <!-- begin compose -->

<form class="inbox-compose form-horizontal" id="fileupload" style="display: none; "action="#" method="POST" enctype="multipart/form-data">
	<div class="inbox-compose-btn">
		<button class="btn "><i class="fa fa-check"></i>Send</button>
		<button class="btn inbox-discard-btn">Discard</button>
	
	</div>
	<div class="inbox-form-group mail-to">
		<label class="control-label">To:</label>
		<div class="controls controls-to">
			<input type="text" class="form-control" name="to"/>
		</div>
	</div>
	<div class="inbox-form-group input-cc display-hide">
		<a href="javascript:;" class="close">
		</a>
		<label class="control-label">Cc:</label>
		<div class="controls controls-cc">
			<input type="text" name="cc" class="form-control">
		</div>
	</div>
	<div class="inbox-form-group input-bcc display-hide">
		<a href="javascript:;" class="close">
		</a>
		<label class="control-label">Bcc:</label>
		<div class="controls controls-bcc">
			<input type="text" name="bcc" class="form-control">
		</div>
	</div>
	<div class="inbox-form-group">
		<label class="control-label">Subject:</label>
		<div class="controls">
			<input type="text" class="form-control" name="subject">
		</div>
	</div>
	<div class="inbox-form-group">
		<textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" rows="12"></textarea>
	</div>


</form>					
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
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Index.initIntro();
   Tasks.initDashboardWidget();
});
</script>
<script>
$(function() {
$(document).on('click', '#row', function() {
    var ele_id = $(this).attr("name");
   var msg_id = $(ele_id).attr("value");
    $.ajax({
   type: "GET",
   url: "msg",
   data:{msg_id: msg_id},
   success: function(msg)
   { 
    $('#content').empty();
    $('#content').html(msg);
   }
   });
     $('#fileupload').hide();
     $('#tb').hide();
     $('#content').show();
});
});
</script>

    <script type="text/javascript">
$(function() {
$(document).on('click', '#inbox', function() {
    $('#fileupload').hide();
    $('#content').hide();
$('#tb').show();
});
});
</script>
    <script type="text/javascript">
$(function() {
$(document).on('click', '#compose', function() {
$('#tb').hide();
 $('#content').hide();
$('#fileupload').show();
});
});
</script>
<style>
#content
{
    
}
</style>
<!-- END JAVASCRIPTS -->
	