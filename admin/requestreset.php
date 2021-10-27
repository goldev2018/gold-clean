<?php 
	include 'includes/config.php';
	$empID = $_POST['reqEmpID'];

	$sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$empID'");
	$sql->execute();
	$num = $sql->rowCount();
	if ($num==0) {
		?><script>
				alert('Employee ID dont exist!');
				history.back();
				</script>
			<?php
	}
	else{
		$row = $sql->fetch(PDO::FETCH_ASSOC);

		if ($row['status']==0 && $row['request']==0) {

			?><script>
				alert('Use default password.');
				history.back();
				</script>
			<?php 
		}
		else if($row['status']==1 && $row['request']==0){
			
			$sql1 = $db->prepare("UPDATE tbl_user SET request='1' WHERE emp_id='$empID'");
    		if ($sql1->execute()) {


$sendto = $row['email'];
$subject = "Reset Password";

$message = "
<html>
<head>
<title>Leave Form</title>
</head>
<body>
<b>Click the button below to confirm reset password.</b>
<br><b>After clicking the button below,</b>
<br><b>Use your Employee ID Number as a default password.</b>
<br><br><br>
<a href='http://goldphilippines.com/admin/resetconfirmation.php?resetid=".$empID."&stat=Approval' target='balnk' width='786' height='786'  style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>Confirm</a>
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


    			?><script>
				alert('Check your email for confirmation.');
				history.back();
				</script>
			<?php 
    		}
    		else{
    			?><script>
				alert('Error!');
				history.back();
				</script>
			<?php
    		}
		}
		else{
			?><script>
				alert('Request already sent.');
				history.back();
				</script>
			<?php
		}
	}

	
 ?>

