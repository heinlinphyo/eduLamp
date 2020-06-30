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
    $id=mysqli_real_escape_string($conn, $_GET['id']);

  if(isset($_POST['update'])){
    
    $g_id=mysqli_real_escape_string($conn, $_POST['grade_id']);
 
    $mya=mysqli_real_escape_string($conn, $_POST['mya2']);
    $eng=mysqli_real_escape_string($conn, $_POST['eng2']);
    $math=mysqli_real_escape_string($conn, $_POST['math2']);
    $phy=mysqli_real_escape_string($conn, $_POST['phy2']);
    $chem=mysqli_real_escape_string($conn, $_POST['chem2']);
    $bio=mysqli_real_escape_string($conn, $_POST['bio2']);
    $eco=mysqli_real_escape_string($conn, $_POST['eco2']);
    $total=mysqli_real_escape_string($conn, $_POST['total2']);
    $month=date('F');


     // select table  //
    if($g_id == '1'){
    $sql_st = mysqli_query($conn,"UPDATE exam_KG SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '2'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G1 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '3'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G2 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '4'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G3 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '5'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G4 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '6'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G5 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '7'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G6 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '8'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G7 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '9'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G8 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '10'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G9 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
  }elseif($g_id == '11'){
    $sql_st = mysqli_query($conn,"UPDATE exam_G10 SET mya='$mya', eng='$eng', math='$math', phy='$phy', chem='$chem', bio='$bio', eco='$eco', total='$total', created_date=now() WHERE id='$id' AND status='' ");
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
          window.location = "../st_exam.php?id=<?php echo $g_id; ?>";
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
          window.location = "../st_exam.php?id=<?php echo $g_id; ?>";
        }
  });
});
</script>