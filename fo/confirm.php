<?php include_once ("../includes/head.php");
	
	$confirm = "စာရင်းသွင်းခြင်းပြည့်စုံပါသည်။";
?>

<script>
	  $(document).ready(function() {
		swal.fire({
  			title: 'မှန်ကန်မှု',
  			text: "<?php echo $confirm;  ?>",
  			type: 'success',
		}).then(function (result) {
  			if (result.value) {
    			window.location = "../st_reg.php";
  			}
	});
});
</script>