<?php include 'includes/sessionChk.php';
$editemp_id = $_GET['id'];
$editsql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$editemp_id'");
$editsql->execute();
$editrow = $editsql->fetch(PDO::FETCH_ASSOC);

$datesql = $db->prepare("SELECT * FROM tbl_annual WHERE emp_id='$editemp_id'");
$datesql->execute();
$daterow = $datesql->fetch(PDO::FETCH_ASSOC);

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
  <title>GOLD <?php echo $_SESSION['u_type']; ?> - Edit Users</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">



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

<center><a class="btn btn-outline-info" href="user.php?link=adduser">Add User</a>
<a class="btn btn-outline-info" href="user.php?link=viewuser">View User</a></center>






        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Create User</h1> -->
          <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class="col-lg-8">
            <div class="p-5">
              <form class="user" id="processForm" action="updateUser.php?id=<?php echo $editemp_id; ?>" method="post" enctype="multipart/form-data" onSubmit="if(!confirm('Are you sure?')){return false;}">
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="fname" name="fname" placeholder="First Name" required="" value="<?php echo $editrow['fname']; ?>">
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="form-control form-control-user" id="lname" name="lname" placeholder="Last Name" required="" value="<?php echo $editrow['lname']; ?>">
                  </div>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-user" id="mi" name="mi" placeholder="M.I" value="<?php echo $editrow['mi']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="emp_id" name="emp_id" placeholder="Employee ID" required="" value="<?php echo $editemp_id; ?>" >
                  <input type="hidden" name="hidempid" value="<?php echo $editemp_id; ?>">
                </div>
                <div class="form-group row">
                  <div class="col-sm-7 selectWrapper">
                    <!-- <input type="text" class="form-control form-control-user" id="position" name="position" placeholder="Position" required=""> -->

                      <select class="custom-select form-control selectBox2" id="inputGroupSelect04" name="position" required="">
    <option selected value="">Choose Position...</option>
    <?php
    $posselected = $editrow['position'];
    $sql = $db->prepare("SELECT * FROM tbl_position");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
  if ($posselected==$row['pos_title']) { ?>
      <option value="<?php echo $row['pos_title'] ?>" selected><?php echo $row['pos_title'] ?></option>
      <?php 
    }else{
     ?> 
    
    <option value="<?php echo $row['pos_title'] ?>"><?php echo $row['pos_title'] ?></option>
    <?php } }
  ?>
  </select>
                  </div>

       <div class="col-sm-1">
       </div>

                  <div class="col-sm-4 selectWrapper">
                    <select class="form-control selectBox" id="utype" name="utype" required>
                      <option selected="" disabled="" value="">--Select User Type--</option>
                      <?php
                      $typeselected = $editrow['u_type'];
                       if ($typeselected=='Admin') {
                        echo "<option value='Admin' selected>Admin</option>";
                        echo "<option value='Employee'>Employee</option>";
                      } else{
                        echo "<option value='Employee' selected>Employee</option>";
                        echo "<option value='Admin'>Admin</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="company" name="company" placeholder="Company" required="" value="<?php echo $editrow['company']; ?>">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0 selectWrapper">
                    <!-- <input type="text" class="form-control form-control-user" id="department" name="department" placeholder="Department" required=""> -->

        
                    <!-- <input type="text" class="form-control form-control-user" id="position" name="position" placeholder="Position" required=""> -->

                      <select class="custom-select form-control selectBox2" id="inputGroupSelect04" name="department" required="">
    <option selected value="">Choose Department...</option>
    <?php
    $deptselected = $editrow['department'];
    $sql = $db->prepare("SELECT * FROM tbl_department");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
  if ($deptselected==$row['dept_name']) { ?>
      <option value="<?php echo $row['dept_name'] ?>" selected><?php echo $row['dept_name'] ?></option>
      <?php 
    }else{
     ?> 
    <option value="<?php echo $row['dept_name'] ?>"><?php echo $row['dept_name'] ?></option>
    <?php } }?>
  </select>


                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <p>Email: <input type="email" name="email" id="email" class="form-control form-control-user" autocomplete="off" required="" value="<?php echo $editrow['email']; ?>"></p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <p>Date: <input type="text" name="dateHired" id="datepicker" class="form-control form-control-user" autocomplete="off" required="" value="<?php echo $daterow['dateHired']; ?>"></p>
                </div>
              </div>


                
                
              <div class="text-center">
                <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
              </div>
              <div class="text-center">
                <!-- <a class="small" href="login.html">Already have an account? Login!</a> -->
              </div>
            </div>
            <br>
          </div>


          <div class="col-lg-4">  <br><br>  
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <!-- <input type="text" class="form-control image-preview-filename col-sm-10" disabled="disabled">  -->
                <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button --><br>
                    <!-- <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button> -->
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <!-- <span class="image-preview-input-title">Browse</span> -->
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="fileToUpload" id="input-file-preview"/> <!-- rename it -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 

          </div>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-folder-open"></span>
                        <!-- <span class="image-preview-input-title">Browse</span> -->
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="signature"/> <!-- rename it -->
Upload Signature <br><br><br>


        </div>
      </div>
      <center>
      <input class="btn btn-primary btn-user btn-block col-lg-4" type="submit" id="EditUser" name="EditUser" value="Update">
      </center>
              </form><br>
              <hr>
    </div>

  </div>



        </div>
        <!-- /.container-fluid -->


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


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/image.js"></script>
  <script src="js/datepicker.js"></script>

</body>

</html>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
