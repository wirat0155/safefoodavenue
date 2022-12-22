<!-- 
  /*
  * do_login_admin
  * do_login_admin
  * @input -
  * @output -
  * @author Jutamas Thaptong 62160079
  * @Create Date 2565-07-08
  */ 
-->


<?php

session_start();
require("../php/config.php");

$sql = "
    SELECT * 
    FROM sfa_user
    WHERE us_username	= '" . trim($_POST["txtUsername"]) . "'
    AND us_password	= '" . trim($_POST["txtPassword"]) . "'
  ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

  $row = mysqli_fetch_array($result);
  $_SESSION["id_admin"] = $row["us_id"];
  $_SESSION["username_admin"] = $row["us_fname"] . " " . $row["us_lname"];
  $_SESSION["name_admin"] = $row["us_password"];
  $_SESSION["role"] = $row["us_role"];
  if ($_SESSION["role"] = 1) {

    header("location: index.php");
  } else if ($_SESSION["role"] = 2) {
    "
      <script>
        alert('เข้าสู่ระบบไม่สำเร็จ');
        window.history.back();
      </script>
    ";
  }
  if (isset($_POST["keepme"])) {
    $_SESSION["is_keep_me"] = $_POST["keepme"];
  }
} else {

  echo "
      <script>
        alert('เข้าสู่ระบบไม่สำเร็จ');
        window.history.back();
      </script>
    ";

  return;
}



?>