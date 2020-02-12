<?php 
include 'includes/config.php';
if ($_POST['submitwts']) {
	$selnoted = $_POST['selnoted'];
	$selapproval = $_POST['selapproval'];
	$hidtsid = $_POST['hidtsid'];
	if ($selnoted=="" && $selapproval!="") {
		$status="2";
	}
	else if ($selapproval=="" && $selnoted!="") {
		$status="1";
	}
	else if ($selapproval!="" && $selnoted!="") {
		$status="1";
	}
	else{
		$status="3";
	}
	echo $status;
	$sqlts = $db->prepare("UPDATE tbl_timesheet SET status='$status', noted_by='$selnoted', approved_by='$selapproval' WHERE ts_id='$hidtsid'");
	$sqlts->execute();
	echo " <script>alert('Weekly time sheet submitted.');
	window.location.replace(\"dashboardemp.php?link=weeklytimesheet\");
	</script>";
}
 ?>

