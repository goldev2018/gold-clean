<link rel="stylesheet" type="text/css" href="css/timepicker.css" />
<form action="obSubmit.php" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">
<p>Date: &nbsp;&nbsp;<h7 id="todaydate"></h7><br /> Ref. No: <h7 id="todayrefnum"></h7></p>
<p>REQUISITION FOR LOCAL BUSINESS TRAVEL</p>
<p>&nbsp;</p>
<table style="height: 299px; width: 603px;" border="1">
<tbody>
<tr style="height: 14px;">
<td style="width: 176px; height: 14px;">NAME:</td>
<td style="width: 419px; height: 14px;"><?php echo $sessfname." ".$sesslname; ?></td>
</tr>
<tr style="height: 38px;">
<td style="width: 176px; height: 38px;">
<p>DEPARTMENT:</p>
</td>
<td style="width: 419px; height: 38px;"><?php echo $sesscompany."/".$sessdepartment; ?></td>
</tr>
<tr style="height: 28px;">
<td style="width: 176px; height: 28px;">
<p>DATE OF TRAVEL &amp;</p>
</td>
<td style="width: 419px; height: 28px;"><input id="noSunday" type="text" name="dot"></td>
</tr>
<tr style="height: 44px;">
<td style="width: 176px; height: 44px;">
<p>ROUTING REQUESTED:</p>
</td>
<td style="width: 419px; height: 44px;"><textarea rows="4" cols="50" name="route"></textarea></td>
</tr>
<tr style="height: 25px;">
<td style="width: 176px; height: 25px;">&nbsp;</td>
<td style="width: 419px; height: 25px;">
<!-- <p>Time Range: <span class="slider-time">10:00 AM</span> - <span class="slider-time2">12:00 PM</span> -->

	From:<input type="text" id="from" name="from" value="10:00 AM" size="10">
	To:<input type="text" id="to" name="to" value="12:00 PM" size="10">

    </p>

	<div class="sliders_step1">
        <div id="slider-range"></div>
    </div></td>
</tr>
<tr style="height: 14px;">
<td style="width: 176px; height: 14px;">
<p>PURPOSE OF TRAVEL:</p>
<p>&nbsp;</p>
</td>
<td style="width: 419px; height: 14px;"><textarea rows="4" cols="50" name="purpose"></textarea></td>
</tr>


<tr style="height: 14px;">
<td style="width: 176px; height: 14px;">ESTIMATED EXPENSES:</td>
<td style="width: 419px; height: 15px;"><input type="text" name="estimate" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)" /></td>
</tr>


<tr style="height: 15px;">
<td style="width: 176px; height: 15px;">CASH ADVANCED:</td>
<td style="width: 419px; height: 15px;"><input type="text" name="advance" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)" /></td>
</tr>
</tbody>
</table>
<br>


 <table style="width: 497px;">
<tbody>
<tr>
<td style="width: 400px;">PROJECT TO BE CHARGED:</td>
<td style="width: 296px;"><input type="text" name="project" size="30"></td>
</tr>
<tr>
<td style="width: 213px;">OTHER/CODE:</td>
<td style="width: 296px;"><input type="text" name="others" size="30"></td>
</tr>
</tbody>
</table>

<input class="btn btn-success" type="submit" name="submitOB" value="Submit">
</form>
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