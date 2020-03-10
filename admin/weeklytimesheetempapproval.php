<?php set_time_limit(0); 


$sqltsn = $db->prepare("SELECT DISTINCT ts_weekstart, ts_weekend  FROM tbl_timesheet WHERE status='1' AND noted_by='$sessemp_id'");
$sqltsn->execute();
$tscountn = $sqltsn->rowCount();
if ($tscountn!=0) {
    echo "Pending Date:<br>";
}
while ($rowtsn = $sqltsn->fetch(PDO::FETCH_ASSOC)) {

echo $rowtsn['ts_weekstart']." - ".$rowtsn['ts_weekend'];
echo "<br>";
}



$sqltsa = $db->prepare("SELECT DISTINCT ts_weekstart, ts_weekend FROM tbl_timesheet WHERE status='2' AND approved_by='$sessemp_id'");
$sqltsa->execute();
$tscounta = $sqltsa->rowCount();
if ($tscounta!=0) {
    echo "Pending Date:<br>";
}
while ($rowtsa = $sqltsa->fetch(PDO::FETCH_ASSOC)) {
echo $rowtsa['ts_weekstart']." - ".$rowtsa['ts_weekend'];
echo "<br>";
}


?>
<script src="js/jquery.summarypicker.js" ></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable({
      "pageLength": 25
    });
} );
</script>
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
echo "<center><h5>";
echo $weekstart = $_POST['weekstart'];
echo " to ";
echo $weekend = $_POST['weekend'];

echo "</h5></center>";
$selemployee = $_SESSION['emp_id'];
// $selemployee = $_POST['selemployee'];
$weeknum = date("W", strtotime($weekstart));


echo "<br><br>";
// $directory = "weeklytimesheetchk.php?weekstart=".$weekstart."&weekend=".$weekend."&empID=".$selemployee;

$total = 0;
$count=1;


 ?>
<!-- <a href="<?php echo $directory; ?>" target="blank" class="btn btn-outline-success"  style="float: right;">Print</a> -->
<!-- ts_id, ts_weekstart, ts_weekend, ts_week, ts_sil, ts_ot, emp_id, status, noted_by, approved_by -->
<!-- emp_id, password, fname, lname, mi, position, company, department, email, image, u_type, status, request, is_active, signature -->
 <div class="table-responsive">
<table id="myTable" class="display">
    <thead>
        <tr>
            <th width="20px">#</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php 
      $sql12 = $db->prepare("SELECT * FROM tbl_timesheet WHERE ts_weekstart='$weekstart' AND ts_weekend='$weekend' AND ts_week='$weeknum'");
$sql12->execute();
while ($row12 = $sql12->fetch(PDO::FETCH_ASSOC)) {
  $check = $row12['ts_id']; ?>

        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row12['emp_id']; ?></td>
            <?php 
            $emp = $row12['emp_id'];
            $sql2 = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$emp'");
            $sql2->execute();
            $row2 = $sql2->fetch(PDO::FETCH_ASSOC); ?>
            <td><?php echo $row2['fname']." ".$row2['lname']; ?></td>
            <?php if ($selemployee==$row12['noted_by']) { ?>

           <?php 
           if ($row12['status']=="1") { ?>
            <td><a href="viewweeklytimesheet.php?weekstart=<?php echo $weekstart?>&weekend=<?php echo $weekend?>&empID=<?php echo $row12['emp_id'] ?>" target="_blank" class="btn btn-outline-primary">View</a>  <a href="weeklytimesheetempapprovalChk.php?id=<?php echo $row12['ts_id']?>&stat=2" target="_blank" class="btn btn-outline-success">Note</a></td>
            <?php }elseif($row12['status']=="2"){ ?>
            <td>For Approval</td>
            <?php }elseif($row12['status']=="0"){ ?>
              <td>Pending</td>
            <?php }else{ ?>
            <td>Approved</td>
            <?php }
         }elseif($selemployee==$row12['approved_by']){ ?>
            <?php 
            if ($row12['status']=="1") { ?>
            <td>For Note</td>
            <?php }elseif($row12['status']=="2"){ ?>
              <td><a href="viewweeklytimesheet.php?weekstart=<?php echo $weekstart?>&weekend=<?php echo $weekend?>&empID=<?php echo $row12['emp_id'] ?>" target="_blank" class="btn btn-outline-primary">View</a>  <a href="weeklytimesheetempapprovalChk.php?id=<?php echo $row12['ts_id']?>&stat=3" target="_blank" class="btn btn-outline-success">Approve</a></td>
            <?php }elseif($row12['status']=="0"){ ?>
              <td>Pending</td>
            <?php }else{ ?>
              <td>Approved</td>
            <?php }
           }else{
            if ($row12['status']=="1") {
            echo "<td>Note</td>";
            }elseif ($row12['status']=="2") {
            echo "<td>For Approval</td>";
            }elseif ($row12['status']=="0") {
            echo "<td>Pending</td>";
            }else{
            echo "<td>Approved</td>";
            }
             
           }?>
            
        </tr>
      <?php
      $count++;
        } ?>

    </tbody>
</table>
</div>


<?php 


}?>

 <br /> <br />
 <br /> <br />
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


