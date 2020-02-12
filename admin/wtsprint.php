 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
<body onload="window.print()" onblur="window.close()">
 



 <link href="css/sb-admin-2.css" rel="stylesheet">
 <script type="text/javascript">
      // window.onload = function() { window.print(); }
 </script>



<?php 
include('includes/config.php'); 


$weekstart = $_GET['weekstart'];

$weekend = $_GET['weekend'];
$selemployee = $_GET['empID'];

$weeknum = date("W", strtotime($weekstart));


$sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$selemployee'");
$sqlemp->execute();
$rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);
?>
<style type="text/css">
	td{
		text-align: center;
	}
</style>
<!-- <body  onload="window.print()" onfocus="window.close()"> -->
	<body>
<center><img src="img/gold.png" width="80%"></center><br><br>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-5">Name: <?php echo $rowemp['fname']." ".$rowemp['mi'].". ".$rowemp['lname']." ".$selemployee; ?></div>
  <div class="col-sm-1"></div>
  <div class="col-sm-3">Week Start:<?php echo $weekstart; ?></div>
  <div class="col-sm-1"></div>
</div>

<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-5">Position: <?php echo $rowemp['position']; ?></div>
  <div class="col-sm-1"></div>
  <div class="col-sm-3">Week End:<?php echo $weekend; ?></div>
  <div class="col-sm-1"></div>
</div>


<br><br>
<center>
	<table style="height: 29px; width: 90%;" border="1" id="sampleTable">
<tbody>
<tr style="height: 29px;">
<td style="width: 131px; text-align: center; height: 29px;" rowspan="2">
<p>Project Name</p>
</td>
<td style="width: 151px; text-align: center; height: 29px;" rowspan="2">Job Code<br />Job ID Phase ID</td>
<td style="width: 492px; text-align: center; height: 29px;" rowspan="2">
<p>Description</p>
</td>
<td style="width: 223px; text-align: center; height: 29px;" colspan="7"><p>Working Hours</p>
<!-- <table style="height: 21px; width: 357px; margin-left: auto; margin-right: auto;" border="1">
<tbody>
<tr style="height: 13px;">

</tr>
</tbody>
</table> -->
</td>
</tr>
<!-- <tr></tr>
<tr></tr> -->
<tr>
<td style="width: 44px; height: 13px;">Mon</td>
<td style="width: 42px; height: 13px;">Tue</td>
<td style="width: 45px; height: 13px;">Wed</td>
<td style="width: 44px; height: 13px;">Thu</td>
<td style="width: 40px; height: 13px;">Fri</td>
<td style="width: 43px; height: 13px;">Sat</td>
<td style="width: 53px; height: 13px;">Total</td>

</tr>


<?php
$total = 0;
$sql1 = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_weekstart='$weekstart' AND ts_weekend='$weekend' AND ts_week='$weeknum' AND emp_id='$selemployee'");
$sql1->execute();
$row1 = $sql1->fetch(PDO::FETCH_ASSOC);
$tsid = $row1['ts_id'];

