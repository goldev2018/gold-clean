<?php set_time_limit(0); ?> <link href="css/sb-admin-2.css" rel="stylesheet">
 <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>
 <style type="text/css">
 	@media print {

    @page {size: A4 landscape; }

    /* use width if in portrait (use the smaller size to try 
       and prevent image from overflowing page... */
}
 </style>
<center><img src="img/footer-logo1.png"></center><br>
<h6>Manpower Summary of Expenses Report</h6>
Period Covered: 
<?php 
include('includes/config.php'); 


echo $weekstart = $_GET['weekstart'];
echo " - ";
echo $weekend = $_GET['weekend'];
echo "<br>";
$weeknum = date("W", strtotime($weekstart));
echo "<br>";
$sil = $_POST['sil'];
$otremarks = $_POST['otremarks'];
$hidid = $_POST['hidid'];
$hidcount = $_POST['hidcount'];

for ($count=0; $count <= $hidcount ; $count++) { 
$sils  = $sil[$count];
if ($sils=="") {
	$sils=0;
}
$otremarkss = $otremarks[$count];
if ($otremarkss=="") {
	$otremarkss=0;
}
$hidids = $hidid[$count];

     $sql = $db->prepare("UPDATE tbl_timesheet SET ts_sil='$sils', ts_ot='$otremarkss' WHERE ts_weekstart='$weekstart' AND ts_weekend='$weekend' AND ts_week='$weeknum' AND emp_id='$hidids'");
    // use exec() because no results are returned
    $sql->execute();
}

$sqltscount = $db->prepare("SELECT DISTINCT project_id FROM tbl_timesheetinfo WHERE tsinfo_week='$weeknum'");
$sqltscount->execute();
$rowsqwe = $sqltscount->rowCount();



?>
<style type="text/css">
	td{
		text-align: center;
	}
</style>
<table style="height: 126px;" width="993" border="1"  id="sampleTable">
<tbody>
<tr>
<td style="width: 30px;" rowspan="2">No.</td>
<td style="width: 50px;" rowspan="2">Empployee Code</td>
<td style="width: 200px;" rowspan="2">Name of Employee</td>
<td style="width: 135px; " colspan="<?php echo $rowsqwe ?>">Project Name</td>
<td style="width: 135px; " colspan="3"></td>
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
<td style="width: 30px;"><?php echo $pro_name; ?>
<?php  
$sqlts3 = $db->prepare("SELECT * FROM tbl_country WHERE country_id='$count_id'");
$sqlts3->execute();
while ($rowts3 = $sqlts3->fetch(PDO::FETCH_ASSOC)) { ?>
<?php echo "<br>(".$rowts3['country_name'].")"; ?></td>
<?php 
$countryarray[] = $rowts3['country_id'];
}
}
}
?>


<td style="width: 30px;">SIL</td>
<td style="width: 30px;">OT</td>
<td style="width: 50px;">Total Hours</td>
<!-- <td style="width: 135px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td> -->
</tr>

<?php 
$num;
$i=0;
$c=0;

$sqlts = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_week='$weeknum'");
$sqlts->execute();
while ($rowts = $sqlts->fetch(PDO::FETCH_ASSOC)) {
$empid = $rowts['emp_id'];
$ts_idtime = $rowts['ts_id'];
$sqluser = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$empid'");
$sqluser->execute();
while ($rowuser = $sqluser->fetch(PDO::FETCH_ASSOC)) {
$i++;
 ?>
<tr>
<td style="width: 30px;"><?php echo $i ?></td>
<td style="width: 150px;"><?php echo $rowuser['emp_id']; ?></td>
<td style="width: 200px;"><?php echo $rowuser['lname'].", ".$rowuser['fname']." ".$rowuser['mi']."."; ?></td>

<?php 
$totperprojemp=0;
$totperemp=0;
for ($a=0; $a < $num; $a++) { 
// $in_str = "'".implode("', '", $count_id)."'"; 
	// tsinfo_id, tsinfo_desc, tsinfo_time, tsinfo_day, tsinfo_week, tsinfo_total, tsinfo_date, tsinfo_status, ts_id, project_id, proj_info_id
	$proj = $pro_idtime[$a];
$sqltime = $db->prepare("SELECT * FROM tbl_timesheetinfo WHERE tsinfo_week='$weeknum' AND ts_id='$ts_idtime' AND project_id='$proj'  ");
$sqltime->execute();
while ($rowtime = $sqltime->fetch(PDO::FETCH_ASSOC)) {
	$totperprojemp += $rowtime['tsinfo_time'];
	$totperemp += $rowtime['tsinfo_time'];
}

?>
<td style="width: 135px;"><?php echo $totperprojemp; ?></td>




<?php $totperprojemp=0; 

} 
?>

<td style="width: 30px;"><?php echo $rowts['ts_sil']; ?></td>
<td style="width: 30px;"><?php echo $rowts['ts_ot']; ?></td>
<td style="width: 30px;"><?php echo $totperemp; ?></td>
</tr>
<?php 
$c++;
	} 
}
?>
<tr>
<td style="width: 30px;">&nbsp;</td>
<td style="width: 50px;">&nbsp;</td>
<td style="width: 200px;">Total</td>

<?php 
$totperproj=0;
$overalltotal=0;
for ($a=0; $a < $num; $a++) { 
// $in_str = "'".implode("', '", $count_id)."'"; 
	// tsinfo_id, tsinfo_desc, tsinfo_time, tsinfo_day, tsinfo_week, tsinfo_total, tsinfo_date, tsinfo_status, ts_id, project_id, proj_info_id
	$proj = $pro_idtime[$a];
$sqltime = $db->prepare("SELECT * FROM tbl_timesheetinfo WHERE tsinfo_week='$weeknum' AND  project_id='$proj'  ");
$sqltime->execute();
while ($rowtime = $sqltime->fetch(PDO::FETCH_ASSOC)) {
	$totperproj += $rowtime['tsinfo_time'];
	$overalltotal += $rowtime['tsinfo_time'];
}

?>
<td style="width: 135px;"><?php echo $totperproj; ?></td>




<?php $totperproj=0; } 

?>

<td style="width: 30px;">&nbsp;</td>
<td style="width: 50px;">&nbsp;</td>
<td style="width: 50px;"><?php echo $overalltotal; ?></td>

</tr>
</tbody>
</table>

<script type="text/javascript">
window.print();
window.onmousemove = function() {
  window.location.href = "dashboard.php?link=summaryreport";
}
  </script>