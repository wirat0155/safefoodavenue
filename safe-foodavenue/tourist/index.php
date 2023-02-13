<?php
session_start();
require("../php/config.php");
include("date_helper.php");
// ob_start();
// if($_SESSION["username"] =="") {
//     echo("<script>location.href = '../login/login.php';</script>");
//     // header("location:./login/login.php");

//     exit();
//   }
//   
?>
<!-- 
/*
* index
* index
* @input - 
* @output -
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-24
*/ 
-->
<!DOCTYPE html>
<html>

<head>
  <?php
  require("../php/config.php");
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Tourist || Safe Food Avenue</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/buu.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.1.0" type="text/css">
  <link rel="stylesheet" href="../assets/js/rateit.js/rateit.css" type="text/css">


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsQsJq6QLsJRyETeDLBLyc6Wx73snZPIo&callback=initMap"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<style>
  body {
    font-family: 'Prompt';
  }

  .form-control {
    color: black !important;
  }

  .select2-container .select2-selection--single {
    height: 47px !important;
    font-size: 0.85rem;
    border-color: #DDD;
  }

  .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
    background-color: #5e72e4;
  }

  .loader_bg {
    position: fixed;
    z-index: 9999999;
    background: #fff;
    width: 100%;
    height: 100%;
    text-align: center;
    justify-content: center;
    align-items: center;
    display: none;

  }

  ::-webkit-scrollbar {
    display: none;
  }

  .loader4 {
    width: 200px;
    height: 200px;
    margin-top: 6rem;
    position: absolute;
    padding: 0px;
    border-radius: 100%;
    border: 5px solid;
    border-top-color: rgba(246, 36, 89, 1);
    border-bottom-color: rgba(255, 255, 255, 0.3);
    border-left-color: rgba(246, 36, 89, 1);
    border-right-color: rgba(255, 255, 255, 0.3);
    -webkit-animation: loader4 1s ease-in-out infinite;
    animation: loader4 1s ease-in-out infinite;
  }

  @keyframes loader4 {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  @-webkit-keyframes loader4 {
    from {
      -webkit-transform: rotate(0deg);
    }

    to {
      -webkit-transform: rotate(360deg);
    }
  }
</style>

<body>

  <div class="loader_bg">

    <span class="loader4"></span>

  </div>

  <!-- Sidenav -->
  <!-- </?php include("sidebar.php"); ?>  -->
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("topbar.php"); ?>
    <!-- Header -->
    <!-- Header -->
    <?php
    //Page content wil be included here... 
    $content = $_GET["content"];
    $path = "./pages/" . $content . ".php";

    if (file_exists($path)) {
      include($path);
    } else {
      include("./pages/blank.php");
    }

    ?>
  </div>
  <script>
    $(document).ready(function() {
      $('.select2').select2();
    });
  </script>
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

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="../assets/js/rateit.js/jquery.rateit.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

</body>

</html>