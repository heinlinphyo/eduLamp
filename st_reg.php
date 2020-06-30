<?php
	include_once "includes/header.php";
	$page = "fo";
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
 
		$page = "fo";

		$token = md5(rand(1, 1000).time());
		setcookie("csrf", $token);

		// get student new id //
		$get_id=mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC LIMIT 1");
    	$result_id=mysqli_fetch_assoc($get_id);
    	$get_st_id=$result_id['id'];
    	$result_st_id=$result_id['st_id'];

    	$to_year=date('Y');
    	$to_month=date('m');

    	if($get_st_id==""){
		$st_id="S".date('Y').date('m')."1";
	}
  	elseif(stristr($result_st_id, $to_month) === FALSE) {
    		$st_id="S".date('Y').date('m')."1";
  	}
  	elseif(stristr($result_st_id,$to_year) === FALSE ){
		$st_id="S".date('Y').date('m')."1";
	}
  	else{
  		$remove_m=substr($result_st_id,7);
  		$remove_m=$remove_m+1;
		$st_id="S".date('Y').date('m').$remove_m;
	}

?>
<div class="wrapper"><!-- wrapper begin -->
	<?php
		include_once "includes/sidebar.php";
		include_once "includes/navbar.php";
	?>
  <div class="content">
      <div class="container">
          <div class="card"><!-- card begin -->
              <div class="card-header"><!-- card header begin -->
                   <strong><i class="fa fa-registered"></i> Student Registration</strong> 
              </div><!-- card header end -->
              <div class="card-body"><!-- card body begin -->
                  <form action="fo/st_reg.php?st_id=<?php echo $st_id ?>" method="post" enctype="multipart/form-data">
                  	<input type="hidden" name="token" value="<?= $token ?>">
										<div class="row">

											<div class="form-group col-6">
													<div class="input-group">
															<input type="text" name="st_id" id="st_id" atuocomplete="off" class="form-control text-success" disabled value="<?php echo $st_id; ?>">
													</div>
											</div>

											<div class="form-group col-6">
													<div class="input-group">
															<label for="father_name" class="form-control col-2 text-center text-success">
																<i class="fa fa-user"></i> 
															</label>
															<input type="text" name="father_name" id="father_name" required autocomplete="off" class="form-control" placeholder=" Father Name" style="text-transform: uppercase;">
													</div>
											</div>

											<div class="form-group col-6">
													<div class="input-group">
														<label for="st_name" class="form-control col-2 text-center text-success">
															<i class="fa fa-user"></i>
														</label>
															<input type="text" name="st_name" id="st_name" required autocomplete="off" class="form-control" placeholder=" Full Name" style="text-transform:uppercase;">
													</div>
											</div>

											<div class="form-group col-6">
													<div class="input-group">
														<label for="nrc" class="form-control col-2 text-success text-center"><i class="fa fa-id-card"></i></label>
															<input type="text" name="nrc" id="nrc"  class="form-control" placeholder="00/dddddd(N)00000" autocomplete="off" style="text-transform: uppercase;" required>
													</div>
											</div>

											<div class="form-group col-6">
													<div class="input-group">
														<label for="grades" class="form-control col-2 text-center text-success">
															<i class="fa fa-crown"></i>
														</label>
														<select class="form-control" name="grades" id="grades" required autocomplete="off">
																<option value="">Select Grade</option>
																<?php
																	$grade_sql = mysqli_query($conn, "SELECT * FROM grades");
																	while ($row = mysqli_fetch_assoc($grade_sql)):
																?>
																<option value="<?php echo $row['id'] ?>">
																	<?php echo $row['grade_name'] ?>
																</option>
															<?php endwhile; ?>
														</select>
													</div>
											</div>


											<div class="form-group col-6">
													<div class="input-group">
														<label for="mother_name" class="form-control col-2 text-center text-success"><i class="fa fa-user"></i></label>
															<input type="text" name="mother_name" id="mother_name" required autocomplete="off" class="form-control" placeholder=" Mother Name" style="text-transform: uppercase;">
													</div>
											</div>

											<div class="form-group col-6">
													<div class="input-group">
															<label for="age" class="form-control col-2 text-center text-success"><i class="fa fa-calendar"></i></label>
															<input type="text" name="age" id="age" required autocomplete="off" class="form-control" placeholder="DateOfBirth(eg.dd-mm-yyyy)">
													</div>
											</div>

											<div class="form-group col-6">
													<div class="input-group">
														<label for="phone" class="form-control col-2 text-success text-center"><i class="fa fa-phone"></i></label>
															<input type="text" name="phone" id="phone" required autocomplete="off" class="form-control" placeholder="0900000000 ">
													</div>
											</div>

											<div class="form-group col-6">
													<div class="input-group">
														<label for="gender" class="form-control col-2 text-center text-success">
															<i class="fa fa-venus-mars"></i>
														</label>
															<select class="form-control" name="gender" required>
																	<option value="">Select Gender</option>
																	<option value="Male"> Male </option>
																	<option value="Female"> Female </option>
															</select>
													</div>
											</div>


											<div class="form-group col-6">
													<div class="input-group">
														<label for="address" class="form-control col-2 text-success text-center"><i class="fa fa-home"></i></label>
															<input type="text" name="address" id="address" required autocomplete="off" class="form-control" placeholder=" Address ">

													</div>
											</div>
											<div class="form-group col-6">
													<div class="input-group">
														<label for="photo" class="form-control col-2 text-center text-success">
															<i class="fa fa-image"></i>
														</label>
															<input type="file" name="photo" id="photo" autocomplete="off" class="form-control">
													</div>
											</div>
											<div class=" form-group text-center col-12">
													<button name="reg" class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-th-large"></i> Submit</button>
											</div>
										</div>

                  </form><!-- form end -->
              </div><!-- card body end -->
          </div><!-- card end -->
      </div>
  </div>




</div><!-- wrapper end -->

<?php include_once "includes/footer.php" ?>
