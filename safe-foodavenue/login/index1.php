<?php
session_start();
require_once('LineLogin.php');
require_once '../php/config.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php
// if (isset($_SESSION['profile'])) {
//     $profile = $_SESSION['profile'];
//     $user_fname=$profile->name;
//     $user_email=$profile->email;
    //print_r($profile);
  //   $sql = "SELECT * FROM sfa_user WHERE us_username ='$user_email'";
  //   $result = mysqli_query($con, $sql);
  //   if (mysqli_num_rows($result) > 0) {
  //       $row = mysqli_fetch_assoc($result);
  //       $_SESSION["us_id"] = $row["us_id"];
  //       $_SESSION["us_username"] = $row["us_username"];
  //       $_SESSION["us_fullname"] = $row["us_fname"];
  //       $_SESSION["us_role_id"] = 3;
  //   echo "<script>
  //   window.location.href='../tourist/?content=disp-block-map';
  //   </script>
  //   ";
  //  }else {
  //   // user is not exists
  //   $user_email=$profile->email;
  //   $user_fname=$profile->name;
  //   $sql = "INSERT INTO sfa_user (us_username, us_fname, us_lname, us_role_id, us_accept_password) VALUES ('$user_email', '$user_fname',
  //  'lname', 3, 0)";
  //   //echo $sql;
  // //  exit();
  //   $result = mysqli_query($con, $sql) or die('error');

  //   if ($result) {
  //     //$token = $userinfo['token'];
  //   } else {
  //      echo "User is not created";
  //   //   die();
  //   }
    // echo "<script>
    // window.location.href='../tourist/?content=disp-block-map';
    // </script>
    // ";
  // }
    // echo '<img src="', $profile->picture, '/large">';
    // echo '<p>Name: ', $profile->name, '</p>';
    // echo '<p>Email: ', $profile->email, '</p>';
     //echo '<a href="do_logout.php">Logout</a>';
//}
//else {
    $line = new LineLogin();
    $link = $line->getLink();
    echo '<a href="', $link, '" id = "line_login"></a>';
    ?>
    <script>
      $(document).ready(function(){
        window.location = document.getElementById('line_login').href
});

    </script>
