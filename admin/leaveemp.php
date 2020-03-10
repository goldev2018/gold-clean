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
            <th>Date of Leave</th>
            <th>Total Days</th>
            <th>Reason</th>
            <th>Leave Nature</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // leave_id, leave_series, leave_counter, leave_period_from, leave_period_to, leave_total, leave_nature, leave_reason, leave_date, leave_docu, status, emp_id, annual_id, noted_by, approval_by
          $count=1;
          $sessemp_id = $_SESSION['emp_id'];
          $sqlleave = $db->prepare("SELECT * FROM tbl_leave WHERE emp_id='$sessemp_id'");
          $sqlleave->execute();
          while ($row = $sqlleave->fetch(PDO::FETCH_ASSOC)) {
         ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['leave_period_from']." - ".$row['leave_period_to']; ?></td>
            <td><?php echo $row['leave_total'] ?></td>
            <td><?php echo $row['leave_reason'] ?></td>
            <td>
                <?php 
                if ($row['leave_nature']=="1") {
                    echo "Annual leave";
                }
                elseif ($row['leave_nature']=="2") {
                    echo "Sick leave";
                }else{
                    echo "Special Leave";
                }
                ?>
            </td>
           
                <?php 
                if ($row['status']=="Approved" || $row['status']=="Checked") {
                    echo " <td>Approved</td>";
                }else{
                    echo "<td>Pending</td>";
                }
                ?>
            
              
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>