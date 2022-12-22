<?php
session_start();
require_once('LineLogin.php');

$line = new LineLogin();
$get = $_GET;

$code = $get['code'];
$state = $get['state'];
$token = $line->token($code, $state);

if (property_exists($token, 'error'))
    header('location: index_line.php');

if ($token->id_token) {
    $profile = $line->profileFormIdToken($token);
    $_SESSION['profile'] = $profile;
    header('location: index_line.php');
}

## get profile by token
// $profile = $line->profile($token->access_token);
// print_r($profile);