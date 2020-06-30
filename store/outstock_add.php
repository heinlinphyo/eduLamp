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

    $cookie_token = $_COOKIE['csrf'];
    $form_token = $_POST['token'];
    if($cookie_token != $form_token)exit(header("location:../logout.php"));

    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $out_quantity = mysqli_real_escape_string($conn, $_POST['out_quantity']);
    $refer_to = mysqli_real_escape_string($conn, $_POST['refer_to']);
    $new_balance = mysqli_real_escape_string($conn, $_POST['out_new_balance']);
    $out_date = date('Y-m-d');

    $add_stocks = mysqli_query($conn, "INSERT INTO stocks(new_date, item, in_quantity, remark, coast, in_user, in_date, total_quantity, out_quantity, refer_to, out_user, out_date)
                  VALUES ('', '$item_name', '', '', '', '', '', '$new_balance', '$out_quantity', '$refer_to' , '$user', '$out_date')");

    $confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";              

  ?>
<script>
    $(document).ready(function() {
    swal.fire({
        title: 'မှန်ကန်မှု',
        text: "<?php echo $confirm;  ?>",
        type: 'success',
    }).then(function (result) {
        if (result.value) {
          window.location = "../stock.php";
        }
  });
});
</script>