<?php
  require("../php/config.php");
  foreach($_POST["menu_name"] as $key => $menu_name){
    $sql = "INSERT INTO `sfa_menu`(`menu_res_id`, `menu_name`) VALUES ('" . $_POST["res_id"] . "','$menu_name')";
    mysqli_query($con, $sql);
  }

  echo "<script>
  alert('เพิ่มข้อมูลเรียบร้อย');
  window.location.href='./?content=list-menu&res_id=" . $_POST["res_id"] . "';
  </script>";
?>