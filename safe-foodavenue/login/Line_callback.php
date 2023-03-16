<?php
session_start();
require_once('LineLogin.php');
require_once '../php/config.php';
//require_once ('login.php');
$line = new LineLogin();
$get = $_GET;

$code = $get['code'];
$state = $get['state'];
//echo $code;
echo "<br>";
//echo $state;
echo "<br>";
$token = $line->token($code, $state);
echo "<br>";
//echo $token;
// if (property_exists($token, 'error'))
//     echo "<script>
//     window.location.href='login.php';
//     </script>
//     ";
// if (isset($token->error))
//     echo "<script>
//     window.location.href='login.php';
//     </script>
//     ";
    // echo "<script>
    // window.location.href='index.php';
    // </script>
    // ";
    //    echo "<script>
    // window.location.href='../tourist/?content=disp-block-map';
    // </script>
    // ";

if ($token->id_token) {
    $profile = $line->profileFormIdToken($token);
    $_SESSION['profile'] = $profile;
    // echo $profile->name;
    // print_r($profile);
    // echo "<script>
    // window.location.href='login.php';
    // </script>
    // ";
  //   $profile = $_SESSION['profile'];
    $user_fname=$profile->name;
    $user_email=$profile->email;
    //print_r($profile);
    $sql = "SELECT * FROM sfa_user WHERE us_username ='$user_email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["us_id"] = $row["us_id"];
        $_SESSION["us_line_username"] = $row["us_username"];
        $_SESSION["us_line_fullname"] = $row["us_fname"];
        $_SESSION["us_role_id"] = 3;
    // echo "<script>
    // window.location.href='../tourist/?content=disp-block-map';
    // </script>
    // ";
   }else {
    // user is not exists
    $user_email=$profile->email;
    $user_fname=$profile->name;
    $sql = "INSERT INTO sfa_user (us_username, us_fname, us_role_id, us_accept_password) VALUES ('$user_email', '$user_fname'
   , 3, 0)";
    //echo $sql;
  //  exit();
    $result = mysqli_query($con, $sql) or die('error');
    if ($result) {
      //$token = $userinfo['token'];
    } else {
       echo "User is not created";
    //   die();
    }
  }
  echo "<script>
  window.location.href='../tourist/?content=disp-block-map';
  </script>
  ";
} else {
  echo "ไม่เข้า token";
}
?>