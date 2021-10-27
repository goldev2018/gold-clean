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

$directory = "HRotsprint.php?weekstart=".$date_from."&weekend=".$date_to."&id=".$id;
 ?>

<form action="<?php echo $directory; ?>" method="post">
<!-- <a href="<?php echo $directory; ?>" target="_blank" class="btn btn-outline-success"  style="float: right;">Save & Print</a> -->
<input type="submit" name="subprint" value="Print" class="btn btn-outline-success"  style="float:right;background-color: #1cc88a;border: none;color:">
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
        // ot_id, ot_date, ot_from, ot_to, ot_reason, ot_hours, ot_attachment, ot_noted, ot_datefiled, emp_id, rtw_id, if_noted
          $count=1;
          $sqlots = $db->prepare("SELECT * FROM tbl_ot WHERE ot_date >= '" . $date_from . "' AND ot_date <= '" . $date_to . "' AND emp_id='$id' AND if_noted='1' ORDER by ot_date ASC");
          $sqlots->execute();
          while ($row = $sqlots->fetch(PDO::FETCH_ASSOC)) {
            $empid = $row['emp_id'];
            $sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$empid'");
          $sqlemp->execute();
          $rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);
            $start = date("g:i A", strtotime($row['ot_from']));
            $stop = date("g:i A", strtotime($row['ot_to']));
         ?>
        <tr>
            <td><?php echo $count; ?></td>
             <td><?php echo $row['ot_date']; ?></td>
            <td><?php echo $rowemp['fname']." ".$rowemp['lname']; ?></td>
            <td><?php echo $start." - ".$stop; ?></td>
            <td><?php echo $row['ot_reason'] ?></td>
            <td><?php echo $row['ot_datefiled'] ?></td>
            <td>
              <?php if ($row['ot_attachment']!="") {?>
              <a href='documentviewer.php?dir=<?php echo $row['ot_attachment']; ?>' style='background-color: #1cc88a;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;' target="blank">Print Attachment</a>
            <?php } ?>
            </td>
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>
