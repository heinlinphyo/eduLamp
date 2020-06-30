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
    $page = "hr";



    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $del = "DELETE FROM leave_category WHERE id ='$id' ";
    $result = mysqli_query($conn, $del);


    header("location:../hr_setting.php");

 ?>


