<?php include_once ("../includes/head.php");

$warning = "တစ်စုံတစ်ခုမှားယွင်းနေပါသည်။";

?>
<script>
	  $(document).ready(function() {
		swal.fire({
  			title: 'မှားယွင်းမှုအခြေအနေ',
  			text: "<?php echo $warning;  ?>",
  			type: 'error',
		}).then(function (result) {
  			if (result.value) {
    			window.location = "../dashboard.php";
  			}
	});
});
</script>