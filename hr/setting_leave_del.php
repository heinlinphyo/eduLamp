<?php include_once ("../includes/head.php"); ?>
<?php
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

 ?>
<?php


    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $del = "DELETE FROM leave_category WHERE id ='$id' ";
    $result = mysqli_query($conn, $del);

    $confirm = "Deleted Data";
   

 ?>


 <script>
     $(document).ready(function() {
           swal.fire({
               title: 'SUCCESSFUL',
               text: "<?php echo $confirm;  ?>",
               type: 'error',
           }).then(function (result) {
               if (result.value) {
                 window.location = "../hr_setting.php";
               }
         });
   });
 </script>
