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

  $e_id = mysqli_real_escape_string($conn, $_GET['e_id']);

  if(isset($_POST['reg'])){

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

        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $join_date = mysqli_real_escape_string($conn,$_POST['join_date']);

        $reg_date = date('Y-m-d');

        // get departments name //
        $get_detp2=mysqli_query($conn, "SELECT * FROM departments WHERE id='$dept_id' ");
				$result_dept2=mysqli_fetch_assoc($get_detp2);
				$dept_name2=$result_dept2['dept_name'];

        // get positions name //
				$get_post_id=mysqli_query($conn, "SELECT * FROM positions WHERE id='$post_id' ");
				$result_post_name=mysqli_fetch_assoc($get_post_id);
				$post_name=$result_post_name['position'];

        if ($image) {
          move_uploaded_file($tmp, "photos/$image");
        }

      if($e_id){

          $insert_sql= "INSERT INTO emp (finger_id, e_id, e_name, f_name, m_name, nrc, dob, gender, phone, email, edu_1, edu_2, edu_3, qualifi_1, qualifi_2, job_1, job_2, bank_acc, marital, image, post_id, address, dept_id, username, password, join_date, post_name, dept_name, reg_user, reg_date, status, resign_date, freeze) VALUES ( '','$e_id','$e_name', '$f_name', '$m_name', '$nrc', '$dob','$gender', '$phone', '$email', '$edu_1', '$edu_2', '$edu_3', '$quali_1', '$quali_2', '$job_1', '$job_2', '$bank_acc', '$marital', '$image', '$post_id', '$address','$dept_id','$username', '$password', '$join_date', '$post_name', '$dept_name2', '$user', '$reg_date', '', '', '')";



          mysqli_query($conn, $insert_sql);

           $insert_attendance=mysqli_query($conn, "INSERT INTO e_attendance(date ,e_id, e_name, time_in, time_out, late_min, late_lost, ot, ot_amount, leave_type, leave_lost, start_day, end_day, status, reg_date)VALUES('$reg_date' ,'$e_id', '$e_name', '', '', '', '', '', '', '', '', '$reg_date', '', '', '$reg_date')");

          }

           //menu//
						$get_menu=mysqli_query($conn, "SELECT * FROM menu_list WHERE status='1' ");
						while($result_menu=mysqli_fetch_assoc($get_menu)){
									$menu_id=$result_menu['id'];
									$menu_name=$result_menu['menu_name'];
									$insert_menu=mysqli_query($conn,"INSERT INTO e_menu(e_id, e_name, menu_id, menu_name, status, edit) VALUES ('$e_id','$e_name','$menu_id','$menu_name','','') ");
						}
						//menu//


           header("location: confirm.php");







        }// reg end //


?>

    <script>
    	  $(document).ready(function() {

          		swal.fire({
            			title: 'Successful',
            			text: "<?php echo $confirm;  ?>",
            			type: 'success',
          		}).then(function (result) {
            			if (result.value) {
              			window.location = "../e_list.php";
            			}
          	});
      });
    </script>
