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

      $cookie_token = $_COOKIE['csrf'];
      $form_token = $_POST['token'];
      if($cookie_token != $form_token) exit (header("location: ../logout.php"));
      
  if(isset($_POST['post'])){    

      $st_id = mysqli_real_escape_string($conn, $_POST['st_id']);
      $leave = mysqli_real_escape_string($conn, $_POST['leave']);
      $start = mysqli_real_escape_string($conn, $_POST['start']);
      $end = mysqli_real_escape_string($conn, $_POST['end']);

      $get_name=mysqli_query($conn, "SELECT * FROM students WHERE st_id='$st_id' AND status='' ");
      $row = mysqli_fetch_assoc($get_name);
      $st_name = $row['st_name'];
      $g_id=$row['grade_id'];

      $get_g_name=mysqli_query($conn, "SELECT * FROM grades WHERE id='$g_id' ");
      $row_g_name=mysqli_fetch_assoc($get_g_name);
      $grade_name=$row_g_name['grade_name'];

      $today = date('Y-m-d');
      $this_year=date('Y');

      if($st_id && $st_name && $grade_name && $leave && $start && $end){

        $insert = mysqli_query($conn, "INSERT INTO st_leaves(st_id, st_name, grade_name, leave_type, start, end_date, reg_user, reg_date, status, year)VALUES('$st_id', '$st_name', '$grade_name', '$leave', '$start', '$end', '$user', '$today', '', '$this_year')");

        $confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";

    }else{
      $warning = "တစ်စုံတစ်ခုမှားယွင်းနေပါသည်။";
    }
       
    }else{
      $warning = "တစ်စုံတစ်ခုမှားယွင်းနေပါသည်။";
    }
?>

   <script>
    $(document).ready(function() {
    swal.fire({
        title: 'မှန်ကန်မှု',
        text: "<?php echo $confirm;  ?>",
        type: 'success',
    }).then(function (result) {
        if (result.value) {
          window.location = "../st_leave.php";
        }
  });
});
</script>

<script>
    $(document).ready(function() {
    swal.fire({
        title: 'မှားယွင်းမှုအခြေအနေ',
        text: "<?php echo $warning;  ?>",
        type: 'error',
    }).then(function (result) {
        if (result.value) {
          window.location = "../st_leave.php";
        }
  });
});
</script>