<?php 
include 'includes/config.php';
session_start();

if ($_POST['submitots']) {
	$sessemp_id = $_SESSION['emp_id'];
	$datepicker = $_POST['datepickot'];
	$start = date("H:i", strtotime($_POST['start1']));
	$stop = date("H:i", strtotime($_POST['stop1']));
	$ots_reason = $_POST['ots_reason'];
	$estimate1 = $_POST['hidestimate1'];
	$selnoted = $_POST['selnoted'];
	$hidrtwid = $_POST['hidrtwid'];
	$todate = date("F d Y l");


// ot_id, ot_date, ot_from, ot_to, ot_reason, ot_hours, ot_attachment, ot_noted, ot_datefiled, emp_id, rtw_id



$sqlrtw = $db->prepare("INSERT INTO tbl_ot SET ot_date='$datepicker', ot_from='$start', ot_to='$stop', ot_reason='$ots_reason', ot_hours='$estimate1', ot_attachment='', ot_noted='$selnoted', ot_datefiled='$todate', emp_id='$sessemp_id', rtw_id='$hidrtwid'");
$sqlrtw->execute();
$last_id = $db->lastInsertId();

if($_FILES['app_otsupload']['name'] != "") {
$path = $_FILES['app_otsupload']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$ext = ".".$ext;
$newPath = "ots/";
$newName  = $newPath.$last_id."-".$sessemp_id.$ext;
copy($_FILES['app_otsupload']['tmp_name'] , $newName);

$sql = $db->prepare("UPDATE tbl_ot SET ot_attachment='$newName' WHERE ot_id='$last_id'");
$sql->execute();

}

$sqlrtw = $db->prepare("UPDATE tbl_rtw SET if_filed='1' WHERE rtw_id='$hidrtwid'");
$sqlrtw->execute();


header("location: forms.php?id=rtw");

}
 ?>