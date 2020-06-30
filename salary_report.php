
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
  <?php
    include_once ("includes/sidebar.php");
    include_once ("includes/navbar.php");
  ?>

   <!-- .content -->
         <div class="content mt-3">
          <div class="animated fadeIn">
                 <div class="row">
                     <div class="col-md-12">
                       <form class="" action="" method="post">
                         <div class="card" >
                             <div class="card-header row ml-1 mr-1">
                                <strong class="card-title"><i class="fa fa-file-invoice-dollar"></i> Salary Report </strong>

                              <input type="date" id="start_date" name="start_date" class="form-control col-2 ml-auto"/>
                                <input type="date" id="end_date" name="end_date" class="form-control col-2 ml-1" value="<?php echo date('Y-m-d'); ?>"/>
                                <button class="btn btn-primary btn-sm ml-2" id="search" name="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
                              </form>
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
                                          <th class="text-info">OT(+)</th>
                                          <th class="text-info">Total Deduction(-)</th>
                                          <th class="text-info">Net Pay</th>
                                          <th class="text-info">Date</th>
                                          <th class="text-info">Asign</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        <?php
                                            if(isset($_POST['search'])){
                                              $no =1;
                                              $from = $_POST['start_date'];
                                              $to = $_POST['end_date'];
                                              $get_data = mysqli_query($conn, "SELECT * FROM e_payslip WHERE created_date >= '$from' AND created_date <= '$to' AND status='null' ORDER BY created_date");
                                              while($result = mysqli_fetch_assoc($get_data)){
                                                $row = mysqli_num_rows($get_data);
                                          ?>
                                            <tr>
                                              <td class="text-right"><?php $no<$row; echo $no++; ?></td>
                                              <td><?php echo $result['payslip_no'] ?></td>
                                              <td><?php echo $result['e_id'] ?></td>
                                              <td><?php echo $result['e_name'] ?></td>
                                              <td><?php echo number_format($result['basic_salary']) ?></td>
                                              <td><?php echo number_format($result['net_salary']) ?></td>
                                              <td>
                                                <?php
                                                if($result['ot_amount']==''){
                                                  echo "0";
                                                }else{
                                                echo number_format($result['ot_amount']); }
                                                 ?>
                                              </td>

                                              <td>
                                                <?php
                                                if($result['total_deduction'] == '')
                                                { echo "0"; } else{ echo number_format($result['total_deduction']); }
                                                ?>
                                              </td>
                                              <td><?php echo number_format($result['net_pay']) ?></td>
                                              <td><?php echo $result['created_date'] ?></td>
                                              <td><?php echo $result['pay_user'] ?></td>
                                            </tr>
                                          <?php

                                              }

                                            }

                                         ?>

                                      </tbody>
                                 </table>

                             </div><!-- card body end -->
                             

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
                            title: 'Salary Report'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Salary Report'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Salary Report',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Salary Report</h1></div>',
                              
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
