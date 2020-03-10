<?php 
include ('includes/sessionChk.php');
 include ('includes/config.php');

$sessemp_id = $_SESSION['emp_id'];

$sqlob = $db->prepare("SELECT * FROM tbl_ob WHERE status='1' AND approved_by='$sessemp_id'");
$sqlob->execute();
$obcount = $sqlob->rowCount();


$sqltsn = $db->prepare("SELECT * FROM tbl_timesheet WHERE status='1' AND noted_by='$sessemp_id'");
$sqltsn->execute();
$tscountn = $sqltsn->rowCount();



$sqltsa = $db->prepare("SELECT * FROM tbl_timesheet WHERE status='2' AND approved_by='$sessemp_id'");
$sqltsa->execute();
$tscounta = $sqltsa->rowCount();

?>       
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php include 'favicon.php'; ?>
  <title>GOLD <?php echo $_SESSION['u_type']; ?> - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

  <!-- <link href="include/jquery.dataTables.min.css" rel="stylesheet"> -->


<!-- for datepicker -->
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"/> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script> 



    <script>
    $(function(){

        $('.week-picker').weekpicker();
    });
    </script>

    <!-- for datepicker -->


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    <!-- End of Sidebar -->



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        <!-- Topbar Navbar -->
        <?php include 'includes/topbar.php'; ?>
        <!-- End of Topbar -->
     <?php 
     // if ($sessu_type=="Employee") { 
      ?> 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
            </div>
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <a href="dashboardemp.php?link=weeklytimesheet" style="color: #4e73df;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Weekly Timesheet</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                      <?php if ($tscountn!=0) { ?>
                        <span class="badge badge-danger badge-counter"><?php echo $tscountn; ?></span>
                      <?php } ?>
                      <?php if ($tscounta!=0) { ?>
                        <span class="badge badge-danger badge-counter"><?php echo $tscounta; ?></span>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <a href="dashboardemp.php?link=leave" style="color: #36b9cc ;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Leave</div>
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-child fa-2x text-gray-300"></i> -->
                      <i class="fas fa-running fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div></a>
              </div>
            </div>



            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <a href="dashboardemp.php?link=ob" style="color: #36b9cc ;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">OB</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-plane-departure fa-2x text-gray-300"></i>
                      <?php if ($obcount!=0) { ?>
                        <span class="badge badge-danger badge-counter"><?php echo $obcount; ?></span>
                      <?php } ?>
                    </div>
                  </div>
                </div></a>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">RTW & OT Slip</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">18</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Personnel Action</div> -->
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">18</div> -->
                    <!-- </div>
                    <div class="col-auto">
                      <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="col-xl-2 col-md-6 mb-4">
            </div>
          </div>

          <!-- Content Row -->


<?php 
if ($sessemp_id=='GOLD-AR-004' || $sessemp_id=='GOLD-AR-006' || $sessemp_id=='GOLD-AR-010' || $sessemp_id=='GOLD-AR-028' || $sessemp_id=='admin' || $sessemp_id=='GOLD-AR-014') {

$form = $_GET['link']; 
if ($form=="weeklytimesheet") { ?>
<center><a class="btn btn-outline-primary" href="dashboardemp.php?link=submit">Submit</a>
<a class="btn btn-outline-primary" href="dashboardemp.php?link=approval">Approval</a></center>

<?php 
}
elseif ($form=="ob") { ?>
<center><a class="btn btn-outline-success" href="dashboardemp.php?link=obcheck">View</a>
<a class="btn btn-outline-success" href="dashboardemp.php?link=obapproval">Approval</a></center>
  <?php 
  // include 'weeklytimesheetempapproval.php';
}
elseif ($form=="leave") {
  include 'leaveemp.php';
}
elseif ($form=="submit") {
  include 'weeklytimesheetemp.php';
}
elseif ($form=="approval") {
  include 'weeklytimesheetempapproval.php';
}
elseif ($form=="obcheck") {
  include 'obemp.php';
}
elseif ($form=="obapproval") {
  include 'obapproval.php';
}
else{

}
}else{


$form = $_GET['link']; 
if ($form=="weeklytimesheet") {
  include 'weeklytimesheetemp.php';
}
elseif ($form=="leave") {
  include 'leaveemp.php';
}
elseif ($form=="ob") {
  include 'obemp.php';
}
else{

}

}
 ?>



        </div>
        <!-- /.container-fluid -->

<?php
 // } 
?>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include("includes/footer.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->


  <script src="js/sb-admin-2.min.js"></script>
  <!-- <script src="js/image.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->



<!--   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <script src="js/demo/datatables-demo.js"></script>
 -->
</body>

</html>