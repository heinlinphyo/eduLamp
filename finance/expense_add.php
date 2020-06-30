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

  $de_id = mysqli_real_escape_string($conn, $_GET['id']);

  if(isset($_POST['add'])){
    $e_amount = mysqli_real_escape_string($conn, $_POST['e_amount']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);
		$today = date('F');

    $de_sql = "INSERT INTO dailyexpense(dexp_id, dexp_amount, remark, reg_user, reg_date, month, status) VALUES ('$de_id', '$e_amount', '$remark','$user', now(), '$today', '')";
    mysqli_query($conn, $de_sql);

		$confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";
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
    			window.location = "../expense.php";
  			}
	});
});
</script>