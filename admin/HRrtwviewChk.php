<?php include 'includes/config.php'; ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<?php 
$id = $_GET['id'];
$date_from = $_GET['date_from'];
$date_to = $_GET['date_to'];

$directory = "HRrtwprint.php?weekstart=".$date_from."&weekend=".$date_to."&id=".$id;
 ?>

<form action="<?php echo $directory; ?>" method="post">
<!-- <a href="<?php echo $directory; ?>" target="_blank" class="btn btn-outline-success"  style="float: right;">Save & Print</a> -->
<input type="submit" name="subprint" value="Save & Print" class="btn btn-outline-success"  style="float:right;background-color: #1cc88a;border: none;color:">
<br><br><br>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Date of OT</th>
            <th>Name</th>
            <th>Time</th>
            <th>Reason</th>
            <th>Date Filed</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // rtw_id, rtw_date, rtw_from, rtw_to, rtw_reason, rtw_attachment, rtw_datefiled, emp_id, if_filed
          $count=1;
          $sqlrtw = $db->prepare("SELECT * FROM tbl_rtw WHERE rtw_date >= '" . $date_from . "' AND rtw_date <= '" . $date_to . "' AND emp_id='$id' AND if_filed='1' ORDER by rtw_date ASC");
          $sqlrtw->execute();
          while ($row = $sqlrtw->fetch(PDO::FETCH_ASSOC)) {
            $empid = $row['emp_id'];
            $sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$empid'");
          $sqlemp->execute();
          $rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);
            $start = date("g:i A", strtotime($row['rtw_from']));
            $stop = date("g:i A", strtotime($row['rtw_to']));
         ?>
        <tr>
            <td><?php echo $count; ?></td>
             <td><?php echo $row['rtw_date']; ?></td>
            <td><?php echo $rowemp['fname']." ".$rowemp['lname']; ?></td>
            <td><?php echo $start." - ".$stop; ?></td>
            <td><?php echo $row['rtw_reason'] ?></td>
            <td><?php echo $row['rtw_datefiled'] ?></td>
            <td>
              <?php if ($row['rtw_attachment']!="") {?>
              <a href='documentviewer.php?dir=<?php echo $row['rtw_attachment']; ?>' style='background-color: #1cc88a;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;' target="blank">Print Attachment</a>
            <?php } ?>
            </td>
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>
