 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
<!-- <body onload="window.print()" onblur="window.close()"> -->
 <body>



 <link href="css/sb-admin-2.css" rel="stylesheet">
 <script type="text/javascript">
      // window.onload = function() { window.print(); }
 </script>

<style type="text/css">
  td{
    text-align: center;
    font-size: 24px;
  }
    .lefting{
    text-align: left;
  }
  input[type='checkbox'] {
     zoom: 2;
  transform: scale(2);
  -ms-transform: scale(2);
  -webkit-transform: scale(2);
  -o-transform: scale(2);
  -moz-transform: scale(2);
  transform-origin: 0 0;
  -ms-transform-origin: 0 0;
  -webkit-transform-origin: 0 0;
  -o-transform-origin: 0 0;
  -moz-transform-origin: 0 0;
}
/*input[type='checkbox']:checked {
    background: #abd;
}*/
</style>
<body  onload="window.print()" onfocus="window.close()">
  <!-- <body> -->



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




$sqlnote = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$note'");
$sqlnote->execute();
$rownote = $sqlnote->fetch(PDO::FETCH_ASSOC);


$sqlapprove = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$approve'");
$sqlapprove->execute();
$rowapprove = $sqlapprove->fetch(PDO::FETCH_ASSOC);



?>

<center><img src="img/gold.png" width="80%"></center><br>
<center><font style="font-family:Cambria; font-size: 30px">(PHILIPPINES OFFICE &ndash; MANILA)
  <br />
  <b style="font-size: 30px"><u>APPLICATION FOR LEAVE</u></b><br/></font></center><br/>
  <div class="row">
<div class="col-sm-1"></div>
<!-- start form here -->
<div class="col-sm-10">


  <!-- REF. NO: LEAVE-GOLD-<?php echo date("y"); ?> -->


&emsp;&emsp;&emsp;&emsp;
  <b>COMPANY/DEPARTMENT:</b> &emsp;<b><?php echo $rowemp['company']."/".$rowemp['department']; ?></b>
  &emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;
  <b>DATE:</b> &emsp;<b><?php echo $rowleave['leave_date'];?></b>
  
   <!-- &emsp;&emsp; <?php echo $todate = date("m/d/Y"); ?>--> 
   <center>
   <table border="1" cellpadding="20px" cellspacing="20px" width="100%">
    <tr><td class="lefting">
<p><b>NAME:</b><?php echo $rowemp['fname']." ".$rowemp['lname']; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;
  <b>POSITION:</b> <?php echo $rowemp['position']; ?>
 <br />  
 <b>PERIOD: </b>&emsp;
 <!-- <input type="text" name="datetimes" class="" style="width:21%;" />  -->
<?php echo date("F d Y", strtotime($rowleave['leave_period_from'])); ?> 

<label for="to"><b>TO:</b></label>
<?php echo date("F d Y", strtotime($rowleave['leave_period_to'])); ?> 


 <b>TOTAL:</b> <?php echo $rowleave['leave_total']; ?>  Day(s) 
 <br/> 
 <b>LEAVE NATURE:</b> <br />
<?php 
if ($rowleave['leave_nature']==1) {
?>

<label class="radio-inline">
     ANNUAL LEAVE &emsp;<input type="checkbox" name="optradio" checked>
    </label>&emsp;&emsp;
    <label class="radio-inline">
      SICK LEAVE&emsp;<input type="checkbox" name="optradio" disabled>
    </label>&emsp;<br>
    <label class="radio-inline">
     SPECIAL LEAVE &emsp;<input type="checkbox" name="optradio" disabled> 
    </label>&emsp;&emsp;

<?php }
elseif($rowleave['leave_nature']==2){
 ?>

    <label class="radio-inline">
      ANNUAL LEAVE&emsp;<input type="checkbox" name="optradio" disabled>
    </label>&emsp;&emsp;
    <label class="radio-inline">
      SICK LEAVE&emsp;<input type="checkbox" name="optradio" checked>
    </label>&emsp;<br>
<label class="radio-inline">
      SPECIAL LEAVE&emsp;<input type="checkbox" name="optradio" disabled> 
    </label>&emsp;&emsp;

  <?php }else{ ?>

    <label class="radio-inline">
      ANNUAL LEAVE&emsp;<input type="checkbox" name="optradio" disabled>
    </label>&emsp;&emsp;
  <label class="radio-inline">
      SICK LEAVE&emsp;<input type="checkbox" name="optradio" disabled>
    </label>&emsp;&emsp;<br>
<label class="radio-inline">
      SPECIAL LEAVE&emsp;<input type="checkbox" name="optradio" checked> 
    </label>&emsp;&emsp;

  <?php }  ?>
  

 <b>REASON:</b> <?php echo $rowleave['leave_reason']; ?>
 <br /> 

<div style="height:2px;">
<p> <font style="font-size: 15px">Application shall be accompanied with supporting documents(s).<br>Absence without approval or intentionally delayed application <br>will be an offence to the Company’s rules.</font> </p></div><br><br><br>
SUPPORTING DOCUMENT &emsp;<input type="checkbox" name="" checked="">                               &emsp;&emsp;&emsp;&emsp;APPLICANT: <img src="<?php echo $rowemp['signature']; ?>" style="max-height: 100px">
<br><br>
<!-- <input class="btn btn-success" type="submit" name="submitLeave" value="Submit">
</form> -->
 <p><b>PERSONNEL DEPARTMENT VERIFICATION</b></p>
<table style="height: 113px;" width="100%" border="1">
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
<p><br /> FULL PAY  &emsp;<input type="checkbox" name=""><br><br>
  NO PAY  &emsp;<input type="checkbox" name=""><br><br>
 <!--  NOTED BY: 
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


<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5">OTHERS: _______________________</div>
  <div class="col-sm-1"></div>
  <div class="col-sm-4">Noted by:<img src="<?php echo $rownote['signature']; ?>" style="max-height: 100px"></div>
  <div class="col-sm-1"></div>
</div>


<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5"></div>
  <div class="col-sm-1"></div>
  <div class="col-sm-5">Approved by :<img src="<?php echo $rowapprove['signature']; ?>" style="max-height: 100px"></div>


</div>

<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5">
  <br /> <br /> REMARKS: <?php echo $rowleave['remarks']; ?> </p></div>
</div><br><br>
</td></tr>

</table>
</center>
</body>

<!-- <script type="text/javascript">
// window.print();
 window.print();
 setTimeout(window.close, 0);
  </script> -->


   </body>
 </html>