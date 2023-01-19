<?php
session_start();
error_reporting(E_ALL & ~E_WARNING);
use Facebook\Authentication\OAuth2Client;

include 'fb-config.php';
require("../php/config.php"); 
$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
if(!isset($accessToken)){
    if($helper->getError()){
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    }else{
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}

// echo '<h3>Access Token</h3>';
// var_dump($accessToken->getValue());

$oAuth2Client = $fb->getOAuth2Client();

$tokenMetadata = $oAuth2Client->debugToken($accessToken);

// echo '<h3>Metadata</h3>';
// var_dump($tokenMetadata);

$tokenMetadata->validateAppId($appid);

$tokenMetadata->validateExpiration();

if(!$accessToken->isLongLived()){
    try {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When Graph returns an error
        echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
        exit;
      } 
      echo '<h3>Long-lived</h3>';
      var_dump($accessToken->getValue());
}

  $_SESSION['fb_access_token'] = (string) $accessToken;
  
  if(isset($_SESSION['fb_access_token'])){
    $token = $_SESSION['fb_access_token'];
    try {
        $response = $fb->get('/me?fields=id,name,email',$token);
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      $user = $response->getGraphUser();

      $sql = "SELECT * FROM sfa_user WHERE us_username ='{$user['email']}'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["us_id"] = $row["us_id"];
            $_SESSION["us_username"] = $row["us_username"];
            $_SESSION["us_fullname"] = $row["us_fname"];
            $_SESSION["us_role_id"] = 3;
            //$userinfo = mysqli_fetch_assoc($result);
            //$token = $userinfo['token'];
            //print_r($userinfo);
            echo "<script>
            window.location.href='../tourist/?content=disp-block-map';
            </script>
            ";
    }else {
            // user is not exists
            $user_email=$user['email'];
            $user_fname=$user['name'];
            $sql = "INSERT INTO sfa_user (us_username, us_fname, us_role_id, us_accept_password) VALUES ('$user_email', '$user_fname'
        , 3, 0)";
            $result = mysqli_query($con, $sql) or die('error');

            $sql = "SELECT * FROM sfa_user WHERE us_username ='{$user['email']}'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION["us_id"] = $row["us_id"];
            $_SESSION["us_username"] = $row["us_username"];
            $_SESSION["us_fullname"] = $row["us_fname"];
            $_SESSION["us_role_id"] = 3;

            if ($result) {
            //$token = $userinfo['token'];
            } else {
            echo "User is not created";
            //   die();
            }
            echo "<script>
            window.location.href='../tourist/?content=disp-block-map';
            </script>
            ";
        }
    //   echo 'Name:' . $user['name'];
    //   echo '<br>';
    //   echo 'Email:' . $user['email'];
    //   echo '<a href="./do_logout.php">Log out</a>';
}
  //header('Location: ../tourist/?content=disp-block-map');

?>