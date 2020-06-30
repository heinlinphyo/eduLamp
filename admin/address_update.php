<?php
	require_once("../includes/head.php");
	$id=$_GET['id'];
	if(isset($_POST['update'])){
		$address=$_POST['address'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
				
		if($address && $name &&  $phone && $email){
		
			$update=mysqli_query($conn, " UPDATE address SET com_name='$name', address='$address', phone='$phone', email='$email' WHERE id='$id' ");
			header("location:../address.php");
					
		}
		else{
			$warning="ပြည်စုံမှုမရှိပါ။";
		}
	}
	
?>

<script type="text/javascript">alert("<?php echo $warning; ?>");window.location.href='../address.php'; </script>