<?php 
include 'includes/config.php';
include 'includes/sessionChk.php';

$week = date("W");
$day = date("D");


$year = date("Y");


$date = new DateTime();
$date->setISODate($year,$week);
$weekstart = $date->format('M-d-Y'); 



$date = strtotime($weekstart);
$date = strtotime("+5 day", $date);
$weekend = date('M-d-Y', $date);


date_default_timezone_set("Asia/Manila");
$todate = date("M-d-Y");


if ($_POST['submit']) {
	$selproj = implode(',',$_POST['selproj']);

	$seljob = implode(',',$_POST['seljob']);

	$desc = implode(',',$_POST['desc']);

	$time = implode(',',$_POST['num']);

	$total = $_POST['total'];

$sqlchk = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_week='$week' AND emp_id='$sessemp_id'");
$sqlchk->execute();
$num = $sqlchk->rowCount();
$row = $sqlchk->fetch(PDO::FETCH_ASSOC);
$id = $row['ts_id'];
if ($num==0) {


    $sqlts = $db->prepare("INSERT INTO tbl_timesheet SET ts_weekstart='$weekstart', ts_weekend='$weekend', ts_week='$week', ts_total=0, emp_id='$sessemp_id'");
    // use exec() because no results are returned
    $sqlts->execute();
    $last_id = $db->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;


    $sql = $db->prepare("INSERT INTO tbl_timesheetinfo SET tsinfo_desc='$desc', tsinfo_time='$time', tsinfo_day='$day', tsinfo_week='$week', tsinfo_total='$total', tsinfo_date='$todate', tsinfo_status='0', ts_id='$last_id', project_id='$selproj', proj_info_id='$seljob'");
    // use exec() because no results are returned
    $sql->execute();


}
else{
	$sql = $db->prepare("INSERT INTO tbl_timesheetinfo SET tsinfo_desc='$desc', tsinfo_time='$time', tsinfo_day='$day', tsinfo_week='$week', tsinfo_total='$total', tsinfo_date='$todate', tsinfo_status='0', ts_id='$id', project_id='$selproj', proj_info_id='$seljob'");
    // use exec() because no results are returned
    $sql->execute();
}

}
 ?>