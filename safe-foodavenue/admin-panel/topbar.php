<?php
session_start();
?>
<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <?php if(isset($_SESSION["us_id"])) { ?>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center ml-md-auto">
              <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </div>
              </li>
              <li class="nav-item d-sm-none">
                <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                  <i class="ni ni-zoom-split-in"></i>
                </a>
              </li>            
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <i class="ni ni-circle-08" style="font-size: 36px;"></i>
                    <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold">
                        <?php 
                          $name_admin = isset($_SESSION["us_fullname"]) ? $_SESSION["us_fullname"] : "John Snow";
                          echo $name_admin;
                        ?>
                      </span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                  </div> -->
                  <!-- <a href="#!" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My profile</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Settings</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span>Activity</span>
                  </a>
                  <a href="#!" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>Support</span>
                  </a> -->
                  <!-- <div class="dropdown-divider"></div> -->
                  <a href="../login/do_logout.php" class="dropdown-item">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                  </a>
                </div>
              </li>
            </ul>

          <?php } else { ?>
            
            <ul class="navbar-nav align-items-center ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="../login/login.php">
                  <div class="media align-items-center">
                    <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold">
                        Sign In
                       
                      </span>
                    </div>
                  </div>
                </a>
              </li>
            </ul>

          <?php } ?>
          

        </div>
      </div>
    </nav>