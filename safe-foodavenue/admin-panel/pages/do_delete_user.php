<?php 
  session_start();
  require("../php/config.php"); 
    
  $sql = "DELETE FROM `sfa_user` WHERE `us_id` = " . $_GET["us_id"];
  mysqli_query($con, $sql);
  echo "<script>window.location.href='./?content=list-user';</script>";
?>