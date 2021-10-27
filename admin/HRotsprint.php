<?php include 'includes/config.php'; ?>
 <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>


<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

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
<style type="text/css">
  @font-face{
    font-family: arial;
    src:url(font/arial.ttf);
    font-family: times;
    src:url(font/times.ttf);
  }
  td{
    font-family: Times New Roman;
    font-size: 21px;
    text-align: center;
    height: 10px;
  }
  div{
    font-family: Times New Roman;
    font-size: 25px;
  }
   .prepapp{
    font-family: Times New Roman;
    font-size: 15px;
  }
</style>
</head>
<body>


<br>

<?php  
$from = $_GET['weekstart'];
$to = $_GET['weekend'];
$id = $_GET['id'];

$sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$id'");
$sqlemp->execute();
$rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);

 ?>
 <center><img src="img/gold.png" width="80%"><br>
 <font style="font-family: arial;font-size: 26px">(PHILIPPINES OFFICE – MANILA)<br>
  <b><u>OVERTIME SLIP (OTS)</u></b></font></center>
<br><br><br><br>
 
<div class="container-fluid">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4">Date:<u><?php echo date("F d Y");?></u></div>
  <div class="col-md-2"></div>
  <div class="col-md-4">
    Department:<u><?php echo $rowemp['department']; ?></u>
      <!-- Date:&emsp;<?php echo date("F d Y");?> -->
    </div>
</div>
</div>
<center>
<table width="80%" border="1" cellpadding="150px" cellspacing="150px">
<tbody>
<tr><td rowspan="2" width="20%">
<p><strong>DATE OF OT </strong></p>
</td>
<td colspan="2" width="20%">
<p><strong>ACTUAL TIME</strong></p>
</td>
<td rowspan="2" width="20%">
<p><strong>NAME (EMPLOYEE CODE)</strong></p>
</td>
<td rowspan="2" width="40%">
<p><strong>REASON </strong></p>
</td>
<td rowspan="2" width="40%">
<p><strong>TOTAL HRS OF OT </strong></p>
</td>
</tr>
<tr>
<td width="63">
<p><strong>FROM</strong></p>
</td>
<td width="69">
<p><strong>TO</strong></p>
</td>
</tr>

<?php 
$counter=0;
          $sqlot = $db->prepare("SELECT * FROM tbl_ot WHERE ot_date >= '" . $from . "' AND ot_date <= '" . $to . "' AND emp_id='$id' AND if_noted='1' ORDER by ot_date ASC");
          $sqlot->execute();
          while ($row = $sqlot->fetch(PDO::FETCH_ASSOC)) {
            
            $start = date("g:i A", strtotime($row['ot_from']));
            $stop = date("g:i A", strtotime($row['ot_to']));
         ?>
        <tr>
            <td><?php echo $row['ot_date']; ?></td> 
            <td><?php echo $start; ?></td>
            <td><?php echo $stop; ?></td>
            <td><?php echo $rowemp['fname']." ".$rowemp['lname']; ?></td>
            <td><?php echo $row['ot_reason'] ?></td>
            <td><?php echo $row['ot_hours'] ?></td>         
        </tr>
        <?php  $counter++;}
        $num=20;
        for ($i=$counter; $i <= $num ; $i++) {  ?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <?php }
         ?>



</tbody>
</table>
</center>
<br><br><br>
<div class="container-fluid">
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-3">
    Prepared By:<br>
    <img src="<?php echo $rowemp['signature']; ?>" style="max-height: 100px"><br>
    <u><?php echo $rowemp['fname']." ".$rowemp['lname']; ?></u> <br>
    <p class="prepapp">Employee Name</p>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-4">
    Approved By:<br><br><br>
    ___________________ <br>
    <p class="prepapp">Managing Director</p>
    </div>
</div>
</div>

</body>
</html>