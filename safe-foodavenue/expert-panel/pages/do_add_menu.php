<?php
  require("../php/config.php");
  $is_pass = true;
  mysqli_query($con, "BEGIN");
  if (isset($_POST["menu_default_name"])) {
    foreach($_POST["menu_default_name"] as $key => $menu_name){
      $sql = "INSERT INTO `sfa_menu`(`menu_res_id`, `menu_name`) VALUES ('" . $_POST["res_id"] . "','$menu_name')";
      $insert_menu = mysqli_query($con, $sql);
      $is_pass = $is_pass == true? $insert_menu : $is_pass;
    }
  }

  foreach($_POST["menu_name"] as $key => $menu_name){
    if (trim($menu_name) != "") {
      $sql = "INSERT INTO `sfa_menu`(`menu_res_id`, `menu_name`) VALUES ('" . $_POST["res_id"] . "','$menu_name')";
      $insert_menu = mysqli_query($con, $sql);
      $is_pass = $is_pass == true? $insert_menu : $is_pass;
    }
  }


  if ($is_pass) {
    mysqli_query($con, "COMMIT");
    $_SESSION["crud-status"] = "0";
  } else {
    mysqli_query($con, "ROLLBACK");
    $_SESSION["crud-status"] = "1";
  }
  echo "<script>window.location.href='./?content=list-menu&res_id=" . $_POST["res_id"] . "';</script>";
?>