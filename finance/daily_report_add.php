<?php
	include_once ("../includes/head.php");
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

  
  if(isset($_POST['post'])){

    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $deposit = mysqli_real_escape_string($conn, $_POST['deposit']);
    $expense = mysqli_real_escape_string($conn, $_POST['expense']);
    $total = mysqli_real_escape_string($conn, $_POST['net_total']);

	$today = date('Y-m-d');

	if($date){	

    $de_sql = "INSERT INTO daily_report(date, deposit, expense, total, reg_user, reg_date, status) VALUES ('$date', '$deposit', '$expense', '$total','$user', '$today', '')";
    	mysqli_query($conn, $de_sql);

    	// update status of fees_collect datatable //
    	$sql_update=mysqli_query($conn, "UPDATE fees_collect SET status='reported' WHERE reg_date='$date' ");
    	// update status of daily expense datatable // 
    	$sql_update=mysqli_query($conn, "UPDATE dailyexpense SET status='reported' WHERE reg_date='$date' ");

		$confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";

	}
	else{
		header("location:error.php");
	}	
  }
  else{
  	header("location:error.php");
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
    			window.location = "../daily_report.php";
  			}
	});
});
</script>