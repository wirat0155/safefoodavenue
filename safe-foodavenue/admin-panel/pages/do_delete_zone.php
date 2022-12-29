<?php 
  session_start();
  require("../php/config.php"); 
  $sql = "DELETE FROM `sfa_zone` WHERE `zone_id` = " . $_GET["zone_id"];
  $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
  echo "<script>window.location.href='./?content=list-zone';</script>";
?>