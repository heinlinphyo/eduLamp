<?php include_once "includes/header.php" ?>
<?php
error_reporting(0);
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
    $page = "fo";

 ?>

<style media="screen">
  body{background: gray;}
  #bootstrap-data-table-export ,tr ,td { padding: 0.30rem !important}
  
</style>
<link rel="stylesheet" href="vendor/print-js/print.css" />

<script src="vendor/print-js/print_min.js"></script>

<?php
  $id = $_GET['id'];
  $get_fees = mysqli_query($conn, "SELECT * FROM fees_collect WHERE fees_id = '$id' ");
  $row_fees = mysqli_fetch_assoc($get_fees);
  $grade_id = $row_fees['grade_id'];
  $st_id = $row_fees['st_id'];
  // get student data //
  $get_st_data = mysqli_query($conn, "SELECT * FROM students WHERE st_id ='$st_id' ");
  $row_st_data = mysqli_fetch_assoc($get_st_data);
  // get student's grade //
  $get_grade = mysqli_query($conn, "SELECT * FROM grades WHERE id = '$grade_id' ");
  $row_grade = mysqli_fetch_assoc($get_grade);

  $get_letter_head=mysqli_query($conn, "SELECT * FROM letter_head");
  $row_letter_head=mysqli_fetch_assoc($get_letter_head);

  $get_logo=mysqli_query($conn, "SELECT * FROM logo");
  $row_logo=mysqli_fetch_assoc($get_logo);
 ?>

 <div class="wrapper justify-content-center" style="margin: 20px auto;width: 373px;">
   <!-- .content -->
         <div class="content mt-3">
          <div class="animated fadeIn">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card text-monospace" >

                             <div class="card-body" id="printableArea" style="width: 373px;">
                               <strong class="card-title">
                                 <img src="admin/letter_head/<?php echo $row_letter_head['letter_image'] ?>" style="width:330px;">
                               </strong>
                             </br>
                                 <table id="bootstrap-data-table-export" class="table table-bordered" style="font-size:11px;width: 330px;">
                                    <img src="admin/logo/<?php echo $row_logo['logo_image'] ?>" id="logo_image" style="position: absolute;opacity: 0.1;margin: 40px 50px;padding: 0px;">
                                   <tr>
                                     <td colspan="4">Invoice - <?php echo $row_fees['fees_id'] ?></td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Employee - <?php echo $row_fees['reg_user'] ?></td>
                                     <td colspan="2">Date : <?php echo date('d-m-Y') ?></td>
                                   </tr>
                                   <tr>
                                     <td colspan="4">Student Info</td>
                                   </tr>
                                   <tr>
                                     <td colspan="2">ID / Name</td>
                                     <td colspan="2" style="text-transform:uppercase;"><?php echo $row_fees['st_id'] ?> / <?php echo $row_fees['st_name'] ?></td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Grades</td>
                                     <td colspan="2"><?php echo $row_grade['grade_name'] ?></td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Father / Mother Name</th>
                                     <td colspan="2" style="text-transform:uppercase;"><?php echo $row_st_data['father_name']?> / <?php echo $row_st_data['mother_name'] ?></td>
                                   </tr>
                                   <tr>
                                     <td colspan="2">Phone</td>
                                     <td colspan="2"><?php echo $row_st_data['phone']?></td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Fees</td>
                                     <td colspan="2"><?php echo number_format($row_fees['fee_amount']) ?> MMK</td>

                                   </tr>
                                    <tr>
                                     <td colspan="2">Hostel</td>
                                     <td colspan="2"><?php 
                                     if($row_fees['hostel']==''){ echo "0";}else{
                                     echo number_format($row_fees['hostel']); } ?> MMK</td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Year/Month</td>
                                     <td colspan="2"><?php echo $row_fees['fee_year']?>/<?php echo $row_fees['fee_month'] ?></td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Deposit</td>
                                     <td colspan="2"><?php 
                                     if($row_fees['deposit_amount']==''){ echo "0";}else{
                                     echo number_format($row_fees['deposit_amount']);} ?> MMK</td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Uniform</td>
                                     <td colspan="2"><?php
                                     if($row_fees['uniform']==''){ echo "0";}else{ 
                                     echo number_format($row_fees['uniform']); } ?> MMK</td>

                                   </tr>
                                   <tr>
                                     <td colspan="2">Other Fees</td>
                                     <td colspan="2"><?php 
                                     if($row_fees['other']==''){ echo "0";}else{
                                     echo number_format($row_fees['other']);} ?> MMK</td>

                                   </tr>
                                   <tr>
                                     <th colspan="2" class="">Net Paid</th>
                                     <td colspan="2"><?php echo number_format($row_fees['total']); ?> MMK</td>
                                   </tr>



                                 </table>
                                 <?php 
                                  $get_foot=mysqli_query($conn, "SELECT * FROM letter_foot ");
                                  $foot=mysqli_fetch_assoc($get_foot);
                                 ?>
                                 <img src="admin/letter_foot/<?php echo $foot['foot_image'] ?>" style="width: 330px;">

                             </div><!-- card body end -->

                             <div class="card-footer row ml-1 mr-1">
                               <a href="rows.php" class="btn btn-secondary"> Cancle</a>
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










   <?php include_once "includes/footer.php" ?>
