<?php 
session_start();
include 'includes/config.php';
$pass = md5($_POST['psw']);
$emp_id = $_SESSION['uname'];
$sql = $db->prepare("UPDATE tbl_user SET password='$pass', status='1' WHERE emp_id='$emp_id'");
if ($sql->execute()) {
	header("location: dashboard.php?link=home");
}
 ?>