<?php set_time_limit(0); ?>
<script src="js/jquery.summarypicker.js" ></script>

<!-- <form action="summaryreportchk.php" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}" target="_blank"> -->

<form action="" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">
<h1 style="margin-top:50px;"></h1>
    <div class="week-picker"></div>
    <div id="start"></div>

  <span class="input-group-btn">
      <!-- <input type="text" class="form-control" name="weekpicks" id="weekpicks" size="40" required data-readonly > -->

      <input type="hidden" name="weekstart" id="weekstart" size="40" required data-readonly >
      <input type="hidden" name="weekend" id="weekend" size="40" required data-readonly >
      <!-- <input type="text" class="form-control" name="weeknum" id="weeknum" size="40" required data-readonly > -->

      <input type="submit" name="submit" id="submit" style="display: none;">


  </span>

</form>
<br>


 <link href="css/sb-admin-2.css" rel="stylesheet">
<!--  <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script> -->
<!-- <center><img src="img/footer-logo1.png"></center> -->

<?php 
include('includes/config.php'); 
if (isset($_POST['submit'])) {
echo "<br><br>
<h5>Manpower Summary of Expenses Report</h5>
Period Covered: ";
echo $weekstart = $_POST['weekstart'];
echo " - ";
echo $weekend = $_POST['weekend'];
echo "<br><br><br>";
$weeknum = date("W", strtotime($weekstart));
$directory = "summaryreportchk.php?weekstart=".$weekstart."&weekend=".$weekend;
?>
<form action="<?php echo $directory; ?>" method="post">
<!-- <a href="<?php echo $directory; ?>" target="_blank" class="btn btn-outline-success"  style="float: right;">Save & Print</a> -->
<input type="submit" name="subprint" value="Save & Print" class="btn btn-outline-success"  style="float: right;">
<br><br>
<style type="text/css">
  td{
    text-align: center;
  }
</style>

<?php 

$sqltscount = $db->prepare("SELECT DISTINCT project_id FROM tbl_timesheetinfo WHERE tsinfo_week='$weeknum'");
$sqltscount->execute();
$rowsqwe = $sqltscount->rowCount();


 ?>
 <div class="table-responsive">
<table style="height: 126px;" width="993" border="1"  id="sampleTable">
<tbody>
<tr>
<td style="width: 30px;" rowspan="2">No.</td>
<td style="width: 50px;" rowspan="2">Employee Code</td>
<td style="width: 200px;" rowspan="2">Name of Employee</td>
<td style="width: 135px; " colspan="<?php echo $rowsqwe; ?>">Project Name</td>
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
$pro_id  = $rowts1['project_id'];
$pro_idtime[$num] = $rowts1['project_id'];
$num++;

$sqlts2 = $db->prepare("SELECT * FROM tbl_project WHERE project_id='$pro_id'");
$sqlts2->execute();
while ($rowts2 = $sqlts2->fetch(PDO::FETCH_ASSOC)) {
$count_id = $rowts2['country_id'];
$pro_name = $rowts2['project_name'];

   ?>
<td style="width: 30px;"> <?php echo $pro_name; ?>
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
<td style="width: 30px;">OT (Remarks)</td>
<td style="width: 50px;">Total Hours</td>
<!-- <td style="width: 135px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td>
<td style="width: 136px;">&nbsp;</td> -->
</tr> 

<?php 
$num;
$i=0;
$qty=0;
$sqluser = $db->prepare("SELECT * FROM tbl_user ORDER BY department ASC");
$sqluser->execute();
while ($rowuser = $sqluser->fetch(PDO::FETCH_ASSOC)) {
  $empid1 = $rowuser['emp_id'];
$sqlts = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_week='$weeknum' AND emp_id='$empid1'");
$sqlts->execute();
$counts = $sqlts->rowCount();
$qty += $counts;
while ($rowts = $sqlts->fetch(PDO::FETCH_ASSOC)) {
$empid = $rowts['emp_id'];
echo "<input type='hidden' class='hidid' name='hidid[]' id='hidid' value=".$empid.">";
$ts_idtime = $rowts['ts_id'];

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
$sqltime = $db->prepare("SELECT * FROM tbl_timesheetinfo WHERE tsinfo_week='$weeknum' AND ts_id='$ts_idtime' AND project_id='$proj' ");
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
<td style="width: 30px;">
  <input type='number' class='sil' name='sil[]' id='sumSIL' size='3'  min='1' max='50' onblur='findSILTotal()'>
</td>
<td style="width: 30px;">
<textarea name='otremarks[]' rows='1' cols='40'></textarea>
</td>
<td style="width: 30px;"><?php echo $totperemp; ?></td>
</tr>
<?php } 
}
$qty-=1;
?>



<input type="hidden" name="hidcount" value="<?php echo $qty; ?>">

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

<td style="width: 30px;"><input type="text" id="siltotal" name="siltotal" value="" readonly size="2" /></td>
<td style="width: 50px;"></td>
<td style="width: 50px;">
  <input type="text" name="hidtotal" id="hidtotal" value="<?php echo $overalltotal; ?>" readonly size="2">
  <input type="hidden" name="hidtotal2" id="hidtotal2" value="<?php echo $overalltotal; ?>" readonly size="2">
</td>

</tr>
</tbody>
</table>
</div>
<?php }

 ?>

  <form>


        <script type="text/javascript">
function findSILTotal(){
    var arr = document.getElementsByClassName('sil');
    var tot=0;
    var qwe=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);

    }

    document.getElementById('siltotal').value = tot;
    var x = document.getElementById("hidtotal2").value;
    var y = document.getElementById("siltotal").value;
    qwe = parseFloat(tot, 10) + parseFloat(x, 10);
    document.getElementById('hidtotal').value = qwe;
}


  $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});


</script>


