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
	
	
	$hostel_name=$_GET['hostel_name'];
	
  		$st_id=$_POST['st_id'];		

  		if($st_id){
  			
  			//check room//
  			
  			$get_hostel=mysqli_query($conn,"SELECT * FROM hostel_record WHERE st_id='$st_id' AND status='1'   ");
  			$row_hostel=mysqli_num_rows($get_hostel);	
  			//check room//
  			
  			if($row_hostel==0){
  				
  					$get_st=mysqli_query($conn,"SELECT * FROM students WHERE st_id='$st_id' ");
          $result_st=mysqli_fetch_assoc($get_st);
          $st_name=$result_st['st_name'];
  					
  					$today=date('Y-m-d H:i:sa');
	  				
	  				$new_hostel=mysqli_query($conn, "INSERT INTO hostel_record (h_name, st_id, st_name, check_in, check_out, status) VALUES ('$hostel_name','$st_id','$st_name','$today','', '1') ");
	  				
	  				$update=mysqli_query($conn, "UPDATE hostel SET status='1' WHERE hostel_name='$hostel_name'  ");
	  				
	  				echo "<script>window.location.replace('../hostel.php');</script>";
	  		}
	  		else{
	  				$warning="စာရင်းရှိပြီးဖြစ်ပါသည်။";
	  		}
		}
		else{
			$warning="ပြည့်စုံမှုမရှိပါ။";
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




