<?php 
  include_once "includes/header.php";
  error_reporting(0);
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
    $page = "hr";

  $token=md5(rand(1, 1000).time());
    setcookie("csrf", $token);

 ?>

<!-- ======= DataTable ======= --->
<link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/Buttons-1.6.2/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="DataTables/Buttons-1.6.2/css/buttons.dataTables.min.css">
<script type="text/javascript" src="DataTables/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.6.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="DataTables/Buttons-1.6.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>

<style media="screen">
  .tab-bar{list-style: none; overflow: hidden; margin: 0; padding: 10px; background-color: rgba(0,0,0,.05);}
  .tab-bar li{ float: left; padding: 8px 20px;background: #fff; margin-right: 10px;}
  .panel{display: none;}

</style>

 <div class="wrapper">
   <?php
     include_once "includes/sidebar.php";
     include_once "includes/navbar.php";
    ?>

    <ul class="tab-bar">
      <li id="tab-1" onClick="switchOne()"><i class="fa fa-file"></i> <small>LEAVE</small> </li>
      <li id="tab-2" onClick="switchTwo()"><i class="fa fa-arrow-down"></i> <small>LATE</small> </li>
      <li id="tab-3" onClick="switchThree()"><i class="fa fa-clock"></i> <small> OT </small> </li>
      <li id="tab-4" onClick="switchFour()"><i class="fa fa-calendar"></i> <small> Pay Day </small></li>
    </ul>



    <div class="panel" id="panel-1">
      <?php include_once ("leave.php") ?>
    </div>

    <div class="panel" id="panel-2">
      <?php  ?>
    </div>

    <div class="panel" id="panel-3">
      <?php  ?>
    </div>

    <div class="panel" id="panel-4">
      <?php  ?>
    </div>

</div><!-- wrapper end -->
    <script type="text/javascript">
      function get(obj){
        return document.getElementById(obj);
      }
      function switchOne(){
        get("tab-1").style.background = "green";
        get("tab-1").style.color = "#fff";
        get("tab-2").style.background = "#fff";
        get("tab-2").style.color = "black";
        get("tab-3").style.background = "#fff";
        get("tab-3").style.color = "black";
        get("tab-4").style.background = "#fff";
        get("tab-4").style.color = "black";
        get("panel-1").style.display = "block";
        get("panel-2").style.display = "none";
        get("panel-3").style.display = "none";
        get("panel-4").style.display = "none";
      }
      function switchTwo(){
        get("tab-1").style.background = "#fff";
        get("tab-1").style.color = "black";
        get("tab-2").style.background = "green";
        get("tab-2").style.color = "#fff";
        get("tab-3").style.background = "#fff";
        get("tab-3").style.color = "black";
        get("tab-4").style.background = "#fff";
        get("tab-4").style.color = "black";
        get("panel-1").style.display = "none";
        get("panel-2").style.display = "block";
        get("panel-3").style.display = "none";
        get("panel-4").style.display = "none";
      }
      function switchThree(){
        get("tab-1").style.background = "#fff";
        get("tab-1").style.color = "black";
        get("tab-2").style.background = "#fff";
        get("tab-2").style.color = "black";
        get("tab-3").style.background = "green";
        get("tab-3").style.color = "#fff";
        get("tab-4").style.background = "#fff";
        get("tab-4").style.color = "black";
        get("panel-1").style.display = "none";
        get("panel-2").style.display = "none";
        get("panel-3").style.display = "block";
        get("panel-4").style.display = "none";
      }
      function switchFour(){
        get("tab-1").style.background = "#fff";
        get("tab-1").style.color = "black";
        get("tab-2").style.background = "#fff";
        get("tab-2").style.color = "black";
        get("tab-3").style.background = "#fff";
        get("tab-3").style.color = "black";
        get("tab-4").style.background = "green";
        get("tab-4").style.color = "#fff";
        get("panel-1").style.display = "none";
        get("panel-2").style.display = "none";
        get("panel-3").style.display = "none";
        get("panel-4").style.display = "block";
      }
    </script>


 <?php include_once "includes/footer.php" ?>
