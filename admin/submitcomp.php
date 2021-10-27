<?php 
include 'includes/config.php';
$submit = $_GET['submit'];
if ($submit=="company") {
$comp_name = $_POST['comp_name'];
$comp_abbre = $_POST['comp_abbre'];




$sql = $db->prepare("INSERT INTO tbl_company SET com_name='$comp_name', com_abbre='$comp_abbre'");
if ($sql->execute()) { ?>
<script>window.location.href='utilities.php?id=company';</script>
<?php }

}

