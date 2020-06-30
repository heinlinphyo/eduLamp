<?php

include_once "../includes/head.php";

 $hostel_name=$_GET['hostel_name'];

$datetime=date('Y-m-d H:i:sa');

$update_record=mysqli_query($conn, "UPDATE hostel_record SET check_out='$datetime', status='' WHERE h_name='$hostel_name'  ");

$update_hostel=mysqli_query($conn, "UPDATE hostel SET status='' WHERE hostel_name='$hostel_name' ");

echo "<script>window.location.replace('../hostel.php');</script>";

 ?>