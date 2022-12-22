<?php
require("../php/config.php");
?>
<?php
// if (!empty($_POST["username"])) {
//   $result = mysqli_query($con, "SELECT count(*) FROM sfa_tourist WHERE tour_username='" . $_POST["username"] . "'");
//   $row = mysqli_fetch_row($result);
//   $username_count = $row[0];
//   if ($username_count > 0) {echo "<span style='color:red'> Username นี้มีผู้ใช้งานแล้ว </span>";
//     // echo "<script>$('#submit').prop('disabled',true);</script>";
//   } else {
//     echo "<span style='color:green'> Username นี้สามารถใช้งานได้ </span>";
//     // echo "<script>$('#submit').prop('disabled',false);</script>";
//   }
// }
if (!empty($_POST["us_username"])) {
  $result4 = mysqli_query($con, "SELECT count(*) FROM sfa_user WHERE us_username='" . $_POST["us_username"] . "'");
  $row1 = mysqli_fetch_row($result4);
  $username_count = $row1[0];
  if ($username_count > 0) {echo "<span style='color:red'> ชื่อผู้ใช้งานซ้ำ </span>";
    // echo "<script>$('#submit').prop('disabled',true);</script>";
  } else {
    echo "<span style='color:green'> ชื่อผู้ใช้งานสามารถใช้ได้ </span>";
    // echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
$us_fname = trim($_POST["us_fname"]);
$us_lname = trim($_POST["us_lname"]);
if ($us_fname !== "" && $us_lname !== "") {

  $sql = "
    SELECT * FROM sfa_user WHERE us_fname = '".$us_fname."' AND us_lname='".$us_lname."'
  ";
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result) > 0){
    echo "<span style='color:red'> ชื่อและนามสกุลของผู้ใช้นี้มีในระบบแล้ว </span>";
  } else {
    echo "<span style='color:green'> ชื่อและนามสกุลนี้ไม่เคยใช้มาก่อน สามารถใช้งานได้ </span>";
  }
}
?>