<?php 
include_once "includes/header.php";
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
    $page = "fo";

 ?>


 <div class="wrapper">

 <?php
   include_once "includes/sidebar.php";
   include_once "includes/navbar.php";
  ?>
 <div class="content mt-3">
   <div class="row">
     <div class="col-md-12">
      
         <div class="card">
           <div class="card-header row ml-1 mr-1" id="card_header">
             <strong class="card-title"><i class="fa fa-funnel-dollar"></i> Invoices</strong>

                <input type="date" id="start_date" class="form-control col-md-2 ml-auto"/>
                  <input type="date" id="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
                    <button class="btn btn-primary btn-sm ml-2" id="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
          </div>
         
           <div class="card-body">
           
             <table id="in_tb" class="display table table-striped table-bordered table-hover" style="font-size: 12px;width: 100%;">
               <thead>
                 <tr>
                   <th class="text-info">No</th>
                   <th class="text-info">FEES ID</th>
                   <th class="text-info">ID</th>
                   <th class="text-info">Name</th>
                   <th class="text-info">YEAR</th>
                   <th class="text-info">MONTH</th>
                   <th class="text-info">FEES</th>
                   <th class="text-info">DEPOSIT</th>
                   <th class="text-info">UNIFORM</th>
                   <th class="text-info">OTHER</th>
                   <th class="text-info">Hostel</th>
                   <th class="text-info">TOTAL</th>
                 </tr>
               </thead>
               <tbody></tbody>
               <tfoot>
                  <tr>
                      <th style="border-right: none;"></th>
                      <th style="border-right: none;"></th>
                      <th style="border-right: none;"></th>
                      <th style="border-right: none;"></th>
                      <th style="border-right: none;"></th>
                      <th colspan="" style="text-align:right">Total(MMK):</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                  </tr>
            </tfoot>
             </table>
           </div>

         </div>
          
     </div>

   </div><!-- wrapper end -->


<script type="text/javascript">
  $(document).ready(function(){
      $('#search').click(function(){
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          if(start_date != '' && end_date !=''){
            $('#in_tb').DataTable().destroy();
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
 
      fetch_data('no');

      function fetch_data(is_date_search, start_date='', end_date=''){
        
        var  dataTable = $('#in_tb').DataTable({
          
             

            "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            var fees = api
                    .column( 6 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
            
            var deposit = api
                      .column( 7 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
              
            var uniform = api
                      .column( 8 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
              
            var other = api
                      .column( 9 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );

            var hostel = api
                      .column( 10 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );

 
            // Total over all pages
            total = api
                .column( 11 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 11, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
           var numFormat = $.fn.dataTable.render.number( '\,', '.').display; // number decimal 
            $( api.column( 6 ).footer() ).html(numFormat(fees));
            $( api.column( 7 ).footer() ).html(numFormat(deposit));
            $( api.column( 8 ).footer() ).html(numFormat(uniform));
            $( api.column( 9 ).footer() ).html(numFormat(other));
            $( api.column( 10 ).footer() ).html(numFormat(hostel));
            

            $( api.column( 11 ).footer() ).html(
                numFormat(pageTotal) +' ( $'+ numFormat(total) +' total)'
            );

        }, 

            fixedHeader: true,
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
             dom: 'Bfrtip',
                 buttons: [
                        {
                            extend: 'excelHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'INVOICE'
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'INVOICE'
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'INVOICE',
                        },
                        {
                            extend: 'print', footer: true, targets: 5,
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>INVOICE</h1></div>',
                              
                        }
        ],

 
            "ajax" : {
              url:"fo/invoice_fetch.php",
              type:"POST",
              data:{
                is_date_search:is_date_search, 
                start_date:start_date, 
                end_date:end_date,
              
              }
            },  
            
          });
          
        }
     
    });
    
</script>


 <?php include_once "includes/footer.php" ?>
