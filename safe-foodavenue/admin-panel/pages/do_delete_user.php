<?php 
  session_start();
  require("../php/config.php"); 
    
  $sql = "DELETE FROM `sfa_user` WHERE `us_id` = " . $_GET["us_id"];
  mysqli_query($con, $sql);
  $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
  echo "<script>window.location.href='./?content=list-user';</script>";
?>