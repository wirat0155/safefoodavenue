<?php
  session_start();
  require("../php/config.php");
  $sql = "DELETE FROM `sfa_role` WHERE `role_id` = " . $_GET["role_id"];
  $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
  echo "<script>window.location.href='./?content=list-user-role';</script>";
?>