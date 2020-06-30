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
		$api=$_POST['api_key'];
		$sender=$_POST['sender_name'];
		$url=$_POST['url'];
		$message_url=$_POST['message_url'];
		$balance_url=$_POST['balance_url'];
		
		if($api && $sender && $url && $message_url && $balance_url ){
			
			//check category//
			$get_sms=mysqli_query($conn, "SELECT * FROM sms_api  ");
			$row_sms=mysqli_num_rows($get_sms);
			
			if($row_sms==0){
	  			$new=mysqli_query($conn, "INSERT INTO sms_api(api_key, sender, api_url, message_url, balance_url) VALUES ('$api', '$sender', '$url', '$message_url', '$balance_url') ");
	  			echo "<script>window.location.replace('../sms_setting.php');</script>";
	  		}
	  		else{
	  			$warning="ရှိပြီးသာဖြစ်နေပါသည်။";
	  		}
			//check category//
			
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
    			window.location = "../sms_setting.php";
  			}
	});
});
</script>




