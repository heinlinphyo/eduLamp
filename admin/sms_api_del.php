<?php
	require_once("../includes/head.php");
	
	$id=$_GET['id'];
	
	$delete=mysqli_query($conn, "DELETE FROM sms_api WHERE id='$id' ");

	echo "<script>window.location.replace('../sms_setting.php');</script>";
?>