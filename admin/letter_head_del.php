<?php

	require_once ("../includes/head.php");
	
	
  	$id=$_GET['id'];
	$get_id=mysqli_query($conn, "SELECT * FROM letter_head WHERE id='$id' ");
	$result_id=mysqli_fetch_assoc($get_id);
	$img_name=$result_id['letter_image'];
	
	$file = "letter_head/$img_name";

	unlink("$file");

	$delete_logo=mysqli_query($conn, "DELETE FROM letter_head WHERE id='$id' ");
	header("location:../letter_head.php");
  					 		
	
?>