<style>
.btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active  {
color: #fff !important;
background: #E84D1C !important;
border-color: #E84D1C;
}
.product-item.add2cart {
float: right;
color: #a8aeb3;
border: 1px #ededed solid;

}
</style>
  <div class="main">
      <div class="container">
    <input type="hidden" id="product_id" value="<?php echo $_GET['cat_id'];?>"/>
    <input type="hidden" id="sub_id" value="<?php echo $_GET['sub_id'];?>"/>
        <ul class="breadcrumb" style="font-size: 20px;">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active" style="color: #F54E30;"><?php echo $cat['cat_name']; ?> <span style="color: #5F6D7B;">category</span></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
                  <ul class="list-group margin-bottom-25 sidebar-menu">
               <?php foreach($categorys as $category){
                    if($category->cat_name==$cat['cat_name'])
                    {?>
                    <li style="color: #F54E30;" class="list-group-item dropdown clearfix  open active" > 
                 <?php       
                    }else{ ?>
                    <li class="list-group-item clearfix dropdown " > 
                   <?php     
                    }
                ?>
              
                <a href="#" style="font-size: 20px;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="3000" data-close-others="true">
                  <i class="fa fa-angle-right"></i>
                  <?php echo $category->cat_name; ?>
                  
                </a>
                <ul class="dropdown-menu" id="mnb" role="menu">
                <?php $subcategory = Category::showAllSubCategory($category->cat_id);
                foreach($subcategory as $sub)
                {
                    if($sub->cat_id == $_GET['sub_id'])
                    { ?>
        <li class="active open" ><a  style="color: #F54E30;" href="<?php echo HOST_NAME ?>product/shoplist?cat_id=<?php echo $category->cat_id; ?>&sub_id=<?php echo $sub->cat_id; ?>">
        <i class="fa fa-angle-right"></i> <?php echo $sub->cat_name; ?></a></li>             
                    <?php }else {
                   ?>    
                  <li><a href="<?php echo HOST_NAME ?>product/shoplist?cat_id=<?php echo $category->cat_id; ?>&sub_id=<?php echo $sub->cat_id; ?>"><i class="fa fa-angle-right"></i> <?php echo $sub->cat_name; ?></a></li>
                <?php } }?>
                </ul>
                
              </li>
              
              <?php } ?>
              
    
              
             </ul>

            <div class="sidebar-filter margin-bottom-25">
              <h2>Filter</h2>
             <h3>Price</h3>
              <p>
                <label for="amount">Range:</label>
               <input type="text" id="amount" name="amount" style="border:0; color:#f6931f; font-weight:bold;"/>
    
    <div id="slider-range" style="width:80%;"></div>
            </div>
            <div id="response"></div>

            <div class="sidebar-products clearfix">
              <h2>Bestsellers</h2>
              <div class="item">
                <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                <div class="price">$31.00</div>
              </div>
              <div class="item">
                <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                <div class="price">$23.00</div>
              </div>
              <div class="item">
                <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                <div class="price">$86.00</div>
              </div>
            </div>
          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="#"><i class="fa fa-th-large"></i></a>
                <a href="#"><i class="fa fa-th-list"></i></a>
              </div>
              <div class="col-md-10 col-sm-10">
                <div class="pull-right">
                  <label class="control-label">Show:</label>
                  <select class="form-control perpage input-sm">
                    <option class="perpage" value="6" selected="selected">6</option>
                    <option class="perpage" value="12">12</option>
                    <option class="perpage" value="24">24</option>
                    <option class="perpage" value="48">48</option>
                    <option class="perpage" value="60">60</option>
                  </select>
                </div>
                <div class="pull-right">
                  <label class="control-label">Sort&nbsp;By:</label>
                  <select id="" class="form-control input-sm sort">
                    <option value="d"  selected="selected">Default</option>
                    <option value="a">Name (A - Z)</option>
                    <option value="A">Name (Z - A)</option>
                    <option value="low">Price (Low &gt; High)</option>
                    <option value="high">Price (High &gt; Low)</option>

                  </select>
                </div>
                 <div class="pull-right">
                  <label class="control-label">Sort&nbsp;By:</label>
                  <select id="" class="form-control input-sm sort_item">
                    <option value="feature"  selected="selected">Featured</option>
                    <option value="new">New</option>
                    <option value="sale">Sale</option>
            

                  </select>
                </div>
              </div>
            </div>
            <!-- BEGIN PRODUCT LIST -->
            
             <div id="loading" style="margin-left: 35%;"></div>
        <div  class="row product-list " id="container">
            <div class="data"></div>
                        
             
        
            <!-- END PRODUCT LIST -->
            <!-- BEGIN PAGINATOR -->
       
            <!-- END PAGINATOR -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    
     <script type="text/javascript">
     window.onload = function(){
        
             
              $(document).on('change', '.sort_item', function() {
                     var perpage = $('.perpage').attr("value");
                     
                      var sort_item = $('.sort_item').attr("value"); 
                          
                function loading_show(){
                    $('#loading').html("<img src='http://www.e-commerce.com/public/loading.gif'/>").fadeIn('fast');
                    
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }                
                function loadData(page){
                    loading_show();  
                     var id =$('#product_id').attr("value");  
                      var sub_id =$('#sub_id').attr("value");                   
                    $.ajax
                    ({
                        type: 'post',
                        url: 'ajax',
                        data: {page: page, perpage: perpage,cat_id:id,sub_id:sub_id,sort_item:sort_item},
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $("#container").html(msg);
                            });
                        }
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           
                $('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
                    }else{
                        alert('Enter a PAGE between 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                    
                });

                    }); 
             
              $(document).on('change', '.sort', function() {
                     var perpage = $('.perpage').attr("value");
                      var sort = $('.sort').attr("value"); 
                
                          
                function loading_show(){
                    $('#loading').html("<img src='http://www.e-commerce.com/public/loading.gif'/>").fadeIn('fast');
                    
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }                
                function loadData(page){
                    loading_show();  
                     var id =$('#product_id').attr("value");  
                      var sub_id =$('#sub_id').attr("value");                   
                    $.ajax
                    ({
                        type: 'post',
                        url: 'ajax',
                        data: {page: page, perpage: perpage,cat_id:id,sort:sort,sub_id:sub_id},
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $("#container").html(msg);
                            });
                        }
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           
                $('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
                    }else{
                        alert('Enter a PAGE between 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                    
                });

                    });   
     $(document).on('change', '.perpage', function() {
                     var perpage = $('.perpage').attr("value"); 
                          
                function loading_show(){
                    $('#loading').html("<img src='http://www.e-commerce.com/public/loading.gif'/>").fadeIn('fast');
                    
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }                
                function loadData(page){
                    loading_show();   
                     var id =$('#product_id').attr("value"); 
                      var sub_id =$('#sub_id').attr("value");  
                      
                                       
                    $.ajax
                    ({
                        type: 'post',
                        url: 'ajax',
                        data: {page: page, perpage: perpage,cat_id:id,sub_id:sub_id},
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $("#container").html(msg);
                            });
                        }
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           
                $('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
                    }else{
                        alert('Enter a PAGE between 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                    
                });

                    });
                    
           
                 
                    
                function loading_show(){
                    $('#loading').html("<img src='http://www.e-commerce.com/public/loading.gif'/>").fadeIn('fast');
                    
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }                
                function loadData(page){
                    loading_show(); 
                     var id =$('#product_id').attr("value");  
                        var sub_id =$('#sub_id').attr("value");                             
                    $.ajax
                    ({
                        type: 'post',
                        url: 'ajax',
                        data: {page: page,cat_id:id,sub_id:sub_id},
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $("#container").html(msg);
                            });
                        }
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                    
                });           
                $('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
                    }else{
                        alert('Enter a PAGE between 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                    
                });
            };
        </script>
         
