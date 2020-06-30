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
      $page="learn";
?>
<?php
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $del = mysqli_query($conn, "DELETE FROM st_leaves WHERE id='$id' ");

  header("location: ../st_leave.php");

?>