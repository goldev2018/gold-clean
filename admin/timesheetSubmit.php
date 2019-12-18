<?php 
session_start();
include 'includes/config.php';
if ($_POST['submitTimesheet']) {
	$emp_id = $_SESSION['emp_id'];
	$weekpicks = $_POST['weekpicks'];
	$year = date("Y"); 
	echo $weeknum = $_POST['weeknum'];
	// $timesheet = $_POST['timesheet'];
	$directory = "timesheet"; 



$date_int = strtotime($weeknum);
$date_date = date($date_int);
echo $week_number = date('W', $date_date);

	$path = $_FILES['timesheet']['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	$ext = ".".$ext;
	$newName  = $directory."/".$year."/".$week_number."/".$emp_id.$ext;


$sql1 = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_year='$year' AND ts_week='$week_number' AND emp_id='$emp_id'");
$sql1->execute();
$count = $sql1->rowCount();
if ($count==0) {
// if already in database
if (!file_exists($directory."/".$year)) {
mkdir($directory."/".$year, 0777, true);

	if (!file_exists($directory."/".$year."/".$week_number)) {
	mkdir($directory."/".$year."/".$week_number, 0777, true);
	copy($_FILES['timesheet']['tmp_name'] , $newName);

	$sql = $db->prepare("INSERT INTO tbl_timesheet SET ts_year='$year', ts_week='$week_number', ts_dir='$newName', emp_id='$emp_id'");
		if ($sql->execute()) {
		echo "<script>window.location.href='dashboard.php'</script>";
		}

	}

}else{
	if (!file_exists($directory."/".$year."/".$week_number)) {
	mkdir($directory."/".$year."/".$week_number, 0777, true);
	copy($_FILES['timesheet']['tmp_name'] , $newName);


	$sql = $db->prepare("INSERT INTO tbl_timesheet SET ts_year='$year', ts_week='$week_number', ts_dir='$newName', emp_id='$emp_id'");
		if ($sql->execute()) {
		echo "<script>window.location.href='dashboard.php'</script>";
		}

	}else{

	$sql = $db->prepare("INSERT INTO tbl_timesheet SET ts_year='$year', ts_week='$week_number', ts_dir='$newName', emp_id='$emp_id'");
		if ($sql->execute()) {


		copy($_FILES['timesheet']['tmp_name'] , $newName);
		echo "<script>window.location.href='dashboard.php'</script>";
		}
	}
}

}else{

// else already in database
if (!file_exists($directory."/".$year)) {
mkdir($directory."/".$year, 0777, true);

	if (!file_exists($directory."/".$year."/".$week_number)) {
	mkdir($directory."/".$year."/".$week_number, 0777, true);
	copy($_FILES['timesheet']['tmp_name'] , $newName);

		echo "<script>window.location.href='dashboard.php'</script>";

	}

}else{
	if (!file_exists($directory."/".$year."/".$week_number)) {
	mkdir($directory."/".$year."/".$week_number, 0777, true);
	copy($_FILES['timesheet']['tmp_name'] , $newName);


		echo "<script>window.location.href='dashboard.php'</script>";


	}else{


		copy($_FILES['timesheet']['tmp_name'] , $newName);
	echo "<script>window.location.href='dashboard.php'</script>";
	}
}







}


	
}
 ?>