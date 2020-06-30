<?php include_once "includes/header.php"; 

	   $page="dashboard";
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

      $sql_emp=mysqli_query($conn, "SELECT * FROM emp WHERE username='$user' AND freeze='' ");
      $row_emp=mysqli_fetch_assoc($sql_emp);
      $e_id=$row_emp['e_id'];
?>

<div class="wrapper">
  <?php
    include_once('includes/sidebar.php');
    include_once('includes/navbar.php');
  ?>
    <!-- .content -->
        <div class="content mt-3">
          <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title" style="text-transform: uppercase;"><?php echo  $row_emp['e_name']; ?>'s Profile</strong>
                            
                            </div>
                            <div class="card-body">
                                 <form action="hr/password_update.php?e_id=<?php echo $row_emp['e_id']; ?>" method="post">
                            
                               <div class="form-group">   
                                  <div class="input-group">
                                              <label for="password" class="mt-1 col-sm-1"><i class="fa fa-unlock-alt"></i> </label>
                                              <input type="password" name="password" minlength="5" class="form-control"  value="<?php echo $row_emp['password']; ?>" required autocomplete="off" style="color:green;" placeholder="Password">
                                      </div>
                              </div>
                            
                    
                               <div class=" form-group text-center">
                                <button name="update" class="btn btn-primary btn-sm " style="border-radius: 2px;"><i class="fa fa-th-large"></i> Update</button>
                               </div>
                              
                              
                            </form><!-- update pass form -->
                            </div>
                            <hr/>
                              <form action="" method="post">
                              <div class="card-header row ml-1 mr-1">
                                <strong class="card-title">Attendance Report</strong>
                              
                                <input type="date" id="start_date" name="start_date" class="form-control col-md-2 ml-auto"/>
                                <input type="date" id="end_date" name="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
                                
                                <button class="btn btn-primary btn-sm ml-2" id="search" name="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
                              
                            </div>
                            </form>
                            <div class="card-body">
                              
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                            <th class="text-right text-info align-middle" style="width: 10px;">No</th>
                                           <th class="text-info align-middle">Name</th>
                                           <th class="text-info align-middle text-center">Time In</th>
                                           <th class="text-info align-middle text-center">Time Out</th>
                                           <th class="text-info align-middle text-right">Late (min)</th>   
                                           <th class="text-info align-middle text-right">OT (min)</th>
                                           <th class="text-info align-middle text-center text-danger">Leave Name</th>
                                           <th class="text-info align-middle text-center">Date</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                      <?php
                                        if(isset($_POST['search'])){
                                          $no=1;
                                          $start_date=$_POST['start_date'];
                                          $end_date=$_POST['end_date'];
                                          $sql=mysqli_query($conn, "SELECT * FROM e_attendance WHERE date>='$start_date' AND date<='$end_date' AND e_id='$e_id' ");
                                        }else{
                                          $no=1;
                                          $today=date('Y-m-d');
                                          $sql=mysqli_query($conn, "SELECT * FROM e_attendance WHERE date='$today' AND e_id='$e_id' ");
                                        }

                                      ?>
                                      <?php 
                                          while($row=mysqli_fetch_assoc($sql)){
                                            $row_num=mysqli_num_rows($sql);
                                      ?>
                                      <tr>
                                        <td><?php echo $no<$row_num; echo $no++; ?></td>
                                        <td><?php echo $row['e_name'] ?></td>
                                        <td><?php echo $row['time_in'] ?></td>
                                        <td><?php echo $row['time_out'] ?></td>
                                        <td><?php echo $row['late_min']?></td>
                                        <td><?php echo $row['ot'] ?></td>
                                        <td><?php echo $row['leave_type'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                                
                          
                            </div><!-- card body end -->
                            
                            </hr>
                            <!-- leave table start -->
                            <div class="card-header row ml-1 mr-1">
                               <strong class="card-title">Leaves </strong>
                            </div><!-- card header end -->
                            <div class="card-body">
                                <table id="leave" class="table table-striped table-bordered" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info">No</th>
                                            
                                            <th class="text-info">Leave</th>
                                            <th class="text-info">Days</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                      <?php
                                        
                                          $no=1;
                                          $sql_leave=mysqli_query($conn, "SELECT * FROM leave_category ");
                                          while($row_leave=mysqli_fetch_assoc($sql_leave)){
                                            $num=mysqli_num_rows($sql_leave);
                                            $leave_name=$row_leave['name'];

                                            $leave_filter=mysqli_query($conn, "SELECT *,SUM(days) FROM e_leave WHERE leave_name='$leave_name' AND e_id='$e_id' ");
                                          

                                           $row_filter=mysqli_fetch_assoc($leave_filter);
                                            
                                            $days=$row_filter['SUM(days)'];
                                            
                                          
                                          ?>
                                          <tr>
                                            <td><?php $no<$num; echo $no++; ?></td>
                                            
                                            <td> <?php echo $leave_name; ?> </td>
                                            <td> <?php echo '<span class="text-danger">'. $days .'</span>' ?> / <?php echo $row_leave['day'] ?> </td>
                                          </tr>
                                      <?php    
                                          }
                                      ?>
                  
                                    </tbody>
                                </table>
                            </div>
                            <!-- leave table end -->

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
                            title: 'Attendance Report'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Attendance Report'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Attendance Report',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Attendance Report</h1></div>',
                              
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
   <script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#leave').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Leave Report'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Leave Report'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Leave Report',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Leave Report</h1></div>',
                              
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

    
  
    <?php include_once('includes/footer.php'); ?>

   
   
