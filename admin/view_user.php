
<!-- Begin Page Content -->
<div class="container-fluid">
          <!-- Page Heading -->
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
      
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Employee No.</th>
                      <th>Fullname</th>
                      <th>Department</th>
                      <th>Position</th>
                      <th>Signature</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Employee No.</th>
                      <th>Fullname</th>
                      <th>Department</th>
                      <th>Position</th>
                      <th>Signature</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>

                          <tbody>

          <?php
          // emp_id, password, fname, lname, mi, position, company, department, image, u_type, status, request, is_active
          $count=1;
          $sql = $db->prepare("SELECT * FROM tbl_user WHERE emp_id NOT IN ('admin') ORDER BY emp_id ASC");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
           ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $row['emp_id']; ?></td>
                <td><?php echo $row['fname']." ".$row['mi'].". ".$row['lname']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><img src="<?php echo $row['signature']; ?>" style="max-height: 100px"></td>
                
                  <?php if ($row['is_active']==0) { ?>
                  	<td class='text-success'>Active</td><td><a href='active.php?num=0&id=<?php echo $row['emp_id']; ?>' onclick = "if (! confirm('Continue?')) { return false; }" class="btn btn-outline-danger">Deactivate</a> <a href='edit_user.php?id=<?php echo $row['emp_id']; ?>' class="btn btn-outline-warning">Edit</a></td>
                  <?php }else{ ?>
                    <td  class='text-danger'>Inactive</td><td>
              <a href='active.php?num=1&id=<?php echo $row['emp_id']; ?>' onclick = "if (! confirm('Continue?')) { return false; }" class="btn btn-outline-success">Activate</a> <a href='edit_user.php?id=<?php echo $row['emp_id']; ?>' class="btn btn-outline-warning">Edit</a></td>
                <?php } ?>
                
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
</div>
<!-- /.container-fluid -->
<!-- <link href="https://gitcdn.github.io/bootstrap2-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap2-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->