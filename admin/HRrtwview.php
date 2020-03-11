    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="js/HRdatepicker.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<br><br>

<form action="" method="post">
 <input type="text" id="from" name="from" class="selector" required autocomplete="off"/> 

<label for="to">to</label> 
<input type="text" id="to" name="to" required autocomplete="off"/>
<input type="submit" name="submit" value="Proceed" class='btn btn-outline-success'>
</form>
<br><br>
<?php if (isset($_POST['submit'])) {
$from = $_POST['from'];
$to = $_POST['to'];

$datefrom = date("F d Y", strtotime($from));
$dateto = date("F d Y", strtotime($to));

echo "<center><h4>".$datefrom." - ".$dateto."</h4></center>";
 ?>
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>#</th>
            <!-- <th>Date of OT</th> -->
            <th>Name</th>
            <!-- <th>Time</th>
            <th>Reason</th>
            <th>Date Filed</th> -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // rtw_id, rtw_date, rtw_from, rtw_to, rtw_reason, rtw_attachment, rtw_datefiled, emp_id, if_filed
          $count=1;
          $sqlrtw = $db->prepare("SELECT DISTINCT emp_id FROM tbl_rtw WHERE rtw_date >= '" . $from . "' AND rtw_date <= '" . $to . "' AND if_filed='1' ORDER by rtw_date ASC");
          $sqlrtw->execute();
          while ($row = $sqlrtw->fetch(PDO::FETCH_ASSOC)) {
            $empid = $row['emp_id'];
            $sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$empid'");
          $sqlemp->execute();
          $rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);
            // $start = date("g:i A", strtotime($row['rtw_from']));
            // $stop = date("g:i A", strtotime($row['rtw_to']));
         ?>
        <tr>
            <td><?php echo $count; ?></td>
            <!-- <td><?php echo $row['rtw_date']; ?></td> -->
            <td><?php echo $rowemp['fname']." ".$rowemp['lname']; ?></td>
            <!-- <td><?php echo $start." - ".$stop; ?></td>
            <td><?php echo $row['rtw_reason'] ?></td>
            <td><?php echo $row['rtw_datefiled'] ?></td> -->
            <td><a href="HRrtwviewChk.php?id=<?php echo $row['emp_id']; ?>&date_from=<?php echo $from; ?>&date_to=<?php echo $to; ?>" target="_blank" class="btn btn-outline-success" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=900,height=500,toolbar=1,resizable=0'); return false;" >View</a></td>                
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>

<?php } ?>