<?php 
include("includes/config.php");
$id = $_GET['id'];

$sql = $db->prepare("UPDATE tbl_ot SET if_noted='1' WHERE ot_id='$id'");
$sql->execute();

 ?>
<script>
	if (confirm("Approved Successfully.")) {
	window.opener.location.reload();
    close();
  }
</script>