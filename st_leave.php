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


    $token = md5(rand(1, 1000).time());
    setcookie("csrf", $token);
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
                                <a href="st_online_leave.php" class="btn btn-info ml-auto"><i class="fa fa-file-pdf"></i> Online</a>
                                <button type="button" name="new" id="newRecord" class="btn btn-primary ml-2" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fas fa-plus-circle"></i> New </button>
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
                                          $sql_leave=mysqli_query($conn, "SELECT * FROM st_leaves WHERE status='approved' ORDER BY id DESC ");
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
                                       
                                         <a href='st_leave_del.php?id=<?php echo $row_leave['id'] ?>' class='btn btn-danger btn-sm' style="width: 100px;"><i class='fa fa-times-circle'></i> Delete</a>
                                          
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
  

  $('#newRecord').click(function(){
            $('#newModal').modal('show');
          });

  });
</script>




<!-- Record New Modal Begin -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
      <div class="modal-content text-monospace">
          <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="mediumModalLabel"> Student's Leave Form </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
          </div>
              <div class="modal-body">

                  <form action="learn/st_leave_add.php" method="post">

                    <input type="hidden" name="token" value="<?= $token ?>">
                   
                       <div class="form-group">   
                                  <div class="input-group">
                                     
                                      <input list="st_id" name="st_id"  class="form-control" autocomplete="off" placeholder="Select Student ID" required autofocus>
                                        <datalist id="st_id">
                                              <option value="">Select Student</option>
                                              <?php
                                                $get_st=mysqli_query($conn,"SELECT * FROM students order by id desc");
                                                while($result_st=mysqli_fetch_assoc($get_st)){
                                                  $grade_id=$result_st['grade_id'];
                                                  $get_name=mysqli_query($conn, "SELECT * FROM grades WHERE id='$grade_id' ");
                                                  $grade_name=mysqli_fetch_assoc($get_name);

                                               ?>                                                   
                                              <option value="<?php echo $result_st['st_id']?>">
                                                <?php echo $result_st['st_name'] ?> / <?php echo $grade_name['grade_name']; ?>
                                              </option>                                    
                                                <?php } ?>
                                      </datalist>
                                      </div>
                              </div>

                     <div class="form-group">
                          <div class="input-group">
                            <select class="form-control" name="leave" required>
                              <option value="">SELECT LEAVE</option>
                              <?php
                                $leave=mysqli_query($conn, "SELECT * FROM leave_category");
                                while($row=mysqli_fetch_assoc($leave)){
                               ?>
                               <option value="<?php echo $row['name'] ?>">
                               <?php echo $row['name'] ?> 
                               </option>
                             <?php } ?>
                            </select>
                          </div>
                      </div>

                       <div class="form-group">
                         <div class="input-group">
                           <label for="start" class="form-control col-2 bg-success text-white">Start</label>
                           <input type="date" name="start" id="start" class="form-control" required>
                         </div>
                       </div>


                        <div class="form-group">
                         <div class="input-group">
                           <label for="end" class="form-control col-2 bg-success text-white">End</label>
                           <input type="date" name="end" id="end" class="form-control" required>
                         </div>
                       </div>

                     

                   
  								 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;">Cancel</button>
                        <button name="post" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-th-large"></i> Save </button>
                    </div>
              </form>
      </div><!-- modal body end -->
      </div>
  </div>
</div>
<!-- Record New Modal Begin End -->


                     

                   
             