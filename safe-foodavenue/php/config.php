<?php
// session_start();
      $serverName = "db";
      $username = "manpower";
      $password = "some_password";
      $dbName = "manpower";
      $con = mysqli_connect($serverName,$username,$password,$dbName);
      mysqli_query($con, "SET NAMES utf8");
      if(mysqli_connect_errno())
      {
         echo "Database Connect Failed: " .mysqli_connect_error();
      }
      else
      {
        //  echo "Database Connected.";
      }
?> 