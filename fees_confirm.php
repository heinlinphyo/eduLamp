
<?php
include_once "includes/header.php";
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
  $page="fo";
?>

<?php
//check token //
error_reporting(0);
$cookie_token 	= $_COOKIE['csrf'];
$form_token	  	= $_POST['token'];
if($cookie_token != $form_token) exit (header("location: logout.php"));

//Insert Fees Collator //

		$fees_id 		= mysqli_real_escape_string($conn, $_GET['fees_id']);
		$st_id 			= mysqli_real_escape_string($conn, $_POST['st_id']);
    	
		$grade_id 		= mysqli_real_escape_string($conn, $_POST['grade_id']);
		$grade_name		= mysqli_real_escape_string($conn, $_POST['grade_name']);
	  	$fees 			= mysqli_real_escape_string($conn, $_POST['fee_amount']);
	  	$deposit 		= mysqli_real_escape_string($conn, $_POST['deposit_amount']);
		$uniform		= mysqli_real_escape_string($conn, $_POST['uniform_c']);
		$other			= mysqli_real_escape_string($conn, $_POST['other_c']);
    $hostel     = mysqli_real_escape_string($conn, $_POST['hostel']);
		$year 			= mysqli_real_escape_string($conn, $_POST['year']);
		$month 			= mysqli_real_escape_string($conn, $_POST['month']);

		

    // filter hostel fees //
    $sql_hostel=mysqli_query($conn, "SELECT * FROM hostel_fees WHERE id='$hostel' ");
    $row_hostel=mysqli_fetch_assoc($sql_hostel);
    $hostel=$row_hostel['fees'];
		

		$get_st_name = mysqli_query($conn, "SELECT * FROM students WHERE st_id ='$st_id' AND status = '' ");
		$row_st_name = mysqli_fetch_assoc($get_st_name);
		$st_name = $row_st_name['st_name'];

    $token = md5(rand(1, 1000).time());
    setcookie("csrf", $token);

    // sum of all price //
    $total_fees = $fees + $deposit + $uniform + $other + $hostel;
       
 ?>
<div class="wrapper">
  <?php
    include_once ("includes/sidebar.php");
    include_once ("includes/navbar.php");
   ?>


