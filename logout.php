<?php
	 require_once "includes/header.php";
	 
	 if($user){
		
	} 
	else{
		header("location:logout.php");
	}
	
	session_start();
	session_destroy();
	
	$update_status="";
	$update_admin=mysqli_query($conn, "UPDATE admin SET status='$update_status' WHERE username='$user' ");
	$update=mysqli_query($conn, "UPDATE staffs SET status='$update_status' WHERE username='$user' ");
	
	header("location: index.php");

?>