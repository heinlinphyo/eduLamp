<?php
	require_once "../includes/head.php";
	//login
	if(isset($_POST['login'])){
		$user= mysqli_real_escape_string($conn, $_POST['username']);
		$pass= mysqli_real_escape_string($conn, $_POST['password']);
		$dept= mysqli_real_escape_string($conn, $_POST['department']);

		if($user && $pass && $dept){

				$check_dept=mysqli_query($conn , "SELECT * FROM departments WHERE dept_name='$dept' LIMIT 1  ");
				$result_dept=mysqli_num_rows($check_dept);
				if($result_dept==1){
					while($dept_all=mysqli_fetch_assoc($check_dept)){
						$dept_name=$dept_all['dept_name'];

						$get_admin=mysqli_query($conn , "SELECT * FROM admin WHERE dept_name='$dept' ");
						$result_admin=mysqli_fetch_assoc($get_admin);
						$admin_dept=$result_admin['dept_name'];

						$get_staff=mysqli_query($conn , "SELECT * FROM emp WHERE dept_name='$dept' ");
						$result_staff=mysqli_fetch_assoc($get_staff);
						$staff_dept=$result_staff['dept_name'];

						if($dept_name==$admin_dept){
							$check_login=mysqli_query($conn , "SELECT * FROM admin WHERE username='$user' AND password='$pass' LIMIT 1 ");
							$result_login=mysqli_num_rows($check_login);
							if($result_login==1){

								//get expire//
								$today=date('Y-m-d');
								$get_expire=mysqli_query($conn,"SELECT * FROM soft_expire ");
								$result_expire=mysqli_fetch_assoc($get_expire);
								$e_date=$result_expire['e_date'];

								if($today<=$e_date){



								//get expire//

								$status="1";
								session_start();
								$_SESSION['username']=$user;
								header("location:../dashboard.php");
								$update_user=mysqli_query($conn, "UPDATE admin SET status='$status' WHERE username='$user' ");

								}
								else{

									header("location:soft_expire.php");
								}

							}
							else{
								//$warning="သင့်အချက်အလက်များမှာ မှားယွင်းမှုရှိနေပါသည်။";
								header("location: ../error.php");
							}
						}
						elseif($dept_name==$staff_dept){

							$staff_login=mysqli_query($conn, "SELECT * FROM emp WHERE username='$user' AND password='$pass' LIMIT 1 ");
							$result_staff_login=mysqli_num_rows($staff_login);
							if($result_staff_login==1){

								//get expire//
								$today=date('Y-m-d');
								$get_expire=mysqli_query($conn, "SELECT * FROM soft_expire ");
								$result_expire=mysqli_fetch_assoc($get_expire);
								$e_date=$result_expire['e_date'];

								if($today<=$e_date){



								//get expire//

								$status="1";
								session_start();
								$_SESSION['username']=$user;
								$update_user=mysqli_query($conn, " UPDATE emp  SET status='$status' WHERE username='$user' ");
								echo "<script>window.location.replace('../dashboard.php');</script>";

								}
								else{
									header("location:soft_expire.php");
								}

							}
							else{
								//$warning="သင့်အချက်အလက်များမှာ မှားယွင်းမှုရှိနေပါသည်။";
								header("location: ../error.php");
							}
						}
						else{
							//$warning="သင့်အချက်အလက်များမှာ မှားယွင်းမှုရှိနေပါသည်။";
							header("location: ../error.php");
						}


					}
				}
				else{
					//$warning="သင့်အချက်အလက်များမှာ မှားယွင်းမှုရှိနေပါသည်။";
					header("location: ../error.php");
				}




			}
			else{
				//$warning="သင့်အချက်အလက်များမှာ မှားယွင်းမှုရှိနေပါသည်။";
				header("location: ../error.php");
			}


	}
	//login

?>


