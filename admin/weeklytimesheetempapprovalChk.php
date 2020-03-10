<?php 
include("includes/config.php");
$id = $_GET['id'];
$stat = $_GET['stat'];

$sql = $db->prepare("UPDATE tbl_timesheet SET status='$stat' WHERE ts_id='$id'");
$sql->execute();

 ?>
<script>
	if (confirm("Approved Successfully.")) {
	window.opener.location.reload();
    close();
  }
</script>