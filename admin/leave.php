<?php 
$sessemp_id = $_SESSION['emp_id'];
$sql = $db->prepare("SELECT * FROM tbl_annual WHERE emp_id='$sessemp_id'");
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);
 ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div>
            

            <style type="text/css">
  td{
    text-align: center;
  }
</style>
<form action="leaveSubmit.php" method="post" enctype="multipart/form-data" onSubmit="if(!confirm('Are you sure?')){return false;}">
<p><center>(PHILIPPINES OFFICE &ndash; MANILA)</center>
  <br /><br />
  APPLICATION FOR LEAVE<br/>
  <!-- REF. NO: LEAVE-GOLD-<?php echo date("y"); ?> -->
  <label class="radio-inline">REF. NO:</label>
  <label class="radio-inline"> <h7 id="todayrefnum"></h7></label>  <br/>
  COMPANY/DEPARTMENT: <?php echo $sesscompany."/".$sessdepartment; ?>&emsp;&emsp;
  DATE: <!-- &emsp;&emsp; <?php echo $todate = date("m/d/Y"); ?>--> <h7 id="todaydate"></h7></p>
<p>NAME: <?php echo $sessfname." ".$sesslname; ?>&emsp;&emsp;POSITION: <?php echo $sessposition?>
 <br /> <br /> 
 PERIOD: 
 <!-- <input type="text" name="datetimes" class="" style="width:21%;" />  -->
 <input type="text" id="from" name="from" class="selector" required autocomplete="off"/> 

<label for="to">to</label> 
<input type="text" id="to" name="to" required autocomplete="off"/>


 TOTAL: <input type="text" name="totaldays" class="form-control2" width="5px" id="floatTextBox" required> Day(s) 
 <br/> <br/> 
 LEAVE NATURE: <br /> <br /> 
<?php 
if ($row['annual_count']!=0) {
?>
<label class="radio-inline">
      <input type="radio" name="optradio" value="1" checked required>ANNUAL LEAVE
    </label>&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" disabled>SICK LEAVE
    </label>&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" disabled>SPECIAL LEAVE 
    </label><br><br>
<?php 
}else{ 
  ?>
  <label class="radio-inline">
      <input type="radio" name="optradio" disabled>ANNUAL LEAVE
    </label>&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="2" required>SICK LEAVE
    </label>&emsp;
    <label class="radio-inline">
      <input type="radio" name="optradio" value="3" required>SPECIAL LEAVE 
    </label><br><br>
<?php } ?>
 REASON: <br><textarea name="leavereason" rows="4" cols="50" required></textarea> 
 <br /> <br /> <br /> Application shall be accompanied with supporting documents(s). Absence without approval or intentionally delayed application will be an offence to the Company&rsquo;s rules. <br /> <br /> <br /> 
 SUPPORTING DOCUMENT APPLICANT: 

<input type="file" name="app_cvupload" class="btn btn-file" style="color: transparent;" accept=".doc, .docx,.pdf" required>

<input class="btn btn-success" type="submit" name="submitLeave" value="Submit">
</form>
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
<p><br /> FULL PAY <br /> <br /> NO PAY <br /> <br /> OTHERS __________________________________ CHECKED BY: _________________________________ <br /> <br /> APPROVED BY: _________________________________ <br /> <br /> REMARKS: ___________________________________________________________________________________________ <br /> ___________________________________________________________________________________________ <br /> </p>






          </div>

        </div>
        <!-- /.container-fluid -->


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="js/datepicker.js"></script>
<script src="js/onlynumber.js"></script>




<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>



$(function () {
     $('input[type="file"]').change(function () {
          if ($(this).val() != "") {
                 $(this).css('color', '#333');
          }else{
                 $(this).css('color', 'transparent');
          }
     });
})

    $(document).ready(function(){  
        setInterval(function(){   
            $("#todayrefnum").load("leaverefnum.php");
        }, 1000);
    });

        $(document).ready(function(){  
        setInterval(function(){   
            $("#todaydate").load("todate.php");
        }, 1000);
    });
</script>

