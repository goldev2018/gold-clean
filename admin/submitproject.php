<?php 
include 'includes/config.php';
$submit = $_GET['submit'];
if ($submit=="country") {
$country_name = $_POST['country_name'];

$sql = $db->prepare("INSERT INTO tbl_country SET country_name='$country_name'");
if ($sql->execute()) {
header("location: utilities.php?id=project");
}

}
elseif ($submit=="project") {
$project_name = $_POST['project_name'];
$selcountry = $_POST['selcountry'];

$sql = $db->prepare("INSERT INTO tbl_project SET project_name='$project_name', country_id='$selcountry'");
if ($sql->execute()) {
header("location: utilities.php?id=project");
}

}
else{
$project_code = $_POST['project_code'];
$project_building = $_POST['project_building'];
$selproj = $_POST['selproj'];

$sql = $db->prepare("INSERT INTO tbl_project_info SET proj_info_codes='$project_code', proj_info_building='$project_building', project_id='$selproj'");
if ($sql->execute()) {
header("location: utilities.php?id=project");
}

} ?>
