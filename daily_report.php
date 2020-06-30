<?php 

  include_once "includes/header.php"; 

  $page = "account";

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


 
 <div class="wrapper">

 <?php
   include_once "includes/sidebar.php";
   include_once "includes/navbar.php";
  ?>
 <div class="content mt-3">
   <div class="row">
     <div class="col-md-12">
       <form class="" action="" method="post">
         <div class="card">
           <div class="card-header row ml-1 mr-1">
             <strong class="card-title"><i class="fa fa-funnel-dollar"></i> Daily Report</strong>

               <input type="date" id="start_date" name="start_date" class="form-control col-md-2 ml-auto"/>
                <input type="date" id="end_date" name="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
              <button class="btn btn-primary btn-sm ml-2" name="search" id="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>

           </form>
           </div>
      
           <div class="card-body">
            
             <table id="dreport_tb" class="table table-striped table-bordered table-hover" style="font-size: 12px;width: 100%;">
               <thead>
                 <tr>
                  <th class="text-info" style="width: 80px;">No</th>
                   <th class="text-info text-center">Date</th>
                   <th class="text-info text-center">Deposit</th>
                   <th class="text-info text-center">Expense</th>
                   <th class="text-info text-center">Total(MMK)</th>
                   <th class="text-info text-center">Action</th>
                 </tr>

               </thead>
               <tbody>

                 <?php

                     if(isset($_POST['search'])){
                      
                     $start_date=$_POST['start_date'];
                     $end_date=$_POST['end_date'];

                     $get_sum_fees = mysqli_query($conn, "SELECT *,SUM(total) FROM fees_collect WHERE reg_date>='$start_date' AND reg_date<='$end_date' AND status='' ");

                    $get_sum_exp = mysqli_query($conn, "SELECT * ,SUM(dexp_amount) FROM dailyexpense WHERE reg_date>='$start_date' AND reg_date<='$end_date' AND status='' ");

                        while($result_sum_exp=mysqli_fetch_assoc($get_sum_exp)){        
                           $total_de=$result_sum_exp['SUM(dexp_amount)'];
                           $status=$result_sum_exp['status'];
                        }

                     while($result_sum_fees=mysqli_fetch_assoc($get_sum_fees)){
                      $total_dd=$result_sum_fees['SUM(total)'];
                      $status=$result_sum_fees['status'];
                      }
                 ?>
                 <tr>
                        <td>1</td>
                        <td><?php echo $start_date; ?></td>
       						      <td class="text-primary text-center"><?php echo number_format($total_dd); ?></td>
                        <td class="text-danger text-center"><?php echo number_format($total_de); ?></td>
                        <td class="text-secondary text-center">
                           <?php
                              $total = $total_dd - $total_de;

                              echo number_format($total);
                            ?>

                        </td>
                     
                        <td class="text-center">
                           <?php if ($status=='') {
                       echo "<button type='button' class='btn btn-success' id='report' name='report' style='border-radius: 2px;box-shadow: 0 0 3px gray;'><i class='fa fa-location-arrow'></i> Report</button>";
                            }else{
                                echo "<button type='button' class='btn btn-secondary' disable style='border-radius: 2px;box-shadow: 0 0 3px gray;'><i class='fa fa-check'></i> Reported</button>";
                            } 
                            ?>
                          
                        </td>
 					       </tr>


                       <?php

                     	}
                     		else{
                             
                             $today=date("Y-m-d");
                             $get_sum_fees = mysqli_query($conn, "SELECT *, SUM(total) FROM fees_collect WHERE reg_date='$today' AND status='' ");

                             $get_sum_exp = mysqli_query($conn, "SELECT *, SUM(dexp_amount) FROM dailyexpense WHERE reg_date='$today' AND status=''  ");

                              while($result_sum_exp=mysqli_fetch_assoc($get_sum_exp)){
                               
                             $total_de=$result_sum_exp['SUM(dexp_amount)'];
                             $status=$result_sum_exp['status'];
                           }

                             while($result_sum_fees=mysqli_fetch_assoc($get_sum_fees)){
                            
                            $total_dd=$result_sum_fees['SUM(total)'];
                            $status=$result_sum_fees['status'];
                          }

                     		?>
                         <tr>
                            <td>1</td>
                           <td><?php echo $today; ?></td>
                            <td class="text-primary text-center"><?php echo number_format($total_dd); ?></td>
                            <td class="text-danger text-center"><?php echo number_format($total_de) ?></td>
                            <td class="text-secondary text-center">
                                     <?php
                                        $total = $total_dd - $total_de;

                                        echo number_format($total);
                                      ?>

                            </td>
                            <td class="text-center">
                           <?php if ($status=='') {
                              echo "<button type='button' class='btn btn-success' id='report' name='report' style='border-radius: 2px;box-shadow: 0 0 3px gray;'><i class='fa fa-location-arrow'></i> Report</button>";
                            }else{
                                echo "<button type='button' class='btn btn-secondary' disable style='border-radius: 2px;box-shadow: 0 0 3px gray;'><i class='fa fa-check'></i> Reported</button>";
                            } 
                            ?>
                          
                        </td>
                         </tr>

                   
                       <?php } //esle end ?>
                      
               </tbody>
              
             </table>

           </div><!-- card body end -->

         </div>

     </div>

   </div>

 </div>
 </div>

 <script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#dreport_tb').DataTable({  
        dom: 'Bfrtip',
        buttons: [
                   {
                            extend: 'excelHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Daily Report',
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Daily Report',
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> Csv',
                            title: 'Daily Report',
                        },
                        {
                            extend: 'print', footer: true, targets: 5,
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Daily Report</h1></div>',
                              
                        }
        ],
        "order": [[ 1, 'asc']],
    });
   dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

               //  report //
              $('#report').click(function(){
                        $('#newModal').modal('show');

                });


  });
