<?php 
include 'includes/config.php';
$status = $_GET['stat'];
$leave_series = $_GET['leave_series'];
$leave_counter = $_GET['leave_counter'];

$sql1 = $db->prepare("SELECT * FROM tbl_leave WHERE leave_series='$leave_series' AND leave_counter='$leave_counter'");
$sql1->execute();
$row = $sql1->fetch(PDO::FETCH_ASSOC);
$approvalid = $row['approval_by'];
$leaveempid = $row['emp_id'];
$leave_docu = $row['leave_docu'];

$sql2 = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$leaveempid'");
$sql2->execute();
$row2 = $sql2->fetch(PDO::FETCH_ASSOC);

$sqlemail = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$approvalid'");
$sqlemail->execute();
$rowemail = $sqlemail->fetch(PDO::FETCH_ASSOC);
$approvalemail = $rowemail['email'];

if ($status=="Note") {
$sql = $db->prepare("UPDATE tbl_leave SET status='$status' WHERE leave_series='$leave_series' AND leave_counter='$leave_counter'");
$sql->execute();

$sendto = $approvalemail;
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
  <td>".$row2['fname']." ".$row2['lname']."</td>
</tr>
<tr>
  <td><b>Date of Leave:</b></td>
  <td>".$row['leave_period_from']." - ".$row['leave_period_to']."</td>
</tr>
<tr style='width: 500;'>
  <td><b>Reason:</b></td>
  <td>".$row['leave_reason']."</td>
</tr>
<tr>
  <td><b>Total:</b></td>
  <td>".$row['leave_total']."</td>
</tr>
</table><br><br>
<a href='http://goldphilippines.com/admin/leaveapproval.php?leave_series=".$leave_series."&leave_counter=".$leave_counter."&stat=Approval' style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>Approve</a>
<a href='http://goldphilippines.com/admin/documentviewer.php?dir=".$leave_docu."' style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>View Document</a>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Gold-Admin@goldphilippines.com>' . "\r\n";
$headers .= 'Cc: ghe188@seglobalph.com' . "\r\n";

mail($sendto,$subject,$message,$headers);
 ?>
<script>
	alert("Leave form approved.");
window.close();
</script>
 <?php 

}else{
$sql = $db->prepare("UPDATE tbl_leave SET status='Approved' WHERE leave_series='$leave_series' AND leave_counter='$leave_counter'");
$sql->execute();

 ?>
<script>
	alert("Leave form approved.");
window.close();
</script>
 <?php 

}


 ?>