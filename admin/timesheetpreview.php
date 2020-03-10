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
