<?php 
include 'includes/config.php';
session_start();

if ($_POST['submitrtw']) {
	$sessemp_id = $_SESSION['emp_id'];
	$datepicker = $_POST['datepicker'];
	$start = date("H:i", strtotime($_POST['start']));
	$stop = date("H:i", strtotime($_POST['stop']));
	$reasonrtw = $_POST['reasonrtw'];
	$todate = date("F d Y l");





$sqlrtw = $db->prepare("INSERT INTO tbl_rtw SET rtw_date='$datepicker', rtw_from='$start', rtw_to='$stop', rtw_reason='$reasonrtw', rtw_attachment='', rtw_datefiled='$todate', emp_id='$sessemp_id'");
$sqlrtw->execute();
$last_id = $db->lastInsertId();

if($_FILES['app_rtwupload']['name'] != "") {
$path = $_FILES['app_rtwupload']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$ext = ".".$ext;
$newPath = "rtw/";
$newName  = $newPath.$last_id."-".$sessemp_id.$ext;
copy($_FILES['app_rtwupload']['tmp_name'] , $newName);

$sql = $db->prepare("UPDATE tbl_rtw SET rtw_attachment='$newName' WHERE rtw_id='$last_id'");
$sql->execute();
header("location: forms.php?id=rtw");
}else{
header("location: forms.php?id=rtw");
}

}
 ?>