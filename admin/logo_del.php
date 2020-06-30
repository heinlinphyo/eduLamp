<?php

	require_once ("../includes/head.php");
	
	
  	$id=$_GET['id'];
	$get_id=mysqli_query($conn, "SELECT * FROM logo WHERE id='$id' ");
	$result_id=mysqli_fetch_assoc($get_id);
	$img_name=$result_id['logo_image'];
	
	$file = "logo/$img_name";

	unlink("$file");

	$delete_logo=mysqli_query($conn, "DELETE FROM logo WHERE id='$id' ");
	header("location:../logo.php");
  					 		
	
?>