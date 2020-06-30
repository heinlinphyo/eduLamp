<?php 
include_once ("../includes/head.php"); 

  session_start();
	if(isset($_SESSION['username'])){
		$user=$_SESSION['username'];
	}
	else{
		$user="";
	}

	if($user){

	}
	else{
    header("location:../logout.php");
    session_destroy();
    }

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $del = "DELETE FROM hostel_fees WHERE id ='$id' ";
    $result = mysqli_query($conn, $del);


    header("location:../hostel_setting.php");

 ?>