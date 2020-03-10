<?php 
date_default_timezone_set("Asia/Manila");


$date=$_GET['date'];
// $newDate = date("d-m-Y", strtotime($date));
$todate = date("M-d-Y", strtotime($date));
$week = date("W");
$sqlts = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_week='$week' AND emp_id='$sessemp_id'");
$sqlts->execute();
$rowts = $sqlts->fetch(PDO::FETCH_ASSOC);
$rowts_id = $rowts['ts_id'];
$tottime=0;
// $showremaining=0;
$info_total=0;
$sqltsi = $db->prepare("SELECT * FROM tbl_timesheetinfo WHERE tsinfo_date='$todate' AND ts_id='$rowts_id'");
$sqltsi->execute();
$numcount = $sqltsi->rowCount();
while ($rowtsi = $sqltsi->fetch(PDO::FETCH_ASSOC)){
$tottime += $rowtsi['tsinfo_time'];
$info_total = $rowtsi['tsinfo_total'];

}

$showremaining = $info_total - $tottime;

if ($showremaining==0) { ?>
<style type="text/css">
            #addedrow {
                visibility:hidden;
            }
</style>
<?php 
}
 ?>
<?php $n = date("N", strtotime($_GET['date'])); ?>
<link rel="stylesheet" type="text/css" href="css/sb-admin-2.css" />

    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>


<script type="text/javascript">

$("input[placeholder]").each(function () {
        $(this).attr('size', $(this).attr('placeholder').length);
    });

        function getlate() {

            // var d = new Date();
            // var n = d.getDay();
            var n = "<?php echo $n ?>";
            if (n==6) {
                var totalhours = 4;
            }
            else{
                var totalhours = 8;
            }
            var flexi = "<?php echo $sessemp_id ?>";
            if (flexi=="GOLD-AR-004") {
                var totalhours = 12;
            }
            var lateminute = document.getElementById('late').value;
            var latetotal = parseInt(lateminute) / 60;
            var result = (Math.round(latetotal*100)/100);
            // document.getElementById('total_minute').innerHTML = result;
            var resulttotal = totalhours - result;
            var resulttotal2 = (Math.round(resulttotal*100)/100);
            alert("Total hours reamining: "+resulttotal2);

            document.getElementById('total_minute').innerHTML = "Remaining hours: "+resulttotal2+" hour(s)";
            document.getElementById('totaltime').value = resulttotal2;
            document.getElementById('total_minutes').value = resulttotal2;
             document.getElementById("addedrow").style.visibility = "visible";
            // if (resulttotal2<0) {
            //     var num = 3;
            // var resulttota3 = num - result;
            // var resulttotal4 = (Math.round(resulttota3*100)/100);
            // alert(resulttotal4);
            // }else if (resulttotal2==0) {
            //     var num = 2;
            // var resulttota3 = num - result;
            // var resulttotal4 = (Math.round(resulttota3*100)/100);
            // alert(resulttotal4);
            // }
            // else{
            // alert(resulttotal2);
            // }
        }
</script>

<br><br>
<form action="timesheetchk.php" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">
    <input type="hidden" name="hiddenedittimesheet" value="<?php echo $todate; ?>">
<p>Name: <?php echo $sessfname." ".$sesslname; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Date: <h7 id="todaydate"></h7><br />Position: <?php echo $sessposition?>
<?php 
if ($numcount==0) { ?>

<input type="number" name="late" id="late" placeholder="Enter minutes late (1-59)     " style="float: right;" onchange="getlate();" width="148px"><br>
 <p id="total_minute"></p>
 <input type="hidden" name="totaltime" id="totaltime">
 <input type="hidden" name="total_minutes" id="total_minutes">
<?php }else{ ?>

 <input type="number" name="late" id="late" placeholder="Enter minutes late (1-59)     " style="float: right; visibility: hidden;" onchange="getlate();" width="148px">
 <p>Remaining hours: <?php echo $showremaining; ?>  hour(s)</p>
  <p id="total_minute"></p>
 <input type="hidden" name="totaltime" id="totaltime" value="<?php echo $info_total ?>">
 <input type="hidden" name="total_minutes" id="total_minutes" value="<?php echo $info_total ?>">
<?php } ?>

 <br><br>



