    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float: right;">Summary Report</button> -->



<br><br><br>
 <div class="table-responsive">
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Ref No.</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Date of Travel</th>
            <th>Route</th>
            <th>Time</th>
            <th>Purpose</th>
            <th>Status</th>
            <th>Print</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // ob_id, ob_series, ob_counter, ob_dateTravel, ob_route, ob_from, ob_to, ob_purpose, ob_estimate, ob_cash, ob_project, ob_others, ob_date, emp_id, status, requested_by, approved_by, ob_liquidation
          $count=1;
          $sqlob = $db->prepare("SELECT * FROM tbl_ob ORDER BY ob_date ASC");
          $sqlob->execute();
          while ($row = $sqlob->fetch(PDO::FETCH_ASSOC)) {
         ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['ob_series']." - ".$row['ob_counter']; ?></td>
            <td><?php echo $row['emp_id']; ?></td>
            <td>
                <?php
                $ob_empid = $row['emp_id'];
                $sqlobemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$ob_empid'");
                $sqlobemp->execute();
                $rowemp = $sqlobemp->fetch(PDO::FETCH_ASSOC);
                echo $rowemp['fname']." ".$rowemp['lname'];
                 ?>
            </td>
            <td><?php echo $row['ob_dateTravel'] ?></td>
            <td><?php echo $row['ob_route'] ?></td>
            <td><?php echo $row['ob_from']." - ".$row['ob_to']; ?></td>
            <td><?php echo $row['ob_purpose'] ?></td>
            
                <?php 
                if ($row['status']=="1") {
                    echo "<td>Pending</td>";
                    echo "<td>Please wait for approval</td><td></td>";
                }
                else{
                    echo "<td>Approved</td>";
                    if ($row['ob_liquidation']!="") { 
                    echo "<td><a href='viewobadmin.php?id=".$row['ob_id']."' target='_blank' class='btn btn-outline-success'>OB</a> <a href='obviewer.php?dir=".$row['ob_liquidation']."' target='_blank' class='btn btn-outline-primary'>Liquidation</a></td>";
                     }else{
                      echo "<td><a href='viewobadmin.php?id=".$row['ob_id']."' target='_blank' class='btn btn-outline-success'>OB</a></td>";  
                     }
                    
                }
                ?>
           
            
              
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>
</div>