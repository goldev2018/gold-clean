<?php include 'includes/config.php';
$type = $_GET['type'];
$id = $_GET['id'];

if ($type=="country") {
	$sql1 = $db->prepare("DELETE FROM tbl_country WHERE country_id='$id'");
	$sql1->execute(); ?>
	<script>alert("Deleted Successfully.");
	window.location.href='utilities.php?id=project';</script>
	<?php 
}elseif ($type=="project") {
	$sql1 = $db->prepare("DELETE FROM tbl_project WHERE project_id='$id'");
	$sql1->execute(); ?>
	<script>alert("Deleted Successfully.");
	window.location.href='utilities.php?id=project';</script>
	<?php 
}else{
	$sql1 = $db->prepare("DELETE FROM tbl_project_info WHERE proj_info_id='$id'");
	$sql1->execute(); ?>
	<script>alert("Deleted Successfully.");
	window.location.href='utilities.php?id=project';</script>
	<?php 

}
 ?>