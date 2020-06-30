<?php
  include_once "includes/header.php";
  $page = "fo";
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
<?php

      $grade_id = mysqli_real_escape_string($conn, $_GET['id']); // POST from row.php //

      $get_fees= mysqli_query($conn, "SELECT * FROM fees WHERE g_id = '$grade_id' ");// get fees amount //
      $fees_data = mysqli_fetch_assoc($get_fees);

      // get voucher id begin //
    	$get_id=mysqli_query($conn, "SELECT * FROM fees_collect ORDER BY id DESC LIMIT 1");
    	$result_id=mysqli_fetch_assoc($get_id);
    	$get_fees_id=$result_id['id'];
    	$result_fees_id=$result_id['fees_id'];

    	$to_year=date('Y');
    	$to_month=date('m');

    	if($get_fees_id==""){
		$fees_id="V".date('Y').date('m')."1";
	}
  	elseif(stristr($result_fees_id, $to_month) === FALSE) {
    		$fees_id="V".date('Y').date('m')."1";
  	}
  	elseif(stristr($result_fees_id,$to_year) === FALSE ){
		$fees_id="V".date('Y').date('m')."1";
	}
  	else{
  		$remove_m=substr($result_fees_id,7);
  		$remove_m=$remove_m+1;
		$fees_id = "V".date('Y').date('m').$remove_m;
	}
// voucher id end //

  if($grade_id == '1'){
    $sql_st = mysqli_query($conn, "SELECT * FROM KG ");
  }elseif($grade_id == '2'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_1 ");
  }elseif($grade_id == '3'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_2 ");
  }elseif($grade_id == '4'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_3 ");
  }elseif($grade_id == '5'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_4 ");
  }elseif($grade_id == '6'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_5 ");
  }elseif($grade_id == '7'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_6 ");
  }elseif($grade_id == '8'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_7 ");
  }elseif($grade_id == '9'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_8 ");
  }elseif($grade_id == '10'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_9 ");
  }elseif($grade_id == '11'){
    $sql_st = mysqli_query($conn, "SELECT * FROM G_10 ");
  }

  // give token //
  $token = md5(rand(1, 1000).time());
  setcookie("csrf", $token);

?>

<div class="wrapper"><!-- wrapper begin -->
	<?php
		include_once "includes/sidebar.php";
    include_once "includes/navbar.php";
	?>

  <div class="content">
    <div class="container">
      <div class="card">
        <div class="card-header row ml-1 mr-1" >
           <strong> Fees Registration For <?php echo $fees_data['fee_name'] ?> </strong>
            <a href="rows.php" class="ml-auto"><button class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;">
              <i class="fa fa-arrow-left"></i> Back</button>
            </a>
        </div>
          <div class="card-body">

            <form class="" action="fees_confirm.php?fees_id=<?php echo $fees_id; ?>" method="post">

              <input type="hidden" name="token" value="<?= $token ?>">

              <input type="hidden"  name="grade_id" id="grade_id" value="<?php echo $grade_id ?>">
              
              <input type="hidden" name="grade_name" id="grade_name" value="<?php echo $fees_data['fee_name'] ?>">
               

              <div class="form-group">
                <div class="input-group">
                  <label for="fees_id" class="form-control bg-success text-white col-2 text-center">Invoice No</label>
                  <input type="text" name="fees_id" class="form-control" readonly value="<?php echo $fees_id ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <label for="year" class="form-control bg-success text-white col-2 text-center">Year</label>
                  <select class="form-control" name="year" required>
                    <option value="">Select Year</option>
                   <?php
                      $s_year= date('Y') - 2;
                      $e_year= date('Y') + 2;
                      while($s_year<=$e_year){
                  ?>
                  <option value="<?php echo $s_year; ?>"><?php echo $s_year++; ?></option>
                  <?php   
                  }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <label for="month" class="form-control bg-success text-white col-2 text-center">Month</label>
                      <select class="form-control" name="month" required>
                        <option value="">Select Month</option>
                        <?php
                      for($m=1; $m<=12; ++$m){
                          $month=date('F', mktime(0, 0, 0, $m, 1));
                  ?>
                  <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                  <?php   
                    }
                    ?>
                      </select>
                     
                  </div>
              </div>

              

                <div class="form-group">
                  <div class="input-group">
                      <label for="st_id" class="form-control bg-success text-white col-2 text-center">Student</label>
                      <select class="form-control" name="st_id" required>
                        <option value="">Select Student</option>
                        <?php 
                          while($row = mysqli_fetch_assoc($sql_st)):
                        ?>
                        <option value="<?php echo $row['st_id'] ?>">
                           <?php echo $row['st_id'] ?> / <?php echo $row['st_name'] ?>
                        </option>
                      <?php endwhile; ?>
                      </select>
                      
                  </div>
              </div>

                <div class="form-group">
                <div class="input-group">
                 <label for="fee_amount" class="form-control bg-success text-white col-2 text-center">Fees(MMK)</label>
                  <input type="text" class="form-control text-success" id="fee_amount" name="fee_amount"value="<?php echo $fees_data['fee_amount']; ?>"  readonly>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <label for="hostel" class="form-control bg-success text-white col-2 text-center">Hostel</label>
                  <select class="form-control" name="hostel" id="hostel">
                    <option value="" id="hostel"> Select Hostel Type</option>
                    <?php
                      $sql=mysqli_query($conn, "SELECT * FROM hostel_fees ");
                      while($hostel=mysqli_fetch_assoc($sql)){
                    ?>
                    <option value="<?php echo $hostel['id'] ?>" id="hostel">
                      <?php echo $hostel['fees'] ?>/ <?php echo $hostel['grade_name'] ?>
                    </option>
                  <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <label for="deposit_amount" class="form-control bg-success text-white col-2 text-center">Deposit(MMK)</label>
                  <input type="text" name="deposit_amount" class="form-control text-success" id="deposit_amount" placeholder="0" >
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <label for="uniform_c" class="form-control bg-success text-white col-2 text-center">Uniform(MMK)</label>
                  <input type="text" name="uniform_c" class="form-control text-success" id="uniform_c" placeholder="0" >
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <label for="other_c" class="form-control bg-success text-white col-2 text-center">Other(MMK)</label>
                  <input type="text" name="other_c" class="form-control text-success" id="other_c" placeholder="0" >
                </div>
              </div>

              

              <div class="form-group text-center">
                  <button name="sub" class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-th-large"></i> Submit </button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>  <!-- wrapper end -->




<?php include_once "includes/footer.php" ?>
