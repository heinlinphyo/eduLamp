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
		header("location:logout.php");
    }
    $page = "hr";


 ?>



<div class="wrapper">
   <!-- .content -->
         <div class="content mt-3">
          <div class="animated fadeIn">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card">
                             <div class="card-header row ml-1 mr-1">
                                 <strong class="card-title"><i class="fa fa-file-excel"></i> Employee's Pay Roll</strong>

                                 
                                <a href="payroll_check.php" class="ml-auto mr-1"><button class="btn btn-info" style="border-radius: 2px;box-shadow: 0 0 3px gray;"> <i class="fa fa-chart-line"></i> Check </button></a>
                                <a href="raw_data.php" class="ml-3"> <button class="btn btn-secondary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-arrow-left"></i> Back</button></a>


                             </div>
                             <div class="card-body">
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size:11px;">
                                      <thead>
                                        <tr>
                                          <th class="text-info">No</th>
                                          <th class="text-info">ID</th>
                                          <th class="text-info">Name</th>
                                          <th class="text-info">Basic Salary</th>
                                          <th class="text-info">Meal</th>
                                          <th class="text-info">Tp</th>
                                          <th class="text-info">TopUp</th>

                                          <th class="text-info">Net Salary</th>
                                          <th class="text-info">SSB</th>
                                          <th class="text-info">Income Tax</th>
                                          <th class="text-info">Late (-)</th>
                                          <th class="text-info">Leave (-)</th>
                                          <th class="text-info">OT (+)</th>

                                          <th class="text-info">Dedu ction (-)</th>
                                          <th class="text-info">Net Pay</th>

                                          <th class="text-info">Edit</th>
                                          <th class="text-info">Save</th>
                                        </tr>
                                      </thead>
                                      <tbody>


                                        <?php
                                          $no = 1;
                                          $get_pay = mysqli_query($conn, "SELECT e_payroll.* , e_salary.*  FROM e_payroll LEFT JOIN e_salary ON e_payroll.e_id = e_salary.e_id WHERE e_payroll.status = '' ");
                                          while($row = mysqli_fetch_assoc($get_pay)){
                                            $no_row=mysqli_num_rows($get_pay);
                                         ?>
                                         <tr>
                                           <td class="text-right"><?php $no<$no_row; echo $no++; ?></td>
                                           <td><?php echo $row['e_id'] ?></td>
                                           <td><?php echo $row['e_name'] ?></td>
                                           <td><?php echo number_format($row['basic_salary'])  ?></td>
                                           <td>
                                             <?php

                                             if($row['meal_allow']==''){
                                               echo "0";
                                             }else{
                                             echo number_format($row['meal_allow']);

                                              }
                                             ?>

                                           </td>
                                           <td>
                                             <?php
                                             if($row['transpo_allow']==''){
                                               echo "0";
                                             }else{
                                             echo number_format($row['transpo_allow']);
                                           }
                                             ?>
                                           </td>
                                           <td>
                                             <?php
                                             if($row['top_up_allow']==''){
                                               echo "0";
                                             }else{
                                              echo number_format($row['top_up_allow']);
                                            }

                                               ?>

                                           </td>

                                           <td><?php echo number_format($row['net_salary']) ?></td>
                                           <td>
                                             <?php
                                             if($row['ssb']==''){
                                               echo "0";
                                             }else{
                                              echo number_format($row['ssb']);
                                            }
                                               ?>
                                           </td>
                                           <td>
                                             <?php
                                                if($row['income_tax']==''){
                                                  echo "0";
                                                }else{

                                                    echo number_format($row['income_tax']);
                                                    }
                                              ?>

                                           </td>
                                           <td>
                                             <?php
                                             if($row['late_fine']==''){
                                               echo "0";
                                             }else{
                                             echo number_format($row['late_fine']);
                                           }
                                              ?>

                                           </td>
                                           <td>
                                             <?php
                                            if($row['leave_fine']==''){
                                              echo "0";
                                           }else{ echo number_format($row['leave_fine']);
                                           }
                                              ?>
                                           </td>
                                           <td>
                                             <?php
                                             if($row['ot_total']==''){
                                               echo "0";
                                             }else{
                                             echo number_format($row['ot_total']); }
                                              ?>
                                           </td>

                                           <td>
                                             <?php
                                             if($row['other_deduction'] == '')
                                             { echo "0"; } else{ echo number_format($row['other_deduction']); }
                                             ?>
                                           </td>
                                           <td>
                                             <?php
                                             if($row['net_pay']==''){
                                               echo "0";
                                             }else{
                                             echo number_format($row['net_pay']);
                                           }
                                              ?>
                                           </td>
                                           <td><a href="payroll_edit.php?id=<?php echo $row['payroll_id'] ?>" class="btn btn-primary btn-sm" style="border-radius: 2px;box-shadow: 0 0 3px gray;width: 100px;"><i class="fa fa-edit"></i> Update</a></td>
                                           <td> <button class="btn btn-success btn-sm" id="save<?php echo $row['id'] ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;width: 70px;"> <i class="fa fa-save"></i> Save </button> </td>
                                            <script>
                                              $('#save<?php echo $row['id'] ?>').on('click', (e) => {
                                                Swal.fire({
                                                    title: 'သတိပေးချက်',
                                                    text: 'သိမ်းဆည်းမှုကို ပြုလုပ်ရန် သေချာပါသလား ။',
                                                    type: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: '<a href="hr/payroll_add.php?id=<?php echo $row['payroll_id']; ?> " class="text-white" >ပြုလုပ်မည်။</a>',
                                                    cancelButtonText: 'မသေချာသေးပါ။'
                                                });
                                              });
                                         </script>
                                         </tr>
                                        
                                       <?php } // get_pay//   ?>

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
                            title: 'Employee Payroll'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Employee Payroll'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Employee Payroll',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Employee Payroll</h1></div>',
                              
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
