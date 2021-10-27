<ul class="navbar-nav ml-auto">

            <?php 
            $sessemp_id = $_SESSION['emp_id'];
$sumnotif = 0;
$sqlmodalcountnote  = 0;
$sqlmodalcountapproval  = 0;
$sqlmodalcountapproved  = 0;
$sumnotifnote = 0;
$sumnotifapproval = 0;
$sumnotifapproved = 0;
// $color = "bg-warning";
// $icon = "fas fa-plane";

$sql1 = $db->prepare("SELECT * FROM tbl_leave ORDER BY leave_date ASC");
$sql1->execute();
while ($row1 = $sql1->fetch(PDO::FETCH_ASSOC)) {


  if ($row1['status']=="Note" && $row1['noted_by']==$sessemp_id) {
  $sqlnote = $db->prepare("SELECT * FROM tbl_leave WHERE status='Note' AND noted_by='$sessemp_id' ORDER BY leave_date ASC");
$sqlnote->execute();
$sumnotifnote = $sqlnote->rowCount();

// for modal
  $sqlmodalnote = $db->prepare("SELECT * FROM tbl_leave WHERE status='Note' AND noted_by='$sessemp_id' ORDER BY leave_date ASC");
$sqlmodalnote->execute();
$sqlmodalcountnote = $sqlmodalnote->rowCount(); 
 ?>



<?php 
}elseif ($row1['status']=="Approval" && $row1['approval_by']==$sessemp_id){
  $sqlapproval = $db->prepare("SELECT * FROM tbl_leave WHERE status='Approval' AND approval_by='$sessemp_id' ORDER BY leave_date ASC");
$sqlapproval->execute();
$sumnotifapproval = $sqlapproval->rowCount();



// for modal
$sqlmodalapproval = $db->prepare("SELECT * FROM tbl_leave WHERE status='Approval' AND approval_by='$sessemp_id' ORDER BY leave_date ASC");
$sqlmodalapproval->execute();
$sqlmodalcountapproval = $sqlmodalapproval->rowCount(); 
 ?>



<?php 
}
elseif($row1['status']=="Approved" && $row1['emp_id']==$sessemp_id){
  $sqlapproved = $db->prepare("SELECT * FROM tbl_leave WHERE status='Approved' AND emp_id='$sessemp_id' ORDER BY leave_date ASC");
$sqlapproved->execute();
$sumnotifapproved = $sqlapproved->rowCount(); 



// for modal
  $sqlmodalapproved = $db->prepare("SELECT * FROM tbl_leave WHERE status='Approved' AND emp_id='$sessemp_id' ORDER BY leave_date ASC");
$sqlmodalapproved->execute();
$sqlmodalcountapproved = $sqlmodalapproved->rowCount(); 
?>

<?php 
// $color = "bg-success";
// $icon = "fas fa-check";
}

$sumnotif = $sumnotifapproved + $sumnotifnote + $sumnotifapproval;

}





 ?>

<li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php if ($sumnotif>1) { ?>
                  <span class="badge badge-danger badge-counter"><?php echo $sumnotif; ?>+</span>
                  <?php 
                }else if($sumnotif==1){ ?>
                  <span class="badge badge-danger badge-counter"><?php echo $sumnotif; ?></span>
                <?php } ?>
              </a>

                                          <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifications
                </h6>
                <?php 
                if ($sumnotifnote!=0) {
while ($row = $sqlnote->fetch(PDO::FETCH_ASSOC)) {
                $modaltarget = "#myModal".$row['leave_id'];
                 ?>
                <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal" data-target='<?php echo $modaltarget; ?>'>
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-plane text-black"></i>
                      <!-- <div class="icon-circle <?php echo $color; ?>">
                      <i class="<?php echo $icon; ?> text-black"></i> -->
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $row['leave_date']; ?></div>
                    <span class="font-weight-bold"><?php echo $row['leave_reason']; ?></span>
                  </div>
                </a>
<?php } }?>