$sql2 = $db->prepare("SELECT * FROM tbl_timesheetinfo WHERE ts_id='$tsid' ORDER BY tsinfo_id ASC");
$sql2->execute();
while ($row2 = $sql2->fetch(PDO::FETCH_ASSOC)) {




$rowproject_id = $row2['project_id'];
$rowproj_info_id = $row2['proj_info_id'];

  $sqlproj = $db->prepare("SELECT * FROM tbl_project WHERE project_id='$rowproject_id'");
$sqlproj->execute();
$rowproj = $sqlproj->fetch(PDO::FETCH_ASSOC);

$sqljob = $db->prepare("SELECT * FROM tbl_project_info WHERE proj_info_id='$rowproj_info_id'");
$sqljob->execute();
$rowjob = $sqljob->fetch(PDO::FETCH_ASSOC);
?>
<tr>
<td><?php echo $rowproj['project_name']; ?></td>
<td><?php echo $rowjob['proj_info_codes']; ?></td>

<td>
  <?php echo $row2['tsinfo_desc']; ?>
</td>

<td style="width: 44px; height: 13px;">
  <?php if ($row2['tsinfo_day']=="Mon") {
    echo $row2['tsinfo_time'];
    $total += $row2['tsinfo_time'];
  } ?>
</td>

<td style="width: 44px; height: 13px;">
  <?php if ($row2['tsinfo_day']=="Tue") {
    echo $row2['tsinfo_time'];
    $total += $row2['tsinfo_time'];
  } ?>
</td>

<td style="width: 44px; height: 13px;">
  <?php if ($row2['tsinfo_day']=="Wed") {
    echo $row2['tsinfo_time'];
    $total += $row2['tsinfo_time'];
  } ?>
</td>

<td style="width: 44px; height: 13px;">
  <?php if ($row2['tsinfo_day']=="Thu") {
    echo $row2['tsinfo_time'];
    $total += $row2['tsinfo_time'];
  } ?>
</td>

<td style="width: 44px; height: 13px;">
  <?php if ($row2['tsinfo_day']=="Fri") {
    echo $row2['tsinfo_time'];
    $total += $row2['tsinfo_time'];
  } ?>
</td>

<td style="width: 44px; height: 13px;">
  <?php if ($row2['tsinfo_day']=="Sat") {
    echo $row2['tsinfo_time'];
    $total += $row2['tsinfo_time'];
  } ?>
</td>

<!-- <td style="width: 42px; height: 13px;"></td>
<td style="width: 45px; height: 13px;"></td>
<td style="width: 44px; height: 13px;"></td>
<td style="width: 40px; height: 13px;"></td>
<td style="width: 43px; height: 13px;"></td> -->

<td style="width: 20px; height: 13px;">
  <!-- <input type="text" id="total" name="total" value="0" required data-readonly  size="2" /> -->
</td>
</tr>


<?php } 
$pos_title = $rowemp['position'];
$sqlpos = $db->prepare("SELECT pos_id FROM tbl_position WHERE pos_title='$pos_title'");
$sqlpos->execute();
$rowpos = $sqlpos->fetch(PDO::FETCH_ASSOC);
$pos_id = $rowpos['pos_id'];
$sqlcost = $db->prepare("SELECT * FROM tbl_costcode WHERE costcode_type='Regular' AND pos_id LIKE '%$pos_id%'");
          $sqlcost->execute();
          $rowcost = $sqlcost->fetch(PDO::FETCH_ASSOC);
           ?>



<tr>
<td>Code: </td>
<td><?php echo $rowcost['costcode_number']; ?></td>
<td colspan="7"></td>
<!-- <td style="width: 44px; height: 13px;"></td>
<td style="width: 44px; height: 13px;"></td>
<td style="width: 44px; height: 13px;"></td>
<td style="width: 44px; height: 13px;"></td>
<td style="width: 44px; height: 13px;"></td>
<td style="width: 44px; height: 13px;"></td> -->
<td style="width: 20px; height: 13px;"><?php echo $total; ?></td>
</tr>





</tbody>
</table>
</center><br><br>
<?php 

$note = $row1['noted_by'];
$approve = $row1['approved_by'];
$sqlnote = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$note'");
$sqlnote->execute();
$rownote = $sqlnote->fetch(PDO::FETCH_ASSOC);


$sqlapprove = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$approve'");
$sqlapprove->execute();
$rowapprove = $sqlapprove->fetch(PDO::FETCH_ASSOC);


 ?>

<br><br>
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-4">Employee Signature:<img src="<?php echo $rowemp['signature']; ?>" style="max-height: 100px"></div>
  <div class="col-sm-2"></div>
  <div class="col-sm-4">Approved by:<img src="<?php echo $rowapprove['signature']; ?>" style="max-height: 100px"></div>
  <div class="col-sm-1"></div>
</div>


<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5">Noted by :<img src="<?php echo $rownote['signature']; ?>" style="max-height: 100px"></div>


</div>
</body>

<!-- <script type="text/javascript">
// window.print();
 window.print();
 setTimeout(window.close, 0);
  </script> -->


   </body>
 </html>