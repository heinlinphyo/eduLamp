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

?>


<?php

      $cookie_token = $_COOKIE['csrf'];
      $form_token = $_POST['token'];
      if($cookie_token != $form_token) exit (header("location: ../logout.php"));


  if(isset($_POST['post'])){

        $e_id = mysqli_real_escape_string($conn, $_POST['e_id']);
        $leave_id = mysqli_real_escape_string($conn,$_POST['leave_id']);
        $s_date = mysqli_real_escape_string($conn,$_POST['s_date']);
        $e_date = mysqli_real_escape_string($conn,$_POST['e_date']);
        $days = mysqli_real_escape_string($conn,$_POST['days']);
        $asign = mysqli_real_escape_string($conn,$_POST['asign']);

        $this_year=date('Y');
        // get departments name //
        $get_name=mysqli_query($conn, "SELECT * FROM leave_category WHERE id='$leave_id' ");
				$result_name=mysqli_fetch_assoc($get_name);
				$leave_name=$result_name['name'];

        // get positions name //
				$get_e_id=mysqli_query($conn, "SELECT * FROM emp WHERE e_id='$e_id' AND freeze='' ");
				$result_e_name=mysqli_fetch_assoc($get_e_id);
				$e_name=$result_e_name['e_name'];

      
        $insert=mysqli_query($conn, "INSERT INTO e_leave(leave_id, leave_name, start_date, end_date, days, e_id, e_name, asign, reg_user, created_date, status, year) VALUES ('$leave_id', '$leave_name', '$s_date', '$e_date', '$days', '$e_id', '$e_name', '$asign', '$user', now(), '', '$this_year' )  ");


           $confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";

        }else{

          header("location: error.php");
        }
        // reg end //
       

?>

   <script>
    $(document).ready(function() {
    swal.fire({
        title: 'မှန်ကန်မှု',
        text: "<?php echo $confirm;  ?>",
        type: 'success',
    }).then(function (result) {
        if (result.value) {
          window.location = "../e_leave.php";
        }
  });
});
</script>