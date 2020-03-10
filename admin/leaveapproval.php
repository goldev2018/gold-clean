<?php 
include 'includes/config.php';
// $status = $_GET['stat'];
// $leave_id = $_GET['leave_id'];

if (!empty($_POST['btnapprovenote'])){
if ($_POST['btnapprovenote'] == 'Approve') {
        $leave_id = $_POST['noteid'];
        $status = $_POST['notestat'];
        $remarks = $_POST['remarknote'];
        $noteby = $_POST['noteby'];
} 
if ($_POST['btnapprovenote'] == 'Decline') {
        $leave_id = $_POST['noteid'];
        $status = "Decline";
        $remarks = $_POST['remarknote'];
        $noteby = $_POST['noteby'];
}

if (!empty($remarks)) {

$sqlremark = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$noteby'");
$sqlremark->execute();
$rowremark = $sqlremark->fetch(PDO::FETCH_ASSOC);

$remarks = "<br>".$remarks."<br>-".$rowremark['fname']." ".$rowremark['lname']."<br>";

}

}



if (!empty($_POST['btnapproveapproval'])){


if ($_POST['btnapproveapproval'] == 'Approve') {
        $leave_id = $_POST['approveid'];
        $status = $_POST['approvestat'];
        $remarks = $_POST['remarkapprove'];
        $approveby = $_POST['approveby'];
} 
if ($_POST['btnapproveapproval'] == 'Decline') {
        $leave_id = $_POST['approveid'];
        $status = "Decline";
        $remarks = $_POST['remarkapprove'];
        $approveby = $_POST['approveby'];
}

if (!empty($remarks)) {

$sqlremark = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$approveby'");
$sqlremark->execute();
$rowremark = $sqlremark->fetch(PDO::FETCH_ASSOC);

$remarks = "<br>".$remarks."<br>-".$rowremark['fname']." ".$rowremark['lname']."<br>";

}

}


$sql1 = $db->prepare("SELECT * FROM tbl_leave WHERE leave_id='$leave_id'");
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
$sql = $db->prepare("UPDATE tbl_leave SET status='Approval', remarks='$remarks' WHERE leave_id='$leave_id'");
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

<a href='http://goldphilippines.com/admin/leaveapproval.php?leave_id=".$leave_id."&stat=Approval' target='balnk' width='786' height='786'  style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>Approve</a>

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
<!-- <script>
  alert("Leave form approved.");
window.close();
</script> -->

<p style="text-align:center"><b>Sending email.</b><br>This window will close automatically within <span id="counter">5</span> second(s).</p>
<script type="text/javascript">



 function countdown() {

    var i = document.getElementById('counter');

    i.innerHTML = parseInt(i.innerHTML)-1;

 if (parseInt(i.innerHTML)<=0) {

  window.close();

 }

}

setInterval(function(){ countdown(); },1000);

</script>


 <?php 

}elseif ($status=="Decline") {
$sql = $db->prepare("UPDATE tbl_leave SET status='Decline', remarks='$remarks' WHERE leave_id='$leave_id'");
$sql->execute();

 ?>
<!-- <script>
  alert("Leave form approved.");
window.close();
</script> -->
<p style="text-align:center"><b>Sending email.</b><br>This window will close automatically within <span id="counter">5</span> second(s).</p>
<script type="text/javascript">



 function countdown() {

    var i = document.getElementById('counter');

    i.innerHTML = parseInt(i.innerHTML)-1;

 if (parseInt(i.innerHTML)<=0) {

  window.close();

 }

}

setInterval(function(){ countdown(); },1000);

</script>
  <?php 
}

else{
$sql = $db->prepare("UPDATE tbl_leave SET status='Approved', remarks='$remarks' WHERE leave_id='$leave_id'");
$sql->execute();

 ?>
<!-- <script>
  alert("Leave form approved.");
window.close();
</script> -->
<p style="text-align:center"><b>Sending email.</b><br>This window will close automatically within <span id="counter">5</span> second(s).</p>
<script type="text/javascript">



 function countdown() {

    var i = document.getElementById('counter');

    i.innerHTML = parseInt(i.innerHTML)-1;

 if (parseInt(i.innerHTML)<=0) {
window.opener.location.reload();
  window.close();

 }

}

setInterval(function(){ countdown(); },1000);

</script>
 <?php 

}


 ?>