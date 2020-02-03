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
echo "<br><br>";

$weekstart = $_POST['weekstart'];
$weekend = $_POST['weekend'];
$selemployee = $_SESSION['emp_id'];
// $selemployee = $_POST['selemployee'];
$weeknum = date("W", strtotime($weekstart));

$sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$selemployee'");
$sqlemp->execute();
$rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);
$directory = "weeklytimesheetchk.php?weekstart=".$weekstart."&weekend=".$weekend."&empID=".$selemployee;
 ?>

<!-- <a href="<?php echo $directory; ?>" target="blank" class="btn btn-outline-success"  style="float: right;">Print</a> -->




<p>Name: <?php echo $rowemp['fname']." ".$rowemp['lname']; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Week Start: <?php echo $weekstart; ?> <br />Position: <?php echo $rowemp['position']; ?>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp; Week End: <?php echo $weekend; ?></p>
<p>&nbsp;</p>
<div class="table-responsive">
<table style="height: 29px; width: 1017px;" border="1" id="sampleTable">
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


