    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>




<br><br><br>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Date Hired</th>
            <th>Annual Count</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // annual_id, annual_count, dateHired, if_status, emp_id
          $count=1;
          $sqlleave = $db->prepare("SELECT * FROM tbl_annual ORDER BY annual_id ASC");
          $sqlleave->execute();
          while ($row = $sqlleave->fetch(PDO::FETCH_ASSOC)) {
         ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['emp_id']; ?></td>
            <td>
                <?php
                $leave_empid = $row['emp_id'];
                $sqlleaveemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$leave_empid'");
                $sqlleaveemp->execute();
                $rowemp = $sqlleaveemp->fetch(PDO::FETCH_ASSOC);
                echo $rowemp['fname']." ".$rowemp['lname'];
                 ?>
            </td>
            <td><?php echo date("M/d/Y", strtotime($row['dateHired'])); ?></td>
            <td><?php echo $row['annual_count'] ?></td>
            
            
              
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>

