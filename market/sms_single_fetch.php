<?php
	error_reporting(0);
	include_once('../includes/head.php');
	

if(isset($_POST['id'])){
	
		$id=$_POST['id'];
	
	$query = "SELECT * FROM sms_promotion WHERE id='$id' ";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
	
}


?>