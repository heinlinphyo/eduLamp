<?php
  include_once ("../includes/head.php");

      session_start();
      if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
      }else{
        $user = "";
      }
      if($user){

      }else {
        header("location: ../logout.php");
      }

      $this_year=date('Y');

      $get_all=mysqli_query($conn, "DELETE FROM e_leave WHERE year!='$this_year' ");


?>
