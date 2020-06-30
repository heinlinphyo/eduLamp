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

if(isset($_POST['save'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $day = mysqli_real_escape_string($conn, $_POST['day']);
    $lost_amount = mysqli_real_escape_string($conn, $_POST['lost_amount']);

    if( $name !='' && $day!='' && $lost_amount!=''){

        $add_leave = mysqli_query($conn, "INSERT INTO leave_category(name, day, lost_amount, reg_user,  created_date, status) VALUES('$name', '$day' ,'$lost_amount', '$user',now(), '')");

          $confirm = "အချက်အလက်ထည့်သွင်းခြင်း အောင်မြင်ပါသည်။";
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
