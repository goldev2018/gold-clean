<?php set_time_limit(300); ?>
                    <!-- Content Row -->
          <div class="row">

            <!-- Add Country -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Add Department</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                  </div>




<br>
<form action="submitposdep.php?submit=department" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Department Name" name="dept_name" aria-label="" aria-describedby="basic-addon1" required="">
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Add Position</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                    </div>
                  </div>



                                    <br>
<form action="submitposdep.php?submit=position" method="post" onSubmit="if(!confirm('Are you sure?')){return false;}">


<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Position Title" name="position_name" aria-label="" aria-describedby="basic-addon1" required="">
    <div class="input-group-prepend">
    <!-- <button class="btn btn-outline-primary" type="button">Submit</button> -->
    <input type="submit" name="addcountry" value="Submit" class="btn btn-outline-success">
  </div>
</div>


    </form>


                </div>
              </div>
            </div>






            <!-- Add Project Info -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Add Cost Code</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                    </div>
                  </div>



                                    <br>
                                        <?php 
$picked="";
$type="";
if (isset($_GET['picked'])) {
  $picked=$_GET['picked'];
  $qweqwe = "<option value='utilities.php?id=position&picked=".$picked."' selected>".$picked."</option>";
}
$type="";
if (strpos($picked, 'Regular') !== false) {
    $picked = trim($picked, "Regular - "); 
    $type="Regular";
}else{
    $picked = trim($picked, "OT - "); 
    $type="OT";
}
 ?>


<div class="input-group">
  <select class="custom-select" id="inputGroupSelect04" name="selcountry" onChange="window.location.href=this.value" required="">
    <option selected value="">Choose Cost Code...</option>
    <?php 
    echo $qweqwe;
    $sqlcost = $db->prepare("SELECT * FROM tbl_costcode WHERE costcode_number NOT IN ('$picked  ')");
          $sqlcost->execute();
          while ($rowcost = $sqlcost->fetch(PDO::FETCH_ASSOC)) {
     ?>
    <option value="utilities.php?id=position&picked=<?php echo $rowcost['costcode_type']." - ".$rowcost['costcode_number'] ?>"><?php echo $rowcost['costcode_type']." - ".$rowcost['costcode_number'] ?></option>
   <!--  <option value="utilities.php?id=position&picked=OT - 001-23-0003">OT - 001-23-0003</option>
    <option value="utilities.php?id=position&picked=Regular - 002-29-0001">Regular - 002-29-0001</option>
    <option value="utilities.php?id=position&picked=OT - 002-29-0002">OT - 002-29-0002</option>
    <option value="utilities.php?id=position&picked=Regular - 002-33-0001">Regular - 002-33-0001</option>
    <option value="utilities.php?id=position&picked=OT - 002-33-0002">OT - 002-33-0002</option> -->
  <?php } ?>
  </select>

</div>
<br>
<?php 
// $type="";
// if (strpos($picked, 'Regular') !== false) {
//     $picked = trim($picked, "Regular - "); 
//     $type="Regular";
// }else{
//     $picked = trim($picked, "OT - "); 
//     $type="OT";
// }
if ($picked=="") {

}else{
 ?>


<form action="submitposdep.php?submit=cost&picked=<?php echo $picked."&type=".$type; ?>" method="post" id="sectionForm" onSubmit="return checkCheckBoxes(this);">
<?php 
$sqlcost = $db->prepare("SELECT * FROM tbl_costcode WHERE costcode_type='$type' AND costcode_number='$picked'");
          $sqlcost->execute();
          $rowcost = $sqlcost->fetch(PDO::FETCH_ASSOC);

          $poscheck_id = $rowcost['pos_id'];
          $trimposcheck_id = trim($poscheck_id,'[]');

          $sql = $db->prepare("SELECT * FROM tbl_position WHERE pos_id IN ($trimposcheck_id) ORDER BY pos_title ASC");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
 ?>
  <input type="checkbox" name="pos_id[]" value="<?php echo $row['pos_id']; ?>" checked><?php echo $row['pos_title']."<br>"; ?>

<?php }


$sql = $db->prepare("SELECT * FROM tbl_position WHERE pos_id NOT IN ($trimposcheck_id) ORDER BY pos_title ASC");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
 ?>
  <input type="checkbox" name="pos_id[]" value="<?php echo $row['pos_id']; ?>"><?php echo $row['pos_title']."<br>"; ?>

<?php }?>
<br>
    <input type="submit" name="addcostcode" value="Submit" class="btn btn-outline-success">
    </form>

  <?php } ?>


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