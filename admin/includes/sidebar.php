<ul class="navbar-nav bg-gradient-light sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
          <!-- <i class="fas fa-laugh-wink"></i> -->
          <img src="includes/apple-touch-icon.png" height="65px" width="65px">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">GOLD<sup>2</sup></div> -->
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">



          <?php $qwe = $_SERVER['QUERY_STRING']; 
          if ($qwe=="id=project" || $qwe=="id=position") {
            $util = "show";
            $page = "";
          }
          elseif($qwe=="id=leave" || $qwe=="id=ob" || $qwe=="id=personnel" || $qwe=="id=rtw" || $qwe=="id=timesheet" ){
            $page = "show";
            $util = "";
          }
          else{
            $page = "";
            $util = "";
          }
          ?>


      <!-- Nav Item - Dashboard -->
      <?php if ($sessu_type=="Admin" || $sessu_type=="Super Admin") { ?>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php?link=home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Dashboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse <?php echo $util ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities.php?id=project">Projects</a>
            <a class="collapse-item" href="utilities.php?id=position">Position / Department</a>
          </div>
        </div>
      </li>

      <!-- <hr class="sidebar-divider"> -->

      <li class="nav-item">
        <a class="nav-link" href="user.php?link=user">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="dashboardemp.php?link=home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

    <?php }else{ ?>
        <li class="nav-item">
        <a class="nav-link" href="dashboardemp.php?link=home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <span>Forms</span>
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse  <?php echo $page ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Forms:</h6>
            <a class="collapse-item" href="forms.php?id=leave">Leave Form</a>
            <a class="collapse-item" href="forms.php?id=ob">OB Form</a>
            <a class="collapse-item" href="forms.php?id=personnel">Personnel Action Form</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Forms:</h6>
            <a class="collapse-item" href="forms.php?id=rtw">RTW & OT Slip</a>
            <a class="collapse-item" href="forms.php?id=timesheet">Weekly Timesheet</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>