<?php 
$sessemp_id = $_SESSION['emp_id'];
$sessfname = $_SESSION['fname'];
$sesslname = $_SESSION['lname'];
$sessdepartment = $_SESSION['department'];


// rtw_id, rtw_date, rtw_from, rtw_to, rtw_reason, rtw_attachment, rtw_datefiled, emp_id

$sqllastid = $db->prepare("SELECT * FROM tbl_rtw WHERE emp_id='$sessemp_id' AND if_filed='0' ORDER BY rtw_id DESC LIMIT 1");
$sqllastid->execute();
$row = $sqllastid->fetch(PDO::FETCH_ASSOC);
$last_id =  $row['rtw_id'];
$rtw_date =  $row['rtw_date'];
$rtw_from =  $row['rtw_from'];
$rtw_to =  $row['rtw_to'];
$rtw_reason =  $row['rtw_reason'];

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="calculateTime1()">
<style>
	td{
		text-align: center;
	}
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



<p style="text-align: center;"><br />(PHILIPPINES OFFICE &ndash; MANILA) <br />REQUEST TO WORK OVERTIME (RWO)</p>


<form action="rtwchk.php" method="post" enctype="multipart/form-data">
<p>DATE:&emsp;<?php echo date("F d Y l"); ?>&emsp;&emsp;&emsp;&emsp;
DEPARTMENT:&emsp;<?php echo $sessdepartment; ?></p>


<table border="1">
<tbody>
<tr>
<td style="width: 30%; text-align: center;" rowspan="2">&nbsp;DATE OF O.T.</td>
<td style="width: 5%; text-align: center;" colspan="2">ESTIMATED TIME</td>
<td style="width: 30%; text-align: center;" rowspan="2">EMPLOYEE NAME</td>
<td style="width: 30%; text-align: center;" rowspan="2">REASON</td>
<!-- <td style="width: 5%; text-align: center;" rowspan="2">&nbsp;TOTAL HOURS</td> -->
</tr>
<tr>
<td style="width: 5%; text-align: center; height: 34px;">FROM</td>
<td style="width: 5%; text-align: center; height: 34px;">TO</td>
</tr>
<tr>


<td style="text-align: center">
<input type="text" id="datepicker" name="datepicker" placeholder="mm/dd/Y" autocomplete="off">
</td>

<td style="text-align: center">
<input type="time" name="start" id="start" required>
</td>
<td>
<input type="time" name="stop" id="stop" required>
</td>


<td style="text-align: center"><?php echo $sessfname." ".$sesslname; ?></td>

<td style="text-align: center"><textarea  cols="55" rows="2" placeholder="Reason" name="reasonrtw"></textarea></td>

<!-- <td>
<input type="text" name="estimate" id="estimate" disabled=""  style="text-align: center">
</td> -->

</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<!-- <td>&nbsp;</td> -->
</tr>
</tbody>
</table><br>

<!-- <input type="file" name="app_cvupload" class="btn btn-file" style="color: transparent;" accept=".doc, .docx,.pdf"> -->

<!-- NOTED BY: 
  <select id="inputGroupSelect04" name="selnoted" required="">
    <option selected value="">--Choose employee--</option>
    <?php 
    $sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id IN ('GOLD-AR-004','GOLD-AR-006') ");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?>
    <option value="<?php echo $row['emp_id'] ?>"><?php echo $row['fname']." ".$row['lname'] ?></option>
    <?php } ?>
  </select>

 
 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; -->
 APPROVED BY: 
 <input type="file" name="app_rtwupload" class="btn btn-file" style="color: transparent;" accept=".doc, .docx,.pdf">
 <br><br>

<input class="btn btn-success" type="submit" name="submitrtw" value="Submit">

</form>
<br><br><br>

<p style="text-align: center;">(PHILIPPINES OFFICE &ndash; MANILA) <br />OVERTIME SLIP (OTS)</p>






<form action="otschk.php" method="post" enctype="multipart/form-data">
<p>DATE:&emsp;<?php echo date("F d Y l"); ?>&emsp;&emsp;&emsp;&emsp;
DEPARTMENT:&emsp;<?php echo $sessdepartment; ?></p>


<table border="1">
<tbody>
<tr>
<td style="width: 30%; text-align: center;" rowspan="2">EMPLOYEE NAME</td>
<td style="width: 30%; text-align: center;" rowspan="2">&nbsp;DATE OF O.T.</td>
<td style="width: 5%; text-align: center;" colspan="2">ACTUAL TIME</td>
<td style="width: 30%; text-align: center;" rowspan="2">REASON</td>
<td style="width: 5%; text-align: center;" rowspan="2">&nbsp;TOTAL HOURS</td>
</tr>
<tr>
<td style="width: 5%; text-align: center; height: 34px;">FROM</td>
<td style="width: 5%; text-align: center; height: 34px;">TO</td>
</tr>
<tr>
<td style="text-align: center"><?php echo $sessfname." ".$sesslname; ?></td>