<!-- input details -->



<?php if ($numcount==0) { ?>
<div id="addedrow" style="visibility: hidden;">
<div>
    <select class='custom-select country' id='inputGroupSelect04' name='selproj[]'><option selected value=''>Choose Project</option><?php  $sqlopt = $db->prepare("SELECT * FROM tbl_country"); $sqlopt->execute();while ($rowopt = $sqlopt->fetch(PDO::FETCH_ASSOC)){ ?>
    <optgroup label='<?php echo $rowopt['country_name']; ?>'><?php 
    echo $cou_id = $rowopt['country_id'];
    $sql = $db->prepare("SELECT * FROM tbl_project WHERE country_id='$cou_id'"); $sql->execute();
     while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value='<?php echo $row['project_id'] ?>'><?php echo $row['project_name'] ?></option><?php }?>
     </optgroup><?php } ?></select>
</div>
<div>
    <select class='custom-select city' id='inputGroupSelect05' name='seljob[]' required><option value="">Choose Job Code</option></select>
</div>
<div>
    <textarea name='desc[]' id="desc" rows='3' cols='80' required></textarea>
</div>
<div style="width: 44px; height: 13px;">
    <input type='number' class='num' name='num[]' id='tsMon' size='3'  min='0' max='8' step='.01' onblur='findTotal()' required>
</div>
<?php if ($showremaining==0) { ?>
<div style="width: 20px; height: 13px;"><input type="text" id="total" name="total" value="<?php echo $tottime; ?>" required readonly size="2"/></div>
<?php }else{ ?>
    <div style="width: 20px; height: 13px;"><input type="text" id="total" name="total" value="" required readonly size="2"/></div>
<?php } ?>
</div>
<?php }else{ ?>

    <div  id="addedrow">
<div>
    <select class='custom-select country' id='inputGroupSelect04' name='selproj[]'><option selected value=''>Choose Project</option><?php  $sqlopt = $db->prepare("SELECT * FROM tbl_country"); $sqlopt->execute();while ($rowopt = $sqlopt->fetch(PDO::FETCH_ASSOC)){ ?>
    <optgroup label='<?php echo $rowopt['country_name']; ?>'><?php 
    echo $cou_id = $rowopt['country_id'];
    $sql = $db->prepare("SELECT * FROM tbl_project WHERE country_id='$cou_id'"); $sql->execute();
     while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value='<?php echo $row['project_id'] ?>'><?php echo $row['project_name'] ?></option><?php }?>
     </optgroup><?php } ?></select>
</div>
<div>
    <select class='custom-select city' id='inputGroupSelect05' name='seljob[]' required><option value="">Choose Job Code</option></select>
</div>
<div>
    <textarea name='desc[]' id="desc" rows='3' cols='80' required></textarea>
</div>
<div style="width: 44px; height: 13px;">
    <input type='number' class='num' name='num[]' id='tsMon' size='3'  min='0' max='8' step='.01' onblur='findTotal()' required>
</div>
<?php if ($showremaining==0) { ?>
<div style="width: 20px; height: 13px;"><input type="text" id="total" name="total" value="<?php echo $tottime; ?>" required readonly size="2"/></div>
<?php }else{ ?>
    <div style="width: 20px; height: 13px;"><input type="text" id="total" name="total" value="" required readonly size="2"/></div>
<?php } ?>
</div>

<?php } ?>



<!-- end input details -->









 <br>
 <!-- <img src="img/decimal.png" style="float: right;"> -->
 <div class="table-responsive">
<table style="height: 29px; width: 100%;" border="1" id="sampleTable">
<tbody>
<tr style="height: 29px;" class="sampleHeader">
<td style="width: 800; text-align: center; height: 29px;" rowspan="2">
<p>Project Name</p>
</td>
<td style="width: 800; text-align: center; height: 29px;" rowspan="2">Job Code<br />Job ID Phase ID</td>
<td style="width: 492px; text-align: center; height: 29px;" rowspan="2">
<p>Description</p>
</td>
<td style="width: 30px; text-align: center; height: 29px;" colspan="2">Working <br> Hours
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
<tr class="daytotal">
<td style="width: 44px; height: 13px; text-align: center;"><?php echo date("D", strtotime($date)); ?></td>
<td style="width: 20px; height: 13px; text-align: center;">Total</td>

