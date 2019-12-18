<?php 
include 'config.php';
$todate = date("m/d");

$sql1 = $db->prepare("SELECT * FROM tbl_user");
$sql1->execute();
while ($row1 = $sql1->fetch(PDO::FETCH_ASSOC)) {
	$employee_id = $row1['emp_id']; 


$sql = $db->prepare("SELECT * FROM tbl_annual WHERE emp_id='$employee_id'");
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);
$string = $row['dateHired'];
echo $row['annual_count'];

$datehire = substr($string, 0, -5);

$row['if_status'];
if ($row['if_status']==0 && $datehire==$todate) {


	$total = $row['annual_count']+5;
$sql1 = $db->prepare("UPDATE tbl_annual SET annual_count='$total', if_status='1' WHERE emp_id='$employee_id'");
$sql1->execute();
}

else if($row['if_status']==1 && $datehire!=$todate){
$sql1 = $db->prepare("UPDATE tbl_annual SET if_status='0' WHERE emp_id='$employee_id'");
$sql1->execute();
}


}


 ?>