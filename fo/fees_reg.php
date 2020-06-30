
<?php
include_once "../includes/head.php";
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
		header("location:../logout.php");
	}
?>

<?php
			$cookie_token = $_COOKIE['csrf'];
			$form_token = $_POST['token'];
			if($cookie_token != $form_token) exit (header("location: ../logout.php"));

	if(isset($_POST['sub'])){

		$fees_id 	= mysqli_real_escape_string($conn, $_GET['fees_id']);
		$st_id 		= mysqli_real_escape_string($conn, $_POST['st_id']);
    	$st_name 	= mysqli_real_escape_string($conn, $_POST['st_name']);
		$grade_id 	= mysqli_real_escape_string($conn, $_POST['grade_id']);
	  	$fees 		= mysqli_real_escape_string($conn, $_POST['fee_amount']);
	  	$fee_month 	= mysqli_real_escape_string($conn, $_POST['month']);
	  	$year 		= mysqli_real_escape_string($conn, $_POST['year']);
	  	$deposit_amount = mysqli_real_escape_string($conn, $_POST['deposit']);
		$uniform_c 		= mysqli_real_escape_string($conn, $_POST['uniform']);
		$other_c 		= mysqli_real_escape_string($conn, $_POST['other']);
		$hostel			=mysqli_real_escape_string($conn, $_POST['hostel']);
		$total_fees 	= mysqli_real_escape_string($conn, $_POST['total_fees']);

			$check_inv=mysqli_query($conn, "SELECT * FROM fees_collect WHERE st_id='$st_id' AND fee_year='$year' AND fee_month='$fee_month' ");
			$result_inv=mysqli_fetch_assoc($check_inv);
			$result_year = $result_inv['fee_year'];
			$result_month = $result_inv['fee_month'];
			if( $year==$result_year && $fee_month==$result_month){
				$warning = "စာရင်းရှိပြီး ဖြစ်ပါသည်။";
			}else{
				
	   		$sql_fees = mysqli_query($conn, "INSERT INTO fees_collect ( fees_id, grade_id, st_id, st_name, fee_amount, fee_year, fee_month, deposit_amount, uniform, other, hostel, total, reg_user, reg_date, status) VALUES ('$fees_id', '$grade_id', '$st_id', '$st_name', '$fees', '$year', '$fee_month', '$deposit_amount', '$uniform_c', '$other_c', '$hostel','$total_fees', '$user', now(), '')");
	   		
			}
			if($grade_id == '1'){
					$sql_update = "UPDATE KG SET active='$fee_month', year='$year', reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '2') {
					$sql_update = "UPDATE G_1 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '3') {
					$sql_update = "UPDATE G_2 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '4') {
					$sql_update = "UPDATE G_3 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '5') {
					$sql_update = "UPDATE G_4 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '6') {
					$sql_update = "UPDATE G_5 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '7') {
					$sql_update = "UPDATE G_6 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '8') {
					$sql_update = "UPDATE G_7 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '9') {
					$sql_update = "UPDATE G_8 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '10') {
					$sql_update = "UPDATE G_9 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}elseif ($grade_id == '11') {
					$sql_update = "UPDATE G_10 SET active='$fee_month', year='$year',reg_user='$user', reg_date=now() WHERE st_id='$st_id'";
				}

				mysqli_query($conn, $sql_update);

				$confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";
			
			

	}else{
			$warning = "တစ်စုံတစ်ခုမှားယွင်းနေပါသည်။";
	}


 ?>



<script>
	  $(document).ready(function() {
		swal.fire({
  			title: 'မှန်ကန်မှု',
  			text: "<?php echo $confirm;  ?>",
  			type: 'success',
		}).then(function (result) {
  			if (result.value) {
    			window.location = "../invoice_print.php?id=<?php echo $fees_id ?>";
  			}
	});
});
</script>
<script>
	  $(document).ready(function() {
		swal.fire({
  			title: 'မှားယွင်းမှုအခြေအနေ',
  			text: "<?php echo $warning;  ?>",
  			type: 'error',
		}).then(function (result) {
  			if (result.value) {
    			window.location = "../rows.php";
  			}
	});
});
</script>