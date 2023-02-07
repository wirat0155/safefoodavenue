<?php
session_start();
error_reporting(E_ALL & ~E_WARNING);
require_once '../php/config.php';
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $userinfo = [
    'email' => $google_account_info['email'],
    'first_name' => $google_account_info['givenName'],
    'last_name' => $google_account_info['familyName'],
    'gender' => $google_account_info['gender'],
    'full_name' => $google_account_info['name'],
    'picture' => $google_account_info['picture'],
    'verifiedEmail' => $google_account_info['verifiedEmail'],
    'token' => $google_account_info['id'],
  ];
   //print_r($userinfo['email']);
   $sql = "SELECT * FROM sfa_user WHERE us_username ='{$userinfo['email']}'";
   $result = mysqli_query($con, $sql);
   if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["us_id"] = $row["us_id"];
    $_SESSION["us_username"] = $row["us_username"];
    $_SESSION["us_fullname"] = $row["us_fname"] . " " . $row["us_lname"];
    $_SESSION["us_role_id"] = 3;
    //$userinfo = mysqli_fetch_assoc($result);
    //$token = $userinfo['token'];
    //print_r($userinfo);

    if($_SESSION["res_id"]){
     // echo "TEST TESt";
     // header('location: ../tourist/?content=detail-restaurant&id=' . urlencode($_SESSION["res_id"]) );
      echo "<script>
            window.location.href='../tourist/?content=detail-restaurant&id=" . urlencode($_SESSION["res_id"]) . "'" .
            "</script>";

    }else{
       //header("location: ../tourist/?content=disp-block-map");
       echo "<script>
       window.location.href='../tourist/?content=disp-block-map';
       </script>
       ";
    }


   }else {
    // user is not exists
    $user_email=$userinfo['email'];
    $user_fname=$userinfo['first_name'];
    $user_lname=$userinfo['last_name'];
    $sql = "INSERT INTO sfa_user (us_username, us_fname, us_lname, us_role_id, us_accept_password) VALUES ('$user_email', '$user_fname', '$user_lname'
   , 3, 0)";
    $result = mysqli_query($con, $sql) or die('error');

    $sql = "SELECT * FROM sfa_user WHERE us_username ='{$userinfo['email']}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION["us_id"] = $row["us_id"];
    $_SESSION["us_username"] = $row["us_username"];
    $_SESSION["us_fullname"] = $row["us_fname"] . " " . $row["us_lname"];
    $_SESSION["us_role_id"] = 3;

    if ($result) {
      //$token = $userinfo['token'];
    } else {
       echo "User is not created";
    //   die();
    }
    if($_SESSION["res_id"]){
      // echo "TEST TESt";
      // header('location: ../tourist/?content=detail-restaurant&id=' . urlencode($_SESSION["res_id"]) );
       echo "<script>
             window.location.href='../tourist/?content=detail-restaurant&id=" . urlencode($_SESSION["res_id"]) . "'" .
             "</script>";
 
     }else{
        //header("location: ../tourist/?content=disp-block-map");
        echo "<script>
        window.location.href='../tourist/?content=disp-block-map';
        </script>
        ";
     }
  }
} else {
  if (!isset($_SESSION["google_username"])) {
    header("Location: login.php");
    die();
  }
exit;
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>

<body>
  <img src="<?= $userinfo['picture'] ?>" alt="" width="90px" height="90px">
  <ul>
    <li>Full Name: <?= $userinfo['full_name'] ?></li>
    <li>Email Address: <?= $userinfo['email'] ?></li>
    <li>Gender: <?= $userinfo['gender'] ?></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</body> -->