</tr>



        <script type="text/javascript">
function findTotal(){
    var arr = document.getElementsByClassName('num');
    var tot=0;
    var qwe=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);
    }
    var totaltime = document.getElementById('totaltime').value;

    if(totaltime < tot){
alert("The textfield is greater than "+totaltime);
   document.getElementById('total').value = ""; 
   document.getElementById("submit").style.visibility = "hidden";
}else{
document.getElementById('total').value = tot;
   document.getElementById("submit").style.visibility = "visible";
}
}
</script>
<?php 
if ($numcount!=0) {
    $sqltsi = $db->prepare("SELECT * FROM tbl_timesheetinfo WHERE tsinfo_date='$todate' AND ts_id='$rowts_id'");
$sqltsi->execute();
    while ($rowtsi = $sqltsi->fetch(PDO::FETCH_ASSOC)){
        $compproj = $rowtsi['project_id'];
        $compprojinfo = $rowtsi['proj_info_id'];

        $sqlproj = $db->prepare("SELECT * FROM tbl_project WHERE project_id='$compproj'");
$sqlproj->execute();
$rowproj = $sqlproj->fetch(PDO::FETCH_ASSOC);

$sqlproji = $db->prepare("SELECT * FROM tbl_project_info WHERE proj_info_id='$compprojinfo'");
$sqlproji->execute();
$rowproji = $sqlproji->fetch(PDO::FETCH_ASSOC);
    ?>
    <tr>
<td><?php echo $rowproj['project_name'];?>  </td>
<td><?php echo $rowproji['proj_info_codes']." - ".$rowproji['proj_info_building'];?></td>
<td style="width: 44px; height: 13px;"><?php echo $rowtsi['tsinfo_desc']; ?></td>
<td  style="width: 20px; height: 13px;"><input type="text" name="showtime" class="num" value="<?php echo $rowtsi['tsinfo_time']; ?>" readonly></td>
<td style="width: 20px; height: 13px;"></td>
</tr>
<?php } }?>


<tr>
<td></td>
<td></td>
<td></td>
<td style="width: 44px; height: 13px;"></td>
 <?php if ($showremaining==0) { ?>
<td style="width: 20px; height: 13px;"><input type="text" id="total" name="total" value="<?php echo $tottime; ?>" required readonly size="2"/></td>
<?php }else{ ?>
    <td style="width: 20px; height: 13px;"><input type="text" id="total" name="total" value="" required readonly size="2"/></td>
<?php } ?>
 

</tr>

</tbody>
</table>
</div>
<br>
<center>
<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-outline-success" style="visibility:hidden; float: left;">
</center>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script>
  $(document).ready(function(){  
        setInterval(function(){   
            $("#todaydate").load("todate.php");
        }, 1000);
    });
$('#desc').on('keypress', function (e) {
        var ingnore_key_codes = [34, 39];
        if ($.inArray(e.which, ingnore_key_codes) >= 0) {
            e.preventDefault();
        }
    });
//   $(document).ready(function() {
//   $(window).keydown(function(event){
//     if(event.keyCode == 13) {
//       event.preventDefault();
//       return false;
//     }
//   });
// });
//   $(document).ready(function() {
// if (document.getElementById('desc').hasFocus()) {
//             $(document).keydown(function(event) {
//                 if(event.keyCode == 13) {
//                   event.preventDefault();
//                   return true;
//                 }
//             });
//         }else{
//             $(document).keydown(function(event) {
//                 if(event.keyCode == 13) {
//                   event.preventDefault();
//                   return false;
//                 }
//             });
//         }
//   });      
</script>
</form>




<?php include 'includes/config.php'; ?>









  <br/><br/>
<!-- <label>City :</label><select name="seljob" class="city">
<option>Select City</option>
</select> -->

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".country").change(function()
{
var country_id=$(this).val();
var post_id = 'id='+ country_id;
 
$.ajax
({
type: "POST",
url: "ajaxData.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".city").html(cities);
} 
});
 
});
});
</script>
</body>
</html>