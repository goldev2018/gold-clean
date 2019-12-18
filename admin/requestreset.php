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


    			?><script>
				alert('Reset request sent.');
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

