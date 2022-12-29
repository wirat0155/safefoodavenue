<?php 
  session_start();
  require("../php/config.php"); 
  $sql = "DELETE FROM sfa_block WHERE block_id = " . $_GET["block_id"];
  $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
  echo "<script>window.location.href='./?content=list-block';</script>";
?>