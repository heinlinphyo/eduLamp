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

if(isset($_POST["save"]))
{

 $e_id = mysqli_real_escape_string($conn, $_POST["e_id"]);
 $late_lost = mysqli_real_escape_string($conn, $_POST['late_lost']);
 $ot_amount = mysqli_real_escape_string($conn, $_POST['ot_amount']);
 $leave_lost = mysqli_real_escape_string($conn, $_POST['leave_lost']);

 $insert_payroll = mysqli_query($conn, " INSERT INTO e_payroll( e_id, e_name, basic_salary, meal_allowance, transport_allowance, topup_allowance, net_salary, ssb, income_tax, other_deduction, late_fine, leave_fine, ot_total, net_pay, staff_type, job_type, status, reg_user, created_date)
  VALUES('$e_id', '','', '', '', '','', '', '', '', '$late_lost', '$leave_lost', '$ot_amount', '', '', '','', '$user', now())");

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
          window.location = "../raw_data.php";
        }
  });
});
</script>
