<?php

	include_once "includes/header.php";

	session_start();
  $page="hr";
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
                        <div class="card">
                            <div class="card-header row ml-1 mr-1" >
										            <strong><i class="fas fa-hand-holding-usd"></i> Employees Salary List</strong>
                                <button type="button" name="new" id="newRecord" class="btn btn-success ml-auto mr-1" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fas fa-plus-circle"></i> Create</button>
										        </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th class="text-info text-right" style="width: 20px;">No</th>
                                            <th class="text-info">ID</th>
                                            <th class="text-info">Name</th>
                                            <th class="text-info">Basic Salary</th>
                                            <th class="text-info">Meal Allow</th>
                                            <th class="text-info">Transport Allow</th>
																						<th class="text-info">TopUp Allow</th>
																						<th class="text-info">Net Salary</th>
																						<th class="text-info">Income Tax</th>
																						<th class="text-info">SSB</th>
                                            <th class="text-center text-info">Info</th>
                                            <th class="text-center text-info">Edit</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $no=1;
                                        $get_all=mysqli_query($conn, "SELECT * FROM e_salary WHERE status='' ");
                                        while($row_all=mysqli_fetch_assoc($get_all)){
                                          $row=mysqli_num_rows($get_all);
                                      ?>
                                      <tr>
                                        <td class="align-middle"><?php $no<$row; echo $no++ ?></td>
                                        <td class="align-middle"><?php echo $row_all['e_id']?></td>
                                        <td class="align-middle"><?php echo $row_all['e_name']?></td>
                                        <td class="align-middle">
                                          <?php echo number_format($row_all['basic_salary'])?>
                                            
                                        </td>
                                        <td class="align-middle">
                                          <?php 
                                            if($row_all['meal_allow']==''){ echo "0";}else{
                                            echo number_format($row_all['meal_allow']); }
                                          ?>
                                            
                                        </td>
                                        <td class="align-middle">
                                          <?php 
                                            if($row_all['transpo_allow']==''){ echo "0";}else{
                                            echo number_format($row_all['transpo_allow']); }
                                          ?>
                                            
                                        </td>
                                        <td class="align-middle">
                                          <?php 
                                            if($row_all['top_up_allow']==''){ echo "0";}else{
                                            echo number_format($row_all['top_up_allow']); }
                                          ?>
                                            
                                        </td>
                                        <td class="align-middle">
                                          <?php echo number_format($row_all['net_salary'])?>
                                            
                                        </td>
                                        <td class="align-middle">
                                          <?php 
                                            if($row_all['income_tax']==''){ echo "0";}else{
                                            echo number_format($row_all['income_tax']); }
                                          ?>
                                            
                                        </td>
                                        <td class="align-middle">
                                          <?php 
                                            if($row_all['ssb']==''){ echo "0";}else{
                                            echo number_format($row_all['ssb']); }
                                          ?>
                                            
                                        </td>
                                        <td class="align-middle text-center"><a href="salary_info.php?id=<?php echo $row_all['id']?>" class="btn btn-info btn-sm" style="border-radius: 2px;box-shadow: 0 0 3px gray;width: 55px;"><i class="fa fa-info"></i> Info</a>
                                        </td>

                                        <td class="align-middle text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $row_all['id']; ?>" style="border-radius: 2px;box-shadow: 0 0 3px gray;width: 80px;"><i class="fa fa-edit"></i> Edit</button></td>

                                      </tr>

<!-- Edit Modal-->
     <div class="modal fade" id="edit<?php echo $row_all['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel" style="text-transform: uppercase;"><b><?php echo $row_all['e_name']; ?>'s Salary Edit</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                           
                    <div class="modal-body">
                      <form action="hr/salary_update.php?id=<?php echo $row_all['id']; ?>" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <div class="form-group">   
                            <div class="input-group">
                                <label class="mt-2 col-md-3">Basic Salary</label>
                                  <input type="text" class="form-control" name="up_basic" autocomplete="off" style="color:blue;" required value="<?php echo $row_all['basic_salary']; ?>">            
                             </div>
                        </div>
                      
                      
                       <div class="form-group">   
                          <div class="input-group">
                            <label class="mt-2 col-md-3">Meal Allownce</label>
                              <input type="text" class="form-control" name="up_meal" autocomplete="off" style="color:blue;" value="<?php echo $row_all['meal_allow']; ?>" >                              
                            </div>
                        </div>
                        
                      <div class="form-group">   
                          <div class="input-group">
                            <label class="mt-2 col-md-3">Transport Allowance</label>
                              <input type="text" class="form-control" name="up_transpo" autocomplete="off" style="color:blue;" value="<?php echo $row_all['transpo_allow']; ?>" >                  
                          </div>
                      </div>
                        
                                              
                      <div class="form-group">   
                          <div class="input-group">
                              <label class="mt-2 col-md-3">TopUp Allowance</label>
                                <input type="text" class="form-control" name="up_topup" autocomplete="off" style="color:blue;" value="<?php echo $row_all['top_up_allow']; ?>" >         
                          </div>
                      </div>
                        
                      <hr>
                        <div class="form-group">   
                            <div class="input-group">
                              <label class="mt-2 col-md-3">Income Tax</label>
                                <input type="text" name="up_income_tax" class="form-control" autocomplete="off" value="<?php echo $row_all['income_tax']; ?>"  style="color: blue;">
                            </div>
                        </div>
                        
                         <div class="form-group">   
                            <div class="input-group">
                              <label class="mt-2 col-md-3">SSB</label>
                                <input type="text" name="up_ssb" class="form-control" autocomplete="off" value="<?php echo $row_all['ssb']; ?>" style="color: blue;">
                            </div>
                        </div>


                    </div><!-- modal body end -->
                            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="update" class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-th-large"></i> Update</button>
                     </div>
                    </form>
            </div>
        </div>
     </div>
    <!-- Edit Modal End -->



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


<script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Employees Salary List'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Employees Salary List'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Employees Salary List',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Employees Salary List</h1></div>',
                              
                        }
        ],
        "order": [[ 1, 'asc']],
    });
   dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

         $(document).ready(function(){
          $('#newRecord').click(function(){
          $('#newModal').modal('show');

  });
      });

  });
