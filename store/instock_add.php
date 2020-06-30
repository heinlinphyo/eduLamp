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

    //  get ID from dailyexpense //
     	$get_id=mysqli_query($conn, " SELECT * FROM dailyexpense ORDER BY id DESC LIMIT 1");
     	$result_id=mysqli_fetch_assoc($get_id);
     	$get_de_id=$result_id['id'];
     	$result_de_id=$result_id['dexp_id'];

     	$to_year=date('Y');
     	$to_month=date('m');

     	if($get_de_id==""){
 		$de_id="DE".date('Y').date('m')."1";
 	}
   	elseif(stristr($result_de_id, $to_month) === FALSE) {
     		$de_id="DE".date('Y').date('m')."1";
   	}
   	elseif(stristr($result_de_id,$to_year) === FALSE ){
 		$de_id="DE".date('Y').date('m')."1";
 	}
   	else{
   		$remove_m=substr($result_de_id,8);
   		$remove_m=$remove_m+1;
 		$de_id="DE".date('Y').date('m').$remove_m;
 	}

 ?>

<?php

  $item = mysqli_real_escape_string($conn, $_POST['item']);
  $new_date = mysqli_real_escape_string($conn, $_POST['new_date']);
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $remark = mysqli_real_escape_string($conn, $_POST['remark']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $new_balance = mysqli_real_escape_string($conn, $_POST['new_balance']);
  $in_date = date('Y-m-d');

  $add_stocks = mysqli_query($conn, "INSERT INTO stocks(new_date, item, in_quantity, remark, coast, in_user, in_date, total_quantity, out_quantity, refer_to, out_user, out_date)
                VALUES ('$new_date', '$item', '$quantity', '$remark', '$price', '$user', '$in_date', '$new_balance', '', '' , '', '')");

  $add_instocks = mysqli_query($conn, "INSERT INTO instocks (date, reg_user, item, remark, quantity, total_price)VALUES('$new_date','$user', '$item', '$remark', '$quantity', '$price')");

  // insert into dailyexpense datatable //
  $today = date('F');
  $de_sql = mysqli_query($conn, "INSERT INTO dailyexpense(dexp_id, dexp_amount, remark, reg_user, reg_date, month) VALUES ('$de_id', '$price', '$remark','$user', now(), '$today')");


  
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