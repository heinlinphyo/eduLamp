<?php
	include_once "includes/header.php";
	$page = "dashboard";
	session_start();
	if(isset($_SESSION['username'] )){
		$user=$_SESSION['username'];
		
	} 
	else{
		$user="";
		
	}
	if($user){
		
	}
	else{
		header("location:logout.php");
    }
?>    

<div class="wrapper"><!-- wrapper begin -->

	<?php	

		include_once "includes/sidebar.php";		
		include_once "includes/navbar.php";
		include_once "includes/content.php";
		
	?>		
</div><!-- wrapper end -->

<?php include_once "includes/footer.php" ?>