<div class="content">
    <div class="container">
      <div class="card">
        <div class="card-header text-monospace text-white bg-success row ml-1 mr-1" >
            Fees Registration For <?php echo $grade_name ?>

            <a href="fees_form.php?id=<?php echo $grade_id; ?>" class="btn btn-sm ml-auto bg-white text-dark"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
          <div class="card-body">
            <div class="text-danger text-center">
              <p class="">သတိပြုရန်။  ။ပေးသွင်းထားသော် အချက်အလက်များ မှန်ကန်မှုရှိ မရှိ ပြန်လည် စစ်ဆေးပေးပါ။</p>
            </div>
            <form class="" action="fo/fees_reg.php?fees_id=<?php echo $fees_id; ?>" method="post">
              <div class="row">
              <input type="hidden" name="token" value="<?= $token ?>">

              <input type="hidden"  name="grade_id"  value="<?php echo $grade_id ?>">
              
              

              <div class="form-group col-6">
                <div class="input-group">
                  <label for="fees_id" class="form-control bg-success text-white col-4 text-center">Invoice No</label>
                  <input type="text" name="fees_id" class="form-control" readonly value="<?php echo $fees_id ?>">
                </div>
              </div>

               <div class="form-group col-6">
                <div class="input-group">
                 <label for="fee_amount" class="form-control bg-success text-white col-4 text-center">Fees(MMK)</label>
                  <input type="hidden" name="fee_amount" id="fee_amount" value="<?php echo $fees ?>">
                  <input type="text" class="form-control" value="<?php echo number_format($fees); ?>MMK" readonly>
                </div>
              </div>

                <div class="form-group col-6">
                  <div class="input-group">
                      <label for="st_id" class="form-control bg-success text-white col-4 text-center">Student ID</label>
                      <input type="text" name="st_id" id="st_id" class="form-control" readonly value="<?php echo $st_id ?>">    
                  </div>
              </div>

                <div class="form-group col-6">
                <div class="input-group">
                  <label for="deposit" class="form-control bg-success text-white col-4 text-center">Deposit(MMK)</label>
                  <input type="hidden" name="deposit" value="<?php if($deposit==''){echo "0";}else{ echo $deposit;} ?>">
                  <input type="text" class="form-control" value="<?php  echo number_format($deposit); ?> MMK"  readonly>
                </div>
              </div>
               

            

              <div class="form-group col-6">
                  <div class="input-group">
                      <label for="st_name" class="form-control bg-success text-white col-4 text-center">Student Name</label>
                      <input type="text" name="st_name" id="st_name" class="form-control" readonly value="<?php echo $st_name ?>">    
                  </div>
              </div>

             
              <div class="form-group col-6">
                <div class="input-group">
                  <label for="uniform" class="form-control bg-success text-white col-4 text-center">Uniform(MMK)</label>
                  <input type="hidden" name="uniform" value="<?php if($uniform==''){echo "0";}else{echo $uniform;} ?>">
                  <input type="text" class="form-control"  value="<?php echo number_format($uniform); ?> MMK" readonly >
                </div>
              </div>
              

              

              <div class="form-group col-6">
                  <div class="input-group">
                      <label for="grade_name" class="form-control bg-success text-white col-4 text-center">Grade</label>
          <input type="text" name="grade_name" id="grade_name" class="form-control" readonly value="<?php echo $grade_name ?>">   
                  </div>
              </div>

             
               <div class="form-group col-6">
                <div class="input-group">
                  <label for="other" class="form-control bg-success text-white col-4 text-center">Other(MMK)</label>
                  <input type="hidden" name="other" value="<?php if($other==''){echo "0";}else{echo $other;} ?>">
                  <input type="text"  class="form-control" value="<?php echo number_format($other); ?> MMK" readonly >
                </div>
              </div>
              

                <div class="form-group col-6">
                <div class="input-group">
                  <label for="year" class="form-control bg-success text-white col-4 text-center">Year</label>
                  <input type="text" name="year" id="year" class="form-control" readonly value="<?php echo $year ?>">
                </div>
              </div>

             
               <div class="form-group col-6">
                <div class="input-group">
                  <label for="hostel" class="form-control bg-success text-white col-4 text-center">Hostel(MMK)</label>
                  <input type="hidden" name="hostel" value="<?php if($hostel==''){echo "0";}else{ echo $hostel;} ?>">
                  <input type="text" class="form-control" value="<?php echo number_format($hostel); ?> MMK" readonly >
                </div>
              </div>
             

               <div class="form-group col-6">
                  <div class="input-group">
                      <label for="month" class="form-control bg-success text-white col-4 text-center">Month</label>
                      <input type="text" name="month" id="month" class="form-control" readonly value="<?php echo $month ?>">
                  </div>
              </div>
              
               <div class="form-group col-6">
                <div class="input-group">
                  <label for="total_fees" class="form-control bg-success text-white col-4 text-center">Total Fees(MMK)</label>
                  <input type="hidden" name="total_fees" value="<?php echo $total_fees; ?>">
                  <input type="text"  class="form-control text-danger" value="<?php echo number_format($total_fees); ?> MMK" readonly >
                </div>
              </div>

              <div class="form-group col-6 text-center">
                <a href="fees_form.php?id=<?php echo $grade_id ?>" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Cancle</a>
              </div>

              <div class="form-group col-6 text-center">
                  <button name="sub" class="btn btn-primary btn-sm"><i class="fa fa-th-large"></i> Submit </button>
              </div>

            </div><!-- row end -->
            </form>
          </div>
      </div>
    </div>
  </div>


</div><!-- wrapper end -->

<?php include_once ("includes/footer.php") ?>