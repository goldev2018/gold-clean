
                    <!-- Content Row -->
          <div class="row">

            <!-- Add Country -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Add Country</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                    </div>
                  </div>




<br>
<form action="submitproject.php?submit=country" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Country Name" name="country_name" aria-label="" aria-describedby="basic-addon1" required="">
    <div class="input-group-prepend">
    <!-- <button class="btn btn-outline-primary" type="button">Submit</button> -->
    <input type="submit" name="addcountry" value="Submit" class="btn btn-outline-primary">
  </div>
</div>
</form>



                </div>
              </div>
            </div>







            <!-- Add Project -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Add Project</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                  </div>



                                    <br>
<form action="submitproject.php?submit=project" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">
<input type="text" class="form-control" placeholder="Project Name" name="project_name" aria-label="" aria-describedby="basic-addon1" required="">
<br>

<div class="input-group">
  <select class="custom-select" id="inputGroupSelect04" name="selcountry" required="">
    <option selected value="">Choose Country...</option>
    <?php 
    $sql = $db->prepare("SELECT * FROM tbl_country");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?>
    <option value="<?php echo $row['country_id'] ?>"><?php echo $row['country_name'] ?></option>
    <?php } ?>
  </select>
  <div class="input-group-append">
    <input type="submit" name="addcountry" value="Submit" class="btn btn-outline-success">
  </div>
</div>
    </form>


                </div>
              </div>
            </div>






            <!-- Add Project Info -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Add Project Info</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>



<br>
<form action="submitproject.php?submit=project_info" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">
<input type="text" class="form-control" placeholder="Project Code" name="project_code" aria-label="" aria-describedby="basic-addon1" required=""><br>
<textarea class="form-control" name="project_building" placeholder="Project Building"></textarea>
<br>

<div class="input-group">
  <select class="custom-select" id="inputGroupSelect04" name="selproj" required="">
    <option selected value="">Choose Project Name...</option>
    <?php 
    $sql = $db->prepare("SELECT * FROM tbl_project");
$sql->execute();
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
     ?>
    <option value="<?php echo $row['project_id'] ?>"><?php echo $row['project_name'] ?></option>
    <?php } ?>
  </select>
  <div class="input-group-append">
    <input type="submit" name="addcountry" value="Submit" class="btn btn-outline-info">
  </div>
</div>
    </form><br>






                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->










                    <!-- Content Row -->
          <div class="row">

            <!-- Add Country -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Country</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                    </div>
                  </div>

                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Country Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Country Name</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>

                          <tbody>

          <?php
          // emp_id, password, fname, lname, mi, position, company, department, image, u_type, status, request, is_active
          $count=1;
          $sql = $db->prepare("SELECT * FROM tbl_country ORDER BY country_id ASC");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
           ?>
            <tr>
                <td><?php echo $count ?></td> 
                <td><?php echo $row['country_name']; ?></td>
                <td>
              <a href='deleteproject.php?type=country&id=<?php echo $row['country_id']; ?>' onclick = "if (! confirm('Continue?')) { return false; }" class="btn btn-outline-danger">Delete</a> 
               <!-- <a href='edit_user.php?type=country&id=<?php echo $row['country_id']; ?>' class="btn btn-outline-warning">Edit</a> -->
             </td>
     
                
            </tr>
            <?php 
            $count++;
          } 
          ?>
        </tbody>

                  
                </table>



                </div>
              </div>
            </div>







            <!-- Add Project -->
            <div class="col-xl-8 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Project</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                  </div>


                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Project Name</th>
                      <th width="150px">Country</th>
                      <th width="156px">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Project Name</th>
                      <th>Country</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>

                          <tbody>

          <?php
          // emp_id, password, fname, lname, mi, position, company, department, image, u_type, status, request, is_active
          $count=1;

          $sql = $db->prepare("SELECT * FROM tbl_project ORDER BY project_id ASC");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
          $country_id = $row['country_id'];
          $sqlcountry = $db->prepare("SELECT * FROM tbl_country WHERE country_id='$country_id'");
          $sqlcountry->execute();
          $rowcountry = $sqlcountry->fetch(PDO::FETCH_ASSOC);
           ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $row['project_name']; ?></td>
                <td><?php echo $rowcountry['country_name']; ?></td>
                <td>
              <a href='deleteproject.php?type=project&id=<?php echo $row['project_id']; ?>' onclick = "if (! confirm('Continue?')) { return false; }" class="btn btn-outline-danger">Delete</a>  
              <!-- <a href='edit_user.php?type=project&id=<?php echo $row['project_id']; ?>' class="btn btn-outline-warning">Edit</a> -->
            </td>
     
                
            </tr>
            <?php 
            $count++;
          } 
          ?>
        </tbody>

                  
                </table>


                </div>
              </div>
            </div>






            <!-- Add Project Info -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Project Info</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>



<br>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th width="150px">Project Code</th>
                      <th>Project Building</th>
                      <th >Project Name</th>
                      <th width="156px">Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Project Code</th>
                      <th>Project Building</th>
                      <th>Project Name</th>
                      <th width="156px">Status</th>
                    </tr>
                  </tfoot>

                          <tbody>

          <?php
          // proj_info_id, proj_info_codes, proj_info_building, project_id
          $count=1;

          $sql = $db->prepare("SELECT * FROM tbl_project_info ORDER BY proj_info_id ASC");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
          $project_id = $row['project_id'];
          $sqlproj = $db->prepare("SELECT * FROM tbl_project WHERE project_id='$project_id'");
          $sqlproj->execute();
          $rowproj = $sqlproj->fetch(PDO::FETCH_ASSOC);
           ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $row['proj_info_codes']; ?></td>
                <td><?php echo $row['proj_info_building']; ?></td>
                <td><?php echo $rowproj['project_name']; ?></td>
                <td>
              <a href='deleteproject.php?type=projinfo&id=<?php echo $row['proj_info_id']; ?>' onclick = "if (! confirm('Continue?')) { return false; }" class="btn btn-outline-danger">Delete</a>  
              <!-- <a href='edit_user.php?type=project&id=<?php echo $row['project_id']; ?>' class="btn btn-outline-warning">Edit</a> -->
            </td>
     
                
            </tr>
            <?php 
            $count++;
          } 
          ?>
        </tbody>

                  
                </table>
<br>






                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->



<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

