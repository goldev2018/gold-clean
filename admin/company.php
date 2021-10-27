<?php set_time_limit(300); ?>
                    <!-- Content Row -->
          <div class="row">

            <!-- Add Country -->
             <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Add Company</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                  </div>



<br>
<form action="submitcomp.php?submit=company" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">
<input type="text" class="form-control" placeholder="Company Name" name="comp_name" aria-label="" aria-describedby="basic-addon1" required="">

<br>

<div class="input-group">
<input type="text" class="form-control" placeholder="Company Abbreviation" name="comp_abbre" aria-label="" aria-describedby="basic-addon1" required=""> 
  <div class="input-group-append">
    <input type="submit" name="submit" value="Submit" class="btn btn-outline-primary">
  </div>
</div>
    </form><br>






                </div>
              </div>
            </div>









          <!-- Content Row -->

          </div>


<script src="http://code.jquery.com/jquery-1.10.2.js"></script>


<script type="text/javascript" language="JavaScript">
(function() {
    const form = document.querySelector('#sectionForm');
    const checkboxes = form.querySelectorAll('input[type=checkbox]');
    const checkboxLength = checkboxes.length;
    const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;

    function init() {
        if (firstCheckbox) {
            for (let i = 0; i < checkboxLength; i++) {
                checkboxes[i].addEventListener('change', checkValidity);
            }

            checkValidity();
        }
    }

    function isChecked() {
        for (let i = 0; i < checkboxLength; i++) {
            if (checkboxes[i].checked) return true;
        }

        return false;
    }

    function checkValidity() {
        const errorMessage = !isChecked() ? 'At least one checkbox must be selected.' : '';
        firstCheckbox.setCustomValidity(errorMessage);
    }

    init();
})();
</script> 





                    <!-- Content Row -->
          <div class="row">

            <!-- Department -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Company</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                  </div>

                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Abbreviation</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Abbreviation</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>

                          <tbody>

          <?php
          // dept_id, dept_name
          $count=1;
          $sql = $db->prepare("SELECT * FROM tbl_company ORDER BY com_id ASC");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
           ?>
            <tr>
                <td><?php echo $count ?></td> 
                <td><?php echo $row['com_name']; ?></td>
                <td><?php echo $row['com_abbre']; ?></td>
                <td>
              <a href='deletecomp.php?id=<?php echo $row['com_id']; ?>' onclick = "if (! confirm('Continue?')) { return false; }" class="btn btn-outline-danger">Delete</a> 
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





</div>