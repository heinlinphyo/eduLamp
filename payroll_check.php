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
                       <form class="" action="" method="post">
                         <div class="card ">
                             <div class="card-header row ml-1 mr-1 ">
                                <strong class="card-title"><i class="fa fa-check"></i> Check Employee's Pay Roll Data</strong>
                                
                                <select class="form-control ml-auto col-md-2" name="e_id">
                                  <option value="">Select Employee</option>
                                  <?php
                                      $get_e = mysqli_query($conn, "SELECT * FROM emp WHERE freeze ='' ");
                                      while($row_e = mysqli_fetch_assoc($get_e)){
                                   ?>
                                   <option value="<?php echo $row_e['e_id'] ?>">
                                     <?php echo $row_e['e_name'] ?> / <?php echo $row_e['dept_name'] ?>
                                   </option>
                                 <?php } ?>
                                </select>

                                <input type="date" id="start_date" name="start_date" class="form-control col-2 ml-1"/>
                                <input type="date" id="end_date" name="end_date" class="form-control col-2 ml-1" value="<?php echo date('Y-m-d'); ?>"/>
                                <button class="btn btn-primary btn-sm ml-2" id="search" name="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
                              </form>
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
                                          <th class="text-info">Date</th>
                                          <th class="text-info">Asign</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        <?php
                                            if(isset($_POST['search'])){
                                              $no =1;
                                              $e_id = $_POST['e_id'];


                                              if($e_id){
                                              $get_data = mysqli_query($conn, "SELECT * FROM e_payroll WHERE e_id = '$e_id' ");

                                            }else{
                                              $from = $_POST['start_date'];
                                              $to = $_POST['end_date'];
                                              $get_data = mysqli_query($conn, "SELECT * FROM e_payroll WHERE created_date>='$from' AND created_date<='$to' ORDER BY created_date");
                                            }

                                              while($result = mysqli_fetch_assoc($get_data)){
                                                $row = mysqli_num_rows($get_data);
                                          ?>
                                            <tr>
                                              <td class="text-right"><?php $no<$row; echo $no++; ?></td>
                                              <td><?php echo $result['e_id'] ?></td>
                                              <td><?php echo $result['e_name'] ?></td>
                                              <td><?php echo number_format($result['basic_salary'])  ?></td>
                                              <td>
                                                <?php

                                                if($result['meal_allowance']==''){
                                                  echo "0";
                                                }else{
                                                echo number_format($result['meal_allowance']);

                                                 }
                                                ?>

                                              </td>
                                              <td>
                                                <?php
                                                if($result['transport_allowance']==''){
                                                  echo "0";
                                                }else{
                                                echo number_format($result['transport_allowance']);
                                              }
                                                ?>
                                              </td>
                                              <td>
                                                <?php
                                                if($result['topup_allowance']==''){
                                                  echo "0";
                                                }else{
                                                 echo number_format($result['topup_allowance']);
                                               }

                                                  ?>

                                              </td>

                                              <td><?php echo number_format($result['net_salary']) ?></td>

                                              <td>
                                                <?php
                                                if($result['ssb']==''){
                                                  echo "0";
                                                }else{
                                                 echo number_format($result['ssb']);
                                               }
                                                  ?>
                                              </td>
                                              <td>
                                                <?php
                                                   if($result['income_tax']==''){
                                                     echo "0";
                                                   }else{

                                                       echo number_format($result['income_tax']);
                                                       }
                                                 ?>

                                              </td>
                                              <td>
                                                <?php
                                                if($result['late_fine']==''){
                                                  echo "0";
                                                }else{
                                                echo number_format($result['late_fine']);
                                              }
                                                 ?>

                                              </td>
                                              <td>
                                                <?php
                                               if($result['leave_fine']==''){
                                                 echo "0";
                                              }else{ echo number_format($result['leave_fine']);
                                              }
                                                 ?>
                                              </td>
                                              <td>
                                                <?php
                                                if($result['ot_total']==''){
                                                  echo "0";
                                                }else{
                                                echo number_format($result['ot_total']); }
                                                 ?>
                                              </td>

                                              <td>
                                                <?php
                                                if($result['other_deduction'] == '')
                                                { echo "0"; } else{ echo number_format($result['other_deduction']); }
                                                ?>
                                              </td>
                                              <td><?php echo number_format($result['net_pay']) ?></td>
                                              <td><?php echo $result['created_date'] ?></td>
                                              <td><?php echo $result['reg_user'] ?></td>
                                            </tr>
                                          <?php

                                              }

                                            }

                                         ?>





                                      </tbody>

                                 </table>

                             </div>


                         </div>
                        <div class="card-footer row ml-1 mr-1 ">
                                <a href="payroll.php" class="btn btn-secondary" style="border-radius: 3px;"><i class="fa fa-arrow-left"></i> Back</a>
                               
                        </div><!-- card footer end -->
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
