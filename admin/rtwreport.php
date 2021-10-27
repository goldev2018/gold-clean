    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Date of OT</th>
            <th>Name</th>
            <th>Time</th>
            <th>Reason</th>
            <th>Date Filed</th>
            <th>Hours</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // ot_id, ot_date, ot_from, ot_to, ot_reason, ot_hours, ot_attachment, ot_noted, ot_datefiled, emp_id
          $count=1;
          $sessemp_id = $_SESSION['emp_id'];
          $sqlrtw = $db->prepare("SELECT * FROM tbl_ot ORDER BY ot_date ASC");
          $sqlrtw->execute();
          while ($row = $sqlrtw->fetch(PDO::FETCH_ASSOC)) {
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
            <td><?php echo $rowemp['fname']." - ".$rowemp['lname']; ?></td>
            <td><?php echo $start." - ".$stop; ?></td>
            <td><?php echo $row['ot_reason'] ?></td>
            <td><?php echo $row['ot_datefiled'] ?></td>
            <td><?php echo $row['ot_hours'] ?></td>
                <?php 
                if ($row['if_noted']=="0") { ?>
                    <td><a href="rtwapprovalChk.php?id=<?php echo $row['ot_id']; ?>" target="_blank" class="btn btn-outline-success">Approved</a></td>
                <?php }else{
                    echo "<td>Approved</td>";
                }
                ?>
            
              
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>