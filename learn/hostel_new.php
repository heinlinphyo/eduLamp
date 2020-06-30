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
	
	
	if(isset($_POST['save'])){

  		$hostel=$_POST['hostel'];
  				
  		if($hostel){
  			
  			//check room//
  			
  			$get_room=mysqli_query($conn,"SELECT * FROM hostel WHERE hostel_name='$hostel' ");
  			$row_room=mysqli_num_rows($get_room);	
  			//check room//
  			
  			if($row_room==0){
	  				$new=mysqli_query($conn, "INSERT INTO hostel(hostel_name, reg_user, status) VALUES ('$hostel','$user', '') ");
	  				echo "<script>window.location.replace('../hostel.php');</script>";
	  		}
	  		else{
	  				$warning="စာရင်းရှိပြီးဖြစ်ပါသည်။";
	  		}
		}
		else{
			$warning="ပြည့်စုံမှုမရှိပါ။";
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
    			window.location = "../hostel.php";
  			}
	});
});
</script>




