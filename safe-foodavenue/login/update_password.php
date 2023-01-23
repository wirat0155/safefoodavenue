<?php
require_once '../php/config.php';
$token = $_POST["token"];
    $password = $_POST["us_password"];
    
    
    $sql = "UPDATE sfa_user SET  `us_password` =  '$password'
    WHERE `us_password` = '$token'";
    $query =  mysqli_query($con,$sql);

    echo "<script>
    alert('เปลี่ยนรหัสผ่านสำเร็จ');
    window.location.href='../login/login.php';
    </script>
    ";
?>