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
        $basic = mysqli_real_escape_string($conn,$_POST['basic']);
        $meal = mysqli_real_escape_string($conn,$_POST['meal']);
        $transport = mysqli_real_escape_string($conn,$_POST['transport']);
        $topup = mysqli_real_escape_string($conn,$_POST['topup']);
        $net_salary = mysqli_real_escape_string($conn,$_POST['net_salary']);
        $income_tax= mysqli_real_escape_string($conn,$_POST['income_tax']);
        $ssb = mysqli_real_escape_string($conn,$_POST['ssb']);

       

        // get positions name //
				$get_e_id=mysqli_query($conn, "SELECT * FROM emp WHERE e_id='$e_id' AND freeze='' ");
				$result_e_name=mysqli_fetch_assoc($get_e_id);
				$e_name=$result_e_name['e_name'];

      
        $sql = mysqli_query($conn, "INSERT INTO e_salary ( e_id, e_name, basic_salary, meal_allow, transpo_allow, top_up_allow, income_tax, ssb, net_salary, reg_user, created_date, modified_date, status)
                   VALUES('$e_id','$e_name','$basic' ,'$meal','$transport', '$topup', '$income_tax', '$ssb', '$net_salary', '$user', now(), now(), '')");


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
          window.location = "../salary.php";
        }
  });
});
</script>