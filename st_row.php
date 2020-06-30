<?php

    include_once "includes/header.php";

    $page = "learn";

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
		header("location:logout.php");
    }
?>

<style media="screen">
    .card{
        border-radius: 6px;
        box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
        background-color: #FFFFFF;
        color: #252422;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }
    .card .content{
        padding: 15px 15px 10px 15px;
    }
    .icon-big{
        font-size: 1.5em;
        min-height: 64px;
    }
    .numbers{

        text-align: right;
    }
    .card p{
        margin: 0px;
    }
    .card .stats{
        color: #a9a9a9;
    }
    #profileSubmenu{
        margin-top: 3px;
    }
    #profileSubmenu li {
        padding: 5px;
    }
    #profileSubmenu li a {
        font-size: 13px;
        background: none !important;
    }
    #profileSubmenu li a:hover{
        color: blue;
    }
</style>


<div class="wrapper"><!-- wrapper begin -->
	<?php
		include_once "includes/sidebar.php";
        include_once "includes/navbar.php";
        $category = mysqli_query($conn, "SELECT * FROM grades"); // get grades ID //
	?>

  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <?php while ($row = mysqli_fetch_assoc($category)): ?>
          <div class="col-lg-3 col-sm-6">
            <a href="st_exam.php?id=<?php echo $row['id'] ?>">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5 col-sm-3">
                            <div class="icon-big text-center text-success">
                                <i class="fa fa-crown"></i>
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-9">
                            <div class="numbers">
                                <p class=" text-success">
                                  <strong><?php echo $row['grade_name'] ?></strong>
                                </p>

                            </div>
                        </div>
                    </div>
                    <a href="st_exam.php?id=<?php echo $row['id'] ?>" >
                        <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fa fa-arrow-right" style="color: orange;font-size: 11px;"></i>  <small> Exam Result </small>
                            
                        </div>
                        </div>
                  </a>
                </div>
            </div>
            </a>
          </div>
        <?php endwhile; ?>
        </div>
      </div>
  </div>

</div><!-- wrapper end -->

<?php include_once "includes/footer.php" ?>
