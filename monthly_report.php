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
    <!-- ////// Month Expense ///////// -->
    <div class="content mt-3">
      <div class="row">
        <div class="col-md-12">
          <form class="" action="" method="post">
            <div class="card" id="print-form">
              <div class="card-header row ml-1 mr-1">
                <strong class="card-title"><i class="fa fa-calendar"></i> Monthly Deposit And Expense Report</strong>
  				<input type="date" id="start_date" name="start_date" class="form-control col-md-2 ml-auto"/>
                <input type="date" id="end_date" name="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
              <button class="btn btn-primary btn-sm ml-2" name="search" id="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
                    
              </form>
              </div>
             
              <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover" style="font-size: 12px;">
                  <thead>
                    <tr>
                      <th class="text-info">No</th>
                      <th class="text-info text-center">Date</th>
                      <th class="text-info text-center">Deposit</th>
                      <th class="text-info text-center">Expense</th>
                      <th class="text-info text-center">Total(MMK)</th>
                      <th class="text-info text-center">Reporter</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                        if(isset($_POST['search'])){

                        $start_date=$_POST['start_date'];
                        $end_date=$_POST['end_date'];
                         $no=1;
                        $get=mysqli_query($conn,"SELECT * FROM daily_report WHERE reg_date>='$start_date' AND reg_date<='$end_date' ");
                        while($result=mysqli_fetch_assoc($get)){
                        $row=mysqli_num_rows($get);
                    ?>
                    <tr>
                      <td class="text-right" style="width: 40px;"><?php $no<$row; echo $no++; ?></td>
                  <td><?php echo $result['date']; ?></td>
                  <td class="text-center"><?php echo number_format($result['deposit']); ?></td>
                  <td class="text-center"><?php echo number_format($result['expense']); ?></td>
                  <td class="text-center"><?php echo number_format($result['total']); ?></td>
                  <td class="text-center"><?php echo $result['reg_user']; ?></td>

    					      </tr>

                    <?php
                    	}
                    ?>
                        <?php
                        $get_sum=mysqli_query($conn,"SELECT *,SUM(deposit), SUM(expense),SUM(total) FROM daily_report WHERE reg_date>='$start_date' AND reg_date<='$end_date' ");
                        while($result_sum=mysqli_fetch_assoc($get_sum)){
                        $deposit=$result_sum['SUM(deposit)'];
                        $expense=$result_sum['SUM(expense)'];	
                        $total=$result_sum['SUM(total)'];

                    			  }

                          ?>
	
                        		
                  </tbody>
             		<tfoot>
             			<tr>
             				<td></td>
             				<td class="text-right">Net Total(MMK):</td>
             				<td class="text-center"><b><?php echo number_format($deposit); ?></b></td>
             				<td class="text-center"><b><?php echo number_format($expense); ?></b></td>
             				<td class="text-center"><b><?php echo number_format($total); ?></b></td>
             				<td></td>


             			</tr>
             		</tfoot>
             	<?php } ?>
                
                </table>
              </div>



            </div>

        </div>

   
 </div><!-- wrapper end -->
 <script type="text/javascript">
  $(document).ready(function(){
 var dataTable = $('#bootstrap-data-table-export').DataTable({
        
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Monthly Report'
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Monthly Report'
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Monthly Report',
                        },
                        {
                            extend: 'print', footer: true, targets: 5,
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Monthly Report</h1></div>',
                              
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

 <?php include_once('includes/footer.php'); ?>