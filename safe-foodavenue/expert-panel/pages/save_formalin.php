<?php 
  session_start();
  mysqli_query($con, "BEGIN");
  $is_pass = true;
  $res_id = $_POST["menu_res_id"];
  $menu_id = $_POST["menu_id"];
  $us_id = $_SESSION["us_id"];
  $for_img_path = $_POST["for_img_path"];
  $for_test_date = date("Y-m-d");
  $for_fcl_id = $_POST["for_fcl_id"];
  $for_status = $_POST["for_status"];
  $for_value = $_POST["for_value"];
  $for_centroid_1 = explode(",", $_POST["Centroid1"]);
  $for_centroid_2 = explode(",", $_POST["Centroid2"]);
  $for_x_center_1 = $for_centroid_1[0];
  $for_y_center_1 = $for_centroid_1[1];
  $for_x_center_2 = $for_centroid_2[0];
  $for_y_center_2 = $for_centroid_2[1];
  $for_radius_1 = $_POST["for_radius_1"];
  $for_radius_2 = $_POST["for_radius_2"];

  $sql = "INSERT INTO `sfa_formalin`(`for_res_id`, `for_menu_id`, `for_expe_id`, `for_img_path`, `for_fcl_id`, `for_test_date`, `for_status`, `for_value`, `for_x_center_1`, `for_y_center_1`, `for_radius_1`, `for_x_center_2`, `for_y_center_2`, `for_radius_2`) 
  VALUES ($res_id, $menu_id, $us_id, '$for_img_path', $for_fcl_id, '$for_test_date', $for_status, $for_value, $for_x_center_1, $for_x_center_2, $for_radius_1, $for_x_center_2, $for_y_center_2, $for_radius_2)";
  $insert_formalin = mysqli_query($con, $sql);
  $is_pass = $is_pass == true? $insert_formalin : $is_pass;


  // update restaurant formalin status
  // 1 = not pass
  $sql = "SELECT * FROM `sfa_res_formalin_status` WHERE `res_for_res_id` = " . $res_id;
  $arr_res_for = mysqli_query($con, $sql);
  $res_for_status = $for_status == 1? 1 : 0;
  if (mysqli_num_rows($arr_res_for) == 0) {
    $sql = "INSERT INTO `sfa_res_formalin_status`(`res_for_res_id`, `res_for_status`, `res_for_last_fcl_id`, `res_for_created_by`, `res_for_updated_by`) VALUES ($res_id, $res_for_status, $for_fcl_id, $us_id, $us_id)";
    $insert_res_formalin_status = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $insert_res_formalin_status : $is_pass;
  } else {
    $obj_res_for = mysqli_fetch_assoc($arr_res_for);
    $now = new DateTime(date('Y-m-d'));
    $db_date = new DateTime(substr($obj_res_for["res_for_updated_date"], 0, 10));

    if ($db_date == $now) {
      if ($obj_res_for["res_for_status"] == 0) {
        $now = date("Y-m-d H:i:s");
        $sql = "UPDATE `sfa_res_formalin_status` SET `res_for_updated_by` = $us_id, 
        `res_for_status` = $res_for_status, `res_for_last_fcl_id` = $for_fcl_id,
        `res_for_updated_date` = '$now'
        WHERE `res_for_id` = " . $obj_res_for["res_for_id"];
        $update_res_formalin_status = mysqli_query($con, $sql);
        $is_pass = $is_pass == true? $update_res_formalin_status : $is_pass;
      }
    } else {
      $now = date("Y-m-d H:i:s");
      $sql = "UPDATE `sfa_res_formalin_status` SET `res_for_updated_by` = $us_id, 
      `res_for_status` = $res_for_status, `res_for_last_fcl_id` = $for_fcl_id, 
      `res_for_updated_date` = '$now'
      WHERE `res_for_id` = " . $obj_res_for["res_for_id"];
      $update_res_formalin_status = mysqli_query($con, $sql);
      $is_pass = $is_pass == true? $update_res_formalin_status : $is_pass;
    }
  }

  if ($is_pass) {
    mysqli_query($con, "COMMIT");
    $_SESSION["crud-status"] = "0";
  } else {
    mysqli_query($con, "ROLLBACK");
    $_SESSION["crud-status"] = "1";
  }
  echo "<script>window.location = 'index.php?content=list-menu&res_id=" . $res_id . "';</script>";
?>