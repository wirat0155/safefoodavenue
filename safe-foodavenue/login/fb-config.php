<?php
// if(!session_id()){
     //session_start();
// }

require_once '../vendor/autoload.php';

$appid = '906860713771402';
$fb = new \Facebook\Facebook([
    'app_id' => $appid,
    'app_secret' => '44bf9f813bb5ddef5b7e32ab01e70a48',
    'default_graph_version' => 'v2.10',
    
  ]);
?>