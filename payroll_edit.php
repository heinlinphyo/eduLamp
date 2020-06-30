
<?php

	include_once "includes/header.php";
  $page = "registertion";
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
		header("location:logout.php");
    }
?>
<?php
// payroll_id //
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $get_row = mysqli_query($conn, "SELECT e_payroll.* , e_salary.*  FROM e_payroll LEFT JOIN e_salary ON e_payroll.e_id = e_salary.e_id WHERE e_payroll.payroll_id = '$id'  ");
  $row_data = mysqli_fetch_assoc($get_row);
}
$token = md5(rand(1, 1000).time());
setcookie("csrf", $token);

 ?>




<div class="content text-monospace" style="margin: 20px auto;">
    <div class="container">
        <div class="card"><!-- card begin -->
            <div class="card-header text-white bg-success row ml-1 mr-1"><!-- card header begin -->
                  Employee's Pay Roll Edition
                  <a href="payroll.php" class="btn btn-sm ml-auto mr-1 bg-white"> <i class="fa fa-arrow-left"></i> Pay Roll</a>
            </div><!-- card header end -->
            <div class="card-body"><!-- card body begin -->
                <form action="hr/payroll_update.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <input type="hidden" name="token" value="<?= $token ?>">
                    <small class="col-4 text-center"> Personal Information </small>
                    <small class="col-4 text-center">Salary & Allowance</small>
                    <small class="col-4 text-center">Deduction</small>

                    <input type="hidden" name="payroll_id" class="form-control" value="<?php echo $row_data['payroll_id']; ?>">


                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="e_id" class="input-group"> <small> ID </small> </label>
                            <input type="text" name="e_id" class="form-control" readonly value="<?php echo $row_data['e_id']; ?>">
                        </div>
                    </div>

                    <div class="form-group col-4">
                        <div class="input-group">
                            <label for="basic_salary" class="input-group"> <small>Basic Salary</small> </label>
                            <input type="text" name="basic_salary" readonly  class="form-control" value="<?php echo $row_data['basic_salary'] ?>">
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="income_tax" class="input-group"> <small>Income Tax</small> </label>
                            <input type="text" name="income_tax" readonly class="form-control" value="<?php if($row_data['income_tax']==''){ echo "0";}else{ echo $row_data['income_tax'];} ?>">
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="e_name" class="input-group"> <small> Name </small> </label>
                            <input type="text" name="e_name" class="form-control" readonly value="<?php echo $row_data['e_name'] ?>" >
                        </div>
                    </div>


                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="meal_allow" class="input-group"> <small>Meal Allowance</small> </label>
                          <input type="text" name="meal_allow" class="form-control" readonly value="<?php if($row_data['meal_allow']==''){ echo "0";}else{ echo $row_data['meal_allow'];} ?>">
                        </div>
                    </div>


                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="ssb" class="input-group"> <small>SSB</small> </label>
                            <input type="text" name="ssb" readonly atuocomplete="off" class="form-control" value="<?php if($row_data['ssb']==''){ echo "0";}else{ echo $row_data['ssb'];} ?>">
                        </div>
                    </div>

                    <small class="col-4 text-center"> OVERTIME FEES</small>

                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="transpo_allow" class="input-group"> <small> Transporation Allowance</small> </label>
                            <input type="text" name="transpo_allow" atuocomplete="off" class="form-control" readonly value="<?php if($row_data['transpo_allow']==''){ echo "0";}else{ echo $row_data['transpo_allow'];} ?>">
                        </div>
                    </div>

                    <div class="form-group col-4">
                        <div class="input-group">
                            <label for="late_fine" class="input-group"> <small>Late</small> </label>
                            <input type="text" name="late_fine" class="form-control" readonly value="<?php if($row_data['late_fine']==''){ echo "0";}else{ echo $row_data['late_fine'];} ?>">
                        </div>
                    </div>


                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="ot_total" class="input-group"> <small>OT Amount</small> </label>
                            <input type="text" name="ot_total" readonly atuocomplete="off" class="form-control" value="<?php if($row_data['ot_total']==''){ echo "0";}else{ echo $row_data['ot_total'];} ?>">
                        </div>
                    </div>

                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="top_up_allow" class="input-group"> <small>TopUp Allowance</small> </label>
                            <input type="text" name="top_up_allow" atuocomplete="off" class="form-control" readonly value="<?php if($row_data['top_up_allow']==''){ echo "0";}else{ echo $row_data['top_up_allow'];} ?>">
                        </div>
                    </div>

                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="leave_fine" class="input-group"> <small>Leave</small> </label>
                            <input type="text" name="leave_fine" readonly atuocomplete="off" class="form-control" value="<?php if($row_data['leave_fine']==''){ echo "0";}else{ echo $row_data['leave_fine'];} ?>">
                        </div>
                    </div>

                    <small class="col-4"></small>

                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="net_salary" class="input-group"> <small>Net Salary</small> </label>
                            <input type="text" name="net_salary" readonly atuocomplete="off" class="form-control" value="<?php echo $row_data['net_salary'] ?>">
                        </div>
                    </div>

                    <div class="form-group col-4">
                        <div class="input-group">
                          <label for="other_deduction" class="input-group"> <small>Other Deduction</small> </label>
                            <input type="number" name="other_deduction"  atuocomplete="off" class="form-control" placeholder="...">
                        </div>
                    </div>

                    <div class=" form-group text-center col-12">
                        <button name="update" class="btn btn-primary btn-sm "><i class="fa fa-th-large"></i> Update Pay Roll</button>
                    </div>
                  </div>

                </form><!-- form end -->
            </div><!-- card body end -->
        </div><!-- card end -->
    </div>
</div>



<?php include_once "includes/footer.php" ?>
