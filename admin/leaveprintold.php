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

<style type="text/css">
  td{
    text-align: center;
  }
</style>
<!-- <body  onload="window.print()" onfocus="window.close()"> -->
  <body>



<?php 
include('includes/config.php'); 


$leaveid = $_GET['id'];



$sqlleave = $db->prepare("SELECT * FROM tbl_leave WHERE leave_id='$leaveid'");
$sqlleave->execute();
$rowleave = $sqlleave->fetch(PDO::FETCH_ASSOC);

$note = $rowleave['noted_by'];
$approve = $rowleave['approval_by'];
$emp_id = $rowleave['emp_id'];

$sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$emp_id'");
$sqlemp->execute();
$rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);

?>

<center><img src="img/gold.png" width="80%"></center><br>
<center>(PHILIPPINES OFFICE &ndash; MANILA)
  <br />
  APPLICATION FOR LEAVE<br/></center><br/><br/><br/>
  <div class="row">
<div class="col-sm-1"></div>
<!-- start form here -->
<div class="col-sm-10">


  <!-- REF. NO: LEAVE-GOLD-<?php echo date("y"); ?> -->
  <label class="radio-inline" style="float: right;">
    <!-- <b>REF. NO:</b> &emsp;&emsp; <?php echo $rowleave['leave_series']." - ".$rowleave['leave_counter']; ?> -->
    <br>
  <p><b>DATE:</b> &emsp;&emsp; &emsp;<?php echo $rowleave['leave_date'];?></p></label>
  <b>COMPANY/DEPARTMENT:</b> &emsp;&emsp;&emsp;&nbsp;<?php echo $rowemp['company']."/".$rowemp['department']; ?>
   <!-- &emsp;&emsp; <?php echo $todate = date("m/d/Y"); ?>--> 
<p><b>NAME:</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <?php echo $rowemp['fname']." ".$rowemp['lname']; ?><br>
  <b>POSITION:</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; <?php echo $rowemp['position']; ?>
 <br /> <br /> 
 <b>PERIOD: </b>&emsp;
 <!-- <input type="text" name="datetimes" class="" style="width:21%;" />  -->
<?php echo date("F d Y", strtotime($rowleave['leave_period_from'])); ?> 

<label for="to"><b>&emsp;TO:</b></label> &emsp;
<?php echo date("F d Y", strtotime($rowleave['leave_period_to'])); ?> 
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;

 <b>TOTAL:</b> <?php echo $rowleave['leave_total']; ?>  Day(s) 
 <br/> <br/> 
 <b>LEAVE NATURE:</b> <br /> <br /> 
<?php 
if ($rowleave['leave_nature']==1) {
?>

<label class="radio-inline">
      <input type="checkbox" name="optradio" checked>ANNUAL LEAVE
    </label>&emsp;
    <label class="radio-inline">
      <input type="checkbox" name="optradio" disabled>SICK LEAVE
    </label>&emsp;<br>
    <label class="radio-inline">
      <input type="checkbox" name="optradio" disabled>SPECIAL LEAVE 
    </label>

<?php }
elseif($rowleave['leave_nature']==2){
 ?>

    <label class="radio-inline">
      <input type="checkbox" name="optradio" disabled>ANNUAL LEAVE
    </label>&emsp;
    <label class="radio-inline">
      <input type="checkbox" name="optradio" checked>SICK LEAVE
    </label>&emsp;<br>
<label class="radio-inline">
      <input type="checkbox" name="optradio" disabled>SPECIAL LEAVE 
    </label>

  <?php }else{ ?>

    <label class="radio-inline">
      <input type="checkbox" name="optradio" disabled>ANNUAL
    </label>
  <label class="radio-inline">
      <input type="checkbox" name="optradio" disabled>SICK LEAVE
    </label>&emsp;<br>
<label class="radio-inline">
      <input type="checkbox" name="optradio" checked>SPECIAL LEAVE 
    </label>

  <?php }  ?>
  <br>

 <b>REASON:</b> <?php echo $rowleave['leave_reason']; ?>
 <br /> 


<!-- <input class="btn btn-success" type="submit" name="submitLeave" value="Submit">
</form> -->
<br /> <br /> PERSONNEL DEPARTMENT VERIFICATION</p>
<table style="height: 113px;" width="889" border="1">
<tbody>
<tr>
<td style="width: 141px;">LEAVE NATURE&nbsp;</td>
<td style="width: 141px;">ENTITLEMENT PERIOD&nbsp;</td>
<td style="width: 141px;">DAYS ENTITLED&nbsp;</td>
<td style="width: 141px;">DAYS TAKEN&nbsp;</td>
<td style="width: 142px;">DAYS TAKEN <br />(incl. this time)</td>
<td style="width: 143px;">BALANCE&nbsp;</td>
</tr>
<tr>
<td style="width: 141px;">ANNUAL LEAVE&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 142px;">&nbsp;</td>
<td style="width: 143px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 141px;">SICK LEAVE&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 142px;">&nbsp;</td>
<td style="width: 143px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 141px;">SPECIAL LEAVE&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 141px;">&nbsp;</td>
<td style="width: 142px;">&nbsp;</td>
<td style="width: 143px;">&nbsp;</td>
</tr>
</tbody>
</table>
<!-- <p><br /> FULL PAY <br /> <br /> NO PAY <br /> <br /> OTHERS __________________________________ &emsp;
  NOTED BY: 
  <select id="inputGroupSelect04" name="selnoted">
    <option selected value="">--Choose employee--</option>
    <?php 
    $sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id IN ('GOLD-AR-004','GOLD-AR-006','GOLD-AR-010','GOLD-AR-028') ");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?>
    <option value="<?php echo $row['emp_id'] ?>"><?php echo $row['fname']." ".$row['lname'] ?></option>
    <?php } ?>
  </select>

 <br /> <br />
 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 APPROVED BY: 
  <select id="inputGroupSelect04" name="selapproval">
    <option selected value="">--Choose employee--</option>
    <?php 
    $sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id IN ('GOLD-AR-004','GOLD-AR-006','GOLD-AR-010','GOLD-AR-028') ");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?>
    <option value="<?php echo $row['emp_id'] ?>"><?php echo $row['fname']." ".$row['lname'] ?></option>
    <?php } ?>
  </select>
  <br /> <br /> REMARKS: ___________________________________________________________________________________________ <br /> ___________________________________________________________________________________________ <br /> </p>
 -->
</div>
<div class="col-sm-1"></div>
</div>




<!-- end form here -->

<?php 




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
  <div class="col-sm-5">Employee Signature:<img src="<?php echo $rowemp['signature']; ?>" style="max-height: 100px"></div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4">Approved by:<img src="<?php echo $rowapprove['signature']; ?>" style="max-height: 100px"></div>
  <div class="col-sm-1"></div>
</div>


<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5">Noted by :<img src="<?php echo $rownote['signature']; ?>" style="max-height: 100px"></div>


</div>

<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5">
  <br /> <br /> REMARKS: <?php echo $rowleave['remarks']; ?> </p></div>
</div>
</body>

<!-- <script type="text/javascript">
// window.print();
 window.print();
 setTimeout(window.close, 0);
  </script> -->


   </body>
 </html>