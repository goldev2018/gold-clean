<?php
session_start();
include("config.php");
$sessemp_id = $_SESSION['emp_id'];
$sessfname = $_SESSION['fname'];
$sesslname = $_SESSION['lname'];
$sessposition = $_SESSION['position'];
$sesscompany = $_SESSION['company'];
$sessdepartment = $_SESSION['department'];
$sessimage = $_SESSION['image'];
$sessu_type = $_SESSION['u_type'];
$sessstatus = $_SESSION['status'];
$sessemail = $_SESSION['email'];


$todate = date("m/d");
$sql = $db->prepare("SELECT * FROM tbl_annual WHERE emp_id='$sessemp_id'");
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);
$string = $row['dateHired'];
$datehire = substr($string, 0, -5);

if ($row['if_status']==0 && $datehire==$todate) {


	$total = $row['annual_count']+5;
$sql1 = $db->prepare("UPDATE tbl_annual SET annual_count='$total', if_status='1' WHERE emp_id='$sessemp_id'");
$sql1->execute();
}
else if($row['if_status']==1 && $datehire!=$todate){
$sql1 = $db->prepare("UPDATE tbl_annual SET if_status='0' WHERE emp_id='$sessemp_id'");
$sql1->execute();
}



if (empty($_SESSION['emp_id'])) {
 header("location: login.php");
}