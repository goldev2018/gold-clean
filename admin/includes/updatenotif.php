<?php 
include("config.php");
$id = $_POST['id'];
$sql = $db->prepare("UPDATE tbl_leave SET status='Checked' WHERE leave_id='$id'");
$sql->execute();
 ?>