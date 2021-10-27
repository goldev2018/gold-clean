<?php include 'includes/config.php';

$id = $_GET['id'];

	$sql1 = $db->prepare("DELETE FROM tbl_company WHERE com_id='$id'");
	$sql1->execute(); ?>
	<script>alert("Deleted Successfully.");
	window.location.href='utilities.php?id=company';</script>

}
 ?>