<?php include_once "../includes/head.php" ?>
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
    $page = "hr";

 ?>
 <?php

      $cookie_token = $_COOKIE['csrf'];
      $form_token = $_POST['token'];
      if($cookie_token != $form_token) exit (header("location: ../logout.php"));

 if(isset($_POST['update'])){
   $payroll_id = mysqli_real_escape_string($conn, $_POST['payroll_id']);
   $e_name = mysqli_real_escape_string($conn, $_POST['e_name']);
   $basic_salary = mysqli_real_escape_string($conn, $_POST['basic_salary']);
   $meal = mysqli_real_escape_string($conn, $_POST['meal_allow']);
   $transpo = mysqli_real_escape_string($conn, $_POST['transpo_allow']);
   $topup = mysqli_real_escape_string($conn, $_POST['top_up_allow']);
   $net_salary = mysqli_real_escape_string($conn, $_POST['net_salary']);
   $ssb = mysqli_real_escape_string($conn, $_POST['ssb']);
   $income_tax = mysqli_real_escape_string($conn, $_POST['income_tax']);
   $deduction = mysqli_real_escape_string($conn, $_POST['other_deduction']);
   $late_fine = mysqli_real_escape_string($conn, $_POST['late_fine']);
   $leave_fine = mysqli_real_escape_string($conn, $_POST['leave_fine']);
   $ot = mysqli_real_escape_string($conn, $_POST['ot_total']);

   if($deduction==''){
     $deduction = 0;
   }else{
     $deduction =$_POST['other_deduction'];
   }

   $cut_out = $late_fine + $leave_fine + $deduction + $ssb + $income_tax;
   $total_income = $net_salary - $cut_out;
   $net_pay = $total_income + $ot;

   $get_update = mysqli_query($conn, "UPDATE e_payroll SET e_name='$e_name', basic_salary='$basic_salary', meal_allowance='$meal', transport_allowance='$transpo', topup_allowance='$topup', net_salary='$net_salary', ssb='$ssb', income_tax='$income_tax', other_deduction='$deduction', net_pay='$net_pay' , reg_user='$user', created_date=now() WHERE payroll_id='$payroll_id'  ");

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
          window.location = "../payroll.php";
        }
  });
});
</script>