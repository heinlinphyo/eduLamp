<?php 

  include_once "includes/header.php"; 

	$page="learn";
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
                                <strong class="card-title"> Hostel Report</strong>
                              
                                <input type="date" id="start_date" class="form-control col-md-2 ml-auto"/>
                                <input type="date" id="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
                                <button class="btn btn-primary btn-sm ml-2" id="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
                                <a href="hostel.php" class="ml-2"><button class="btn btn-primary btn-sm" style="height: 38px;border-radius:2px;box-shadow: 0 0 3px gray;"><i class="fas fa-home"></i> Hostel</button></a>
                            </div>
                            <div class="card-body">
                                <table id="hostel_data" class="table table-striped table-bordered table-hover" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                          
                                            <th class="text-right text-info align-middle" style="width: 20px;">No</th>
                                            <th class="text-info align-middle">Hostel No</th>
                                            <th class="text-info align-middle">ID</th>
                                            <th class="text-info align-middle">Name</th>
                                            <th class="text-info align-middle text-center">Check In</th>
                                            <th class="text-info align-middle text-center">Check Out</th>
                                            <th class="text-info align-middle text-center" style="width: 100px;">Status</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                      
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
 
      fetch_data('no');

      function fetch_data(is_date_search, start_date='', end_date=''){
        
        var  dataTable = $('#hostel_data').DataTable({
            fixedHeader: true,
            "processing" : true,
            "serverSide" : true,
            "order" : [],
             dom: 'Bfrtip',
                 buttons: [
                        {
                            extend: 'excelHtml5',
                            title: 'Hostel Report'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Hostel Report'
                        },
                        {
                            extend: 'csvHtml5',
                            title: 'Hostel Report'
                        },
                        {
                            extend: 'print',
                            title: '<h4 class="text-info">Hostel Report</h4>',
                              
                        }
        ],
            "ajax" : {
              url:"learn/hostel_report_fetch.php",
              type:"POST",
              data:{
                is_date_search:is_date_search, 
                start_date:start_date, 
                end_date:end_date,
              
              }
            },
            columnDefs: [
              
              { className: "text-right","width": "20px", targets: 0 },
              { className: "text-center",  targets: 4 },
              { className: "text-center",  targets: 5 },
              { className: "text-center","width":"100px",  targets: 6 }
          ],
          
          rowCallback: function(row, data, index){
            var show_value=data[6];
              if(show_value !=""){
                $(row).find('td:eq(6)').html('<button class="btn btn-success btn-sm edit_item"  style="border-radius:2px;box-shadow:0 0 3px gray;width:100px;"><i class="far fa-check-circle"></i> Check In </button>');
              }
              else{
              $(row).find('td:eq(6)').html('<button class="btn btn-danger btn-sm edit_item"  style="border-radius:2px;box-shadow:0 0 3px gray;width:110px;"><i class="fa fa-times-circle "></i> Check Out </button>');
            }
              
            }
          
        
            
          });
          
        }
  
      
      $('#search').click(function(){
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          if(start_date != '' && end_date !=''){
            $('#hostel_data').DataTable().destroy();
            fetch_data('yes', start_date, end_date);
          }
          else{
            Swal.fire({
              type: 'error',
              title: 'သတိပေးချက်',
              text: 'နေ့စွဲအားပြန်လည်စစ်ဆေးပေးပါ။'   
          });
          }
      }); 
      
      
      
    
 
    });
    
</script>
        
 <?php include_once('includes/footer.php') ?>       



    
   


    
   
   
	
