<?php
require_once '../vendor/autoload.php';
$clientID = '<867635099034-4pmf85ehtflileje2s0ks7i3cqtsk059.apps.googleusercontent.com>';
$clientSecret = '<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>';
$redirectUri = '<https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/login/login_google.php>';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");