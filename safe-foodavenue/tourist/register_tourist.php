<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<?php
    require("../php/config.php"); 
    //session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Register</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.1.0" type="text/css">

    <!-- modal -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <!-- modal -->
</head>

<body class="bg-default">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="../pages/dashboards/dashboard.html">
                <img src="../assets/img/brand/plogo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../pages/dashboards/dashboard.html">
                                <img src="../assets/img/brand/favicon.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item">
            <a href="../pages/dashboards/dashboard.html" class="nav-link">
              <span class="nav-link-inner--text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/examples/pricing.html" class="nav-link">
              <span class="nav-link-inner--text">Pricing</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/examples/login.html" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/examples/register.html" class="nav-link">
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/examples/lock.html" class="nav-link">
              <span class="nav-link-inner--text">Lock</span>
            </a>
          </li> -->
                </ul>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <!-- <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Star us on Github">
              <i class="fab fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">สร้างบัญชีใหม่</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary border-0">
                        <!-- <div class="card-header bg-transparent pb-5">
                            <div class="text-muted text-center mt-2 mb-4"><small>สมัครสมาชิกด้วยช่องทางต่อไปนี้</small></div>
                            <div class="text-muted"><h2>สมัครสมาชิก</h2></div>
                            <div class="text-center">
                                <a href="#" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><img src="../assets/img/icons/common/facebook.svg"></span>
                                    <span class="btn-inner--text">Facebook</span>
                                </a>
                                <a href="#" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                                    <span class="btn-inner--text">Google</span>
                                </a>
                            </div>
                        </div> -->
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <!-- <small>หรือลงทะเบียนกับทางเว็บไซต์</small> -->
                                <h2>สมัครสมาชิกกับทางเว็บไซต์</h2>
                            </div>
                            <form role="form" id="register" action="./register_db.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>

                                        <select name="us_pref_id" id="us_pref_id" class="form-control" required>
                                            <option value="" selected disabled>เลือกคำนำหน้า</option>
                                            <option value="1">นาย</option>
                                            <option value="2">นาง</option>
                                            <option value="3">นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="ชื่อจริง" type="text" name="us_fname" id="us_fname" oninput="check_username()">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="นามสกุล" type="text" name="us_lname" id="us_lname" oninput="check_name()">
                                    </div>
                                    <span style='color:red' id="status_fname"></span>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="" selected disabled>เพศ</option>
                                            <option value="1">ชาย</option>
                                            <option value="2">หญิง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="วันเกิด" type="date" name="birthdate" id="birthdate">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="เลขบัตรประชาชน" type="text" name="id_card" id="id_card">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="เบอร์โทรศัพท์" type="text" name="tel" id="tel" required>
                                    </div>
                                </div> -->
                                <hr>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="ชื่อผู้ใช้" type="text" name="us_username" id="us_username" oninput="check_username()">
                                    </div>
                                    <span style='color:red' id="status_username"></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" type="password" name="us_password" id="us_password" placeholder="รหัสผ่านอย่างน้อย 8 ตัวอักษร" minlength="8" onkeyup="confirm_pass()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="ยืนยันรหัสผ่าน" type="password" name="confirm_password" id="confirm_password" onkeyup="confirm_pass()">
                                    </div>
                                    <span style='color:red' id="invalid_password"></span>
                                </div>
                                <!-- <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div> -->
                                <div class="row my-4">
                                    <div class="col-12">
                                        <!-- <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" id="customCheckRegister" type="checkbox" required="required">
                                            <label class="custom-control-label" for="customCheckRegister">
                                                <span class="text-muted">ยืนยันการอนุญาตให้ระบบสามารถจัดเก็บข้อมูลส่วนบุคคลของท่านจากการขอใช้บริการ <a href="">Privacy Policy</a></span>
                                            </label>
                                        </div> -->
                                        <div class="custom-control custom-control-alternative  custom-checkbox custom-control-inline">
               <input name="uaccept" id="uaccept_0" type="checkbox" required="required" class="custom-control-input" value="pdpa"> 
               <label for="uaccept_0" class="custom-control-label"><span class="text-muted">ยืนยันการอนุญาตให้ระบบสามารถจัดเก็บข้อมูลส่วนบุคคลของท่านจากการขอใช้บริการ</span> <a data-toggle="modal" data-target="#privacy"><u>Privacy Policy</u></a></label>
          </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary mt-4">สร้างบัญชีใหม่</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--modal -->
  <div class="modal fade" id="privacy" role="dialog">
    <div class="modal-dialog"  style="max-width: 780px;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background: black ;color: white;">
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h4 class="modal-title text-muted">นโยบายความเป็นส่วนตัว (Privacy Policy) และการคุ้มครองข้อมูลส่วนบุคคล</h4>
        </div>
        <div class="modal-body">
            <h2>ddddddddddd<h2>
            <p>
dddd
            <!--  รายละเอียดนโยบาย PDPA ของหน่วยงาน -->
            </p>

            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default text-muted" data-dismiss="modal">&times; ปิดหน้าต่าง</button>
        </div>
      </div>
      
    </div>
  </div>
   <!-- modal -->
        </div>
        
        
    </div>
    
    <!-- Footer -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="../assets/js/demo.min.js"></script>
    <script>
        var chk_password = 0;
        var chk_name = 0;
        var chk_username = 0;
    function check_username() {
        jQuery.ajax({
            url: "<?php echo "check_username.php" ?>",
            data: 'us_username=' + $("#us_username").val(),
            type: "POST",
            success: function(data) {
                $("#status_username").html(data);
            },
            error: function() {}
        });
        // jQuery.ajax({
        //     url: "<?php echo "check_username.php" ?>",
        //     data: 'username=' + $("#username").val(),
        //     type: "POST",
        //     success: function(data) {
        //         $("#status_username").html(data);
        //     },
        //     error: function() {}
        // });
    }

    function check_name() {
        jQuery.ajax({
            url: "check_username.php",
            data: {
                us_fname: $("#us_fname").val(),
                us_lname: $("#us_lname").val()
            },
            type: "POST",
            success: function(data) {
                $("#status_fname").html(data);
            },
            error: function() {}
        });
    }

    function submit_log() {
        if (confirm("ยืนยันการสมัครสมาชิก")) {
            document.getElementById("register").submit();
        }
    }

    function confirm_pass() {
        if ($('#us_password').val() != $('#confirm_password').val() && $('#confirm_password').val() == null || $('#confirm_password').val() == "") {
            $('#invalid_password').text('');
            chk_password = 1;
            check_btn_submit();
        } else if ($('#us_password').val() != $('#confirm_password').val()) {
            $('#invalid_password').text('รหัสผ่านไม่ถูกต้อง');
            chk_password = 1;
            check_btn_submit();
        } else {
            $('#invalid_password').text('');
            chk_password = 0;
            check_btn_submit();
        }
    }

    function check_btn_submit() {
        if (chk_password == 1 || chk_username == 1 || chk_name == 1) {
            $('#cf_btn').prop('disabled', true);
        } else {
            $('#cf_btn').prop('disabled', false);
        }
    }
    </script>
</body>

</html>