<?php include_once "includes/header.php"; 

	$page="admin";

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
      $token=md5(rand(1, 1000).time());
      setcookie("csrf", $token);
?>
<!-- ======= DataTable ======= --->
<link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/Buttons-1.6.2/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="DataTables/Buttons-1.6.2/css/buttons.dataTables.min.css">
<script type="text/javascript" src="DataTables/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.6.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.6.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<div class="wrapper">
  <?php
    include_once('includes/sidebar.php');
    include_once('includes/navbar.php');
  ?>
   <!-- .content -->
        <div class="content mt-5">
          <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title"> Hostel Fees Setting</strong>
                              <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#mediumModal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-plus-circle"></i> Create</button>
                            </div>
                            <div class="card-body">
                                <table id="hostel_data" class="table table-striped table-bordered table-hover" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                          
                                            <th class="text-right text-info align-middle" style="width: 20px;">No</th>
                                            <th class="text-info text-center">Grade</th>
                                            <th class="text-info text-center">Fees</th>
                                            <th class="text-info text-center">Remark</th>
                                            <th class="text-info align-middle text-center" style="width: 100px;">Edit</th>
                                            <th class="text-info align-middle text-center" style="width: 100px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $no=1;
                                        $sql=mysqli_query($conn, "SELECT * FROM hostel_fees ");
                                        while($row=mysqli_fetch_assoc($sql)){
                                        $num_row=mysqli_num_rows($sql);
                                      ?>
                                      <tr>
                                        <td class=""><?php $no<$num_row; echo $no++; ?></td>
                                        <td class="text-center"><?php echo $row['grade_name'] ?></td>
                                        <td class="text-center"><?php echo number_format($row['fees']) ?></td>
                                        <td><?php echo $row['remark'] ?></td>
                                        <td class="align-middle text-center"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-edit"></i> Edit</button></td>

                                           <td class="text-center align-middle"><button class="btn btn-danger btn-sm" id="del<?php echo $row['id']; ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-minus-circle"></i> Delete</button></td>
                                      </tr>
                                       <script>
                                          $('#del<?php echo $row['id'];  ?>').on('click', (e) => {
                                            Swal.fire({
                                              title: 'ပယ်ဖျက်ပါမည်။?',
                                              text: 'အချက်အလက်များကို ပယ်ဖျက်လိုက်ပါက ဆုံးရှုံးနိုင်မှုရှိနိုင်ပါသည်။!',
                                              type: 'warning',
                                              showCancelButton: true,
                                              confirmButtonText: '<a href="admin/hostel_fees_delete.php?id=<?php echo $row['id'];  ?> " class="text-white">သေချာသည်။</a>',
                                              cancelButtonText: 'မသေချာသေးပါ။'
                                          });
                                      });
                                    </script>
                                    <!-- Edit Modal Start-->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Hostel Fees Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="admin/hostel_fees_update.php?id=<?php echo $row['id']?>" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <div class="form-group">   
                            <div class="input-group">
                                <label class="mt-2 col-md-2">Grade</label>
                                  <input type="text" class="form-control" name="g_name" autocomplete="off" style="color:blue;" readonly value="<?php echo $row['grade_name']; ?>">
                                            
                            </div>
                        </div>
                      
                      
                       <div class="form-group">   
                            <div class="input-group">
                                <label class="mt-2 col-md-2">Fees</label>
                                  <input type="text" class="form-control" name="fees" autocomplete="off" style="color:blue;" required value="<?php echo $row['fees']; ?>">         
                          </div>
                        </div>

                         <div class="form-group">   
                            <div class="input-group">
                                <label class="mt-2 col-md-2">Remark</label>
                                <textarea class="form-control" name="remark"><?php echo $row['remark']?></textarea>
                          </div>
                        </div>

                      
                    </div><!-- modal body end -->
                       <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                                   <button name="update" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-edit"></i> Update</button>
                                </div>

                              </form>
          </div><!-- modal content end -->
     </div>
</div><!-- Edit Modal End -->
                                    <?php } ?>
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
     var dataTable= $('#hostel_data').DataTable({
                lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
                dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            title: 'Hostel Fees'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Hostel Fees'
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Hostel Fees'
                        },
                        {
                            extend: 'print',
                            title: 'Hostel Fees'
                        }
                    ],
               
                
                "order": [[ 1, 'asc' ]],
    

            });
    
                          dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
  });
</script>










<?php include_once('includes/footer.php') ?>


 <!-- Creat Modal-->
     <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">New Fees </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="admin/hostel_fees_new.php" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <div class="form-group">   
                            <div class="input-group">
                                 <label for="g_id" class="form-control col-1"><i class="fa fa-crown"></i></label>
                                  <select class="form-control" name="g_id" id="g_id">
                                    <option value="">Select Grade</option>
                                    <?php
                                      $sql_g=mysqli_query($conn, "SELECT * FROM grades ");
                                      while($row_g=mysqli_fetch_assoc($sql_g)){
                                    ?>
                                    <option value="<?php echo $row_g['id']?>">
                                      <?php echo $row_g['grade_name'] ?>
                                    </option>
                                  <?php } ?>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group">   
                            <div class="input-group">
                                 <label for="fees" class="form-control col-1"><i class="fa fa-wallet"></i></label>
                                <input type="text" placeholder="Fees" minlength="1" class="form-control" name="fees" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">   
                            <div class="input-group">
                                 
                                <textarea class="form-control" name="remark" placeholder="Description"></textarea>
                            </div>
                        </div>

                    </div>

                   
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="save" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-check"></i> Confirm</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
    <!-- Creat Modal-->