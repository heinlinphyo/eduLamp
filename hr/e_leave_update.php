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
	
	$cookie_token = $_COOKIE['csrf'];
	$form_token = $_POST['token'];
	if($cookie_token != $form_token) exit (header("location: ../logout.php"));

	$id =  mysqli_real_escape_string($conn, $_GET['id']);

	  if(isset($_POST['update'])){

        $e_id = mysqli_real_escape_string($conn, $_POST['e_id']);
        $leave_id = mysqli_real_escape_string($conn,$_POST['leave_id']);
        $s_date = mysqli_real_escape_string($conn,$_POST['s_date']);
        $e_date = mysqli_real_escape_string($conn,$_POST['e_date']);
        $days = mysqli_real_escape_string($conn,$_POST['days']);
        $asign = mysqli_real_escape_string($conn,$_POST['asign']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        // get departments name //
        $get_name=mysqli_query($conn, "SELECT * FROM leave_category WHERE id='$leave_id' ");
                $result_name=mysqli_fetch_assoc($get_name);
                $leave_name=$result_name['name'];

        // get positions name //
                $get_e_id=mysqli_query($conn, "SELECT * FROM emp WHERE e_id='$e_id' AND freeze='' ");
                $result_e_name=mysqli_fetch_assoc($get_e_id);
                $e_name=$result_e_name['e_name'];

      
        $update=mysqli_query($conn, "UPDATE e_leave SET leave_id='$leave_id', leave_name='leave_name', start_date='$s_date', end_date='$e_date', days='$days', e_id='$e_id', e_name='$e_name', asign='$asign', reg_user='$user', status='$status' WHERE id='$id'  ");


           $confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";

        }else{

          header("location: error.php");
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
          window.location = "../e_leave.php";
        }
  });
});
</script>