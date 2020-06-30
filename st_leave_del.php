<?php include_once ("includes/header.php");
  
  $confirm = "စာရင်းဖျက်ခြင်းကို လုပ်ဆောင်ပါမည်လား။";
  $id=$_GET['id'];
?>

<script>
    $(document).ready(function() {
    swal.fire({
        title: 'သတိပေးချက်',
        text: "<?php echo $confirm;  ?>",
        type: 'warning',
        showCancelButton: true,
    }).then(function (result) {

        if (result.value) {

          window.location = "learn/st_leave_del.php?id=<?php echo $id; ?>";
        }else{
          window.location = "st_leave.php";
        }
  });

});
</script>
