<?php 
    include_once "includes/header.php";

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

      $token = md5(rand(1, 1000).time());
      setcookie("csrf", $token);
?>

<div class="wrapper">
    <?php
        include_once('includes/sidebar.php');
        include_once('includes/navbar.php');
    ?>
    <!-- .content -->
        <div class="content mt-3 text-monospace">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title text-info"> Letter Foot</strong>
                                <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#mediumModal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-plus-circle"></i> Create</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 40px;">No</th>
                                            <th class="text-info"> Letter Foot</th>
                                            <th class="text-center text-info" style="width: 100px;">Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        $get_logo=mysqli_query($conn,"SELECT * FROM letter_foot ");
                                        while($result_logo=mysqli_fetch_assoc($get_logo)){
                                            $row_logo=mysqli_num_rows($get_logo);
                    ?>
                    <tr>
                        <td class="text-right align-middle" style="width: 40px;"><?php $no<$row_logo; echo $no++; ?></td>
                        <td class=""><img src="admin/letter_foot/<?php echo $result_logo['foot_image']; ?> " style="height: 80px;" /></td>
                        <td class="text-center align-middle" style="width: 117px;"><button class="btn btn-danger btn-sm" id="draft<?php echo $result_logo['id']; ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-minus-circle"></i> Delete</button></td>
                    </tr>
                    
                    <script>
                           $('#draft<?php echo $result_logo['id']; ?>').on('click', (e) => {
                           Swal.fire({
                                 title: 'ပယ်ဖျက်ပါမည်။?',
                                  text: 'အချက်အလက်များကို ပယ်ဖျက်လိုက်ပါက ဆုံးရှုံးမှုရှိနိုင်ပါသည်။!',
                                    type: 'warning',
                                        showCancelButton: true,
                                          confirmButtonText: ' <a href="admin/letter_foot_del.php?id=<?php echo $result_logo['id']; ?>" class="text-white">သေချာသည်။</a>',
                                                            cancelButtonText: 'မသေချာသေးပါ။'
                                                        });
                                                });
                                                </script>
                    
                    <?php   
                    }
                                        ?>
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

	
	
        
        


    
    <!-- Creat Modal-->
     <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">New Letter Foot</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="admin/letter_foot_add.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="token" value="<?= $token ?>">
                      	 <div class="form-group">   
                                	<div class="input-group">
                                             	<label for="image" class="form-control col-1 text-center">
                                                  <i class="fa fa-upload"></i>  
                                                </label>
                                            	<input type="file" class="form-control" name="image"  autocomplete="off" required accept="image/*">
                                     	</div>
                        </div>
                    
                    </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="save" class="btn btn-primary" style="border-radius: 5px;">
                        <i class="fa fa-check"></i> Confirm</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
    <!-- Creat Modal-->

   <?php include_once "includes/footer.php"; ?>
