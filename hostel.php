<?php include_once "includes/header.php"; 

	$page="learn";

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

?>
<div class="wrapper">
  <?php
    include_once('includes/sidebar.php');
    include_once('includes/navbar.php');
  ?>
  <!-- .content -->
        <div class="content mt-3">
          
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title"><i class="fa fa-home"></i> Hostel Check</strong>
                                <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#mediumModal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-plus-circle"></i> Create</button>
                                <a href="hostel_report.php"><button class="btn btn-primary btn-sm ml-2" style="height: 38px;border-radius:2px;box-shadow: 0 0 3px gray;"><i class="fa fa-file"></i> Reports</button></a>
                            </div>

                            <div class="card-body row" id="hostel_data">
                              <?php
                                $sql=mysqli_query($conn, "SELECT * FROM hostel");
                                while($row=mysqli_fetch_assoc($sql)){

                                  $hostel_name=$row['hostel_name'];
      
                                  $get_record=mysqli_query($conn,"SELECT * FROM hostel_record WHERE h_name='$hostel_name' AND status='1' ");
                                  $result_record=mysqli_fetch_assoc($get_record);
                                  $st_name=$result_record['st_name'];

                                  // to get grade id //
                                  $sql_st=mysqli_query($conn, "SELECT * FROM students WHERE st_name='$st_name' AND status='' ");
                                  $get_g_id=mysqli_fetch_assoc($sql_st);
                                  $grade_id=$get_g_id['grade_id'];
                                  // to get grade name //
                                  $sql_grade=mysqli_query($conn, "SELECT * FROM grades WHERE id='$grade_id' ");
                                  $get_g_name=mysqli_fetch_assoc($sql_grade);
                                  $grade_name=$get_g_name['grade_name'];

                              ?>
                              <?php 
                                if($row['status']==''){
                               ?>   
                                  <div class="col-sm-2 " style="margin-bottom: 5px;">
                                      <div class="card">
                                        <div class="card-header text-center bg-info text-white">
                                            <?php echo $row['hostel_name'] ?>
                                          </div>
                                          
                                          <div class="card-body text-center">
                                            <p style="font-size:12px;">No Record</p>
                                          </div>
                                          <div class="card-footer text-center">
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#check<?php echo $row['hostel_name']?>"  style="border-radius:2px;box-shadow:0 0 3px gray;"><i class="far fa-check-circle"></i> Check In</button>
                                          </div>
                                      </div>
                                </div><!-- col sm 2 end -->
                              <?php  
                                }else{

                               ?>   
                                 <div class="col-sm-2 " style="margin-bottom: 5px;">
                                    <div class="card">
                                          <div class="card-header text-center text-white " style="background:#DB1421;">
                                              <?php echo $row['hostel_name'] ?>
                                            </div>
                                            <div class="card-body text-center">
                                              <p style="font-size:11px;"><?php echo $st_name; ?></p>
                                              <small style="font-size: 10px;"><?php echo $grade_name; ?></small>
                                            </div>
                                            <div class="card-footer text-center">
                                              <button class="btn btn-danger btn-sm" id="un_check"  data-id1="<?php echo $row['hostel_name']?>"  style="border-radius:2px;box-shadow:0 0 3px gray;width:110px;"><i class="fa fa-times-circle"></i> Check Out</button>
                                            </div>
                                        </div>
                               </div>
                              <?php 
                                }
                              ?>
                             

<!-- check in modal -->
 <div class="modal fade" id="check<?php echo $row['hostel_name'] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel"> Hostel Registration(<?php echo $row['hostel_name']?> )</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                        <form action="learn/hostel_check_in.php?hostel_name=<?php echo $row['hostel_name'] ?>" method="post">
                          <div class="form-group">   
                                  <div class="input-group">
                                     <label for="st_id" class="form-control col-1"><i class="fa fa-location-arrow"></i></label>
                                      <input list="st_id" name="st_id"  class="form-control" autocomplete="off" placeholder="Select Student ID" required autofocus>
                                        <datalist id="st_id">
                                              <option value="">Select Student</option>
                                              <?php
                                                $get_st=mysqli_query($conn,"SELECT * FROM students order by id desc");
                                                while($result_st=mysqli_fetch_assoc($get_st)){
                                                  $grade_id=$result_st['grade_id'];
                                                  $get_name=mysqli_query($conn, "SELECT * FROM grades WHERE id='$grade_id' ");
                                                  $grade_name=mysqli_fetch_assoc($get_name);

                                               ?>                                                   
                                              <option value="<?php echo $result_st['st_id']?>">
                                                <?php echo $result_st['st_name'] ?> / <?php echo $grade_name['grade_name']; ?>
                                              </option>                                    
                                                <?php } ?>
                                      </datalist>
                                      </div>
                              </div>

                        
                    </div><!-- modal body end -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="save" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-check"></i> Confirm</button>
                     </div>   
                   
                    </form>
            </div>
        </div>
</div><!-- check in modal end -->


                              <?php } ?>
                            </div><!-- card body end -->
                            
                             
                            
                        </div>
                    </div>


                </div>
       
          
    
        </div>
        <!-- .content -->
        
</div><!-- wrapper end -->
	
        
  
    
<script>  
			
    		$(document).on('click', '#un_check', function(){ 
 				var hostel_name=$(this).data("id1"); 
 						
 							Swal.fire({
  									title: 'သတိပေးချက်',
  									text: 'ကျောင်းသားမှအခန်းဝန်ဆောင်မှုရပ်နားလိုပါသလား။',
  									type: 'warning',
  									showCancelButton: true,
  									confirmButtonText: '<a href="learn/hostel_check_out.php?hostel_name='+hostel_name+' " class="text-white" >ရပ်နားမည်။</a>',
  									cancelButtonText: 'မပြုလုပ်သေးပါ။'
							});
 						
           		 });  

</script>	

    
    <!-- Creat Modal-->
     <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">New Hostal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="learn/hostel_new.php" method="post">
                      	 <div class="form-group">   
                                	<div class="input-group">
                                             <label for="hostel" class="form-control col-1"><i class="fa fa-location-arrow"></i></label>
                                            	<input type="text" placeholder="Hostel No" minlength="1" class="form-control" name="hostel" autocomplete="off" required>
                                     	</div>
                        </div>
                    
                    </div>
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="save" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-check"></i> Confirm</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
    <!-- Creat Modal-->
    
    
    

   <?php include_once "includes/footer.php"; ?>
