<?php

  include_once ("includes/header.php");

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

<?php
  $id = mysqli_real_escape_string($conn, $_GET['id']); // grade ID  from p_ul_list.php //
  

 ?>


<div class="wrapper">
  <?php
    include_once ("includes/sidebar.php");
    include_once ("includes/navbar.php");
   ?>
   <div class="content mt-3">
     <div class="row">
       <div class="col-md-12">
        <form action="" method="post">
         <div class="card">
           <div class="card-header row ml-1 mr-1">
             <strong class="card-title"><i class="fab fa-creative-commons-nc"></i> Monthly Fees Unpaid List
               <?php // for show the title //

                if($id=='1'){ echo "KG";}
                elseif($id=='2'){ echo "Grade-1" ;}
                elseif($id=='3'){ echo "Grade-2" ;}
                elseif($id=='4'){ echo "Grade-3" ;}
                elseif($id=='5'){ echo "Grade-4" ;}
                elseif($id=='6'){ echo "Grade-5" ;}
                elseif($id=='7'){ echo "Grade-6" ;}
                elseif($id=='8'){ echo "Grade-7" ;}
                elseif($id=='9'){ echo "Grade-8" ;}
                elseif($id=='10'){ echo "Grade-9" ;}
                elseif($id=='11'){ echo "Grade-10" ;}

                 ?>
             </strong>

            <input type="date" id="from" name="from" class="form-control col-md-2 ml-auto"/>
                <input type="date" id="to" name="to" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
              <button class="btn btn-primary btn-sm ml-2" id="search" name="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>
              
               </form>
           </div><!-- card header end -->
           <div class="card-body">
             <table id="unpaid_tb" class="table table-striped table-bordered table-hover" style="font-size: 12px;">
               <thead>
                 <tr>
                    <th class="text-info text-center">No</th>
                   <th class="text-info text-center">ID</th>
                   <th class="text-info text-center">NAME</th>
                   <th class="text-info text-center">YEAR</th>
                   <th class="text-info text-center">LAST PAYMENT</th>
                 </tr>
               </thead><!-- table head end -->
               <tbody>
                 <?php

                     if(isset($_POST['search'])){
                         $from=$_POST['from'];
                         $to =$_POST['to'];
                          $no=1;
                   
                            if($id == '1'){
                              $sql =  mysqli_query($conn,"SELECT * FROM KG WHERE reg_date<='$from' AND reg_date<='$to' ");
                            }elseif($id == '2'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_1 WHERE reg_date>='$from' AND reg_date<='$to'  ");
                            }elseif($id == '3'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_2 WHERE reg_date>='$from' AND reg_date<='$to'  ");
                            }elseif($id == '4'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_3 WHERE reg_date>=$'from' AND reg_date<='$to'  ");
                            }elseif($id == '5'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_4 WHERE reg_date>='$from' AND reg_date<='$to'  ");
                            }elseif($id == '6'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_5 WHERE reg_date>='$from' AND reg_date<='$to'  ");
                            }elseif($id == '7'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_6 WHERE reg_date>='$from' AND reg_date<='$to' ");
                            }elseif($id == '8'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_7 WHERE reg_date>='$from' AND reg_date<='$to' ");
                            }elseif($id == '9'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_8 WHERE reg_date>='$from' AND reg_date<='$to' ");
                            }elseif($id == '10'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_9 WHERE reg_date>='$from' AND reg_date<='$to' ");
                            }elseif($id == '11'){
                              $sql = mysqli_query($conn,"SELECT * FROM G_10 WHERE reg_date>='$from' AND reg_date<='$to' ");
                            }
                            while ($row=mysqli_fetch_assoc($sql)) {
                                  $row_no=mysqli_num_rows($sql);
                              ?>
                              <tr>
                                <td><?php $no<$row_no; echo $no++; ?></td>
                                <td class="text-center"><?php echo $row['st_id']?></td>
                                <td class="text-center"><?php echo $row['st_name']?></td>
                                <td class="text-center"><?php echo $row['year']?></td>
                                <td class="text-center"><?php echo $row['active'] ?></td>
                              </tr>

                 <?php             
                            }
                            
                         }     

                 ?>

                
             
               </tbody><!-- table body end -->
             </table><!-- table end -->
           </div><!-- card body end -->
         </div><!-- card end -->

       </div>
     </div><!-- row end -->
   </div><!-- content end -->
</div><!-- wrapper end -->

<script type="text/javascript">
  $(document).ready(function(){
   var dataTable = $('#unpaid_tb').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Unpaid List',
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Unpaid List',
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> Csv',
                            title: 'Unpaid List',
                        },
                        {
                            extend: 'print', 
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Unpaid List</h1></div>',
                              
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
<?php include_once ("includes/footer.php"); ?>
