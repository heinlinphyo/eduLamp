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
	if($cookie_token != $form_token)exit (header("location: ../logout.php"));

	$e_id =  mysqli_real_escape_string($conn, $_GET['id']);

	if(isset($_POST['update'])){
		
        $e_name = mysqli_real_escape_string($conn, $_POST['e_name']);
        $f_name = mysqli_real_escape_string($conn,$_POST['f_name']);
        $m_name = mysqli_real_escape_string($conn,$_POST['m_name']);
        $nrc = mysqli_real_escape_string($conn,$_POST['nrc']);
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);

        $edu_1 = mysqli_real_escape_string($conn,$_POST['edu_1']);
        $edu_2 = mysqli_real_escape_string($conn,$_POST['edu_2']);
        $edu_3 = mysqli_real_escape_string($conn,$_POST['edu_3']);

        $quali_1 = mysqli_real_escape_string($conn,$_POST['quali_1']);
        $quali_2 = mysqli_real_escape_string($conn,$_POST['quali_2']);

        $bank_acc = mysqli_real_escape_string($conn,$_POST['bank_acc']);

        $job_1 = mysqli_real_escape_string($conn,$_POST['job_1']);
        $job_2 = mysqli_real_escape_string($conn,$_POST['job_2']);

        $marital = mysqli_real_escape_string($conn,$_POST['marital']);

        $image = mysqli_real_escape_string($conn,$_FILES['image']['name']);
        $tmp = mysqli_real_escape_string($conn,$_FILES['image']['tmp_name']);

        $post_id = mysqli_real_escape_string($conn,$_POST['post_id']);

        $dob = mysqli_real_escape_string($conn,$_POST['dob']);

        $address = mysqli_real_escape_string($conn,$_POST['address']);

        $dept_id = mysqli_real_escape_string($conn,$_POST['dept_id']);

      
        $join_date = mysqli_real_escape_string($conn,$_POST['join_date']);

        $resign_date = mysqli_real_escape_string($conn, $_POST['resign_date']);
        $freeze = mysqli_real_escape_string($conn, $_POST['status']);

        // get departments name //
        $get_detp=mysqli_query($conn, "SELECT * FROM departments WHERE id='$dept_id' ");
				$result_dept=mysqli_fetch_assoc($get_detp);
				$dept_name=$result_dept['dept_name'];

        // get positions name //
				$get_post_id=mysqli_query($conn, "SELECT * FROM positions WHERE id='$post_id' ");
				$result_post_name=mysqli_fetch_assoc($get_post_id);
				$post_name=$result_post_name['position'];

		if($image){
            move_uploaded_file($tmp, "photos/$image");
            $update_e=mysqli_query($conn, "UPDATE emp SET e_name='$e_name', f_name='$f_name', m_name='$m_name', nrc='$nrc', dob='$dob', gender='$gender', phone='$phone', email='$email', edu_1='$edu_1', edu_2='$edu_2', edu_3='$edu_3', qualifi_1='$quali_1', qualifi_2='$quali_2', job_1='$job_1', job_2='$job_2', bank_acc='$bank_acc', marital='$marital', image='$image', post_id='$post_id', address='$address', dept_id='$dept_id', join_date='$join_date', post_name='$post_name', dept_name='$dept_name', reg_user='$user' ,resign_date='$resign_date', freeze='$freeze' WHERE e_id='$e_id' " );
            
        }else{
        	 $update_e=mysqli_query($conn, "UPDATE emp SET e_name='$e_name', f_name='$f_name', m_name='$m_name', nrc='$nrc', dob='$dob', gender='$gender', phone='$phone', email='$email', edu_1='$edu_1', edu_2='$edu_2', edu_3='$edu_3', qualifi_1='$quali_1', qualifi_2='$quali_2', job_1='$job_1', job_2='$job_2', bank_acc='$bank_acc', marital='$marital', post_id='$post_id', address='$address', dept_id='$dept_id', join_date='$join_date', post_name='$post_name', dept_name='$dept_name', reg_user='$user' ,resign_date='$resign_date', freeze='$freeze' WHERE e_id='$e_id' " );
        }
			

         // update salary e_name //
         $sql = mysqli_query($conn, "UPDATE e_salary SET e_name='$e_name' WHERE e_id='$e_id' ");  
         
         header("location: confirm.php");
            
		}else{

			header("location: error.php");
		}

						
						
						  
						


?>

