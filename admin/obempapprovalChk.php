<?php 
include("includes/config.php");
$id = $_GET['id'];
$stat = $_GET['stat'];

$sql = $db->prepare("UPDATE tbl_ob SET status='$stat' WHERE ob_id='$id'");
$sql->execute();

 ?>
<script>
	if (confirm("Approved Successfully.")) {
	window.opener.location.reload();
    close();
  }
</script>