<?php include_once "../includes/head.php"; 
    error_reporting(0);
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
?>

<?php
	
	$cookie_token = $_COOKIE['csrf'];
	$form_token = $_POST['token'];
	if($cookie_token != $form_token) exit (header("location: ../logout.php"));

	$id =  mysqli_real_escape_string($conn, $_GET['id']);

	  if(isset($_POST['update'])){
        
        $basic = mysqli_real_escape_string($conn,$_POST['up_basic']);
        $meal = mysqli_real_escape_string($conn,$_POST['up_meal']);
        $transpo = mysqli_real_escape_string($conn,$_POST['up_transpo']);
        $topup = mysqli_real_escape_string($conn,$_POST['up_topup']);
        $income_tax= mysqli_real_escape_string($conn,$_POST['up_income_tax']);
        $ssb = mysqli_real_escape_string($conn,$_POST['up_ssb']);
       
        $net_salary=$basic + $meal + $transpo + $topup;

      
        $update=mysqli_query($conn, "UPDATE e_salary SET  basic_salary='$basic', meal_allow='$meal', transpo_allow='$transpo', top_up_allow='$topup', income_tax='$income_tax', ssb='$ssb', net_salary='$net_salary', reg_user='$user', modified_date=now(), status='$status' WHERE id='$id'  ");


           $confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";

        }else{

          header("location: error.php");
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
          window.location = "../salary.php";
        }
  });
});
</script>