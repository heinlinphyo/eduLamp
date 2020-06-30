<?php
	error_reporting(0);
	include_once "../config/config.php";

if(isset($_POST['id'])){
	$id=mysqli_real_escape_string($conn, $_POST['id']);
	$query = "SELECT * FROM stocks WHERE id='$id'  ";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
	  echo json_encode($row);
}

?>
