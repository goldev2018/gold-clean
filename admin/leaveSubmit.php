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
$fullname = $_SESSION['fname']." ".$_SESSION['lname'];
$senderemail = $_SESSION['email'];

$from = $_POST['from'];
$to = $_POST['to'];
$totaldays = $_POST['totaldays'];
$optradio = $_POST['optradio'];
$leavereason = $_POST['leavereason'];
$selnoted = $_POST['selnoted'];
$selapproval = $_POST['selapproval'];
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


// send mail function
if ($selnoted!="") {

$sqlemail = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$selnoted'");
$sqlemail->execute();
$rowemail = $sqlemail->fetch(PDO::FETCH_ASSOC);
$email = $rowemail['email'];
$status = "Note";
}
else{
$sqlemail = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$selapproval'");
$sqlemail->execute();
$rowemail = $sqlemail->fetch(PDO::FETCH_ASSOC);
$email = $rowemail['email'];
$status = "Approval";

}


$sendto = $email;
$subject = "Leave Form";

$message = "
<html>
<head>
<title>Leave Form</title>
</head>
<body>
<table cellspacing='10' cellpadding='10'>
<tr>
  <td> <b>Fullname:</b></td>
  <td>".$fullname."</td>
</tr>
<tr>
  <td><b>Date of Leave:</b></td>
  <td>".$from." - ".$to."</td>
</tr>
<tr style='width: 500;'>
  <td><b>Reason:</b></td>
  <td>".$leavereason."</td>
</tr>
<tr>
  <td><b>Total:</b></td>
  <td>".$totaldays."</td>
</tr>
</table><br><br>
<a href='http://goldphilippines.com/admin/leaveapproval.php?leave_series=".$series."&leave_counter=".$counter."&stat=".$status."' style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>Approve</a>

<a href='http://goldphilippines.com/admin/documentviewer.php?dir=".$newName."' style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>View Document</a>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Gold-Admin@goldphilippines.com>' . "\r\n";
$headers .= 'Cc: Gold-Admin@goldphilippines.com' . "\r\n";

mail($sendto,$subject,$message,$headers);


// end send mail function


if ($annual_count!=0) {
echo $annual_count = $annual_count-$totaldays;

$sql = $db->prepare("INSERT INTO tbl_leave SET leave_series='$series', leave_counter='$counter', leave_period_from='$from', leave_period_to='$to', leave_total='$totaldays', leave_nature='$optradio', leave_reason='$leavereason', leave_date='$todate', leave_docu='$newName', status='$status', emp_id='$emp_id', annual_id='$annual_id', noted_by='$selnoted', approval_by='$selapproval'");
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
$sql = $db->prepare("INSERT INTO tbl_leave SET leave_series='$series', leave_counter='$counter', leave_period_from='$from', leave_period_to='$to', leave_total='$totaldays', leave_nature='$optradio', leave_reason='$leavereason', leave_date='$todate', leave_docu='$newName', status='$status', emp_id='$emp_id', annual_id='$annual_id', noted_by='$selnoted', approval_by='$selapproval'");
$sql->execute();

copy($_FILES['app_cvupload']['tmp_name'] , $newName);
?>
<script>alert("Leave Submitted. Please wait for approval");
window.location.href='forms.php?id=leave';</script>

<?php
}


}
 ?>