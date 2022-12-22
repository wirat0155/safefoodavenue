<!-- <?php
require_once 'config.php';
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
  
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    echo "<pre>";
    printr($google_account_info);
    // $email =  $google_account_info->email;
    // $name =  $google_account_info->name;
  
    // now you can use this profile info to create account in your website and make user logged in.
  } 
?> -->
<?php
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
   $sql = "SELECT * FROM sfa_user WHERE us_username ='{$userinfo['email']}'";
   $result = mysqli_query($con, $sql);
   if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $_SESSION["id_user"] = $row["us_id"];
    $_SESSION["google_username"] = $row["us_fname"] . " " . $row["us_lname"];
    $userinfo = mysqli_fetch_assoc($result);
    // $token = $userinfo['token'];
    //header("location: ../tourist/?content=list-restaurant ");
   }else {
    // user is not exists
    $sql = "INSERT INTO sfa_user (us_username, us_fname, us_lname, us_role_id) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', 3)";
    $result = mysqli_query($con, $sql);
    if ($result) {
      $token = $userinfo['token'];
    } else {
      echo "User is not created";
      die();
    }
    //header("location: ../tourist/?content=list-restaurant ");
  }
  header("location: ../tourist/?content=list-restaurant ");
  //   // user is exists
  //   $userinfo = mysqli_fetch_assoc($result);
  //   $token = $userinfo['token'];
  //   $_SESSION["id_user"] = $row["us_id"];
  //   $_SESSION["username"] = $row["us_fname"] . " " . $row["us_lname"];
// print_r($userinfo);
//header("location: https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/tourist/?content=disp-block-map");
  // exit;
  // checking if user is already exists in database
  // $sql = "SELECT * FROM sfa_user_google_login WHERE us_username ='{$userinfo['email']}'";
  // $result = mysqli_query($con, $sql);
  // if (mysqli_num_rows($result) > 0) {
  //   // user is exists
  //   $userinfo = mysqli_fetch_assoc($result);
  //   $token = $userinfo['token'];
  // } else {
  //   // user is not exists
  //   $sql = "INSERT INTO sfa_user_google_login (email, first_name, last_name, gender, full_name, picture, verifiedEmail, token) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['gender']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', '{$userinfo['verifiedEmail']}', '{$userinfo['token']}')";
  //   $result = mysqli_query($conn, $sql);
  //   if ($result) {
  //     $token = $userinfo['token'];
  //   } else {
  //     echo "User is not created";
  //     die();
  //   }
  // }

  // save user data into session
  // $_SESSION['user_token'] = $token;
} else {
  if (!isset($_SESSION["google_username"])) {
    header("Location: login.php");
    die();
  }

  // // checking if user is already exists in database
  // $sql = "SELECT * FROM sfa_user_google_login WHERE token ='{$_SESSION['user_token']}'";
  // $result = mysqli_query($conn, $sql);
  // if (mysqli_num_rows($result) > 0) {
  //   // user is exists
  //   $userinfo = mysqli_fetch_assoc($result);
  // }
  // checking if user is already exists in database
  // $sql = "SELECT * FROM sfa_user WHERE us_username ='{$_SESSION["username"]}'";
  // $result = mysqli_query($con, $sql);
  // if (mysqli_num_rows($result) > 0) {
  //   // user is exists
  //   $userinfo = mysqli_fetch_assoc($result);
  // }
//header("location: ../tourist/?content=list-restaurant ");
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

