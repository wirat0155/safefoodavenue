<?php
session_start();
  require("../php/config.php");
  ob_start();
// if($_SESSION["username"] =="") {
//     echo("<script>location.href = '../login/login.php';</script>");
//     // header("location:./login/login.php");
 
//     exit();
//   }
//   ?>
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
      require ("../php/config.php"); 
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsQsJq6QLsJRyETeDLBLyc6Wx73snZPIo&callback=initMap"></script>
</head>

<style>
  body {
    font-family: 'Prompt';
  }
</style>

<body>
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
        $path = "./pages/". $content . ".php";

        if(file_exists($path)){
          include($path);  
        }
        else{
          include("./pages/blank.php"); 
        }
        
    ?> 
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