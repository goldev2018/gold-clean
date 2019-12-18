
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
              <form class="user" id="processForm" action="processUser.php" method="post" enctype="multipart/form-data" onSubmit="if(!confirm('Are you sure?')){return false;}">
                <div class="form-group row">
                  <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="fname" name="fname" placeholder="First Name" required="">
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="form-control form-control-user" id="lname" name="lname" placeholder="Last Name" required="">
                  </div>
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-user" id="mi" name="mi" placeholder="M.I">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="emp_id" name="emp_id" placeholder="Employee ID" required="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-7 selectWrapper">
                    <!-- <input type="text" class="form-control form-control-user" id="position" name="position" placeholder="Position" required=""> -->

                      <select class="custom-select form-control selectBox2" id="inputGroupSelect04" name="position" required="">
    <option selected value="">Choose Position...</option>
    <?php
    $sql = $db->prepare("SELECT * FROM tbl_position");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?> 
    <option value="<?php echo $row['pos_title'] ?>"><?php echo $row['pos_title'] ?></option>
    <?php } ?>
  </select>
                  </div>

       <div class="col-sm-1">
       </div>

                  <div class="col-sm-4 selectWrapper">
                    <select class="form-control selectBox" id="utype" name="utype" required>
                      <option selected="" disabled="" value="">--Select User Type--</option>
                      <option value="Admin">Admin</option>
                      <option value="Employee">Employee</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="company" name="company" placeholder="Company" required="">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0 selectWrapper">
                    <!-- <input type="text" class="form-control form-control-user" id="department" name="department" placeholder="Department" required=""> -->

        
                    <!-- <input type="text" class="form-control form-control-user" id="position" name="position" placeholder="Position" required=""> -->

                      <select class="custom-select form-control selectBox2" id="inputGroupSelect04" name="department" required="">
    <option selected value="">Choose Department...</option>
    <?php
    $sql = $db->prepare("SELECT * FROM tbl_department");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?> 
    <option value="<?php echo $row['dept_name'] ?>"><?php echo $row['dept_name'] ?></option>
    <?php } ?>
  </select>


                  </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <p>Date: <input type="text" name="dateHired" id="datepicker" class="form-control form-control-user" autocomplete="off" required=""></p>
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
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="fileToUpload" id="input-file-preview"  required="" /> <!-- rename it -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 

          </div>



        </div>
      </div>
      <center>
      <input class="btn btn-primary btn-user btn-block col-lg-4" type="submit" id="createUser" name="createUser" value="Create Account">
      </center>
              </form><br>
              <hr>
    </div>

  </div>



        </div>
        <!-- /.container-fluid -->