<?php
error_reporting(E_ALL & ~E_WARNING);
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    require("../php/config.php");
    
    //require_once('LineLogin.php');
    // require("config.php");
    ?>

   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login || Safe Food Avenue</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/buu.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.1.0" type="text/css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADQJLBR2n_WOLPbxOmLLSvR6XN0AibN-0&callback=initMap"></script>
</head>

<style>
    body {
        font-family: 'Prompt';
    }
</style>

<body>
<nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark">
        <div class="container">

            <a class="navbar-brand" href="../index.php">
                <img src="../assets/img/brand/plogo.png">
            </a>

            <div class="col-6">
                <img src="../assets/img/brand/logo-saensuk.png">
                <!-- <img src="./assets/img/brand/AHS_BUU_Logo.png"> -->
                <img src="../assets/img/brand/Buu-logo11.png">
                <img src="../assets/img/brand/Research-innovation.png">
            </div>

            <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">

                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../aboutme.php" style="font-size: 16px; color:black;">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tourist/register_tourist.php" style="font-size: 16px; color:black;">ลงทะเบียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/login.php" style="font-size: 16px; color:black;">เข้าสู่ระบบ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="container-fluid page-body-wrapper full-page-wrapper" style="margin:  auto;">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-5 mx-auto px-5">
                      <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="card">
                          <div class="card-body">
                            <!-- <div class="row">
                                <div class="col-md py-5 px-5">
                                    <img src="../assets/img/brand/plogo.png" style="width: 100%;">
                                </div>
                            </div> -->
                            <div class="text-muted"><h2>ลืมรหัสผ่าน</h2></div>
                            <form action="./send_password.php" method="post" class="pt-3">
                              <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="txtUsername" name="txtUsername" placeholder="ชื่อผู้ใช้งาน">
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="txtEmail" name="txtEmail" placeholder="อีเมล">
                              </div>
                              <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="btn_login">
                                  ลืมรหัสผ่าน
                                </button>
                              </div>
                            
                              
                              
                              <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                  <label class="form-check-label text-muted">
                                    <input type="checkbox" name="keepme" class="form-check-input">
                                    Keep me signed in
                                    <i class="input-helper"></i></label>
                                </div>
                              </div> -->
                              <!-- <div class="text-center mt-4 font-weight-light">
                                มีบัญชีหรือไม่? <a href="https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/tourist/register_tourist.php" class="text-primary">สร้างบัญชีใหม่</a>
                              </div> -->
                            </form>
                            
                          </div>
                        </div>
                        <!-- <input type="reset" class="btn btn-secondary" value="กลับ" onclick="location.href='login.php'"> -->
                      </div>
                </div>
                <div class="col-lg-7 mx-auto">
                <!-- <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
<span class="mask bg-gradient-primary opacity-6"></span>
<h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
<p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                </div> -->
                <div class="position-relative h-100 m-3 px-7 d-flex flex-column justify-content-center " style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
<span class="mask bg-gradient-primary opacity-6"></span>
<h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
<p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->


    <script src="../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.1.0"></script>
    <!-- Datatable -->
</script> 
</body>
</html>