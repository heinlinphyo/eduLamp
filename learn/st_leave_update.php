<?php include_once ("../includes/head.php");
  
 
  $id=$_GET['id'];
  
  $sql_update=mysqli_query($conn, "UPDATE st_leaves SET status='approved' WHERE id='$id' ");

  header("location: ../st_online_leave.php ");

?>

   