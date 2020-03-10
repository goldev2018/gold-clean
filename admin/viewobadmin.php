<?php 
include 'includes/config.php';
$id = $_GET['id'];

$sqlob = $db->prepare("SELECT * FROM tbl_ob WHERE ob_id='$id'");
$sqlob->execute();
$rowob = $sqlob->fetch(PDO::FETCH_ASSOC);
$emp = $rowob['emp_id'];
// $rowob['']
$sql2 = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$emp'");
$sql2->execute();
$row2 = $sql2->fetch(PDO::FETCH_ASSOC); ?>
<!-- ob_id, ob_series, ob_counter, ob_dateTravel, ob_route, ob_from, ob_to, ob_purpose, ob_estimate, ob_cash, ob_project, ob_others, ob_date, emp_id, status, requested_by, approved_by
 -->
 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <body onload="window.print()" onblur="window.close();">
 
<center><img src="img/gold.png" width="80%"><br><br>
<!-- <link rel="stylesheet" type="text/css" href="css/timepicker.css" /> -->
<p>Date: &nbsp;&nbsp;<!-- <h7 id="todaydate"></h7> --><?php echo $rowob['ob_date']; ?><br />
 Ref. No: <h7><?php echo $rowob['ob_series']." - ".$rowob['ob_counter']; ?></h7></p>
<p>REQUISITION FOR LOCAL BUSINESS TRAVEL</p>
<p>&nbsp;</p>
<table style="height: 299px; width: 603px;" border="1">
<tbody>
<tr style="height: 14px;">
<td style="width: 176px; height: 14px;">NAME:</td>
<td style="width: 419px; height: 14px;"><?php echo $row2['fname']." ".$row2['lname']; ?></td>
</tr>
<tr style="height: 38px;">
<td style="width: 176px; height: 38px;">
<p>DEPARTMENT:</p>
</td>
<td style="width: 419px; height: 38px;"><?php echo $row2['company']."/".$row2['department']; ?></td>
</tr>
<tr style="height: 28px;">
<td style="width: 176px; height: 28px;">
<p>DATE OF TRAVEL &amp;</p>
</td>
<td style="width: 419px; height: 28px;">
  <!-- <input id="noSunday" type="text" name="dot"><input id="noSunday2" type="text" name="dot2"> -->
 <?php echo $rowob['ob_dateTravel']; ?>

</td>
</tr>
<tr style="height: 44px;">
<td style="width: 176px; height: 44px;">
<p>ROUTING REQUESTED:</p>
</td>
<td style="width: 419px; height: 44px;"><?php echo $rowob['ob_route']; ?></td>
</tr>
<tr style="height: 25px;">
<td style="width: 176px; height: 25px;">&nbsp;</td>
<td style="width: 419px; height: 25px;">
<!-- <p>Time Range: <span class="slider-time">10:00 AM</span> - <span class="slider-time2">12:00 PM</span> -->

	From:<?php echo $rowob['ob_from']; ?>
	To:<?php echo $rowob['ob_to']; ?>

    </p></td>
</tr>
<tr style="height: 14px;">
<td style="width: 176px; height: 14px;">
<p>PURPOSE OF TRAVEL:</p>
<p>&nbsp;</p>
</td>
<td style="width: 419px; height: 14px;"><?php echo $rowob['ob_purpose']; ?></td>
</tr>


<tr style="height: 14px;">
<td style="width: 176px; height: 14px;">ESTIMATED EXPENSES:</td>
<td style="width: 419px; height: 15px;"><?php echo $rowob['ob_estimate']; ?></td>
</tr>


<tr style="height: 15px;">
<td style="width: 176px; height: 15px;">CASH ADVANCED:</td>
<td style="width: 419px; height: 15px;"><?php echo $rowob['ob_cash']; ?></td>
</tr>
</tbody>
</table>
<br>


 <table style="width: 497px;">
<tbody>
<tr>
<td style="width: 400px;">PROJECT TO BE CHARGED:</td>
<td style="width: 296px;"><?php echo $rowob['ob_project']; ?></td>
</tr>
<tr>
<td style="width: 213px;">OTHER/CODE:</td>
<td style="width: 296px;"><?php echo $rowob['ob_others']; ?></td>
</tr>
<tr>
  <td> REQUESTED BY: </td>
  <td><?php echo $rowob['requested_by']; ?></td></tr>
</tbody>
</table>
<br>


 APPROVED BY: 
    <?php 
    $appemp = $rowob['approved_by'];
    $sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$appemp'");
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
 ?>
      <img src="<?php echo $row['signature']; ?>" style="max-height: 100px">
<br><br>

</center>
 </body>
 </html>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js">
</script>

<script src="js/timepicker.js"></script>
<script src="js/numberwithcomma.js"></script>



<script type="text/javascript">
  $( "#noSunday" ).datepicker({ 
        beforeShowDay: noSunday,
        minDate: 0
});
 

function noSunday(date){ 
          var day = date.getDay(); 
                      return [(day > 0), '']; 
      }; 


        $(document).ready(function(){  
        setInterval(function(){   
            $("#todaydate").load("todate.php");
        }, 1000);
    });


         $(document).ready(function(){  
        setInterval(function(){   
            $("#todayrefnum").load("obrefnum.php");
        }, 1000);
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="js/obdatepicker.js"></script>