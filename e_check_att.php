<?php include_once "includes/header.php" ?>
<?php
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
    $page = "hr";

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
             <strong class="card-title"><i class="fa fa-chart-line"></i> Check Employee's Attendance</strong>
                 <input type="date" class="form-control col-md-2 ml-auto" name="date"  required/>
                 <button class="btn btn-primary btn-sm ml-2" name="search" style="height: 38px;border-radius: 2px; box-shadow: 0 0 3px gray;margin-right:10px;"><i class="fas fa-search"></i> Search</button>

           </form>
           </div>
        
           <div class="card-body">
             <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover" style="font-size: 12px;">
               <thead>
                 <tr>
                   <th class="text-info">No</th>
                   <th class="text-info">Date</th>
                   <th class="text-info">ID</th>
                   <th class="text-info">Name</th>
                   <th class="text-info">Time (In)</th>
                   <th class="text-info">Time (Out)</th>
                   <th class="text-info">Late (Min)</th>
                   <th class="text-info">Late (-)</th>
                   <th class="text-info">OT (H)</th>
                   <th class="text-info">OT (+)</th>
                   <th class="text-info">Leave</th>
                   <th class="text-info">Leave (-)</th>
                 </tr>
               </thead>
               <tbody>

                 <?php

                     if(isset($_POST['search'])){
                     $date=$_POST['date'];
                      $no=1;
                     $get=mysqli_query($conn,"SELECT * FROM e_attendance WHERE reg_date='$date'");
                     while($result=mysqli_fetch_assoc($get)){
                      $row = mysqli_num_rows($get);
                 ?>
                 <tr>
       						<td  class="id"><?php $no<$row; echo $no++; ?></td>
                  <td class="date"><?php echo $date ?></td>
       						<td class="e_id"><?php echo $result['e_id']; ?></td>
       						<td class="e_name"><?php echo $result['e_name']; ?></td>
       						<td contenteditable="true" class="time_in"><?php echo $result['time_in']; ?></td>
                  <td contenteditable="true" class="time_out"><?php echo $result['time_out'];?></td>
                  <td contenteditable="true" class="late_min"><?php echo $result['late_min']; ?></td>
                  <td contenteditable="true" class="late_lost"><?php echo $result['late_lost']; ?></td>
       						<td contenteditable="true" class="ot"><?php echo $result['ot']; ?></td>
                  <td contenteditable="true" class="ot_amount"><?php echo $result['ot_amount'];?></td>
                  <td contenteditable="true" class="leave_type"><?php echo $result['leave_type']; ?></td>
                  <td contenteditable="true" class="leave_lost"><?php echo $result['leave_lost']; ?></td>
 					      </tr>
                       <?php

                     		}
                      }

                     		?>

               </tbody>

             </table>

           </div>
           <div class="card-footer text-center">
             <button type="button" name="update" id="update" class="btn btn-info col-sm-3"><i class="fa fa-edit"></i> Update Attendance</button>
           </div>

         </div>

     </div>

   </div>

 </div>
</div><!-- wrapper end -->
 <script type="text/javascript">
  $(document).ready(function(){
    $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
                  {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Attendance List'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Attendance List'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-pdf"></i> CSV',
                            title: 'Attendance List',
                        },
                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Attendance List</h1></div>',
                              
                        }
        ]
    });
  });
</script>

  <script>
  $(document).ready(function(){
   var count = 1;

   $('#update').click(function(){
    var date = []; 
    var e_name = [];
    var e_id = [];
    var time_in = [];
    var time_out = [];
    var late_min = [];
    var late_lost = [];
    var ot =[];
    var ot_amount = [];
    var leave_type = [];
    var leave_lost = [];

    $('.date').each(function(){
      date.push($(this).text());
    });

    $('.e_id').each(function(){
     e_id.push($(this).text());
    });

    $('.e_name').each(function(){
     e_name.push($(this).text());
    });

    $('.time_in').each(function(){
      time_in.push($(this).text());
    });

    $('.time_out').each(function(){
     time_out.push($(this).text());
    });

    $('.late_min').each(function(){
     late_min.push($(this).text());
    });

    $('.late_lost').each(function(){
     late_lost.push($(this).text());
    });
    $('.ot').each(function(){
     ot.push($(this).text());
    });
    $('.ot_amount').each(function(){
     ot_amount.push($(this).text());
    });

    $('.leave_type').each(function(){
     leave_type.push($(this).text());
    });

    $('.leave_lost').each(function(){
     leave_lost.push($(this).text());
    });

    $('.end_day').each(function(){
     end_day.push($(this).text());
    });

    $.ajax({
     url:"hr/e_att_update.php",
     method:"POST",
     data:{date:date, e_name:e_name, e_id:e_id, time_in:time_in, time_out:time_out, late_min:late_min, late_lost:late_lost, ot:ot, ot_amount:ot_amount, leave_type:leave_type, leave_lost:leave_lost},
     success:function(data){
      alert(data);
      $("td[contentEditable='true']").text("");
      for(var i=2; i<= count; i++)
      {
       $('tr#'+i+'').remove();
      }
      fetch_item_data();
     }
    });
   });


  });
  </script>
 
 <?php include_once "includes/footer.php" ?>
