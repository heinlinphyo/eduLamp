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

 ?>

 <div class="wrapper">

 <?php
   include_once "includes/sidebar.php";
   include_once "includes/navbar.php";
  ?>
 <div class="content mt-3 ">
   <div class="row">
     <div class="col-md-12">
       <form class="" action="" method="post">
         <div class="card" id="printJS-form">
           <div class="card-header row ml-1 mr-1">
             <strong class="card-title"><i class="fa fa-tools"></i> Outstocks List</strong>

 <input type="date" id="start_date" name="start_date" class="form-control col-md-2 ml-auto"/>
                      <input type="date" id="end_date" name="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
                          <button class="btn btn-primary btn-sm ml-2" name="search" id="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa fa-search"></i> Search</button>

                 <a href="stock.php" class="btn btn-info ml-1" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fas fa-plus-circle"></i> Out </a>

           </form>
           </div>
           

           <div class="card-body">
             <table id="outstock_tb" class="table table-striped table-bordered table-hover" style="font-size: 12px;">
               <thead>
                 <tr>
                   <th class="text-info text-center">No</th>
                   <th class="text-info text-center">Date</th>
                   <th class="text-info text-center">Asign</th>
                   <th class="text-info text-center">Refer To</th>
                   <th class="text-info text-center">Item</th>
                   <th class="text-info text-center">Out Quantity</th>
                 </tr>
               </thead>
               <tbody>

                 <?php

                     if(isset($_POST['search'])){
                     $start_date=$_POST['start_date'];
                     $end_date=$_POST['end_date'];
                      $no=1;
                     $get_out=mysqli_query($conn,"SELECT * FROM stocks WHERE out_date>='$start_date' AND out_date<='$end_date' ");
                     while($result_out=mysqli_fetch_assoc($get_out)){
                     $row_out=mysqli_num_rows($get_out);
                 ?>
                 <tr>
                    <td class="text-center" style="width: 40px;"><?php $no<$row_out; echo $no++; ?></td>
                    <td class="text-center"><?php echo $result_out['out_date']; ?></td>
                    <td class="text-center"><?php echo $result_out['out_user']; ?></td>
                    <td class="text-center"><?php echo $result_out['refer_to']; ?></td>
                    <td class="text-center"><?php echo $result_out['item']; ?></td>
                    <td class="text-right"><?php echo $result_out['out_quantity'];?></td>
 					      </tr>

                 <?php
                 	}
                 ?>

                       <?php

                     		}
                     		else{

                             $today=date("Y-m-d");
                             $no=1;
                             $get_out=mysqli_query($conn,"SELECT * FROM stocks WHERE out_date='$today'");
                             while($result_out=mysqli_fetch_assoc($get_out)){
                             $row_out=mysqli_num_rows($get_out);

                     		?>
                         <tr>
                           <td class="text-center" style="width: 40px;"><?php $no<$row_out; echo $no++; ?></td>
                						<td class="text-center"><?php echo $result_out['out_date']; ?></td>
                						<td class="text-center"><?php echo $result_out['out_user']; ?></td>
                            <td class="text-center"><?php echo $result_out['refer_to']; ?></td>
                						<td class="text-center"><?php echo $result_out['item']; ?></td>
                            <td class="text-right"><?php echo $result_out['out_quantity'];?></td>
                         </tr>

                         <?php
 					                 }
                         ?>

                         <?php
                               }
                            ?>

               </tbody>
             </table>
           </div><!-- card body end -->
         </div><!-- card end -->

     </div>
   </div>
 </div>
 </div>
<script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#outstock_tb').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Out Instock List'
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Out Instock List'
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Out Instock List',
                        },
                        {
                            extend: 'print', footer: true, targets: 5,
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Out Instock List</h1></div>',
                              
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
  
 <?php include_once "includes/footer.php" ?>
