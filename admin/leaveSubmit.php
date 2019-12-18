<?php
include("includes/config.php");
session_start();
// include 'includes/config.php'; 
if ($_POST['submitLeave']) {


// $date = $_POST['hiddate'];
// $val = 0;
// $num = str_pad($val,4,"0",STR_PAD_LEFT);
// $ordernumber = "LEAVE-GOLD".$date."-".$num;
// // $str = "ABC000001";

$counter = $_SESSION['leaverefnumber'];
$series = date('\L\E\A\V\E\-\G\O\L\D\-y');
$refnum = date('\L\E\A\V\E\-\G\O\L\D\-y\-'.$counter.' ');
$todate = $_SESSION['todate'];

$emp_id = $_SESSION['emp_id'];

$from = $_POST['from'];
$to = $_POST['to'];
$totaldays = $_POST['totaldays'];
$optradio = $_POST['optradio'];
$leavereason = $_POST['leavereason'];
$app_cvupload = $_FILES['app_cvupload']['tmp_name'];

$path = $_FILES['app_cvupload']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$ext = ".".$ext;
$newPath = "excuse_letter/";
$newName  = $newPath.$refnum."-".$emp_id.$ext;


$sql1 = $db->prepare("SELECT * FROM tbl_annual WHERE emp_id='$emp_id'");
$sql1->execute();
$row = $sql1->fetch(PDO::FETCH_ASSOC);
echo $annual_id = $row['annual_id'];
$annual_count = $row['annual_count'];

if ($annual_count!=0) {
echo $annual_count = $annual_count-$totaldays;

$sql = $db->prepare("INSERT INTO tbl_leave SET leave_series='$series', leave_counter='$counter', leave_period_from='$from', leave_period_to='$to', leave_total='$totaldays', leave_nature='$optradio', leave_reason='$leavereason', leave_date='$todate', leave_docu='$newName', status='0', emp_id='$emp_id', annual_id='$annual_id'");
if ($sql->execute()) {

$sql2 = $db->prepare("UPDATE tbl_annual SET annual_count='$annual_count' WHERE emp_id='$emp_id'");
if ($sql2->execute()) {


copy($_FILES['app_cvupload']['tmp_name'] , $newName);

?>
<script>alert("Leave Submitted. Please wait for approval");
window.location.href='forms.php?id=leave';</script>

<?php
}
}
}
else{
$sql = $db->prepare("INSERT INTO tbl_leave SET leave_series='$series', leave_counter='$counter', leave_period_from='$from', leave_period_to='$to', leave_total='$totaldays', leave_nature='$optradio', leave_reason='$leavereason', leave_date='$todate', leave_docu='$newName', status='0', emp_id='$emp_id', annual_id='$annual_id'");
$sql->execute();

copy($_FILES['app_cvupload']['tmp_name'] , $newName);
?>
<script>alert("Leave Submitted. Please wait for approval");
window.location.href='forms.php?id=leave';</script>

<?php
}


}
 ?>