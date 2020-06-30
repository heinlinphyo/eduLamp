
<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "schooltest");

if(isset($_POST["e_name"]))
{
 $e_name = $_POST["e_name"];
 $e_id = $_POST["e_id"];
 $time_in = $_POST["time_in"];
 $time_out = $_POST["time_out"];
 $late_min = $_POST["late_min"];
 $late_lost = $_POST['late_lost'];
 $ot = $_POST['ot'];
 $ot_amount = $_POST['ot_amount'];
 $leave_type = $_POST["leave_type"];
 $leave_lost = $_POST['leave_lost'];
  $date = $_POST['date']; 

 $query = '';
 for($count = 0; $count<count($e_name); $count++)
 {
  $e_name_clean = mysqli_real_escape_string($connect, $e_name[$count]);
  $e_id_clean = mysqli_real_escape_string($connect, $e_id[$count]);
  $time_in_clean = mysqli_real_escape_string($connect, $time_in[$count]);
  $time_out_clean = mysqli_real_escape_string($connect, $time_out[$count]);
  $late_min_clean = mysqli_real_escape_string($connect, $late_min[$count]);
  $late_lost_clean = mysqli_real_escape_string($connect, $late_lost[$count]);
  $ot_clean = mysqli_real_escape_string($connect, $ot[$count]);
  $ot_amount_clean = mysqli_real_escape_string($connect, $ot_amount[$count]);
  $leave_type_clean = mysqli_real_escape_string($connect, $leave_type[$count]);
  $leave_lost_clean = mysqli_real_escape_string($connect, $leave_lost[$count]);
  $date_clean = mysqli_real_escape_string($connect, $date[$count]);




  if($e_name_clean != '' && $e_id_clean != '' && $time_in_clean != '' && $time_out_clean != '' && $late_min_clean !='' && $late_lost_clean !='' && $ot_clean !='' && $ot_amount_clean !='' && $leave_type_clean !='' && $leave_lost_clean !='' && $date_clean !='' )
  {
   $query .= '
          UPDATE e_attendance SET  time_in="'.$time_in_clean.'", time_out="'.$time_out_clean.'", late_min="'.$late_min_clean.'", late_lost="'.$late_lost_clean.'", ot="'.$ot_clean.'", ot_amount="'.$ot_amount_clean.'", leave_type="'.$leave_type_clean.'", leave_lost="'.$leave_lost_clean.'" WHERE e_id = "'.$e_id_clean.'" AND reg_date = "'.$date_clean.'" ;
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Updated';
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
