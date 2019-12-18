<?php 
include('includes/config.php'); 
if ($_POST['submit']) {

echo $weekstart = $_POST['weekstart'];
echo "<br>";
echo $weekend = $_POST['weekend'];
echo "<br>";
echo $weeknum = date("W", strtotime($weekstart));

?>
<style type="text/css">
	td{
		text-align: center;
	}
</style>
<table style="height: 126px;" width="993" border="1">
<tbody>
<tr>
<td style="width: 30px;" rowspan="2">No.</td>
<td style="width: 50px;" rowspan="2">Empployee Code</td>
<td style="width: 200px;" rowspan="2">Name of Employee</td>
<td style="width: 135px; " colspan="4">Project Name</td>
<!-- <td style="width: 135px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td> -->
</tr>
<tr>
	<?php
	$num=0;
$sqlts1 = $db->prepare("SELECT DISTINCT project_id FROM tbl_timesheetinfo WHERE tsinfo_week='$weeknum'");
$sqlts1->execute();
while ($rowts1 = $sqlts1->fetch(PDO::FETCH_ASSOC)) {
$pro_id = $rowts1['project_id'];
$pro_idtime[$num] = $rowts1['project_id'];
$num++;
$sqlts2 = $db->prepare("SELECT * FROM tbl_project WHERE project_id='$pro_id'");
$sqlts2->execute();
while ($rowts2 = $sqlts2->fetch(PDO::FETCH_ASSOC)) {
$count_id = $rowts2['country_id'];
$pro_name = $rowts2['project_name'];

	 ?>

<?php  
$sqlts3 = $db->prepare("SELECT * FROM tbl_country WHERE country_id='$count_id'");
$sqlts3->execute();
while ($rowts3 = $sqlts3->fetch(PDO::FETCH_ASSOC)) { ?>
<td style="width: 30px;"><?php echo $pro_name."<br>(".$rowts3['country_name'].")"; ?></td>
<?php 
$countryarray[] = $rowts3['country_id'];
}
}
}
?>


<td style="width: 50px;">SIL</td>
<td style="width: 200px;">Total Hours</td>
<td style="width: 135px;">Remarks</td>
<!-- <td style="width: 135px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td> -->
</tr>

<?php 
$num;
$i=0;

$sqlts = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_week='$weeknum' ORDER BY ts_id ASC");
$sqlts->execute();
while ($rowts = $sqlts->fetch(PDO::FETCH_ASSOC)) {
$empid = $rowts['emp_id'];
$sqluser = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$empid' ORDER BY emp_id ASC");
$sqluser->execute();
while ($rowuser = $sqluser->fetch(PDO::FETCH_ASSOC)) {
$i++;
 ?>
<tr>
<td style="width: 30px;"><?php echo $i ?></td>
<td style="width: 150px;"><?php echo $rowuser['emp_id']; ?></td>
<td style="width: 200px;"><?php echo $rowuser['lname'].", ".$rowuser['fname']." ".$rowuser['mi']."."; ?></td>

<?php for ($a=0; $a < $num; $a++) { 
?>
<td style="width: 135px;"><?php echo $pro_idtime[$a]; ?></td>
<?php } ?>


<!-- <td style="width: 136px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td> -->
</tr>
<?php } 
}
?>
<tr>
<td style="width: 30px;">&nbsp;</td>
<td style="width: 50px;">&nbsp;</td>
<td style="width: 200px;">Total</td>
<td style="width: 135px;">&nbsp;</td>
<td style="width: 135px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td>
</tr>
</tbody>
</table>

<?php } ?>