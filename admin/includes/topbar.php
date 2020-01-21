<ul class="navbar-nav ml-auto">

            <?php 
            $sessemp_id = $_SESSION['emp_id'];
$sumnotif = 0;
$color = "bg-warning";
$icon = "fas fa-plane";

$sql1 = $db->prepare("SELECT * FROM tbl_leave ORDER BY leave_date ASC");
$sql1->execute();
while ($row1 = $sql1->fetch(PDO::FETCH_ASSOC)) {


  if ($row1['status']=="Note" && $row1['noted_by']==$sessemp_id) {
  $sql = $db->prepare("SELECT * FROM tbl_leave WHERE status='Note' AND noted_by='$sessemp_id' ORDER BY leave_date ASC");
$sql->execute();
$sumnotif = $sql->rowCount(); ?>



<?php 
}elseif ($row1['status']=="Approval" && $row1['approval_by']==$sessemp_id){
  $sql = $db->prepare("SELECT * FROM tbl_leave WHERE status='Approval' AND approval_by='$sessemp_id' ORDER BY leave_date ASC");
$sql->execute();
$sumnotif = $sql->rowCount(); ?>

<?php 
}
elseif($row1['status']=="Approved" && $row1['emp_id']==$sessemp_id){
  $sql = $db->prepare("SELECT * FROM tbl_leave WHERE status='Approved' AND emp_id='$sessemp_id' ORDER BY leave_date ASC");
$sql->execute();
$sumnotif = $sql->rowCount(); ?>

<?php 
$color = "bg-success";
$icon = "fas fa-check";
}



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
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <!-- <div class="icon-circle bg-warning">
                      <i class="fas fa-plane text-black"></i> -->
                      <div class="icon-circle <?php echo $color; ?>">
                      <i class="<?php echo $icon; ?> text-black"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $row['leave_date']; ?></div>
                    <span class="font-weight-bold"><?php echo $row['leave_reason']; ?></span>
                  </div>
                </a>
<?php } ?>
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
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
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