<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php


use Facebook\Authentication\AccessToken;
require("../php/config.php"); 
include 'fb-config.php';
$helper = $fb->getRedirectLoginHelper();


// $_SESSION['FBRLH_state']=$_GET['state'];
// // if (isset($_GET['state'])) {
// //     $helper->getPersistentDataHandler()->set('state', $_GET['state']);
// // }
$permissions = ['email']; // optional

$loginUrl = $helper->getLoginUrl('http://localhost/login/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '" id = "fb_login"></a>';
//}

?>
<script>
      $(document).ready(function(){
        window.location = document.getElementById('fb_login').href
});

    </script>