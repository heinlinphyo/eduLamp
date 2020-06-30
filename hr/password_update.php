<?php include_once "../includes/head.php"; 


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
	
	$e_id=$_GET['e_id'];
	if(isset($_POST['update'])){
		$password=$_POST['password'];
	
		if($password){

			$update=mysqli_query($conn, "UPDATE emp SET password='$password' WHERE e_id='$e_id'  ");
			echo "<script>window.location.replace('../emp_profile.php');</script>";
		
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
    			window.location = "../emp_profile.php";
  			}
	});
});
</script>



