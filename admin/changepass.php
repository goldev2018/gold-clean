<?php 
// include 'includes/config.php';
include 'includes/sessionChk.php';
if ($_POST['change']) {
	$oldpass = md5($_POST['oldpass']);
	$newpass = $_POST['newpass'];
	$renewpass = $_POST['renewpass'];
	$newpassword = md5($newpass);

$sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$sessemp_id' AND password='$oldpass'");
$sql->execute();
$num = $sql->rowCount();
if ($num!=0) {
$sql1 = $db->prepare("UPDATE tbl_user SET password='$newpassword' WHERE emp_id='$sessemp_id'");
if ($sql1->execute()){ ?>
	 <script>
	 alert('Change Successfully.');
	 history.back();
	</script>
	<?php }
}
else{ ?>
<script>alert('Old password incorrect.');
history.back();
</script>
<?php }
}
 ?>