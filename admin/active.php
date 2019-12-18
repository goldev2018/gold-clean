<?php 

include 'includes/config.php';
$num = $_GET['num'];
$id = $_GET['id'];

if ($num==0) {
	$sql = $db->prepare("UPDATE tbl_user SET is_active='1' WHERE emp_id='$id'");
if ($sql->execute()) {
	header("location: user.php?link=viewuser");
}
}
else{
	$sql = $db->prepare("UPDATE tbl_user SET is_active='0' WHERE emp_id='$id'");
if ($sql->execute()) {
	header("location: user.php?link=viewuser");
}
}

 ?>