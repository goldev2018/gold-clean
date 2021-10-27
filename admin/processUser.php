<?php 
include 'includes/config.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mi = $_POST['mi'];
$emp_id = $_POST['emp_id'];
$position = $_POST['position'];
$company = $_POST['company'];
$department = $_POST['department'];
$email = $_POST['email'];
$utype = $_POST['utype'];
$password = md5($_POST['emp_id']);

$dateHired = $_POST['dateHired'];

$newPath = "img/";
$ext = '.jpg';
$newName  = $newPath.$emp_id.$ext;

$newPath1 = "img/Signature/";
$ext1 = '.png';
$newName1  = $newPath1.$emp_id.$ext1;

if ($_FILES['signature']['tmp_name'] != "") {

$sql = $db->prepare("INSERT INTO tbl_user SET emp_id='$emp_id', password='$password', fname='$fname', lname='$lname', mi='$mi', position='$position', company='$company', department='$department', email='$email', image='$newName', u_type='$utype', status='0', request='0', is_active='0', signature='$newName1'");

	copy($_FILES['signature']['tmp_name'] , $newName1);
	
}else{
$sql = $db->prepare("INSERT INTO tbl_user SET emp_id='$emp_id', password='$password', fname='$fname', lname='$lname', mi='$mi', position='$position', company='$company', department='$department', email='$email', image='$newName', u_type='$utype', status='0', request='0', is_active='0'");
}

if($sql->execute()) // will return true if succefull else it will return false
{
$sql1 = $db->prepare("INSERT INTO tbl_annual SET annual_count='0', dateHired='$dateHired', if_status='0', emp_id='$emp_id'");
$sql1->execute();

copy($_FILES['fileToUpload']['tmp_name'] , $newName);
?>
<script>alert("Added Successfully.");
window.location.href='user.php?link=viewuser';</script>

<?php
}

 ?>