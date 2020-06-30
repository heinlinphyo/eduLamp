<?php include_once "../includes/head.php"; 

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
	if($cookie_token != $form_token){ echo  "$warning = 'ERROR!. Authorized Need!'";}

	$st_id =  mysqli_real_escape_string($conn, $_GET['st_id']);

	if(isset($_POST['reg'])){
		$st_name 	= mysqli_real_escape_string($conn, $_POST['st_name']);
		$grades 	= mysqli_real_escape_string($conn, $_POST['grades']);
		$father_name= mysqli_real_escape_string($conn, $_POST['father_name']);
		$mother_name= mysqli_real_escape_string($conn, $_POST['mother_name']);
		$age		= mysqli_real_escape_string($conn, $_POST['age']);
		$gender		= mysqli_real_escape_string($conn, $_POST['gender']);
        $nrc		= mysqli_real_escape_string($conn, $_POST['nrc']);
        $phone 		= mysqli_real_escape_string($conn, $_POST['phone']);
        $address 	= mysqli_real_escape_string($conn, $_POST['address']);
        $photo 		= $_FILES['photo']['name'];
        $tmp 		= $_FILES['photo']['tmp_name'];

		if($photo){
            move_uploaded_file($tmp, "photos/$photo");
        }
			$insert_st="INSERT INTO students (st_id, st_name, grade_id, father_name, mother_name, age, gender, nrc, phone, address, photo, reg_date, modi_date, status, reg_user, modi_user) VALUES ('$st_id', '$st_name', '$grades','$father_name','$mother_name','$age','$gender','$nrc','$phone', '$address', '$photo', now(), now(), '', '$user', '' ) ";
            mysqli_query($conn, $insert_st);

            
            
		}else{
			header("location: error.php");
		}
						// Insert student //
						//$today = date("F");
						if ($grades == '1') {
						   $insert_g = "INSERT INTO KG (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '','', '$user', now())";

						}elseif($grades == '2') {
						   $insert_g = "INSERT INTO G_1 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '', '', '$user', now())";

						}
						elseif($grades == '3') {
						  $insert_g = "INSERT INTO G_2 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '','', '$user', now())";

						}
						elseif($grades == '4') {
						  $insert_g = "INSERT INTO G_3 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '','', '$user', now())";

						}
						elseif($grades == '5') {
						  $insert_g = "INSERT INTO G_4 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '','', '$user', now())";

						}
						elseif($grades == '6') {
						  $insert_g = "INSERT INTO G_5 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '', ''$user', now())";

						}
						elseif($grades == '7') {
						  $insert_g = "INSERT INTO G_6 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '', '','$user', now())";

						}
						elseif($grades == '8') {
						  $insert_g = "INSERT INTO G_7 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '','', '$user', now())";

						}
						elseif($grades == '9') {
						  $insert_g = "INSERT INTO G_8 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '','', '$user', now())";

						}
						elseif($grades == '10') {
						  $insert_g = "INSERT INTO G_9 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '','', '$user', now())";

						}
						elseif($grades == '11') {
						  $insert_g = "INSERT INTO G_10 (st_id,st_name, active, year, reg_user , reg_date) VALUES ('$st_id','$st_name', '','', '$user', now())";

						}

						mysqli_query($conn, $insert_g);
						  
						header("location: confirm.php");


?>

