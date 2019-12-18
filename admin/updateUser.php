<?php 
include 'includes/config.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mi = $_POST['mi'];
$emp_id = $_POST['emp_id'];
$hidempid = $_POST['hidempid'];
$position = $_POST['position'];
$company = $_POST['company'];
$department = $_POST['department'];
$utype = $_POST['utype'];

$sqlupdateuser = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$emp_id'");
$sqlupdateuser->execute();
$rowupdateuser = $sqlupdateuser->fetch(PDO::FETCH_ASSOC);
$password = $rowupdateuser['password'];

// $password = md5($_POST['emp_id']);

$dateHired = $_POST['dateHired'];

$newPath = "img/";
$ext = '.jpg';
$newName  = $newPath.$emp_id.$ext;

if($_FILES['fileToUpload']['tmp_name'] == "") {
	
$sql = $db->prepare("UPDATE tbl_user SET emp_id='$emp_id', password='$password', fname='$fname', lname='$lname', mi='$mi', position='$position', company='$company', department='$department', u_type='$utype' WHERE emp_id='$hidempid'");
if($sql->execute()) // will return true if succefull else it will return false
{
$sql1 = $db->prepare("UPDATE tbl_annual SET dateHired='$dateHired', emp_id='$emp_id' WHERE emp_id='$hidempid'");
$sql1->execute();

?>
<script>alert("Update Successfully.");
window.location.href='user.php?link=viewuser';</script>

<?php
}


}else{



$sql = $db->prepare("UPDATE tbl_user SET emp_id='$emp_id', password='$password', fname='$fname', lname='$lname', mi='$mi', position='$position', company='$company', department='$department', image='$newName', u_type='$utype' WHERE emp_id='$hidempid'");
if($sql->execute()) // will return true if succefull else it will return false
{
$sql1 = $db->prepare("UPDATE tbl_annual SET dateHired='$dateHired', emp_id='$emp_id' WHERE emp_id='$hidempid'");
$sql1->execute();

copy($_FILES['fileToUpload']['tmp_name'] , $newName);
?>
<script>alert("Update Successfully.");
window.location.href='user.php?link=viewuser';</script>

<?php
}








}



 ?>