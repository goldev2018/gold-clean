<?php 
include 'includes/config.php';
$submit = $_GET['submit'];
if ($submit=="department") {
$country_name = $_POST['dept_name'];

$sql = $db->prepare("INSERT INTO tbl_department SET dept_name='$country_name'");
if ($sql->execute()) { ?>
<script>window.location.href='utilities.php?id=position';</script>
<?php }

}
else if ($submit=="position") {
$position_name = $_POST['position_name'];

$sql = $db->prepare("INSERT INTO tbl_position SET pos_title='$position_name'");
if ($sql->execute()) { ?>
<script>window.location.href='utilities.php?id=position';</script>
<?php }

}else{
echo $picked = $_GET['picked'];
echo $type = $_GET['type'];
echo $pos_id = json_encode($_POST['pos_id']);

$sql = $db->prepare("UPDATE tbl_costcode SET pos_id='$pos_id' WHERE costcode_type='$type' AND costcode_number='$picked'");
if ($sql->execute()) {?>
<script>window.location.href='utilities.php?id=position';</script>
<?php }
}
