<?php 

	include_once "../includes/head.php"; 

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


		$text_name=$_POST['text_name'];
		$text_desc=$_POST['text_desc'];
		$send_type=$_POST['send_type'];
		$send_date=$_POST['send_date'];
		$send_time=$_POST['send_time'];

		$reg_date=date('Y-m-d');
		
		if($send_date < $reg_date){
				
				$warning = "ကျန်ရှိခဲ့ပြီးသော်ရက်များအတ္ွက်စာရင်းသွင်းမရပါ။";
		}
		
		elseif($text_name && $text_desc && $send_type && $send_date && $send_time){		
		
				$sql = "INSERT INTO sms_promotion (text_name, text_desc, send_type, send_date, send_time, count_sms, user, reg_date, status)VALUES ('$text_name', '$text_desc', '$send_type', '$send_date', '$send_time', '', '$user', '$reg_date', '') ";

				mysqli_query($conn, $sql);

				$confirm = "SMS အသစ်ပြုလုပ်ခြင်းအောင်မြင်ပါသည်။";
		}
		elseif($text_name ==''){
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

