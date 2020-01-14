<?php 
include 'includes/config.php';
include 'includes/sessionChk.php';

$hiddate = $_POST['hiddate'];
$timestamp = strtotime($hiddate);

$day = date('D', $timestamp);

echo $week = date("W", $timestamp);
echo "<br>";
echo $day = date("D", $timestamp);
echo "<br>";


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
    $todate = $_POST['hiddenedittimesheet'];
    $day = date("D", strtotime($todate));

	$selproj = $_POST['selproj'];

	$seljob = $_POST['seljob'];

	$desc = $_POST['desc'];

	$time = $_POST['num'];

	echo $total = $_POST['total_minutes'];

$sqlchk = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_week='$week' AND emp_id='$sessemp_id'");
$sqlchk->execute();
$num = $sqlchk->rowCount();
$row = $sqlchk->fetch(PDO::FETCH_ASSOC);
$id = $row['ts_id'];
if ($num==0) {


    $sqlts = $db->prepare("INSERT INTO tbl_timesheet SET ts_weekstart='$weekstart', ts_weekend='$weekend', ts_week='$week', ts_sil=0, ts_ot=0, emp_id='$sessemp_id'");
    // use exec() because no results are returned
    $sqlts->execute();
    $last_id = $db->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id ."<br><h5>Redirecting...</h5><br><h3>Please wait.</h3>";


for($i=0, $count = count($selproj);$i<$count;$i++) {
 $selprojs  = $selproj[$i];
 $seljobs = $seljob[$i];
 $descs = $desc[$i];
 $times = $time[$i];

     $sql = $db->prepare("INSERT INTO tbl_timesheetinfo SET tsinfo_desc='$descs', tsinfo_time='$times', tsinfo_day='$day', tsinfo_week='$week', tsinfo_total='$total', tsinfo_date='$todate', tsinfo_status='0', ts_id='$last_id', project_id='$selprojs', proj_info_id='$seljobs'");
    // use exec() because no results are returned
    $sql->execute();
}?>
<script>window.location.href='forms.php?id=timesheet';</script>
<?php 




}
else{

for($i=0, $count = count($selproj);$i<$count;$i++) {
 $selproj1  = $selproj[$i];
 $seljob1 = $seljob[$i];
 $desc1 = $desc[$i];
 $time1 = $time[$i];

	$sql = $db->prepare("INSERT INTO tbl_timesheetinfo SET tsinfo_desc='$desc1', tsinfo_time='$time1', tsinfo_day='$day', tsinfo_week='$week', tsinfo_total='$total', tsinfo_date='$todate', tsinfo_status='0', ts_id='$id', project_id='$selproj1', proj_info_id='$seljob1'");
    // use exec() because no results are returned
    $sql->execute();
	} ?>
<script>window.location.href='forms.php?id=timesheet';</script>
<?php 
}

}
 ?>