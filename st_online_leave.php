<?php

	include_once "includes/header.php";

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

    $page = "learn";

?>






<div class="wrapper">
  <?php
      include_once ("includes/sidebar.php");
      include_once ("includes/navbar.php");
   ?>
   <!-- .content -->
        <div class="content mt-3 ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1" >
										            Students Leave List 
                                <a href="st_leave.php" class="btn btn-info ml-auto"><i class="fa fa-file-pdf"></i> Leave </a>
                               
										        </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 13px;">

                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 20px;">No</th>
                                            <th class="text-info">ID</th>
                                            <th class="text-info">Name</th>
                                            <th class="text-info">Grade</th>
                                            <th class="text-info">Leave</th>
                                            <th class="text-info">Start</th>
                                            <th class="text-info">End</th>
											<th class="text-info">Asing</th>
											<th class="text-info">Asign Date</th>
                                            <th class="text-center text-info">Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                      <?php
                                      $no=1;
                                          $sql_leave=mysqli_query($conn, "SELECT * FROM st_leaves WHERE status='' ORDER BY id DESC ");
                                          while($row_leave=mysqli_fetch_assoc($sql_leave)){
                                            $row_num=mysqli_num_rows($sql_leave);

                                       ?>
                                      <tr>
                                        <td><?php $no<$row_num; echo $no++; ?></td>
                                        <td><?php echo $row_leave['st_id'] ?></td>
                                        <td><?php echo $row_leave['st_name'] ?></td>              
                                        <td><?php echo $row_leave['grade_name'] ?></td>
                                        <td><?php echo $row_leave['leave_type'] ?></td>
                                        <td><?php echo $row_leave['start'] ?></td>
                                        <td><?php echo $row_leave['end_date'] ?></td>
                                        <td><?php echo $row_leave['reg_user'] ?></td>
                                        <td><?php echo $row_leave['reg_date'] ?></td>
                                      
                                        <td>
                                       
                                         <a href='learn/st_leave_update.php?id=<?php echo $row_leave['id'] ?>' class='btn btn-warning btn-sm' style="width: 100px;"><i class='fa fa-location-arrow'></i> Pending</a>
                                          
                                        </td>  
                                        
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- card body end -->
														
                        </div><!-- card end -->

                    </div>
                </div>
        </div>
        <!-- .content -->
</div><!-- wrapper end -->






<?php include_once "includes/footer.php" ?>
<script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Students Leave List'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Students Leave List'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Students Leave List',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Students Leave List</h1></div>',
                              
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







                     

                   
             