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

<style media="screen">
  body{background: gray;}
</style>

<link rel="stylesheet" href="../vendor/print-js/print.css" />
<script src="../vendor/print-js/print_min.js"></script>

<?php

   
  $id = mysqli_real_escape_string($conn, $_GET['id']); // payroll id //

  $insert = mysqli_query($conn, "UPDATE e_payslip SET status = 'null' WHERE payroll_id='$id' "); // payslip က pay လူပ်ပြီးသား မှတ် //

  $get_payroll = mysqli_query($conn, "SELECT * FROM e_payroll WHERE payroll_id = $id "); // payslip data print ထူတ်ယူရန် //
  $row = mysqli_fetch_assoc($get_payroll);
  $e_id = $row['e_id'];

  $get_id = mysqli_query($conn, "SELECT * FROM emp WHERE e_id = '$e_id' "); // staff ရဲ့ positoin & department ကိုရယူ //
  $get_e = mysqli_fetch_assoc($get_id);

  $get_deduction = mysqli_query($conn, "SELECT * FROM e_payslip WHERE payroll_id = '$id' "); //  total_deduction ကိုရယူ //
  $row_deduction = mysqli_fetch_assoc($get_deduction);
 ?>

 <div class="wrapper justify-content-center" style="margin: 20px auto;">
   <!-- .content -->
         <div class="content mt-3">
          <div class="animated fadeIn">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card text-monospace" >

                             <div class="card-body" id="printableArea">
                               <strong class="card-title">Employee's Pay Slip Print</strong></br></br>
                                 <table id="bootstrap-data-table-export" class="table table-bordered" style="font-size:11px;">

                                   <tr>
                                     <th colspan="4">Personal Information</th>
                                   </tr>
                                   <tr>
                                     <td colspan="2">ID / Name</td>
                                     <td colspan="2"><?php echo $row['e_id'] ?> / <?php echo $row['e_name'] ?></td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Position / Department</td>
                                     <td colspan="2"><?php echo $get_e['post_name'] ?> / <?php echo $get_e['dept_name'] ?></td>

                                   </tr>
                                   <tr>
                                     <th colspan="2" class="text-center">Salary & Allowance</th>

                                     <th colspan="2" class="text-center">Deduction</th>
                                   </tr>
                                   <tr>
                                     <td>Basic Salary</td>
                                     <td><?php echo number_format($row['basic_salary']) ?></td>
                                     <td>Income Tax</td>
                                     <td id="income_tax"><?php if($row['income_tax']==''){ echo "-";}else{ echo number_format($row['income_tax']); } ?></td>
                                   </tr>
                                   <tr>
                                     <td>Meal Allowance</td>
                                     <td><?php if($row['meal_allowance']==''){ echo "-";}else{ echo number_format($row['meal_allowance']); } ?></td>
                                     <td>SSB</td>
                                     <td id="ssb"><?php if($row['ssb']==''){ echo "-";}else{ echo number_format($row['ssb']); } ?></td>
                                   </tr>
                                   <tr>
                                     <td>Transporation Allowance</td>
                                     <td><?php if($row['transport_allowance']==''){ echo "-";}else{ echo number_format($row['transport_allowance']); } ?></td>
                                     <td>Late</td>
                                     <td id="late"><?php if($row['late_fine']==''){ echo "-";}else{ echo number_format($row['late_fine']); } ?></td>
                                   </tr>
                                   <tr>
                                     <td>TopUp Allowance</td>
                                     <td><?php if($row['topup_allowance']==''){ echo "-";}else{ echo number_format($row['topup_allowance']); } ?></td>
                                     <td>Leave</td>
                                     <td id="leave"><?php if($row['leave_fine']==''){ echo "-";}else{ echo number_format($row['leave_fine']); } ?></td>
                                   </tr>
                                   <tr>
                                     <td>OT</td>
                                     <td><?php if($row['ot_total']==''){ echo "-";}else{ echo number_format($row['ot_total']); } ?></td>
                                     <td>Other Deduction</td>
                                     <td id="deduction"><?php if($row['other_deduction']==''){ echo "-";}else{ echo number_format($row['other_deduction']); } ?></td>
                                   </tr>
                                   <tr>
                                     <th>Total Income</th>
                                     <td><?php echo number_format($row['net_salary']) ?></td>
                                     <th>Total Deduction</th>
                                     <td> <?php echo number_format($row_deduction['total_deduction']) ?> </td>
                                   </tr>
                                   <tr>
                                     <th colspan="2" class="">Net Pay</th>
                                     <td colspan="2" class="text-center"><?php echo number_format($row['net_pay']) ?></td>
                                   </tr>
                                 </table>


                             </div><!-- card body end -->

                             <div class="card-footer row ml-1 mr-1">
                               <a href="../payslip.php" class="btn btn-secondary"> Cancle</a>
                                <button type="button" name="print" class="btn btn-primary ml-auto mr-1" style="border-radius: 5px;"  onclick="printDiv('printableArea')" ><i class="fa fa-print"></i> Print</button>
                             </div>


                         </div><!--card end -->
                     </div>


                 </div>
             </div><!-- .animated -->


         </div>
         <!-- .content -->

 </div><!--wrapper end -->



  <script type="text/javascript">

          function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
                      }
  </script>


   <?php include_once "../includes/footer.php" ?>
