<?php
include("includes/config.php");
session_start();
if ($_POST['submitOB']) {



$counter = $_SESSION['obrefnumber'];
$series = date('\O\B\-\G\O\L\D\-y');
$refnum = date('\O\B\-\G\O\L\D\-y\-'.$counter.' ');
$todate = date('M-d-Y');

$emp_id = $_SESSION['emp_id'];

$from = $_POST['from'];
$to = $_POST['to'];
$fromdate = $_POST['fromdate'];
$ftodate = $_POST['ftodate'];
$dot = $fromdate." - ".$ftodate;
$route = $_POST['route'];
$purpose = $_POST['purpose'];
$estimate = $_POST['estimate'];
$advance = $_POST['advance'];
$project = $_POST['project'];
$others = $_POST['others'];
$selnoted = $_POST['selnoted'];
$selapproval = $_POST['selapproval'];
$status = "2";
if ($selapproval!="") {
	$status = "1";
}
$sql = $db->prepare("INSERT INTO tbl_ob SET ob_series='$series', ob_counter='$counter', ob_dateTravel='$dot', ob_route='$route', ob_from='$from', ob_to='$to', ob_purpose='$purpose', ob_estimate='$estimate', ob_cash='$advance', ob_project='$project', ob_others='$others', ob_date='$todate', emp_id='$emp_id', status='$status', requested_by='$selnoted', approved_by='$selapproval', ob_liquidation=''");
if ($sql->execute()) {
	header("location: forms.php?id=ob");
}

}
 ?>