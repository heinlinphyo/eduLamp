<?php
    include_once "includes/header.php";
    $page = "admin";
    session_start();
    if(isset($_SESSION['username'] )){
        $user=$_SESSION['username'];
        
    } 
    else{
        $user="";
        
    }
    if($user){
        
    }
    else{
        header("location:logout.php");
    }
?> 

<div class="wrapper text-monospace">
    <?php
   include_once "includes/sidebar.php";
   include_once "includes/navbar.php";
  ?>
    <!-- .content -->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title"><i class="fa fa-lock"></i> Permission</strong>
                               
                            </div>
                            <div class="card-body" id="user_data">
                                    
                            </div>
                            
                            
                            
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
            
    
        </div>
        <!-- .content -->
</div><!-- wrapper end -->
	
 
    <script>  
			$(document).ready(function(){  
    				function fetch_data() {  
        					$.ajax({  
            						url:"admin/permission_fetch.php",  
            						method:"POST",  
            						success:function(data){  
							$('#user_data').html(data);  
            					}	  
        				});  
    				}  
    			fetch_data();  
    			
    			
    
    			$(document).on('click', '#check', function(){ 
 				var id=$(this).data("id1"); 
 					$.ajax({ 
 						url:"admin/permission_allow.php", 
 						method:"POST", 
 						data:{id:id}, 
 						dataType:"text", 
 						success:function(data){ 
 							fetch_data();  
                				}  
           				 });  
           		 });  
           		 
           		 $(document).on('click', '#uncheck', function(){ 
 				var id=$(this).data("id2"); 

 					$.ajax({ 
 						url:"admin/permission_deny.php", 
 						method:"POST", 
 						data:{id:id}, 
 						dataType:"text", 
 						success:function(data){ 
 							fetch_data();  
                				}  
           				 });  
           		 });  
           		 
           		 
    		});  

</script>	
    
    

   <?php include_once "includes/footer.php"; ?>
