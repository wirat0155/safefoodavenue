<?php
require("../php/config.php");
//code check restaurant name
if (!empty($_POST["res_title"]) && !empty($_POST["zone_id"])) {
  $sql = "SELECT * FROM `sfa_restaurant` 
          WHERE `sfa_restaurant`.`res_title` = '" . $_POST["res_title"] . "' 
          AND `sfa_restaurant`.`res_zone_id` = '" . $_POST["zone_id"] . "'";
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0){
    echo json_encode("duplicate");
  } else {
    echo json_encode("ok");
  }
}

// End code check restaurant

//Code check block
if (!empty($_POST["block_title"]) && !empty($_POST["zone_id"])) {
  $sql = "SELECT * FROM `sfa_block` 
          WHERE `block_zone_id` = '". $_POST["zone_id"] . "' AND `block_title` = '" . $_POST["block_title"] . "'";
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0){
    echo json_encode("duplicate");
  } else {
    echo json_encode("ok");
  }
}
// End code check block

//Code check zone
if (!empty($_POST["zone_title"])) {
  $result2 = mysqli_query($con, "SELECT count(*) FROM sfa_zone WHERE zone_title='" . $_POST["zone_title"] . "'");
  $row1 = mysqli_fetch_row($result2);
  $zone_count = $row1[0];
  if ($zone_count > 0) {
    echo json_encode("duplicate");
  } else {
    echo json_encode("ok");
  }
}
// End code check zone

//Code check role
if (!empty($_POST["role_title"])) {
  $result3 = mysqli_query($con, "SELECT count(*) FROM sfa_role WHERE role_title='" . $_POST["role_title"] . "'");
  $row1 = mysqli_fetch_row($result3);
  $role_count = $row1[0];
  if ($role_count > 0) {echo "<span style='color:red'> มีประเภทผู้ใช้งานนี้แล้ว </span>";
    // echo "<script>$('#submit').prop('disabled',true);</script>";
  } else {
    echo "<span style='color:green'> ประเภทผู้ใช้งานนี้สามารถใช้งานได้ </span>";
    // echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
// End code check zone

//Code check us_username
if (!empty($_POST["us_username"])) {
  $result4 = mysqli_query($con, "SELECT count(*) FROM sfa_user WHERE us_username='" . $_POST["us_username"] . "'");
  $row1 = mysqli_fetch_row($result4);
  $username_count = $row1[0];
  if ($username_count > 0) {
    echo "duplicate";
  } else {
    echo "ok";
  }
}

//Code check us_government_name
if (!empty($_POST["us_government_name"])) {
  $result = mysqli_query($con, "SELECT * FROM sfa_government WHERE gov_name ='" . $_POST["us_government_name"] . "'");
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0){
    echo json_encode("duplicate");
  } else {
    echo json_encode("ok");
  }
}

// Code check us_fname and lname
if (!empty($_POST["us_fname"]) && !empty($_POST["us_lname"])) {
  $us_fname = trim($_POST["us_fname"]);
  $us_lname = trim($_POST["us_lname"]);
  if ($us_fname !== "" && $us_lname !== "") {
  
    $sql = "
      SELECT * FROM sfa_user WHERE us_fname = '".$us_fname."' AND us_lname='".$us_lname."'
    ";
    $result = mysqli_query($con, $sql);
  
    if(mysqli_num_rows($result) > 0){
      echo "duplicate";
    } else {
      echo "ok";
    }
  }
}
?>