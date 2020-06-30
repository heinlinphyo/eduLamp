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
    
    <!-- .content -->

         <div class="content mt-3">
                 <div class="row">
                 
                     <div class="col-md-12">
                         <div class="card">
                             <div class="card-header row ml-1 mr-1">
                                 <strong class="card-title"><i class="fa fa-calendar-day"></i> Employees Daily Attendance</strong>
                                 <a href="e_check_att.php" class="ml-auto mr-1"><button class="btn btn-sm btn-info" style="border-radius: 2px;box-shadow: 0 0 3px gray;">
 										              <i class="fa fa-chart-line"></i> Check Att </button>
 										            </a>
                                 <a href="e_leave.php" class="ml-3"><button class="btn btn-sm btn-primary" style="border-radius: 2px;box-shadow: 0 0 3px gray;">
 										              <i class="fa fa-plus-circle"></i> Leave </button>
 										            </a>
                             </div>
                             <div class="card-body">
                                 <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size: 12px;">
                                     <thead>
                                         <tr>
                                             <th class="text-info">ID</th>
                                             <th class="text-info">Name</th>
                                             <th class="text-info">Time In</th>
                                             <th class="text-info">Time Out</th>
                                             <th class="text-info">Late Min</th>
                                             <th class="text-info">Lost</th>
                                             <th class="text-info">Leave Type</th>
                                             <th class="text-info">Lost</th>
                                             <th class="text-info">End Day</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                       <?php
                                       $no=1;
                                          $today = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));
                                          $get_staffs=mysqli_query($conn, "SELECT * FROM e_attendance WHERE start_day = '$today'");
                                          while($row = mysqli_fetch_assoc($get_staffs)){
                                            $row_num=mysqli_num_rows($get_staffs);
                                        ?>
                                       <tr>
                                        
                                         <td contenteditable="true" class="e_id"><?php echo $row['e_id'] ?></td>
                                         <td contenteditable="true" class="e_name"><?php echo $row['e_name']?></td>
                                         <td contenteditable="true" class="time_in">09.00</td>
                                         <td contenteditable="true" class="time_out">17.00</td>
                                         <td contenteditable="true" class="late_min">-</td>
                                         <td contenteditable="true" class="late_lost">-</td>
                                         <td contenteditable="true" class="leave_type text-danger">
                                           <?php
                                            if($row['end_day'] == $today)
                                              {
                                                 
                                              }else{
                                                echo $row['leave_type'];
                                              }
                                           ?>
                                         </td>
                                         <td contenteditable="true" class="leave_lost text-danger">
                                           <?php
                                            if($row['leave_lost'] !='' )
                                              {
                                                echo $row['leave_lost'];
                                              }else{
                                                
                                              }
                                           ?>
                                         </td>

                                         <td contenteditable="true" class="end_day text-danger">
                                           <?php
                                           if($row['end_day'] == $today)
                                             {

                                             }else{
                                               echo $row['end_day'];
                                             }
                                            ?>
                                         </td>
                                       </tr>
                                       <?php
                                     }
                                        ?>
                                     </tbody>
                                     

                                 </table>
                             </div><!-- card body end -->
                             <div class="card-footer text-center">
                                <button type="button" name="save" id="save" class="btn btn-info col-md-4"><i class="fa fa-save"></i> Save Attendance</button>
                             </div><!-- card footer end -->
                         </div><!-- card end -->
                     </div>
                 </div>
         </div>
         <!-- .content -->
 </div><!-- wrapper end -->


 <script>
 $(document).ready(function(){
  var count = 1;

  $('#save').click(function(){
   var e_name = [];
   var e_id = [];
   var time_in = [];
   var time_out = [];
   var late_min = [];
   var late_lost = [];
   var leave_type = [];
  var leave_lost = [];
   var end_day = [];

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
    url:"hr/e_att_reg.php",
    method:"POST",
    data:{e_name:e_name, e_id:e_id, time_in:time_in, time_out:time_out, late_min:late_min, late_lost:late_lost, leave_type:leave_type, leave_lost:leave_lost, end_day:end_day},
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

<script src="assets/js/init-scripts/data-table/datatables-init.js" charset="utf-8"></script>
  <?php include_once "includes/footer.php" ?>