<?php 
                if ($sumnotifapproval!=0) {
while ($row = $sqlapproval->fetch(PDO::FETCH_ASSOC)) {
                $modaltarget = "#myModal".$row['leave_id'];
                 ?>
                <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal" data-target='<?php echo $modaltarget; ?>'>
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-plane text-black"></i>
                      <!-- <div class="icon-circle <?php echo $color; ?>">
                      <i class="<?php echo $icon; ?> text-black"></i> -->
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $row['leave_date']; ?></div>
                    <span class="font-weight-bold"><?php echo $row['leave_reason']; ?></span>
                  </div>
                </a>
<?php } } ?>

<?php 
                if ($sumnotifapproved!=0) {
while ($row = $sqlapproved->fetch(PDO::FETCH_ASSOC)) {
                $modaltarget = "#myModal".$row['leave_id'];
                 ?>
                <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal" data-target='<?php echo $modaltarget; ?>'>
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-check text-black"></i>
                      <!-- <div class="icon-circle <?php echo $color; ?>">
                      <i class="<?php echo $icon; ?> text-black"></i> -->
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $row['leave_date']; ?></div>
                    <span class="font-weight-bold"><?php echo $row['leave_reason']; ?></span>
                  </div>
                </a>
<?php } } ?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>





            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $sessfname." ".$sesslname; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo $sessimage ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepassModal">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#backupModal">
                  <i class="fas fa-window-restore fa-sm fa-fw mr-2 text-gray-400"></i>
                  Backup
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#restoreModal">
                  <i class="fas fa-window-restore fa-sm fa-fw mr-2 text-gray-400"></i>
                  Restore
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>









<?php 
if ($sqlmodalcountnote!=0) {
while ($rowmodalnote = $sqlmodalnote->fetch(PDO::FETCH_ASSOC)) { 
$modalid = "myModal".$rowmodalnote['leave_id'];

?>
  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal3" role="dialog"> -->
  <div class="modal fade" id='<?php echo $modalid; ?>' role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>
            <?php echo "Date File: ".$rowmodalnote['leave_date']; ?><br>

            <?php
            $leaveempid = $rowmodalnote['emp_id'];
            $sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$leaveempid'");
            $sqlemp->execute();
            $rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);
             echo "Name: ".$rowemp['fname']." ".$rowemp['lname']; ?>

             <br>
            <?php echo "Period: ".$rowmodalnote['leave_period_from']." - ".$rowmodalnote['leave_period_to']; ?>
            <br>
            <?php echo "Reason: ".$rowmodalnote['leave_reason']; ?>
            <br>
            <?php echo "Total: ".$rowmodalnote['leave_total']; ?>
            <br>
            <br>
            <br>

            <form action="leaveapproval.php" method="post" target="_blank">

            <textarea cols="55" rows="5" placeholder="Remarks" name="remarknote"></textarea>

            <br>
          </p>
        </div>
        <div class="modal-footer">


            <input type="hidden" name="noteid" value="<?php echo $rowmodalnote['leave_id']; ?>">
            <input type="hidden" name="notestat" value="<?php echo $rowmodalnote['status']; ?>">
            <input type="hidden" name="noteby" value="<?php echo $rowmodalnote['noted_by']; ?>">
          <!-- <a href='leaveapproval.php?leave_id=<?php echo $rowmodalnote['leave_id']; ?>&stat=<?php echo $rowmodalnote['status']; ?>' target='blank' width='786' height='786' style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>Approve</a> -->

            <input type="submit" name="btnapprovenote" value="Approve" width='786' height='786' style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;'>


            <input type="submit" name="btnapprovenote" value="Decline" width='786' height='786' style='background-color: #e74a3b;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;'>
           <!-- <a href='leaveapproval.php?leave_id=<?php echo $rowmodalnote['leave_id']; ?>&stat=Decline' target='blank' width='786' height='786' style='background-color: #e74a3b;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>Decline</a> -->


           </form>

<a href='documentviewer.php?dir=<?php echo $rowmodalnote['leave_docu']; ?>' style='background-color: #1cc88a;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>View Document</a>
          



          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php  } 
}?>


