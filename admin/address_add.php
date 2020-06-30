<?php
	require_once("../includes/head.php");

			// check token //
			$cookie_token = $_COOKIE['csrf'];
			$form_token = $_POST['token'];
			if($cookie_token != $form_token) exit (header("location: ../logout.php"));
	
	if(isset($_POST['save'])){
		$address=$_POST['address'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
				
		if($address && $name &&  $phone && $email){
			//check//
			$check=mysqli_query($conn, "SELECT * FROM address  ");
			$check_row=mysqli_num_rows($check);
			if($check_row==0){
				
			$insert_eng=mysqli_query($conn, "INSERT INTO address(com_name, address, phone, email)VALUES('$name', '$address', '$phone', '$email') ");
			header("location:../address.php");
			}
			else{
				$warning=" အသုံးပြုပြီးသားဖြစ်နေပါသည်။";
			}
			//check//			
		}
		else{
			$warning="ပြည်စုံမှုမရှိပါ။";
		}
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
    			window.location = "../address.php";
  			}
	});
});
</script>