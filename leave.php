

   <!-- .content -->
         <div class="content mt-3">
         	<div class="animated fadeIn">
                 <div class="row">

                     <div class="col-md-12">
                         <div class="card">
                             <div class="card-header row ml-1 mr-1">
                                 <strong class="card-title">Leave Category</strong>
                                 <button class="btn btn-sm ml-auto btn-primary" data-toggle="modal" data-target="#mediumModal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-plus-circle"></i> Create</button>
                             </div>
                             <div class="card-body">
                                 <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size:12px;">
                                    	<thead>
                                    		<tr>
                                          <th class="text-info">No</th>
                                    			<th class="text-info">Name</th>
                                    			<th class="text-info">Days Per Year</th>
                                          <th class="text-info">Lost Per Day</th>
                                          <th class="text-info">Created Date</th>
                                          <th class="text-info text-center">Edit</th>
                                          <th class="text-info text-center">Delete</th>
                                    		</tr>
                                    	</thead>
                                      <tbody>
                                        <?php
                                          $no=1;
                                          $get_leave = mysqli_query($conn, "SELECT * FROM leave_category");
                                          while($row = mysqli_fetch_assoc($get_leave)):
                                            $row_num=mysqli_num_rows($get_leave);
                                         ?>
                                         <tr>
                                           <td><?php $no<$row_num; echo $no++; ?></td> 
                                           <td><?php echo $row['name'] ?></td>
                                           <td><?php echo $row['day'] ?></td>
                                           <td><?php echo number_format($row['lost_amount']) ?></td>
                                           <td><?php echo $row['created_date']?></td>

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
                                confirmButtonText: '<a href="hr/leave_delete.php?id=<?php echo $row['id'];  ?> " class="text-white">သေချာသည်။</a>',
                                cancelButtonText: 'မသေချာသေးပါ။'
                            });
                        });
                          </script>

<!-- Edit Modal Start-->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel"><?php echo $row['name']; ?> Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="hr/leave_update.php?id=<?php echo $row['id']?>" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <div class="form-group">   
                            <div class="input-group">
                                <label class="mt-2 col-md-3">Name</label>
                                  <input type="text" class="form-control" name="name" autocomplete="off" style="color:blue;" required value="<?php echo $row['name']; ?>">
                                            
                            </div>
                        </div>
                      
                      
                       <div class="form-group">   
                            <div class="input-group">
                                <label class="mt-2 col-md-3">Days Per Year</label>
                                  <input type="text" class="form-control" name="day" autocomplete="off" style="color:blue;" required value="<?php echo $row['day']; ?>">         
                          </div>
                        </div>

                         <div class="form-group">   
                            <div class="input-group">
                                <label class="mt-2 col-md-3">Lost Per Day</label>
                                  <input type="text" class="form-control" name="lost_amount" autocomplete="off" style="color:blue;" required value="<?php echo $row['lost_amount']; ?>">         
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
                                       <?php endwhile; ?>
                                      </tbody>

                                 </table>

                             </div>


                         </div>
                     </div>


                 </div>
             </div><!-- .animated -->


         </div>
         <!-- .content -->




     <!-- Right Panel -->

                            
                         
        
        
                            
                            
            

     <!-- Creat Modal-->
      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
     	<div class="modal-dialog" role="document" style="background-color: rgba(0,0,0,.03);">
             <div class="modal-content bg-white">
                     <div class="modal-header">
                         <h5 class="modal-title" id="mediumModalLabel"><i class="fa fa-plus-circle"></i> Add New </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>

                     <div class="modal-body">
                       <form action="hr/leave_add.php" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                       	 <div class="form-group">
                              <div class="input-group">
                                  <input type="text" name="name" id="name" class="form-control" required placeholder="Leave Name" autocomplete="off">
                              </div>
                          </div>

                           <div class="form-group">
                                <div class="input-group">
                                    <input type="number" name="day" id="day" class="form-control" required placeholder="Leave Days Per Year" autocomplete="off">
                                </div>
                            </div>

                              <div class="form-group">
                                  <div class="input-group">
                                       <input type="text" name="lost_amount" id="lost_amount" class="form-control" placeholder="Lost Amount Per Day" autocomplete="off">
                                   </div>
                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                                   <button name="save" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-check"></i> Confirm</button>
                                </div>
                                </form>
                         </div><!-- modal body end -->

                     </div><!-- modal conten end -->



             </div>
         </div>

     <!-- Creat Modal-->
 <script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        
        buttons: [
                        {
                            extend: 'excelHtml5',
                            title: 'Leave Categories'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Leave Categories'
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Leave Categories'
                        },
                        {
                            extend: 'print',
                            title: '<h4 class="text-info">Leave Categories</h4>',
                              
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