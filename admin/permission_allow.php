<?php 
 require_once "../includes/head.php";
 
 $id= mysqli_real_escape_string($conn, $_POST['id']);
 $sql =mysqli_query($conn ,"UPDATE e_menu SET status='1'   WHERE id ='$id' "); 
	  
 ?> 