<td><?php echo $rtw_date; ?>
<input type="hidden" name="datepickot" value="<?php echo $rtw_date; ?>">
</td>

<td style="text-align: center">
<input type="time" name="start1" id="start1" onchange="calculateTime1()" required value="<?php echo $rtw_from; ?>">
</td>

<td>
<input type="time" name="stop1" id="stop1" onchange="calculateTime1()" required value="<?php echo $rtw_to; ?>">
</td>

<td>
<?php echo $rtw_reason; ?>
<input type="hidden" name="ots_reason" value="<?php echo $rtw_reason; ?>">
</td>

<td>
<input type="text" name="estimate1" id="estimate1" disabled=""  style="text-align: center">
<input type="hidden" name="hidestimate1" id="hidestimate1" style="text-align: center">
</td>

</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table><br>

<!-- <input type="file" name="app_cvupload" class="btn btn-file" style="color: transparent;" accept=".doc, .docx,.pdf"> -->

NOTED BY: 
  <select id="inputGroupSelect04" name="selnoted" required="">
    <option selected value="">--Choose employee--</option>
    <?php 
    $sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id IN ('GOLD-AR-004','GOLD-AR-006') ");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?>
    <option value="<?php echo $row['emp_id'] ?>"><?php echo $row['fname']." ".$row['lname'] ?></option>
    <?php } ?>
  </select>

 
 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 APPROVED BY: 
<input type="file" name="app_otsupload" class="btn btn-file" style="color: transparent;" accept=".doc, .docx,.pdf">
<br><br>
<input type="hidden" name="hidrtwid" value="<?php echo $last_id; ?>">
<input class="btn btn-success" type="submit" name="submitots" value="Submit">

</form>




<script>
  function calculateTime1() {
  // Declare the variables
var valuestart1 = document.getElementById("start1").value,
    valuestop1 = document.getElementById("stop1").value;

/* I left it the same as you had it */
var timeStart1 = new Date("01/01/2010 " + valuestart1),
    timeEnd1 = new Date("01/01/2010 " + valuestop1);


/* Determine the value of the variable via a conditional ternary operator */
var hourDiff1 = (((timeEnd1.getHours() - timeStart1.getHours()) > 0) ?
               (timeEnd1 - timeStart1) / 3600000 + " Hours" :
               (((timeEnd1.getMinutes() - timeStart1.getMinutes()) > 0) ?
               (timeEnd1.getMinutes() - timeStart1.getMinutes()) + " Minutes" :
               (timeEnd1.getSeconds() - timeStart1.getSeconds()) + " Seconds"));

/* Alternatively, you can do this with an If/Else if/Else statement */
if ((timeEnd1.getHours() - timeStart1.getHours()) > 0) {
    hourDiff1 = (timeEnd1 - timeStart1) / 3600000 + " Hours";  // 1 Hour = 3.6 * 10^6 ms
}
else if ((timeEnd1.getMinutes() - timeStart1.getMinutes()) > 0) {
    hourDiff1 = (timeEnd1.getMinutes() - timeStart1.getMinutes()) + " Minutes";
}
else {
    hourDiff1 = (timeEnd1.getSeconds() - timeStart1.getSeconds()) + " Seconds";
}


// Output the result
document.getElementById("estimate1").value = hourDiff1; 
document.getElementById("hidestimate1").value = hourDiff1; 
}
</script>

	
<script type="text/javascript">
  $(function() {

//   $('#datepicker').datepicker({
//     onSelect: function(dateText, inst) { 
//         window.location = 'http://mysite/events/Pages/default.aspx?dt=' + dateText;
//     }
// });

    $("#datepicker").datepicker({
        firstDay: 0,
        beforeShowDay: function (date) {

            var sunday = new Date();
            sunday.setHours(0,0,0,0);

            var d = new Date();
            var n = d.getDay();
            
            sunday.setDate(sunday.getDate() - (sunday.getDay() || 1));
            var saturday = new Date(sunday.getTime());
            
            saturday.setDate(sunday.getDate() + n);

            return [true, ''];
            // if (date > sunday && date <= saturday) {
            //   return [true, ''];
            // }
            // else {
            //   return [false, ''];
            // }
        },
        // onSelect: function(dateText, inst) { 
        //         window.location = 'forms.php?id=timesheetdaily&date=' + dateText;
        //     }
    });
});

  $(document).ready(function(){
        $('#datepicker').datepicker('show');
     });

</script>




</body>
</html>