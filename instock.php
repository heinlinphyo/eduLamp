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
    $page = "store";

    $token = md5(rand(1, 1000).time());
    setcookie("csrf", $token);

 ?>
  <link rel="stylesheet" href="vendor/print-js/print.css" />
 <div class="wrapper">

 <?php
   include_once "includes/sidebar.php";
   include_once "includes/navbar.php";
  ?>
 <div class="content mt-3">
   <div class="row">
     <div class="col-md-12">
       <form class="" action="" method="post">
         <div class="card" id="printJS-form">
           <div class="card-header row ml-1 mr-1">
             <strong class="card-title"><i class="fa fa-tools"></i> Instocks List</strong>

                 <input type="date" id="start_date" name="start_date" class="form-control col-md-2 ml-auto"/>
                      <input type="date" id="end_date" name="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
                          <button class="btn btn-primary btn-sm ml-2" name="search" id="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-search"></i> Search</button>
                 <button type="button" name="new" id="newRecord" class="btn btn-info ml-1" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fas fa-plus-circle"></i> New</button>

           </form>
           </div>
          

           <div class="card-body">
             <table id="instock_tb" class="table table-striped table-bordered table-hover" style="font-size: 12px;">
               <thead>
                 <tr>
                   <th class="text-info text-center">No</th>
                   <th class="text-info text-center">Date</th>
                   <th class="text-info text-center">Asign</th>
                   <th class="text-info text-center">Item</th>
                   <th class="text-info text-center">Remark</th>
                   <th class="text-info text-center">Quantity</th>
                   <th class="text-info text-center">TOTAL</th>
                 </tr>
               </thead>
               <tbody>

                 <?php

                     if(isset($_POST['search'])){

                     $start_date=$_POST['start_date'];
                     $end_date=$_POST['end_date'];
                      $no=1;
                     $get_in=mysqli_query($conn,"SELECT * FROM instocks WHERE date>='$start_date' AND date<='$end_date'");


                     while($result_in=mysqli_fetch_assoc($get_in)){
                     $row_in=mysqli_num_rows($get_in);
                 ?>
                 <tr>
                    <td class="text-center" style="width: 40px;"><?php $no<$row_in; echo $no++; ?></td>
                    <td class="text-center"><?php echo $result_in['date']; ?></td>
                    <td class="text-center"><?php echo $result_in['reg_user']; ?></td>
                    <td class="text-center"><?php echo $result_in['item']; ?></td>
                    <td class="text-center"><?php echo $result_in['remark']; ?></td>
                    <td class="text-right"><?php echo $result_in['quantity'];?></td>
                    <td class="text-right"><?php echo number_format($result_in['total_price']); ?></td>

 					      </tr>

                 <?php
                 	}
                 ?>
                     <?php
                         $get_sum=mysqli_query($conn,"SELECT *, SUM(total_price) FROM instocks WHERE date>='$start_date' AND date<='$end_date'");
                         while($result_sum=mysqli_fetch_assoc($get_sum)){
                           
                           $total=$result_sum['SUM(total_price)'];

                 			  }
                       ?>
                       
                       <?php

                     		}
                     		else{

                             $today=date("Y-m-d");
                             $no=1;
                             $get_in=mysqli_query($conn,"SELECT * FROM instocks WHERE date='$today' ");
                             while($result_in=mysqli_fetch_assoc($get_in)){
                             $row_in=mysqli_num_rows($get_in);

                     		?>
                         <tr>
                           <td class="text-center" style="width: 40px;"><?php $no<$row_in; echo $no++; ?></td>
                						<td class="text-center"><?php echo $result_in['date']; ?></td>
                						<td class="text-center"><?php echo $result_in['reg_user']; ?></td>
                						<td class="text-center"><?php echo $result_in['item']; ?></td>
                            <td class="text-center"><?php echo $result_in['remark']; ?></td>
                            <td class="text-right"><?php echo $result_in['quantity'];?></td>
                						<td class="text-right"><?php echo number_format($result_in['total_price']); ?></td>

                         </tr>

                         <?php
 					                 }
                         ?>
                         <?php
                         	$get_sum=mysqli_query($conn,"SELECT *,SUM(total_price) FROM instocks WHERE date='$today' ");
                         	while($result_sum=mysqli_fetch_assoc($get_sum)){
                            
                            $total=$result_sum['SUM(total_price)'];

 			  				            }
                         ?>
                        
                         <?php
                               }
                            ?>

               </tbody>
               <tfoot>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                           <td class="text-right" colspan=""><b>Net Total</b></td>
                          
                           <td class="text-right"><b><?php echo number_format($total); ?></b></td>
                         </tr>
               </tfoot>
             </table>
           </div><!-- card body end -->
           <div class="card-footer text-center">
             <p class="text-danger">သတိပြုရန်။ ။ပစည်းအသစ်များ ၊ ဈေးနှုန်းမတူ သော် ပစည်းများ သာ ထည့်သွင်းပေးရမည်။</p>
           </div>


         </div>

     </div>

   </div>

 </div>
 </div>


 <?php include_once "includes/footer.php" ?>

<script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#instock_tb').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'New Instock List'
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'New Instock List'
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'New Instock List',
                        },
                        {
                            extend: 'print', footer: true, targets: 5,
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>New Instock List</h1></div>',
                              
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


       $(document).ready(function(){
           $('#newRecord').click(function(){
           $('#newModal').modal('show');

   });
       });
   </script>

   <!-- Record New Modal Begin -->
   <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="mediumModalLabel"><i class="fa fa-plus-circle"></i> Add New</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
               </div>
                   <div class="modal-body">
                       <form action="store/instock_add.php" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">
                           <div class="form-group">
                               <div class="input-group">
                                   <input type="text" id="item" class="form-control" name="item"  autocomplete="off"  required placeholder="Item Name" >
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="input-group">

                                   <input type="date" id="new_date" class="form-control" name="new_date" required autocomplete="off"  >
                               </div>
                           </div>
                         	<div class="form-group">
                               <div class="input-group">
                                   <input type="text" id="quantity" class="form-control" name="quantity"  autocomplete="off" required placeholder="Quantity">
                               </div>
                           </div>

   						             <div class="form-group">
                               <div class="input-group">
                                   <textarea name="remark" rows="6" cols="90" autocomplete="off" required placeholder="Detail Description"></textarea>
                               </div>
                           </div>

                           <div class="form-group">
                             <div class="input-group">
                               <input type="text" name="price" class="form-control" autocomplete="off" required placeholder="Total Amount">
                             </div>
                           </div>

                           <div class="form-group">
   														<div class="input-group">
   																<input type="text" id="new_balance" class="form-control" name="new_balance" readonly autocomplete="off" required style="color:blue;">
   														</div>
   												</div>

                       	<div class="modal-footer">
                           	<button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                           	<button name="add" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-th-large"></i> Save</button>
                        	</div>
               		</form>
   				</div>
           </div>
       </div>
   </div>
   <!-- Record New Modal Begin End -->
   <!-- calculate the balance and new instocks -->
   <script type="text/javascript">
     $(function () {
       $("#quantity").keyup(function () {
         $("#new_balance").val(+$("#quantity").val());
       });
     });
   </script>
