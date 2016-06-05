<?php

class InboxController extends AbstractController
{
    public $results;
    public $mnb;
    public function index(){
            
  $this->controller="inbox";
       $this->rend();   
    }
    
    public function add(){
        if (isset($_POST['ADD']))
        {
            Product::add();
            echo $_POST['name'];
            echo $_POST['list-select'];
            echo $_POST['list-target'];
            echo $_POST['price'];
            echo $_POST['quantity'];
            echo $_POST['describtion'];
            echo($_FILES['file']['name']);
            
        }else{
        $this->controller="addproduct";
        $this->results = Category::showAllCategory();
        $this->template->category=$this->results; 
        $this->rend(); 
        }
        }
      public function msg(){
        $msg_id= $_GET['msg_id'];
         global $db;
		$query = $db->prepare("UPDATE  `messages` SET  `status` =  '-1'
		                                                   
		                                                   WHERE  `msg_id` = '$msg_id'");
			$query->execute();	 
        global $db;
        $query = $db->prepare("SELECT * FROM messages
                               where msg_id = '".$msg_id."'");
				
		
			
			$query->execute();
			$data 			   = $query->fetchAll(PDO::FETCH_CLASS,'Message');
            $msg="";
            foreach($data as $msgs)
            {
               
               $msg .='
                 	<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Inbox Message  
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
                        <table id="user" class="table table-bordered table-striped">
					<tbody>
					<tr>
						<td style="width:5%">
							 Message From
						</td>
					
						<td style="width:35%">
							<span class="text-muted">
							'.$msgs->from_name.'</span>
						</td>
					</tr>
                    	<tr>
						<td style="width:5%">
							 Mail
						</td>
					
						<td style="width:35%">
							<span class="text-muted">
							'.$msgs->from_email.'</span>
						</td>
					</tr>
                    		
                    	<tr>
						<td style="width:5%">
							 Subject
						</td>
					
						<td style="width:35%">
							<span class="text-muted">
							'.$msgs->message_subject.'</span>
						</td>
					</tr>
                    	<tr>
						<td style="width:5%">
							 Message
						</td>
					
						<td style="width:35%">
							<span class="text-muted">
							'.$msgs->message.'</span>
						</td>
					</tr>
                    	<tr>
						<td style="width:5%">
							 sending_date
						</td>
					
						<td style="width:35%">
							<span class="text-muted">
							'.$msgs->sending_date.'</span>
						</td>
					</tr>
		
	
					</tbody>
					</table>
               ';
               echo $msg;
            }
        }
        
      public function update(){
        $this->controller="productupdate";
        echo $_GET['id'];
       $this->rend(); 
        }
        
         public function getSubCategory(){
       if(Category::showAllSubCategory($_GET['id']))
       {
       $this->results = Category::showAllSubCategory($_GET['id']);
       $this->template->subcategory=$this->results;
         foreach( $this->results as $sub){
	   	echo'<option  id="cat_id" value="'.$sub->cat_id.'">'.$sub->cat_name.'</option>';
		 }
         }else
         {
       echo'<option  id="cat_id" value="'.$sub->cat_id.'">No Sub Category </option>';
         }			  
        }
   
}