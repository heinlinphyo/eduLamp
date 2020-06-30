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
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title">Employees List</strong>
                                <a href="e_reg.php" class="ml-auto"><button class="btn btn-primary btn-sm" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-plus-circle"></i> New </button></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 20px;">No</th>
                                            <th class="text-info text-center">Photo</th>
                                            <th class="text-info">ID</th>
                                            <th class="text-info">Name</th>
                                            <th class="text-info">Position</th>
                                            <th class="text-info">Department</th>
                                            <th class="text-info">Phone</th>
                                            <th class="text-info">Email</th>
                                            <th class="text-info">Address</th>                              
                                            <th class="text-center text-info" style="width: 100px;">Update</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $get_all=mysqli_query($conn,"SELECT * FROM emp");
                                            while($result_all=mysqli_fetch_assoc($get_all)){
                                            		$row_e=mysqli_num_rows($get_all);
                                        		
										                      ?>
										<tr>
											<td class="text-right align-middle" style="width: 40px;"><?php $no<$row_e; echo $no++; ?></td>
											<td class="text-center align-middle">
												<?php
													if($result_all['image']!=""){
						  						?>
						  						<a href="e_info.php?id=<?php echo $result_all['e_id']?>"><img src="hr/photos/<?php echo $result_all['image']?>" style="width: 40px;height: 40px;box-shadow: 0 0 2px gray;border-radius: 40px;"/></a>
						  						<?php
						  							}
						  							else{
						  						?>
						  						<a href="e_info.php?id=<?php echo $result_all['e_id']?>"><i class="fas fa-user-circle fa-3x text-primary"></i></a>
						  						<?php
						  							}
												?>

											</td>
                      <td class="align-middle"><?php echo $result_all['e_id']; ?></td>
											<td class="align-middle"><?php echo $result_all['e_name']; ?></td>
                      <td class="align-middle"><?php echo $result_all['post_name']; ?></td>
                      <td class="align-middle"><?php echo $result_all['dept_name'] ?></td>
											<td class="align-middle"><?php echo $result_all['phone']; ?></td>
                      <td class="align-middle"><?php echo $result_all['email'] ?></td>
											<td class="align-middle"><?php echo $result_all['address']; ?></td>
									   <td class="align-middle text-center"><a href="e_edit.php?id=<?php echo $result_all['e_id']?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                      
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
   var dataTable = $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        
        buttons: [
                   {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Employees List'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Employees List'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Employees List',
                        },
                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Employees List</h1></div>',
                              
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