</script>

<?php include_once "includes/footer.php" ?>

<!-- Record New Modal Begin -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="mediumModalLabel"><b>New Salary</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
          </div>
              <div class="modal-body">
                  <form action="hr/salary_add.php" method="post">
                    <input type="hidden" name="token" value="<?= $token ?>">
                      <div class="form-group">
                          <div class="input-group">
                            <select class="form-control" name="e_id" required style="color: blue;">
                              <option value="">Select Employee</option>
                              <?php
                                $get_e = mysqli_query($conn, "SELECT * FROM emp ORDER BY e_id DESC");
                                while($row_e=mysqli_fetch_assoc($get_e)){
                               ?>
                               <option value="<?php echo $row_e['e_id'] ?>">
                               <?php echo $row_e['e_id'] ?> /<?php echo $row_e['e_name'] ?> 
                               </option>
                             <?php } ?>
                            </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="input-group">
                              <input type="text" id="basic" class="form-control" name="basic" autocomplete="off" required placeholder="Basic Salary" style="color: blue;">
                          </div>
                      </div>

                       <div class="form-group">
                          <div class="input-group">
                              <input type="text" id="meal" class="form-control" name="meal" autocomplete="off" placeholder="Meal Allowance" style="color: blue;">
                          </div>
                      </div>

                      <div class="form-group">
                         <div class="input-group">
                            <input type="text" id="transport" class="form-control" name="transport" autocomplete="off" placeholder="Transporation Allowance" style="color: blue;">
                         </div>
                     </div>

                     <div class="form-group">
                        <div class="input-group">
                          <input type="text" id="topup" class="form-control" name="topup" autocomplete="off" placeholder="Top Up Allowance" style="color: blue;">
                        </div>
                    </div>

                    <div class="form-group">
                       <div class="input-group">
                          <input type="text" id="net_salary" class="form-control text-danger" name="net_salary" autocomplete="off" readonly placeholder="Net Salary">
                       </div>
                   </div>

  								 <div class="form-group">
  								 	<div class="input-group">
  								 		<input type="text" name="income_tax" id="income_tax" class="form-control" autocomplete="off" placeholder="Income Tax" style="color: blue;">
  								 	</div>
  								 </div>

  								 <div class="form-group">
  								 	<div class="input-group">
  								 		<input type="text" name="ssb" id="ssb" class="form-control" autocomplete="off" placeholder="SSB" style="color: blue;">
  								 	</div>
  								 </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-times-circle"></i> Cancel</button>
                        <button name="post" class="btn btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-th-large"></i> Save</button>
                    </div>
              </form>
      </div><!-- modal body end -->
      </div>
  </div>
</div>
<!-- Record New Modal Begin End -->
<script type="text/javascript">
  $(function () {
    $("#basic, #meal, #transport, #topup").keyup(function () {
      $("#net_salary").val(+$("#basic").val() + +$("#meal").val() + +$("#transport").val() + +$("#topup").val());
    });
  });
</script>


