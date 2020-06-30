<?php

	include_once "../includes/head.php";

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
			// check token //
			$cookie_token = $_COOKIE['csrf'];
			$form_token = $_POST['token'];
			if($cookie_token != $form_token) exit (header("location: ../logout.php"));

	if(isset($_POST['save'])){
		$maxsize=1097152;
                    if($_FILES['image']['name']){
                    								
                    	//check logo//
                    	$get_check=mysqli_query($conn,"SELECT * FROM logo order by id desc limit 1 ");
                    	$row_check=mysqli_num_rows($get_check);
                    	//check logo//
                    								
                    	if($row_check==0){
											
                    		if(($_FILES['image']['size']<=$maxsize) || ($_FILES['image']['size']==0)) {
                    			$image=$_FILES['image'];
                    			if($image){
						mkdir("logo");
						$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$name =md5(date("Y-m-d H:i:sa"));
						$old=$_FILES["image"]["name"]."<br/>";
						$new= $name.".".$extension;
														
						move_uploaded_file($image['tmp_name'],"logo/".$new);
						$insert_logo=mysqli_query($conn,"INSERT INTO logo (logo_image) VALUES ('$new') ");
						header("location:../logo.php");
					}
				}
											
			}
			else{
					$warning= "အသုံးပြုပြီးသာဖြစ်နေပါသည်။";
			}	
                    								
		}
	}
  					 		
	
?>

<script>
	  $(document).ready(function() {
		swal.fire({
  			title: 'မှားယွင်းမှုအခြေအနေ',
  			text: "<?php echo $warning;  ?>",
  			type: 'error',
		}).then(function (result) {
  			if (result.value) {
    			window.location = "../logo.php";
  			}
	});
});
</script>