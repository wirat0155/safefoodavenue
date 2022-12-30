<?php 
  session_start();
  require("../php/config.php"); 
  $sql = "DELETE FROM sfa_government WHERE gov_id = " . $_GET["gov_id"];
  $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
  echo "<script>window.location.href='./?content=list-government';</script>";
?>