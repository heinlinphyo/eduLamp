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
    $page = "hr";

    $token = md5(rand(1, 1000).time());
    setcookie("csrf", $token);
 ?>
 <div class="wrapper">

 <?php
   include_once "includes/sidebar.php";
   include_once "includes/navbar.php";
  ?>
 <div class="content mt-3">
   <div class="row">
     <div class="col-md-12">
       <form class="" action="" method="post">
         <div class="card" id="printJS-form">
           <div class="card-header row ml-1 mr-1">
             <strong class="card-title"><i class="fa fa-file-excel"></i> Employee's Raw Data</strong>
              <select class="form-control col-md-3 ml-auto mr-1" name="emp" id="emp" required>
                  <option value="">Select Employee</option>
                  <?php
                    $emp = mysqli_query($conn, "SELECT * FROM emp WHERE freeze = '' ");
                    while($e_row=mysqli_fetch_assoc($emp)):
                   ?>
                   <option value="<?php echo $e_row['e_id']; ?>">
                      <?php echo $e_row['e_name']; ?> / <?php echo $e_row['dept_name'] ?>
                   </option>
                 <?php endwhile; ?>
              </select>
                
                <input type="date" class="form-control col-md-2 mr-1" name="from" id="from" required/>
                <input type="date" class="form-control col-md-2" name="to" id="to" value="<?php echo date('Y-m-d') ?>"  required/>
                 <button class="btn btn-primary btn-sm ml-2" name="search" style="height: 38px;border-radius: 2px; box-shadow: 0 0 3px gray;margin-right:10px;"><i class="fas fa-search"></i> Search</button>

           </form>
           </div>


           <div class="card-body">
            <form class="" action="hr/raw_data_add.php" method="post">
              <input type="hidden" name="token" value="<?= $token ?>">
             <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover" style="font-size: 12px;">
               <thead>

                 <tr>
                   <th class="text-info text-center">No</th>
                   <th class="text-info text-center">Date</th>
                   <th class="text-info text-center">ID</th>
                   <th class="text-info text-center">Name</th>
                   <th class="text-info text-center">In</th>
                   <th class="text-info text-center">Out</th>
                   <th class="text-info text-center">Leave</th>
                   <th class="text-info text-center">Late (min)</th>
                   <th class="text-info text-center">OT (H)</th>
                   <th class="text-info text-center">Late (-)</th>
                   <th class="text-info text-center">OT (+)</th>
                   <th class="text-info text-center">Leave (-)</th>
                   <th class="text-info text-center">Net Total</th>
                 </tr>
               </thead>
               <tbody>
                <?php
                  if(isset($_POST['search'])){
                      $e_id = $_POST['emp'];
                      $from = $_POST['from'];
                      $to = $_POST['to'];

                      if($e_id && $from && $to){
                        $no = 1;
                        $get = mysqli_query($conn, "SELECT * FROM e_attendance WHERE e_id = '$e_id' AND reg_date >='$from' AND reg_date <='$to' ORDER BY reg_date");
                        while($row=mysqli_fetch_assoc($get)){
                          $no_row=mysqli_num_rows($get);
                          $late_lost = $row['late_lost'];
                          $ot_amount = $row['ot_amount'];
                          $leave_lost = $row['leave_lost'];

                          $lost_total = $late_lost + $leave_lost;
                          $net_total = $ot_amount - $lost_total;
                 ?>

                 
                  
                 <tr>
                   <td class="text-right"><?php $no<$no_row; echo $no++; ?></td>
                   <td><?php echo $row['date']; ?></td>
                   <td class="e_id"><?php echo $row['e_id'] ?></td>
                   <td class="e_name"><?php echo $row['e_name'] ?></td>
                   <td><?php echo $row['time_in'] ?></td>
                   <td><?php echo $row['time_out'] ?></td>
                   <td class=""><?php echo $row['leave_type'] ?></td>
                   <td class=""><?php echo $row['late_min'] ?></td>
                   <td class=""><?php echo $row['ot'] ?></td>

                   <td class=""> <?php echo number_format($row['late_lost']); ?></td>
                   <td class="">  <?php echo number_format($row['ot_amount']); ?></td>
                   <td class="">  <?php echo number_format($row['leave_lost']); ?></td>
                   <td class=""><?php echo number_format($net_total); ?></td>
                 </tr>
                 <?php
                    }
                    

                  ?>
                  </tbody>
               
               <tfoot>
                <?php
                  $get_sum = mysqli_query($conn, "SELECT *, SUM(late_min), SUM(late_lost), SUM(ot), SUM(ot_amount), SUM(leave_lost) FROM e_attendance WHERE e_id = '$e_id' AND reg_date >='$from' AND reg_date <='$to' ORDER BY reg_date");
                    while($sum_row=mysqli_fetch_assoc($get_sum)){
                      $sum_late_min = $sum_row['SUM(late_min)'];
                      $sum_late_lost = $sum_row['SUM(late_lost)'];
                      $sum_ot = $sum_row['SUM(ot)'];
                      $sum_ot_amount = $sum_row['SUM(ot_amount)'];
                      $sum_leave_lost = $sum_row['SUM(leave_lost)'];

                      $sum_lost_total = $sum_late_lost + $sum_leave_lost;
                      $sum_net_total = $sum_ot_amount - $sum_lost_total;
                ?>
                 <tr>
                    <td colspan="7" class="text-right"><b>Grand Total:</b></td>
                    <td class=""><?php echo $sum_late_min; ?>(m)</td>
                    <td class=""><?php echo $sum_ot; ?>(H)</td>
                    <td class=""> <input type="text" name="late_lost" readonly class="form-control" value="<?php echo $sum_late_lost; ?>" > </td>
                    <td class=""> <input type="text" name="ot_amount" readonly class="form-control" value="<?php echo $sum_ot_amount; ?>" ></td>
                    <td class=""> <input type="text" name="leave_lost" readonly class="form-control" value="<?php echo $sum_leave_lost; ?>" ></td>
                    <td class=""> <input type="text" readonly class="form-control text" value="<?php echo number_format($sum_net_total); ?>"> </td>
                  </tr>
                    <input type="hidden" name="e_id" value="<?php echo $sum_row['e_id'] ?>">
                   <!-- <p> Name - <?php echo $sum_row['e_name'] ?>  <p> -->

                  </tfoot>
              
                <?php
                        }
                      }
                    }
                   ?>
             </table>
             
            </div><!-- card body end -->

            <div class="card-footer text-center">
             <button name="save" id="save" class="btn btn-info"> <i class="fa fa-save"></i> Save to Payroll </button>
           </div>

          </form>

         </div>

     </div>

   </div>

 </div>

</div><!-- wrapper end -->

<script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Employee Raw Data'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Employee Raw Data'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Employee Raw Data',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Employee Raw Data</h1></div>',
                              
                        }
        ],
        "order": [[ 1, 'asc']],
    });
   dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


  });
</script>




 <?php include_once "includes/footer.php" ?>
