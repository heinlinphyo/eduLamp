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
    $page = "account";

 ?>

 <div class="wrapper">
   <?php
     include_once "includes/sidebar.php";
     include_once "includes/navbar.php";
    ?>

  <!--/////////// Month Deposit ////////////// -->
    <div class="content mt-3">
      <div class="row">
        <div class="col-md-12">
          <form class="" action="" method="post">
            <div class="card" id="printJS-form">
              <div class="card-header row ml-1 mr-1">
                <strong class="card-title"> Monthly Deposit Report</strong>

                    <input type="search" class="form-control col-md-2 ml-auto mr-2" placeholder="Search Filter" autocomplete="off" id="myInput" onkeyup="myFunction()" />
                    <input type="month" class="form-control col-md-2" name="date" placeholder="Month" required/>
                    <button class="btn btn-primary btn-sm ml-2" name="search" style="height: 38px;border-radius: 2px; box-shadow: 0 0 3px gray;margin-right:10px;"><i class="fas fa-search"></i> Search</button>

              </form>
              </div>
              <script>
                  $(document).ready(function(){
                  $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#ddepo_tb tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                          });
                          });
                          });
              </script>

              <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="text-info">No</th>
                      <th class="text-info">FEES ID</th>
                      <th class="text-info">STUDENT NAME</th>
                      <th class="text-info">MONTHLY FEES</th>
                      <th class="text-info">DEPOSIT</th>
                      <th class="text-info">UNIFORM FEES</th>
                      <th class="text-info">OTHER</th>
                      <th class="text-info">Hostel</th>
                      <th class="text-info">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                        if(isset($_POST['search'])){

                        $date=$_POST['date'];
                         $no=1;
                        $get_dd=mysqli_query($conn,"SELECT * FROM fees_collect WHERE fee_month='$date'");
                        while($result_dd=mysqli_fetch_assoc($get_dd)){
                        $row_dd=mysqli_num_rows($get_dd);
                    ?>
                    <tr>
          						<td class="text-right" style="width: 40px;"><?php $no<$row_dd; echo $no++; ?></td>
          						<td><?php echo $result_dd['fees_id']; ?></td>
          						<td><?php echo $result_dd['st_name']; ?></td>
          						<td class="text-right">
                              <?php echo number_format($result_dd['fee_amount']); ?> 
                            </td>
                            <td class="text-right">
                              <?php 
                                if($result_dd['deposit_amount']==''){echo "0";}
                                else{ echo number_format($result_dd['deposit_amount']); }?>                      
                            </td>
                            <td class="text-right">
                              <?php 
                                if($result_dd['uniform']==''){echo "0";}
                                else{ echo number_format($result_dd['uniform']); }?>
                            </td>
                            <td class="text-right">
                              <?php 
                                if($result_dd['other']==''){echo "0";}
                                else{ echo number_format($result_dd['other']); }?>
                            </td>
                            <td class="text-right">
                              <?php echo number_format($result_dd['hostel']) ?>
                            </td>
                            <td class="text-right"><?php echo number_format($result_dd['total']); ?></td>

    					      </tr>

                    <?php
                    	}
                    ?>
                        <?php
                            $get_sum=mysqli_query($conn,"SELECT *, SUM(fee_amount), SUM(deposit_amount), SUM(uniform), SUM(other), SUM(hostel), SUM(total) FROM fees_collect WHERE fee_month='$date'");
                            while($result_sum=mysqli_fetch_assoc($get_sum)){
                              $fee=$result_sum['SUM(fee_amount)'];
                              $deposit=$result_sum['SUM(deposit_amount)'];
                              $uniform=$result_sum['SUM(uniform)'];
                              $other=$result_sum['SUM(other)'];
                              $hostel=$result_sum['SUM(hostel)'];
                              $total=$result_sum['SUM(total)'];

                    			  }
                          ?>
                          <tr>
                            <td class="text-right" colspan="3"><b>Net Total</b></td>
                           <td class="text-right"><b><?php echo number_format($fee); ?></b></td>
                           <td class="text-right"><b>
                             <?php
                              if($deposit==''){ echo "0";}else{ echo number_format($deposit);}
                             ?>
                           </b></td>
                           <td class="text-right"><b>
                             <?php
                              if($uniform==''){ echo "0";}else{ echo number_format($uniform);}
                             ?>
                           </b></td>
                           <td class="text-right"><b>
                             <?php
                              if($other==''){ echo "0";}else{ echo number_format($other);}
                             ?>
                           </b></td>
                           <td class="text-right"><b>
                             <?php echo number_format($hostel) ?>
                           </b></td>
                           <td class="text-right"><b><?php echo number_format($total); ?></b></td>


                          </tr>
                          <?php

                        		}
                        		else{

                                $today=date("F");
                                $no=1;
                                $get_dd=mysqli_query($conn,"SELECT * FROM fees_collect WHERE fee_month='$today'");
                                while($result_dd=mysqli_fetch_assoc($get_dd)){
                                $row_dd=mysqli_num_rows($get_dd);

                        		?>
                            <tr>
                              <td class="text-right" style="width: 40px;"><?php $no<$row_dd; echo $no++; ?></td>
                   						<td><?php echo $result_dd['fees_id']; ?></td>
                   						<td><?php echo $result_dd['st_name']; ?></td>
                   						<td class="text-right">
                              <?php echo number_format($result_dd['fee_amount']); ?> 
                            </td>
                            <td class="text-right">
                              <?php 
                                if($result_dd['deposit_amount']==''){echo "0";}
                                else{ echo number_format($result_dd['deposit_amount']); }?>                      
                            </td>
                            <td class="text-right">
                              <?php 
                                if($result_dd['uniform']==''){echo "0";}
                                else{ echo number_format($result_dd['uniform']); }?>
                            </td>
                            <td class="text-right">
                              <?php 
                                if($result_dd['other']==''){echo "0";}
                                else{ echo number_format($result_dd['other']); }?>
                            </td>
                            <td class="text-right">
                              <?php echo number_format($result_dd['hostel']); ?>
                            </td>
                            <td class="text-right"><?php echo number_format($result_dd['total']); ?></td>

                            </tr>

                            <?php
    					                 }
                            ?>
                            <?php
                            	$get_sum=mysqli_query($conn,"SELECT *, SUM(fee_amount), SUM(deposit_amount), SUM(uniform), SUM(other), SUM(hostel), SUM(total) FROM fees_collect WHERE fee_month='$today' ");
                            	while($result_sum=mysqli_fetch_assoc($get_sum)){
                               $fee=$result_sum['SUM(fee_amount)'];
                               $deposit=$result_sum['SUM(deposit_amount)'];
                               $uniform=$result_sum['SUM(uniform)'];
                               $other=$result_sum['SUM(other)'];
                               $hostel=$result_sum['SUM(hostel)'];
                               $total=$result_sum['SUM(total)'];

    			  				            }
                            ?>
                            <tr>
                             <td class="text-right" colspan="3"><b>Net Total</b></td>
                           <td class="text-right"><b><?php echo number_format($fee); ?></b></td>
                           <td class="text-right"><b>
                             <?php
                              if($deposit==''){ echo "0";}else{ echo number_format($deposit);}
                             ?>
                           </b></td>
                           <td class="text-right"><b>
                             <?php
                              if($uniform==''){ echo "0";}else{ echo number_format($uniform);}
                             ?>
                           </b></td>
                           <td class="text-right"><b>
                             <?php
                              if($other==''){ echo "0";}else{ echo number_format($other);}
                             ?>
                           </b></td>
                           <td class="text-right"><b>
                             <?php echo number_format($hostel); ?>
                           </b></td>
                           <td class="text-right"><b><?php echo number_format($total); ?></b></td>

                            </tr>
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
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
              </div>



            </div>
<div class="card-footer text-center bg-white">
               <button type="button"  class="btn btn-primary ml-auto" style="border-radius:3px;" onclick="printDiv('printJS-form')"><i class="fa fa-print"></i> Print</button>
              </div><!-- card footer end -->
        </div>

      </div>

    </div> <!-- end here -->
<!-- ////// Month Expense ///////// -->
    <div class="content mt-3">
      <div class="row">
        <div class="col-md-12">
          <form class="" action="" method="post">
            <div class="card" id="print-form">
              <div class="card-header row ml-1 mr-1">
                <strong class="card-title"> Monthly Expense Report</strong>

                    <input type="search" class="form-control col-md-2 ml-auto mr-2" placeholder="Search Filter" autocomplete="off" id="myInputde" onkeyup="myFunction()" />
                    <input type="month" class="form-control col-md-2" name="de_date" placeholder="Month" required/>
                    <button class="btn btn-primary btn-sm ml-2" name="search_de" style="height: 38px;border-radius: 2px; box-shadow: 0 0 3px gray;margin-right:10px;"><i class="fas fa-search"></i> Search</button>

              </form>
              </div>
              <script>
                  $(document).ready(function(){
                  $("#myInputde").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#expense_tb tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                          });
                          });
                          });
              </script>

              <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="text-info">No</th>
                      <th class="text-info">ID</th>
                      <th class="text-info">Reg; Date</th>
                      <th class="text-info">Reg; User</th>
                      <th class="text-info">Description</th>
                      <th class="text-info">Expense</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                        if(isset($_POST['search_de'])){

                        $de_date=$_POST['de_date'];
                         $no=1;
                        $get_de=mysqli_query($conn,"SELECT * FROM dailyexpense WHERE month='$de_date'");
                        while($result_de=mysqli_fetch_assoc($get_de)){
                        $row_de=mysqli_num_rows($get_de);
                    ?>
                    <tr>
                      <td class="text-right" style="width: 40px;"><?php $no<$row_de; echo $no++; ?></td>
                  <td><?php echo $result_de['dexp_id']; ?></td>
                  <td><?php echo $result_de['reg_date']; ?></td>
                  <td><?php echo $result_de['reg_user']; ?></td>
                  <td class="text-right"><?php echo $result_de['remark']; ?></td>
                  <td class="text-right"><?php echo number_format($result_de['dexp_amount']); ?></td>

                    </tr>

                    <?php
                      }
                    ?>
                        <?php
                        $get_sum_de=mysqli_query($conn,"SELECT *,SUM(dexp_amount) FROM dailyexpense WHERE month='$de_date'");
                        while($result_sum_de=mysqli_fetch_assoc($get_sum_de)){
                        $amount_de=$result_sum_de['SUM(dexp_amount)'];

                            }
                          ?>
                          <tr>
                            <td class="text-right" colspan="5"><b>Net Total</b></td>
                            <td class="text-right"><b><?php echo number_format($amount_de); ?></b></td>


                          </tr>
                          <?php

                            }
                            else{

                              $today=date("F");
                              $no=1;
                              $get_de=mysqli_query($conn,"SELECT * FROM dailyexpense WHERE month='$today'");
                              while($result_de=mysqli_fetch_assoc($get_de)){
                              $row_de=mysqli_num_rows($get_de);

                            ?>
                            <tr>
                              <td class="text-right" style="width: 40px;"><?php $no<$row_de; echo $no++; ?></td>
                              <td><?php echo $result_de['dexp_id']; ?></td>
                              <td><?php echo $result_de['reg_date']; ?></td>
                              <td><?php echo $result_de['reg_user']; ?></td>
                              <td class="text-right"><?php echo $result_de['remark']; ?></td>
                              <td class="text-right"><?php echo number_format($result_de['dexp_amount']); ?></td>

                            </tr>

                            <?php
                               }
                            ?>
                            <?php
                            $get_sum_de=mysqli_query($conn,"SELECT *,SUM(dexp_amount) FROM dailyexpense WHERE month='$today' ");
                            while($result_sum_de=mysqli_fetch_assoc($get_sum_de)){
                             $amount_de=$result_sum_de['SUM(dexp_amount)'];

                                }
                            ?>
                            <tr>
                              <td class="text-right" colspan="5"><b>Net Total</b></td>
                              <td class="text-right"><b><?php echo number_format($amount_de); ?></b></td>


                            </tr>
                            <?php
                                  }
                               ?>

                  </tbody>
                </table>
              </div>



            </div>

        </div>



 </div><!-- wrapper end -->

<script type="text/javascript">
  $(document).ready(function(){
 $('#bootstrap-data-table-export').DataTable({
        
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            title: 'Students List'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Students List'
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Students List'
                        },
                        {
                            extend: 'print',
                            title: 'Students List'
                        }
        ],
      
    });
 
 });
</script>
  <script type="text/javascript">

               function printDiv(divName) {
                     var printContents = document.getElementById(divName).innerHTML;
                     var originalContents = document.body.innerHTML;

                      document.body.innerHTML = printContents;

                       window.print();

                      document.body.innerHTML = originalContents;
                 }
           </script>

 <script src="vendor/print-js/print_min.js"></script>

<?php include_once "includes/footer.php" ?>
