<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()" onblur="window.close()">
<center><img src="img/gold.png" width="80%"></center>
<?php 
include("includes/config.php");
$id = $_GET['id'];
$sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$id'");
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);


$sqlhired = $db->prepare("SELECT * FROM tbl_annual WHERE emp_id='$id'");
$sqlhired->execute();
$rowhired = $sqlhired->fetch(PDO::FETCH_ASSOC);
 ?>
<p style="text-align: center;"><br /><font size="5px"><u>SUMMARY OF LEAVES FOR YEAR <?php echo date("Y"); ?></u></font><br /><br /></p>
<table style="height: 49px; width: 90%; margin-left: auto; margin-right: auto;" border="1">
<tbody>
<tr style="height: 19px;">
<td style="width: 272px; height: 19px; text-align: left;">Name:</td>
<td style="width: 342px; height: 19px;">Company:</td>
<td style="width: 292px; height: 19px;">Employee Code:</td>
</tr>
<tr style="height: 20px;">
<td style="width: 272px; height: 20px;"><strong><?php echo $row['fname']." ".$row['mi'].". ".$row['lname']; ?></strong></td>
<td style="width: 342px; height: 20px;"><strong><?php echo $row['company']; ?></strong></td>
<td style="width: 292px; height: 20px;"><strong><?php echo $id; ?></strong></td>
</tr>
<tr style="height: 20px;">
<td style="width: 272px; height: 20px;">Department:</td>
<td style="width: 342px; height: 20px;">Position:</td>
<td style="width: 292px; height: 20px;">Employment Date:</td>
</tr>
<tr style="height: 20px;">
<td style="width: 272px; height: 20px;"><strong><?php echo $row['department']; ?></strong></td>
<td style="width: 342px; height: 20px;"><strong><?php echo $row['position']; ?></strong></td>
<td style="width: 292px; height: 20px;"><strong><?php echo $rowhired['dateHired']; ?></strong></td>
</tr>
</tbody>
</table>
<table style="width: 90%; margin-left: auto; margin-right: auto;" border="1">
<tbody>
<tr>
<td style="width: 110px; text-align: center;">Date of Leave</td>
<td style="width: 440px; text-align: center;">Reason</td>
<td style="width: 75px; text-align: center;">No. of day/s</td>
<td style="width: 81px; text-align: center;">Total-to-date</td>
<td style="width: 145px; text-align: center;">Paid Leave</td>
<td style="width: 114px; text-align: center;">Unpaid Leave</td>
</tr>

<?php
$total=0;
$series = date("Y");
$sqlleave = $db->prepare("SELECT * FROM tbl_leave WHERE leave_period_from LIKE '%$series%' AND emp_id='$id' AND status IN ('Checked', 'Approved')");
$sqlleave->execute();
$counter = $sqlleave->rowCount();
while ($rowleave = $sqlleave->fetch(PDO::FETCH_ASSOC)) {
 ?>

<tr align="center">
<?php if ($rowleave['leave_total']<="1") { ?>
	<td style="width: 110px;"><?php echo $rowleave['leave_period_from']; ?></td>
<?php }else{ ?>
	<td style="width: 110px;"><?php echo $rowleave['leave_period_from']." ".$rowleave['leave_period_to']; ?></td>
<?php } ?>
<td style="width: 440px;"><?php echo $rowleave['leave_reason']; ?></td>
<td style="width: 75px;"><?php echo $rowleave['leave_total']; ?></td>
<?php $total+=$rowleave['leave_total']; ?>
<td style="width: 81px;"><?php echo $total; ?></td>

<?php if ($rowleave['leave_nature']=="1") { ?>
<td style="width: 145px;">&#10003;</td>
<td style="width: 114px;"></td>
<?php }else{ ?>
<td style="width: 145px;"></td>
<td style="width: 114px;">&#10003;</td>
<?php } ?>
</tr>

<?php } ?>

<?php 
$tables = 28-$counter;
for ($i=1; $i <=$tables ; $i++) { ?>
<tr>
<td style="width: 110px; text-align: center;">&nbsp;</td>
<td style="width: 440px; text-align: center;">&nbsp;</td>
<td style="width: 75px; text-align: center;">&nbsp;</td>
<td style="width: 81px; text-align: center;">&nbsp;</td>
<td style="width: 145px; text-align: center;">&nbsp;</td>
<td style="width: 114px; text-align: center;">&nbsp;</td>
</tr>
<?php } ?>

</tbody>
</table>
<p style="text-align: left;">&nbsp;</p>
<p style="text-align: left;">&nbsp;</p>
<p style="text-align: center;">Employee's Signature: <img src="<?php echo $row['signature']; ?>" style="max-height: 100px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Date: __________________</p>



</body>
</html>

<script>
	window.opener.location.reload();
</script>