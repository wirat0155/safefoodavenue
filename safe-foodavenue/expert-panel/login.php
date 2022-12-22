<!-- 
  /*
  * login
  * login
  * @input -
  * @output -
  * @author Jutamas Thaptong 62160079
  * @Create Date 2565-07-08
  */ 
-->

 <!DOCTYPE html>
<html>

<head>
  <?php 
      require ("../php/config.php"); 
    ?> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Expert || Safe Food Avenue</title>
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
  <!-- Main content -->
  <div class="main-content" id="panel">
    <div class="container-fluid page-body-wrapper full-page-wrapper" style="margin: 5rem auto;">
      <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                  <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                      <div class="row">
                          <div class="col-md py-5">
                              <img src="../assets/img/brand/plogo.png" style="width: 100%;">
                          </div>
                      </div>
                      <h1>ลงชื่อเข้าใช้ของผู้เชี่ยวชาญ</h1>
                      <form action="./do_login.php" method="post" class="pt-3">
                          <div class="form-group">
                              <input type="text" class="form-control form-control-lg" id="txtUsername" name="txtUsername" placeholder="Username">
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control form-control-lg" id="txtPassword" name="txtPassword" placeholder="Password">
                          </div>
                          <div class="mt-3">
                              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                  เข้าสู่ระบบ
                              </button>
                          </div>
                          <div class="my-2 d-flex justify-content-between align-items-center">
                              <div class="form-check">
                                  <label class="form-check-label text-muted">
                                  <input type="checkbox" name="keepme" class="form-check-input">
                                  Keep me signed in
                                  <i class="input-helper"></i></label>
                              </div>
                          </div>
                          <div class="text-center mt-4 font-weight-light">
                              Don't have an account? <a href="register.html" class="text-primary">Create</a>
                          </div>
                      </form>
                  </div>
              </div>
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
</body>

</html>

