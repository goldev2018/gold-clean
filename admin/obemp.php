<?php set_time_limit(0); ?>
<script src="js/jquery.summarypicker.js" ></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<!-- <form action="summaryreportchk.php" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}" target="_blank"> -->
<button type="button" onclick="window.open('forms/Liquidation - New 2020.xlsx')" class="btn btn-info btn-lg" style="float: right;">Liquidation Form</button>
<br><br>
<br>



 <link href="css/sb-admin-2.css" rel="stylesheet">
<!--  <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script> -->
<!-- <center><img src="img/footer-logo1.png"></center> -->

<?php 
include('includes/config.php'); 


$selemployee = $_SESSION['emp_id'];

// $directory = "weeklytimesheetchk.php?weekstart=".$weekstart."&weekend=".$weekend."&empID=".$selemployee;
// ob_id, ob_series, ob_counter, ob_dateTravel, ob_route, ob_from, ob_to, ob_purpose, ob_estimate, ob_cash, ob_project, ob_others, ob_date, emp_id, status, requested_by, approved_by
$count=1;
$series = date("y");
$seriess = "OB-GOLD-".$series;
$sql1 = $db->prepare("SELECT * FROM tbl_ob WHERE ob_series='$seriess' AND emp_id='$selemployee'");
$sql1->execute();

 ?>
<!-- <a href="<?php echo $directory; ?>" target="blank" class="btn btn-outline-success"  style="float: right;">Print</a> -->
<!-- ts_id, ts_weekstart, ts_weekend, ts_week, ts_sil, ts_ot, emp_id, status, noted_by, approved_by -->
<!-- emp_id, password, fname, lname, mi, position, company, department, email, image, u_type, status, request, is_active, signature -->
<table id="myTable" class="display">
    <thead>
        <tr>
            <th width="20px">#</th>
            <th>Ref #</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php while ($row1 = $sql1->fetch(PDO::FETCH_ASSOC)) {?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row1['ob_series']." - ".$row1['ob_counter']; ?></td>
            <td><?php echo $row1['emp_id']; ?></td>
            <?php 
            $emp = $row1['emp_id'];
            $sql2 = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$emp'");
            $sql2->execute();
            $row2 = $sql2->fetch(PDO::FETCH_ASSOC); ?>
            <td><?php echo $row2['fname']." ".$row2['lname']; ?></td>
            <?php 
            if ($row1['status']=="1") { ?>
              <td>Pending</a></td>
              <td>Please wait for approval</td>
            <?php }else{ ?>
              <td>Approved</td>
              <?php if ($row1['ob_liquidation']=="") {?>
                <td><a href="obliquidate.php?id=<?php echo $row1['ob_id']; ?>" target="_blank" class="btn btn-outline-primary">Liquidatation</a></td>
              <?php }else{ ?>

              <?php } ?>
            
            <?php } ?>
            
        </tr>
      <?php
      $count++;
        } ?>

    </tbody>
</table>

