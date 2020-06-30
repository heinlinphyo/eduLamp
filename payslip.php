<?php include_once "includes/header.php" ?>
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
		header("location: logout.php");
    }
    $page = "hr";

    

 ?>




<div class="wrapper">

<?php
  include_once ("includes/sidebar.php");
  include_once ("includes/navbar.php");
 ?>
   <!-- .content -->
         <div class="content mt-3">
          <div class="animated fadeIn">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card">
                             <div class="card-header row ml-1 mr-1 ">
                                 <strong class="card-title"><i class="fa fa-receipt"></i> Employees Pay Slip</strong>

                             </div>
                             <div class="card-body">
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size:12px;">
                                      <thead>
                                        <tr>
                                          <th class="text-info">No</th>
                                          <th class="text-info">PaySlip No</th>
                                          <th class="text-info">ID</th>
                                          <th class="text-info">Name</th>
                                          <th class="text-info">Basic Salary</th>
                                          <th class="text-info">Net Salary</th>
                                          <th class="text-info">OT (+)</th>
                                          <th class="text-info">Total Deduction(-)</th>
                                          <th class="text-info">Net Pay</th>
                                          <th class="text-info">Year</th>
                                          <th class="text-info" style="width: 50px;">Pay</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          $no =1;
                                          $get_payslip = mysqli_query($conn, "SELECT * FROM e_payslip WHERE status = '' ");
                                          while($row = mysqli_fetch_assoc($get_payslip)){
                                            $no_row = mysqli_num_rows($get_payslip);
                                        ?>

                                        <tr>
                                          <td><?php $no<$no_row; echo $no++; ?></td>
                                          <td><?php echo $row['payslip_no'] ?></td>
                                          <td><?php echo $row['e_id'] ?></td>
                                          <td><?php echo $row['e_name'] ?></td>
                                          <td><?php echo number_format($row['basic_salary']) ?></td>
                                          <td><?php echo number_format($row['net_salary']) ?></td>
                                          <td><?php echo number_format($row['ot_amount']) ?></td>
                                          <td><?php echo number_format($row['total_deduction']) ?></td>
                                          <td><?php echo number_format($row['net_pay']) ?></td>
                                          <td><?php echo $row['pay_year'] ?> / <?php echo $row['pay_month'] ?></td>
                                          <td> <button class="btn btn-success btn-sm" id="save<?php echo $row['id'] ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;"> <i class="fa fa-print"></i> Pay </button>  </td>
                                        </tr>
                                        <script>
                                              $('#save<?php echo $row['id'] ?>').on('click', (e) => {
                                                Swal.fire({
                                                    title: 'သတိပေးချက်',
                                                    text: 'သိမ်းဆည်းမှုကို ပြုလုပ်ရန် သေချာပါသလား ။',
                                                    type: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: '<a href="hr/payslip_print.php?id=<?php echo $row['payroll_id']; ?> " class="text-white" >ပြုလုပ်မည်။</a>',
                                                    cancelButtonText: 'မသေချာသေးပါ။'
                                                });
                                              });
                                         </script>
                                    
                                        <?php
                                          }

                                         ?>



                                      </tbody>

                                 </table>

                             </div>


                         </div>
                     </div>


                 </div>
             </div><!-- .animated -->


         </div>
         <!-- .content -->

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
                            title: 'Employee PaySlip'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Employee PaySlip'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Employee PaySlip',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Employee PaySlip</h1></div>',
                              
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




