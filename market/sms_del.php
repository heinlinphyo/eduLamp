<?php
	require_once("../includes/head.php");
	
	$id=mysqli_real_escape_string($conn,$_GET['id']);
	
	$delete=mysqli_query($conn,"DELETE FROM sms_promotion WHERE id='$id' ");

	echo "<script>window.location.replace('../sms.php');</script>";
?>

