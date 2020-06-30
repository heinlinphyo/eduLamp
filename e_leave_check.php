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
             <strong class="card-title"><i class="fa fa-check"></i> Check Employee's Leave</strong>

               

                 <div class="form-group ml-auto">
                   <div class="input-group">
                     <select class="form-control" name="e_id" id="e_id">
                       <option value="">Select Employee</option>
                       <?php
                        $sql_all=mysqli_query($conn, "SELECT * FROM emp WHERE freeze='' ");
                        while($row_e=mysqli_fetch_assoc($sql_all)){
                       ?>
                       <option value="<?php echo $row_e['e_id'] ?>">
                         <?php echo $row_e['e_name'] ?>
                       </option>
                     <?php } ?>
                     </select>
                   </div>
                 </div>
                 
              
                 <button class="btn btn-primary btn-sm ml-2" name="search" style="height: 38px;border-radius: 2px; box-shadow: 0 0 3px gray;margin-right:10px;"><i class="fas fa-search"></i> Search</button>
                 
               </div>
            </form>


                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info">No</th>
                                            <th class="text-info">Employee</th>
                                            <th class="text-info">Leave</th>
                                            <th class="text-info">Days</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                      <?php
                                        if(isset($_POST['search'])){
                                          $e_id=$_POST['e_id'];
                                          $no=1;
                                          $sql_leave=mysqli_query($conn, "SELECT * FROM leave_category ");
                                          while($row_leave=mysqli_fetch_assoc($sql_leave)){
                                            $num=mysqli_num_rows($sql_leave);
                                            $leave_name=$row_leave['name'];

                                            $leave_filter=mysqli_query($conn, "SELECT *,SUM(days) FROM e_leave WHERE leave_name='$leave_name' AND e_id='$e_id' ");
                                          

                                            $row_filter=mysqli_fetch_assoc($leave_filter);
                                            $e_name = $row_filter['e_name'];
                                            $days=$row_filter['SUM(days)'];
                                            
                                          
                                          ?>
                                          <tr>
                                            <td><?php $no<$num; echo $no++; ?></td>
                                            <td><?php echo $e_name ?></td>
                                            <td> <?php echo $leave_name; ?> </td>
                                            <td> <?php echo '<span class="text-danger">'. $days .'</span>' ?> / <?php echo $row_leave['day'] ?> </td>
                                          </tr>
                                      <?php    
                                        }
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
    var dataTable = $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        
        buttons: [
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: "Employee Leave"
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: "Employee Leave"
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: "Employee Leave"
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:"<div style='text-align:center;'><h3>Employee Leave </h3></div>",
                              
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











