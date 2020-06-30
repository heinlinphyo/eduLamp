<?php

	include_once "../includes/head.php";
	
	error_reporting(0);
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


	$cookie_token = $_COOKIE['csrf'];
	$form_token = $_POST['token'];
	if($cookie_token != $form_token) exit (header("location: ../logout.php"));

	

		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$fees=mysqli_real_escape_string($conn, $_POST['fees']);
		$remark=mysqli_real_escape_string($conn, $_POST['remark']);


		if($id && $fees){

			$sql=mysqli_query($conn, "UPDATE hostel_fees SET fees='$fees' , remark='$remark' WHERE id='$id' ");

			$confirm = "စာရင်းပြုပြင်ခြင်းပြည့်စုံပါသည်။";

		}else{
			$warning = "အချက်အလက်များမပြည့်စုံပါ ။";
		}
	
	
?>

<script>
	  $(document).ready(function() {
		swal.fire({
  			title: 'မှားယွင်းမှုအခြေအနေ',
  			text: "<?php echo $warning;  ?>",
  			type: 'error',
		}).then(function (result) {
  			if (result.value) {
    			window.location = "../hostel_setting.php";
  			}
	});
});
</script>


<script>
	  $(document).ready(function() {
		swal.fire({
  			title: 'မှန်ကန်မှု',
  			text: "<?php echo $confirm;  ?>",
  			type: 'success',
		}).then(function (result) {
  			if (result.value) {
    			window.location = "../hostel_setting.php";
  			}
	});
});
</script>

