<?php include_once "../includes/head.php" ?>
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
    }
    $page = "hr";


     $cookie_token = $_COOKIE['csrf'];
      $form_token = $_POST['token'];
      if($cookie_token != $form_token) exit (header("location: ../logout.php"));

   $id=mysqli_real_escape_string($conn, $_GET['id']);

if(isset($_POST['update'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $day = mysqli_real_escape_string($conn, $_POST['day']);
    $lost_amount = mysqli_real_escape_string($conn, $_POST['lost_amount']);


    if($id!='' && $name !='' && $day!='' && $lost_amount!=''){

      $add_leave = mysqli_query($conn, "UPDATE leave_category SET name='$name', day='$day', lost_amount='$lost_amount', reg_user='$user', created_date=now() WHERE id='$id' ");
      $confirm = "အချက်အလက်များပြင်ဆင်ခြင်း အောင်မြင်ပါသည်။";


    }
    else{

     header("location: error.php");

      }

     
}


 ?>






 <script>
     $(document).ready(function() {
           swal.fire({
               title: 'SUCCESSFUL',
               text: "<?php echo $confirm;  ?>",
               type: 'success',
           }).then(function (result) {
               if (result.value) {
                 window.location = "../hr_setting.php";
               }
         });
   });
 </script>
