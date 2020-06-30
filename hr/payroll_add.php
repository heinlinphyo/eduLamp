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
      // get payslip no //
     	$get_id=mysqli_query($conn, "SELECT * FROM e_payslip ORDER BY id DESC LIMIT 1");
     	$result_id=mysqli_fetch_assoc($get_id);
     	$get_ps_id=$result_id['id'];
     	$result_ps_id=$result_id['payslip_no'];

     	$to_year=date('Y');
     	$to_month=date('m');

     	if($get_ps_id==""){
 		$payslip_no="PS".date('Y').date('m')."1";
 	}
   	elseif(stristr($result_ps_id, $to_month) === FALSE) {
     		$payslip_no="PS".date('Y').date('m')."1";
   	}
   	elseif(stristr($result_ps_id,$to_year) === FALSE ){
 		$payslip_no="PS".date('Y').date('m')."1";
 	}
   	else{
   		$remove_m=substr($result_ps_id,8);
   		$remove_m=$remove_m+1;
 		$payslip_no="PS".date('Y').date('m').$remove_m;
 	}

 ?>
 <?php
     

   $payroll_id = mysqli_real_escape_string($conn, $_GET['id']);
   $get_row = mysqli_query($conn, "SELECT * FROM e_payroll WHERE payroll_id='$payroll_id' " );
   $payroll = mysqli_fetch_assoc($get_row);

   $e_id = $payroll['e_id'];
   $e_name = $payroll['e_name'];
   $basic_salary = $payroll['basic_salary'];
   $meal = $payroll['meal_allowance'];
   $tp = $payroll['transport_allowance'];
   $topup = $payroll['topup_allowance'];
   $net_salary = $payroll['net_salary'];
   $ssb = $payroll['ssb'];
   $income_tax = $payroll['income_tax'];
   $deduction = $payroll['other_deduction'];
   $late = $payroll['late_fine'];
   $leave = $payroll['leave_fine'];
   $ot = $payroll['ot_total'];
   $net_pay = $payroll['net_pay'];
   $year = date('Y');
   $month = date('F');

   $status='null'; // for update e_payroll (status) //

   $total_allowance = $meal + $tp + $topup;
   $total_deduction =  $late + $leave + $deduction + $ssb + $income_tax;

   if($payroll_id){
     $insert_payslip = mysqli_query($conn, "INSERT INTO e_payslip (payslip_no, payroll_id, e_id, e_name, basic_salary, total_allowance, net_salary, ot_amount, total_deduction, net_pay, pay_year, pay_month, pay_user, created_date, status)
                            VALUES('$payslip_no', '$payroll_id', '$e_id', '$e_name', '$basic_salary', '$total_allowance', '$net_salary', '$ot', '$total_deduction', '$net_pay', '$year', '$month', '$user', now(), ''    )");

      // update to e_payroll (status) //
      $update_payroll = mysqli_query($conn, "UPDATE e_payroll SET status = '$status' WHERE payroll_id = $payroll_id ");

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