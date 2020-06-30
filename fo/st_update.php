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

	$st_id =  mysqli_real_escape_string($conn, $_GET['id']);

	if(isset($_POST['update'])){
		$st_name 	= mysqli_real_escape_string($conn, $_POST['st_name']);
		$grade 		= mysqli_real_escape_string($conn, $_POST['grade_id']);
		$f_name 	= mysqli_real_escape_string($conn, $_POST['f_name']);
		$m_name 	= mysqli_real_escape_string($conn, $_POST['m_name']);
		$dob		= mysqli_real_escape_string($conn, $_POST['dob']);
		$gender		= mysqli_real_escape_string($conn, $_POST['gender']);
        $nrc		= mysqli_real_escape_string($conn, $_POST['nrc']);
        $phone 		= mysqli_real_escape_string($conn, $_POST['phone']);
        $address 	= mysqli_real_escape_string($conn, $_POST['address']);
        $status 	= mysqli_real_escape_string($conn, $_POST['status']);
        $photo 		= $_FILES['photo']['name'];
        $tmp 		= $_FILES['photo']['tmp_name'];

		if($photo){
            move_uploaded_file($tmp, "photos/$photo");
            $update_st=mysqli_query($conn, "UPDATE students SET st_name='$st_name', grade_id='$grade', father_name='$f_name', mother_name='$m_name', age='$dob', gender='$gender', nrc='$nrc', phone='$phone', address='$address', photo='$photo' , modi_date=now(), status='$status', modi_user='$user' WHERE st_id='$st_id' ");
            
        }else{
        	$update_st=mysqli_query($conn, "UPDATE students SET st_name='$st_name', grade_id='$grade', father_name='$f_name', mother_name='$m_name', age='$dob', gender='$gender', nrc='$nrc', phone='$phone', address='$address',  modi_date=now(), status='$status', modi_user='$user' WHERE st_id='$st_id' ");
        }
			

            
            
		}else{

			header("location: error.php");
		}

						// Update student //
						//$today = date("F");
						if ($grade == '1') {
						   $up = "UPDATE KG SET st_name='$st_name' WHERE st_id='$st_id' ";

						}elseif($grade == '2') {
						  
							$up = "UPDATE G_1 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}
						elseif($grade == '3') {
						  
							$up = "UPDATE G_2 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}
						elseif($grade == '4') {

						  $up = "UPDATE G_3 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}
						elseif($grade == '5') {
						  
							$up = "UPDATE G_4 SET st_name='$st_name' WHERE st_id='$st_id' ";					
						}
						elseif($grade == '6') {
						  
							$up = "UPDATE G_5 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}
						elseif($grade == '7') {

						  $up = "UPDATE G_6 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}
						elseif($grade == '8') {
						 
							$up = "UPDATE G_7 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}
						elseif($grade == '9') {
						  
							$up = "UPDATE G_8 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}
						elseif($grade == '10') {
						  
							$up = "UPDATE G_9 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}
						elseif($grade == '11') {
						  
							$up = "UPDATE G_10 SET st_name='$st_name' WHERE st_id='$st_id' ";
						}

						mysqli_query($conn, $up);
						  
						header("location: confirm.php");


?>

