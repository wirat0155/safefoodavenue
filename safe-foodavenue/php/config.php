<?php
  // session_start();
  is_file('../vendor/autoload.php') ? require_once('../vendor/autoload.php') : require_once('../../vendor/autoload.php');
  // init configuration
  $clientID = '867635099034-0amvr55dhcpdokjap2dg86gdnqf4ugvr.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'https://www.safefood-avenue.com/login/login_google.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

  
  // DB configuration
  $serverName = "db";
  $username = "manpower";
  $password = "some_password";
  $dbName = "manpower";
  $con = mysqli_connect($serverName,$username,$password,$dbName);
  mysqli_query($con, "SET NAMES utf8");
  if(mysqli_connect_errno())
  {
      echo "Database Connect Failed: " .mysqli_connect_error();
  }
  else
  {
    //  echo "Database Connected.";
  }
?> 