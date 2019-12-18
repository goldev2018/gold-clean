<html>
<head>
<!-- <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"/> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<style type="text/css">
  input[data-readonly] {
  pointer-events: none;
}
</style>



<!--   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
<!--   <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->



<script src="js/jquery.weekpicker.js" ></script>
    <script>
    $(function(){

        $('.week-picker').weekpicker();
    });
    </script>
<title>jQuery Week Picker Plugin Basic Demo</title>
</head>
<body>

<h1 style="margin-top:50px;"></h1>
    <div class="week-picker"></div>
    <div id="start"></div>

<br>
<form action="timesheetSubmit.php" method="post" enctype="multipart/form-data" onSubmit="if(!confirm('Are you sure?')){return false;}">
<div class="input-group">
  <span class="input-group-btn">
      <input type="text" class="form-control" name="weekpicks" id="weekpicks" size="40" required data-readonly >

      <input type="text" class="form-control" name="weekstart" id="weekstart" size="40" required data-readonly >
      <input type="text" class="form-control" name="weekend" id="weekend" size="40" required data-readonly >

      <input type="text" class="form-control" name="weeknum" id="weeknum" size="40" required data-readonly >
  </span>
  <!-- &nbsp;<input type="submit" name="submitTimesheet" class="btn btn-success"> -->

</div><br>  <br>
  <!-- <input type="file" name="timesheet" required="" accept=".csv, .pdf, .docx, .xls"> -->

  </form>
</body>
</html>