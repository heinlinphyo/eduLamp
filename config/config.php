<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "schooltest";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ("Connect Error!");
mysqli_select_db($conn, $dbname) or die ("Unknow Database!:");
?>