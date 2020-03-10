<?php 
include("includes/sessionChk.php");
include("includes/config.php");

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
<link rel="stylesheet" type="text/css" href="">

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

          <!-- Content Row -->


<?php 
$form = $_GET['link']; 
if ($form=="leave") {
  include 'HRleaveview.php';
}
elseif ($form=="annual") {
  include 'HRannualview.php';
}
elseif ($form=="ob") {
  include 'HRobview.php';
}
else{

}
 ?>






        </div>
        <!-- /.container-fluid -->


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