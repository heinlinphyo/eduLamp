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
      $page="learn";

      $cookie_token = $_COOKIE['csrf'];
      $form_token = $_POST['token'];
      if($cookie_token != $form_token) exit (header("location: ../logout.php"));
?>
<?php 
  if(isset($_POST['post'])){

    $id=mysqli_real_escape_string($conn, $_POST['grade_id']);
    $grade_name=mysqli_real_escape_string($conn, $_POST['grade_name']);
    $st_id=mysqli_real_escape_string($conn, $_POST['st_id']);
    $mya=mysqli_real_escape_string($conn, $_POST['mya']);
    $eng=mysqli_real_escape_string($conn, $_POST['eng']);
    $math=mysqli_real_escape_string($conn, $_POST['math']);
    $phy=mysqli_real_escape_string($conn, $_POST['phy']);
    $chem=mysqli_real_escape_string($conn, $_POST['chem']);
    $bio=mysqli_real_escape_string($conn, $_POST['bio']);
    $eco=mysqli_real_escape_string($conn, $_POST['eco']);
    $total=mysqli_real_escape_string($conn, $_POST['total']);

    $sql_st_name=mysqli_query($conn, "SELECT * FROM students WHERE st_id='$st_id' AND status='' ");
    $row_st_name=mysqli_fetch_assoc($sql_st_name);
    $st_name=$row_st_name['st_name'];

    $month=date('F');
     // select table  //
    if($id == '1'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_KG (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month', now(), '') ");
  }elseif($id == '2'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G1 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month', now(), '') ");
  }elseif($id == '3'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G2 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month', now(),'') ");
  }elseif($id == '4'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G3 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month', now(), '') ");
  }elseif($id == '5'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G4 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month', now(), '') ");
  }elseif($id == '6'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G5 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month', now(), '') ");
  }elseif($id == '7'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G6 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month',now(), '') ");
  }elseif($id == '8'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G7 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month', now(), '') ");
  }elseif($id == '9'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G8 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month',now(), '') ");
  }elseif($id == '10'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G9 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month',now(), '') ");
  }elseif($id == '11'){
    $sql_st = mysqli_query($conn, "INSERT INTO exam_G10 (st_id, st_name, mya, eng, math, phy, chem, bio, eco, total, month, created_date, status) VALUES ('$st_id', '$st_name', '$mya', '$eng', '$math', '$phy', '$chem', '$bio', '$eco', '$total', '$month', now(), '') ");
  }elseif($id == ''){
    $warning = "တစ်စုံတစ်ခုမှားယွင်းနေပါသည်။";
  }

  $confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";


  }
?>

   <script>
    $(document).ready(function() {
    swal.fire({
        title: 'မှန်ကန်မှု',
        text: "<?php echo $confirm;  ?>",
        type: 'success',
    }).then(function (result) {
        if (result.value) {
          window.location = "../st_exam.php?id=<?php echo $id; ?>";
        }
  });
});
</script>

<script>
    $(document).ready(function() {
    swal.fire({
        title: 'မှားယွင်းမှုအခြေအနေ',
        text: "<?php echo $warning;  ?>",
        type: 'error',
    }).then(function (result) {
        if (result.value) {
          window.location = "../st_row.php";
        }
  });
});
</script>