<?php 
if ($sqlmodalcountapproval!=0) {
while ($rowmodalapproval = $sqlmodalapproval->fetch(PDO::FETCH_ASSOC)) { 
$modalid = "myModal".$rowmodalapproval['leave_id'];

?>
  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal3" role="dialog"> -->
  <div class="modal fade" id='<?php echo $modalid; ?>' role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>
            <?php echo "Date File: ".$rowmodalapproval['leave_date']; ?><br>

            <?php
            $leaveempid = $rowmodalapproval['emp_id'];
            $sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$leaveempid'");
            $sqlemp->execute();
            $rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);
             echo "Name: ".$rowemp['fname']." ".$rowemp['lname']; ?>

             <br>
            <?php echo "Period: ".$rowmodalapproval['leave_period_from']." - ".$rowmodalapproval['leave_period_to']; ?>
            <br>
            <?php echo "Reason: ".$rowmodalapproval['leave_reason']; ?>
            <br>
            <?php echo "Total: ".$rowmodalapproval['leave_total']; ?>
            <br>
            <br>
            <br>

            <form action="leaveapproval.php" method="post" target="_blank">

            <textarea cols="55" rows="5" placeholder="Remarks" name="remarkapprove"><?php echo $rowmodalapproval['remarks']; ?></textarea>
            <br>
          </p>
        </div>
        <div class="modal-footer">

           <input type="hidden" name="approveid" value="<?php echo $rowmodalapproval['leave_id']; ?>">
            <input type="hidden" name="approvestat" value="<?php echo $rowmodalapproval['status']; ?>">
            <input type="hidden" name="approveby" value="<?php echo $rowmodalapproval['approval_by']; ?>">


            <input type="submit" name="btnapproveapproval" value="Approve" width='786' height='786' style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;'>


            <input type="submit" name="btnapproveapproval" value="Decline" width='786' height='786' style='background-color: #e74a3b;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;'>

          </form>
          <!-- <a href='leaveapproval.php?leave_id=<?php echo $rowmodalapproval['leave_id']; ?>&stat=<?php echo $rowmodalapproval['status']; ?>' target='blank' width='786' height='786' style='background-color: #1c87c9;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>Approve</a>

          <a href='leaveapproval.php?leave_id=<?php echo $rowmodalapproval['leave_id']; ?>&stat=Decline' target='blank' width='786' height='786' style='background-color: #e74a3b;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>Decline</a> -->

<a href='documentviewer.php?dir=<?php echo $rowmodalapproval['leave_docu']; ?>' style='background-color: #1cc88a;border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 4px 2px;cursor: pointer;'>View Document</a>



          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php  } 
}?>


<?php 
if ($sqlmodalcountapproved!=0) {

while ($rowmodalapproved = $sqlmodalapproved->fetch(PDO::FETCH_ASSOC)) { 
$modalid = "myModal".$rowmodalapproved['leave_id'];
$modalid1 = "#myModal".$rowmodalapproved['leave_id'];
$modalids = $rowmodalapproved['leave_id'];
?>
  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal3" role="dialog"> -->
  <div class="modal fade" id='<?php echo $modalid; ?>' role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>
            <?php echo "Date File: ".$rowmodalapproved['leave_date']; ?><br>

            <?php
            $leaveempid = $rowmodalapproved['emp_id'];
            $sqlemp = $db->prepare("SELECT * FROM tbl_user WHERE emp_id='$leaveempid'");
            $sqlemp->execute();
            $rowemp = $sqlemp->fetch(PDO::FETCH_ASSOC);
             echo "Name: ".$rowemp['fname']." ".$rowemp['lname']; ?>

             <br>
            <?php echo "Period: ".$rowmodalapproved['leave_period_from']." - ".$rowmodalapproved['leave_period_to']; ?>
            <br>
            <?php echo "Reason: ".$rowmodalapproved['leave_reason']; ?>
            <br>
            <?php echo "Total: ".$rowmodalapproved['leave_total']; ?>
            <br>
          </p>
        </div>
        <div class="modal-footer">



          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php  
echo "<script>
  $('".$modalid1."').on('show.bs.modal', function(){

   $.ajax({
                url: 'includes/updatenotif.php',
                type: 'POST',
                data: 'id='+".$modalids."
            });



});
</script>";


} 
}?>

<!-- <script>
  $('".$modalid1."').on('show.bs.modal', function(){
   alert('Hello World!');

   $.ajax({
                url: 'includes/updatenotif.php',
                type: 'POST',
                data: 'id='+".$modalids.",
                success: function (result) {
                    alert('success'+result);
                }
            });



});
</script> -->