<?php 
  session_start();
  require("../php/config.php");
  $sql = "DELETE FROM `sfa_formalin_checklist` WHERE `fcl_id` = " . $_GET["fcl_id"];
  $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
  echo "<script>window.location.href='./?content=list-formalin-checklist';</script>";
?>