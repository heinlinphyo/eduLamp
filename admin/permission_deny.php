<?php 
 require_once "../includes/head.php";
 
 $id=$_POST['id'];
 $sql =mysqli_query($conn, "UPDATE e_menu SET status=''   WHERE id ='$id' "); 
	  
 ?> 