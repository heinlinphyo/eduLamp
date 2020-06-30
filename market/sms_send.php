
<?php include_once "../includes/head.php"; ?>

<?php

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
	
		$id=$_GET['id'];
		$get_sms=mysqli_query($conn,"SELECT * FROM sms_promotion WHERE id='$id'  ");
		$result=mysqli_fetch_assoc($get_sms);
		$text_name=$result['text_name'];
		$text_desc=$result['text_desc'];
		$send_type=$result['send_type'];
		$send_date=$result['send_date'];
		$send_time=$result['send_time'];

		$today=date('Y-m-d');
	
		$send_schedule=$send_date." ".$send_time;
	
	
	$get_api=mysqli_query($conn,"SELECT * FROM sms_api ");
	$result_api=mysqli_fetch_assoc($get_api);
	$token=$result_api['api_key'];
	$api_url=$result_api['api_url'];
	
	$current_date=date('Y-m-d');
	$current_time=date('H:i:sa');

	if($send_date < $today){
				
			$warning = "ကျန်ရှိခဲ့ပြီးသော်ရက်များအတ္ွက် SMS ပို့မရပါ။";

	}elseif($send_type=="Employee"){
  		
			  $get_all=mysqli_query($conn,"SELECT phone FROM emp WHERE freeze='' ");
  							
  	}elseif($send_type=="Student"){

  			$get_all=mysqli_query($conn, "SELECT phone FROM students WHERE status='' ");

  	}elseif($send_type=="Trainer"){

  			$get_all=mysqli_query($conn, "SELECT phone FROM emp WHERE dept_name='Learning' AND freeze='' ");
  	}




  	$arry=array();
  	while($result_ph=mysqli_fetch_array($get_all)){
				
					$arry[]=array( $result_ph['phone']);
		  			
	  		}
	  		$multi_arry=array_unique($arry, SORT_REGULAR);	
					
		  	foreach ($multi_arry as $key => $val) {
   					 	 	$send_ph=$val[0];
   					 	
						// Prepare data for POST request
						$data = [
    							"to"        =>      $send_ph,
    							"message"   =>      $text_desc,
    							"sender"    =>      "Info",
    							"schedule"	=>		$send_schedule
						];
									
						$ch = curl_init($api_url);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, [
        						'Authorization: Bearer ' . $token,
        						'Content-Type: application/json'
    					]);

						$result = curl_exec($ch);
							

						$confirm = "SMS ပေးပို့မှုအောင်မြင်ပါသည်။";
			 	
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
    			window.location = "../sms.php";
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
    			window.location = "../sms.php";
  			}
	});
});
</script>






