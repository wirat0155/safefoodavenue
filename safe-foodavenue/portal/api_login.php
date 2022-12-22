<?php
// session_start();
$link = mysqli_connect('db', 'team2', 'team2@2021', 'team2');
mysqli_set_charset($link, 'utf8');
$requestMethod = $_SERVER["REQUEST_METHOD"];
if($requestMethod == 'POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];
    // $sql = "SELECT * FROM dcs_tourist WHERE tus_username = '$username' AND tus_password= '$password'";
    // $result = mysqli_query($link, $sql);
    //echo $result;
    // if(mysqli_num_rows($result) > 0) {
    //   echo "
    //       <script>
    //         alert('เข้าสู่ระบบสำเร็จ');
    //       </script>
    //     ";
    //     return;
    // } else {
    //     echo "
    //       <script>
    //         alert('เข้าสู่ระบบไม่สำเร็จ');
    //       </script>
    //     ";
    //     return;
    //   }
    
    //   header("location: index.php");
    
    echo json_encode($username);
    
}
?>