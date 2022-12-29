<?php
  session_start();
  require("../../php/config.php");
  $fcl_id = $_GET["fcl_id"];
  $fcl_status = $_GET["fcl_status"];

  $sql = "UPDATE `sfa_formalin_checklist` 
  SET `fcl_status`= $fcl_status
  WHERE fcl_id =  $fcl_id";

  $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
  echo "<script>window.location.href='../?content=list-formalin-checklist';</script>";
?>