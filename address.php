<?php include_once "includes/header.php"; 

	$page="admin";
  session_start();
    if(isset($_SESSION['username'])){
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

      $token=md5(rand(1, 1000).time());
      setcookie("csrf", $token);
?>


<div class="wrapper">
  <?php
    include_once ('includes/sidebar.php');
    include_once ('includes/navbar.php');
  ?>
  <!-- .content -->
        <div class="content mt-3">
          <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title"><i class="fa fa-home"></i> Address (Eng & Mm)</strong>
                                
                                <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#address" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-home"></i> Create </button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 14px;">
                                    <thead>
                                        <tr>

                                            <th class="text-info">Company Name</th>
                                            <th class="text-info">Address</th>
                                            <th class="text-info">Phone</th>
                                            <th class="text-info">Email</th>
                                            <th class="text-center text-info" style="width: 100px;">Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $get=mysqli_query($conn, "SELECT * FROM address ");
                                          $result=mysqli_fetch_assoc($get);
                                          
                                        ?>
                                        <tr>

                                          <td class=""><?php echo $result['com_name']; ?></td>
                                          <td class=""><?php echo $result['address']; ?></td>
                                          <td><?php echo $result['phone']; ?></td>
                                          <td class=""><?php echo $result['email']; ?></td>
                                          <td class="text-center"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" style="border-radius:2px;box-shadow: 0 0 3px gray;"><i class="fa fa-edit"></i> Edit</button></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
          
    
        </div>
        <!-- .content -->
</div><!-- wrapper end -->
	
	
        
        



     
     
  
     
        <!-- Creat MM Modal-->
     <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">New Address </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="admin/address_add.php" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                      	 <div class="form-group">   
                                	<div class="input-group">
                                             	<div class="input-group-addon"><i class="fa fa-bookmark-o"></i></div>
                                            	<input type="text"  placeholder="Company Name" class="form-control" name="name"  autocomplete="off" required>
                                     	</div>
                        </div>
                        
                        <div class="form-group">   
                                	<div class="input-group">
                                             	<div class="input-group-addon"><i class="fa fa-home"></i></div>
                                            	<input type="text"  placeholder="Company Address" class="form-control" name="address"  autocomplete="off" required>
                                     	</div>
                        </div>
                        
                        <div class="form-group">   
                                	<div class="input-group">
                                             	<div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            	<input type="text"  placeholder="Phone Number" class="form-control" name="phone"  autocomplete="off" required>
                                     	</div>
                        </div>
                        
                        <div class="form-group">   
                                	<div class="input-group">
                                             	<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                            	<input type="email"  placeholder="Email" class="form-control" name="email"  autocomplete="off" required>
                                     	</div>
                        </div>
                    
                    </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Cancel</button>
                        <button name="save" class="btn btn-primary" style="border-radius: 5px;">Confirm</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
     <!-- Creat MM Modal-->
     
        <!-- Edit MM Modal-->
     <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Edit Address </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="admin/address_update.php?id=<?php echo $result['id']; ?>" method="post">
                      	 <div class="form-group">   
                                	<div class="input-group">
                                             	<div class="input-group-addon"><i class="fa fa-bookmark-o"></i></div>
                                            	<input type="text"  placeholder="Company Name" class="form-control" name="name"  autocomplete="off" required value="<?php echo $result['com_name']; ?>">
                                     	</div>
                        </div>
                        
                        <div class="form-group">   
                                	<div class="input-group">
                                             	<div class="input-group-addon"><i class="fa fa-home"></i></div>
                                            	<input type="text"  placeholder="Company Address" class="form-control" name="address"  autocomplete="off" required value="<?php echo $result['address']; ?>">
                                     	</div>
                        </div>
                        
                        <div class="form-group">   
                                	<div class="input-group">
                                             	<div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            	<input type="text"  placeholder="Phone Number" class="form-control" name="phone"  autocomplete="off" required value="<?php echo $result['phone']; ?>">
                                     	</div>
                        </div>
                        
                        <div class="form-group">   
                                	<div class="input-group">
                                             	<div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                            	<input type="email"  placeholder="Email" class="form-control" name="email"  autocomplete="off" required value="<?php echo $result['email']; ?>">
                                     	</div>
                        </div>
                    
                    </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Cancel</button>
                        <button name="update" class="btn btn-primary" style="border-radius: 5px;">Update</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
     <!-- Edit MM Modal-->

   <?php include_once "includes/footer.php"; ?>
