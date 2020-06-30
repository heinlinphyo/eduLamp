<?php include_once "includes/header.php";

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

 <link rel="stylesheet" href="vendor/print-js/print.css" />
 <div class="wrapper">

 <?php
   include_once "includes/sidebar.php";
   include_once "includes/navbar.php";
  ?>
 <div class="content mt-3">
   <div class="row">
     <div class="col-md-12">
       
         <div class="card" id="printJS-form">
           <div class="card-header row ml-1 mr-1">
             <strong class="card-title"><i class="fa fa-funnel-dollar"></i> Daily Deposit</strong>
             <input type="date" id="start_date" class="form-control col-md-2 ml-auto"/>
              <input type="date" id="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
              <button class="btn btn-primary btn-sm ml-2" id="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>

           </div>
        
           <div class="card-body">
             <table id="ddepo_tb" class="table table-striped table-bordered table-hover" style="font-size: 12px;width: 100%;"> 
               <thead>
                 <tr>
                   <th class="text-info">No</th>
                   <th class="text-info">DATE</th>
                   <th class="text-info">FEES ID</th>

                   <th class="text-info">MONTHLY FEES</th>
                   <th class="text-info">DEPOSIT</th>
                   <th class="text-info">UNIFORM</th>
                   <th class="text-info">OTHER</th>
                   <th class="text-info">Hostel</th>
                   <th class="text-info">TOTAL</th>
                 </tr>
               </thead>
               <tbody>
               </tbody>
               <tfoot>
                <tr>
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

   </div>

 </div>
 </div>

<script type="text/javascript">
  $(document).ready(function(){
      $('#search').click(function(){
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          if(start_date != '' && end_date !=''){
            $('#ddepo_tb').DataTable().destroy();
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
        
        var  dataTable = $('#ddepo_tb').DataTable({
          
             

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
                    .column( 3 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
            
            var deposit = api
                      .column( 4 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
              
            var uniform = api
                      .column( 5 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );
              
            var other = api
                      .column( 6 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );

            var hostel = api
                      .column( 7 )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );

 
            // Total over all pages
            total = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
           var numFormat = $.fn.dataTable.render.number( '\,', '.').display; // number decimal 
            $( api.column( 3 ).footer() ).html(numFormat(fees));
            $( api.column( 4 ).footer() ).html(numFormat(deposit));
            $( api.column( 5 ).footer() ).html(numFormat(uniform));
            $( api.column( 6 ).footer() ).html(numFormat(other));
            $( api.column( 7 ).footer() ).html(numFormat(hostel));
            

            $( api.column( 8 ).footer() ).html(
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
                            title: 'Daily Deposit'
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Daily Deposit'
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> Csv',
                            title: 'Daily Deposit',
                        },
                        {
                            extend: 'print', footer: true, targets: 5,
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Daily Deposit</h1></div>',
                              
                        }
        ],

 
            "ajax" : {
              url:"finance/invoice_fetch.php",
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
