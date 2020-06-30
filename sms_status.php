<?php 
	include_once "includes/header.php"; 

	$page="market";
	error_reporting(0);
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
?>

<div class="wrapper">
	<?php
		include_once ('includes/sidebar.php');
		include_once ('includes/navbar.php');
	?>
	<!-- .content -->
	<div class="content mt-3">
        	<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row ml-1 mr-1">
                                <strong class="card-title"><i class="fa fa-sync-alt"></i> SMS Status</strong>
                              
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style="font-size: 14px;" >
                                   <thead>
                                   		<tr>
                                   			<th class="text-right text-info" style="width: 40px;">No</th>
                                   			<th class="text-info">Mobile</th>
                                        	<th class="text-info">Message</th>
                                   			<th class="text-info">Operator</th>
                                   			<th class="text-info">Sender</th>
                                   			<th class="text-info text-right">Credit</th>
                                   			<th class="text-info text-center">Status</th>
                                   			<th class="text-info text-center">Date</th>
                                   		</tr>
                                   </thead>
                                   <tbody>
                                   
                                    <?php
                                // Prepare data for POST request
                        		$get_api=mysqli_query($conn,"SELECT * FROM sms_api ");
								$result_api=mysqli_fetch_assoc($get_api);
								$token=$result_api['api_key'];
								$api_url=$result_api['message_url'];
						
								// SMSPoh Authorization Token
								$ch = curl_init($api_url);
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
								curl_setopt($ch, CURLOPT_POSTFIELDS);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_HTTPHEADER, [
        							'Authorization: Bearer ' . $token,
        							'Content-Type: application/json'
    							]);

								$result = curl_exec($ch);
								
						
								
								$array= json_decode($result,true);
								$sms_data=$array["data"]["messages"];
									$no=1;
									foreach ($sms_data as $sms_value) {
											$no<$sms_data;
									
											
									
                                ?>
                                   
                                   		<tr>
                                   			<td class="text-right" style="width: 40px;"><?php echo $no++; ?></td>
                                   			<td class=""><?php echo $sms_value['message_to']; ?></td>
                                        <td class=""><?php echo $sms_value['message_text']; ?></td>
                                   			<td class=""><?php echo $sms_value['operator']; ?></td>
                                   			<td class=""><?php echo $sms_value['sender']; ?></td>
                                   			
                                   			<td class="text-right"><?php echo $sms_value['credit']; ?></td>
                                   			<td class="text-center">
                                   				<?php if($sms_value['is_delivered']==1){ 
                                   				?>
                                   				<button class="btn btn-primary btn-sm" style="width: 100px;border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fas fa-paper-plane"></i> Reached</button>
                                   				<?php	
                                   				} 
                                   				if($sms_value["is_delivered"]==0){ 
                                   				?>
                                   				<button class="btn btn-danger btn-sm" style="width: 100px;border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fas fa-paper-plane"></i> Unreached</button>
                                   				<?php
                                   				} 
                                   				?>
                                   				
                                   			</td>
                                   			<td class="text-center"><?php echo   date("Y-m-d H:i:s", $sms_value["create_at"]); ?></td>
                                   		</tr>
                                 <?php
                                 	}
                                 ?>  		
                                   </tbody>
                                   <tfoot>
                                   		<tr>
                                   			<td class="text-right" colspan="5"><b>Total SMS</b></td>
                                   			<td class="text-right"><b>
                                   				<?php
                                   						$total_sms= 0;
                                   						foreach ($sms_data as $sms_value) {
                                   							 $total_sms += $sms_value['credit'];
                                   							
                                   						}	
                                   						echo number_format($total_sms);
                                   						
                                   				?>
                                   				</b>
                                   			</td>
                                   			<td></td>
                                   			<td></td>
                                   		</tr>
                                   </tfoot>
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
   var dataTable = $('#bootstrap-data-table-export').DataTable({  
        dom: 'Bfrtip',
        buttons: [
                   {
                            extend: 'excelHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'SMS Status',
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'SMS Status',
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> Csv',
                            title: 'SMS Status',
                        },
                        {
                            extend: 'print', footer: true, targets: 5,
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>SMS Status</h1></div>',
                              
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

	
	
    

   <?php include_once "includes/footer.php"; ?>
