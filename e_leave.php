<?php
      include_once "includes/header.php";

      session_start();
      if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
      }else{
        $user = "";
      }
      if($user){

      }else {
        header("location: logout.php");
      }
      $page = "hr";

     
       $token = md5(rand(1, 1000).time());
       setcookie("csrf", $token);
              
?>


<div class="wrapper">
  <?php

    include_once ("includes/sidebar.php");
    include_once ("includes/navbar.php");
   ?>
   <!-- .content -->
        <div class="content mt-3">

                <div class="row">

                    <div class="col-md-12">
                       <form class="" action="" method="post">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
             <strong class="card-title"><i class="fa fa-file"></i> Employees Leave</strong>

                
                <input type="date" id="start_date" name="start_date" class="form-control col-md-2 ml-auto"/>
                  <input type="date" id="end_date" name="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
                    <button class="btn btn-primary btn-sm ml-2" id="search" name="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
                

                 <button class="btn btn-info btn-sm ml-2" name="new" id="newRecord" style="height: 38px;border-radius: 2px; box-shadow: 0 0 3px gray;margin-right:10px;"><i class="fas fa-plus-circle"></i> New</button>
               </div>
            </form>


                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 20px;">No</th>
                                            <th class="text-info text-center">ID</th>
                                            <th class="text-info">Name</th>
                                            <th class="text-info">Leave</th>
                                            <th class="text-info">Start</th>
                                            <th class="text-info">End</th>
                                            <th class="text-info">Asign</th>
                                            <th class="text-info">Create</th>                              
                                            <th class="text-center text-info" style="width: 100px;">Update</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                          if(isset($_POST['search'])){
                                            $from=$_POST['start_date'];
                                             $to =$_POST['end_date'];
                                              $no=1;
                                             $get_all=mysqli_query($conn,"SELECT * FROM e_leave WHERE created_date>='$from' AND created_date<='$to' AND status='' ");
                                          }else{
                                            $no=1;
                                            $today=date('Y-m-d');
                                            $get_all=mysqli_query($conn,"SELECT * FROM e_leave WHERE created_date='$today' AND status='' ");
                                          }
                                            while($result_all=mysqli_fetch_assoc($get_all)){
                                            		$row_e=mysqli_num_rows($get_all);
                                        		
										                      ?>
										<tr>
											<td class="text-right align-middle" style="width: 40px;"><?php $no<$row_e; echo $no++; ?></td>
                      <td class="align-middle"><?php echo $result_all['e_id']; ?></td>
											<td class="align-middle"><?php echo $result_all['e_name']; ?></td>
                   
											<td class="align-middle"><?php echo $result_all['leave_name']; ?></td>
											<td class="align-middle"><?php echo $result_all['start_date']; ?></td>
											<td class="align-middle"><?php echo $result_all['end_date']; ?></td>
                      <td class="align-middle"><?php echo $result_all['asign'] ?></td>
                      <td class="align-middle"><?php echo $result_all['created_date'] ?></td>
									   <td class="align-middle text-center"><a href="e_leave_edit.php?id=<?php echo $result_all['id']?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                      
                    </tr>

										

										<?php
										}
                                        ?>
                                    </tbody>
                                </table>
                            </div>



                        </div>

                    </div>


                </div>



        </div>
        <!-- .content -->


</div><!-- wrapper end -->

 <script type="text/javascript">
  $(document).ready(function(){
    $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        
        buttons: [
                {
                            extend: 'excelHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Employees Leaves',
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Employees Leaves',
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Employees Leaves',
                        },
                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Employees Leaves</h1></div>',
                              
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




<?php include_once ("includes/footer.php") ?>


<script>

      $(document).ready(function(){
          $('#newRecord').click(function(){
          $('#newModal').modal('show');

  });
      });
  </script> 

<!-- Record New Modal Begin -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="mediumModalLabel"> Employee's New Leave </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
            <div class="modal-body">
              
                <form action="hr/e_leave_reg.php" method="post">
                  <input type="hidden" name="token" value="<?= $token ?>">
                    <div class="form-group">
                        <div class="input-group">
                          <select class="form-control" name="e_id" required>
                            <option value="">Select Employee</option>
                            <?php
                              $get_e = mysqli_query($conn, "SELECT * FROM emp ORDER BY e_id DESC");
                              while($row_e=mysqli_fetch_assoc($get_e)){
                             ?>
                             <option value="<?php echo $row_e['e_id'] ?>">
                               <?php echo $row_e['e_name'] ?> / <?php echo $row_e['e_id'] ?>
                             </option>
                           <?php } ?>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                          <select class="form-control" name="leave_id" required>
                            <option value="">Select Leave</option>
                            <?php
                              $get_leave = mysqli_query($conn, "SELECT * FROM leave_category");
                              while($row_leave=mysqli_fetch_assoc($get_leave)){
                             ?>
                             <option value="<?php echo $row_leave['id'] ?>">
                               <?php echo $row_leave['name'] ?>
                             </option>
                           <?php } ?>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <label for="s_date" class="form-control col-2">From</label>
                            <input type="date" class="form-control" name="s_date"  autocomplete="off" required >
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="input-group">
                              <label for="e_date" class="form-control col-2">To</label>
                              <input type="date" class="form-control" name="e_date"  autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                       <div class="input-group">
                             <input type="text" class="form-control" name="days"  autocomplete="off"  required placeholder="Duration Days">
                       </div>
                   </div>

                   <div class="form-group">
                      <div class="input-group">
                            <select class="form-control" name="asign">
                              <option value="">Select Approved Person</option>
                              <?php
                                $get = mysqli_query($conn, "SELECT * FROM emp WHERE post_name = 'Manager' ");
                                while ($row = mysqli_fetch_assoc($get)) {
                                ?>
                                <option value="<?php echo $row['e_name'] ?>">
                                  <?php echo $row['e_name'] ?> / <?php echo $row['dept_name'] ?>
                                </option>
                                <?php
                                }
                               ?>
                            </select>
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







