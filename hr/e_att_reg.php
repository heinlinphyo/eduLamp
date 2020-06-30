
<?php
//insert.php
$conn = mysqli_connect('localhost', 'root', '' , 'schooltest');

if(isset($_POST["e_name"]))
{
 $e_name = $_POST["e_name"];
 $e_id = $_POST["e_id"];
 $time_in = $_POST["time_in"];
 $time_out = $_POST["time_out"];
 $late_min = $_POST["late_min"];
 $late_lost = $_POST['late_lost'];
 $leave_type = $_POST["leave_type"];
 $leave_lost = $_POST['leave_lost'];
 $end_day = $_POST["end_day"];
$today = date('Y-m-d');



 $query = '';
 for($count = 0; $count<count($e_name); $count++)
 {


  $e_name_clean = mysqli_real_escape_string($conn, $e_name[$count]);
  $e_id_clean = mysqli_real_escape_string($conn, $e_id[$count]);
  $time_in_clean = mysqli_real_escape_string($conn, $time_in[$count]);
  $time_out_clean = mysqli_real_escape_string($conn, $time_out[$count]);
  $late_min_clean = mysqli_real_escape_string($conn, $late_min[$count]);
  $late_lost_clean = mysqli_real_escape_string($conn, $late_lost[$count]);
  $leave_type_clean = mysqli_real_escape_string($conn, $leave_type[$count]);
  $leave_lost_clean = mysqli_real_escape_string($conn, $leave_lost[$count]);
  $end_day_clean = mysqli_real_escape_string($conn, $end_day[$count]);



  if($e_name_clean != '' && $e_id_clean != '' && $time_in_clean != '' && $time_out_clean != '' && $late_min_clean !='' && $late_lost_clean !='' && $leave_type_clean !='' && $leave_lost_clean !='' && $end_day_clean !='' && $today )
  {
   $query .= '
   INSERT INTO e_attendance(date ,e_id, e_name, time_in, time_out, late_min, late_lost, ot, ot_amount, leave_type, leave_lost, start_day, end_day, status, reg_date)
   VALUES("'.$today.'", "'.$e_id_clean.'", "'.$e_name_clean.'", "'.$time_in_clean.'", "'.$time_out_clean.'", "'.$late_min_clean.'" , "'.$late_lost_clean.'", "0", "0", "'.$leave_type_clean.'", "'.$leave_lost_clean.'", "'.$today.'", "'.$end_day_clean.'"," ", now());
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>
