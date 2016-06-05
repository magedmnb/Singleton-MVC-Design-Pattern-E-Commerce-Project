
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Edit Account Page</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
              <h1>My Account Page</h1>
            <div class="content-page">
              <h3>My Account</h3>
                <ul>
                <li><a href="<?php echo HOST_NAME; ?>index/editaccount">Edit  account </a></li>
                <li><a  href="<?php echo HOST_NAME ;?>index/changepass">Change  password</a></li>
                <li><a style="color: red;" href="<?php echo HOST_NAME ;?>index/contact">Contact  Us</a></li>
              </ul>
              <hr>

              <h3>My Orders</h3>
              <ul>
                <li><a href="<?php echo HOST_NAME ;?>index/vieworder">View  orders </a></li>
                <li><a href="<?php echo HOST_NAME ;?>index/viewtransaction">Your Transactions</a></li>
              </ul>
            </div>
          </div>
          <!-- END SIDEBAR -->
          

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7" >
				    <form action="<?php echo HOST_NAME; ?>index/contact" method="POST" enctype="multipart/form-data">
                   <div class="form-body" > 
    <input value="submit" type="hidden"> 
     <div class="form-group">
    Your name:<br>
    <input class="form-control"  name="name" size="30" type="text"><br>
    </div>
     <div class="form-group">
     Your email:<br>
    
    <input class="form-control"  name="mail" size="30" type="text"><br>
    </div>  message subject:<br>
       <input class="form-control"  name="sub" size="30" type="text"><br> Your message:<br>
    <textarea class="form-control"  name="msg" rows="7" cols="30">
    </textarea><br>
    <input   value="Send email" class="btn orang pull-right " style="margin-left: 80px;" name="add" type="submit">
    </div>
    </form>
                </div>
                <div class="col-md-4 col-sm-4 pull-right">
                  <div class="form-info">
                    
                  
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
$('#cartw').empty();
};
</script>