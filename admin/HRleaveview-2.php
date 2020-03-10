    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float: right;">Summary Report</button>



<br><br><br>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <!-- <th>Ref No.</th> -->
            <th>Employee ID</th>
            <th>Name</th>
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
          $sqlleave = $db->prepare("SELECT * FROM tbl_leave ORDER BY leave_id ASC");
          $sqlleave->execute();
          while ($row = $sqlleave->fetch(PDO::FETCH_ASSOC)) {
         ?>
        <tr>
            <td><?php echo $count; ?></td>
            <!-- <td><?php echo $row['leave_series']." - ".$row['leave_counter']; ?></td> -->
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
            <td><?php echo date("M/d/Y", strtotime($row['leave_period_from']))." - ".date("M/d/Y", strtotime($row['leave_period_to'])); ?></td>
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
                }elseif ($row['status']=="Decline") {
                    echo "<td>Decline</td>";
                }else{
                    echo "<td>Pending</td>";
                }
                ?>
            
              
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Summary Report</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

          <select id="inputGroupSelect04" name="selemployee" required="" onchange="this.form.submit()">
    <option selected value="">Choose Employee...</option>
    <?php 
    $sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id NOT IN ('admin') ");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?>
    <option data-href="summaryleave.php?id=<?php echo $row['emp_id']; ?>"><?php echo $row['fname']." ".$row['lname'] ?></option>
    <?php } ?>
  </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
    $(function(){
    $("#inputGroupSelect04").change(function(){
    var href=$("#inputGroupSelect04 > option:selected").attr("data-href");
    window.open(href,"_blank");
  })
})
</script>