</script>

 <?php include_once "includes/footer.php" ?>

 <!-- Record New Modal Begin -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel"> Daily Report By (<?php echo $user ?>) </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <div class="modal-body">
                    <form action="finance/daily_report_add.php" method="post">
                      <input type="hidden" name="token" value="<?= $token ?>">

                        <div class="form-group">
                            <div class="input-group">
                                <label for="date" class="mt-1 col-md-2">Date</label>
                                <input type="date" id="date" class="form-control" name="date"  autocomplete="off"  required  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                              <label for="deposit" class="mt-1 col-md-2">Deposit</label>
                                <input type="number" id="deposit" class="form-control text-primary" name="deposit" autocomplete="off" placeholder="Total Deposit (eg.000000)">
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="input-group">
                               <label for="expense" class="mt-1 col-md-2">Expense</label>
                               <input type="number" name="expense" id="expense" class="form-control text-danger" autocomplete="off" placeholder="Total Expense (eg.000000)">
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <label for="net_total" class="mt-1 col-md-2">Net Total</label>
                            <input type="text" name="net_total" id="net_total" class="form-control text-secondary" readonly>
                          </div>
                        </div>

                      <div class="modal-footer">
                          
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                          <button name="post" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-location-arrow"></i> Report</button>
                      </div>
                </form>
        </div>
        <div class="modal-footer">
          <p class="text-danger">သတိပြုရန်။ ။ငွေကိန်းဂဏန်း ရိုက်ထည့်ရာတွင် comma( , ) & decimal( . ) စသည့်အရာများ မထည့်ရပါ။</p>
        </div>
        </div>
    </div>
</div>
<!-- Record New Modal Begin End -->
<script type="text/javascript">
  $(function () {
    $("#deposit, #expense").keyup(function () {
      $("#net_total").val(+$("#deposit").val() - +$("#expense").val());
    });
  });
</script>
