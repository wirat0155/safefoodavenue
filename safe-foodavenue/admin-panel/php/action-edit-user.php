<?php
require '../../php/config.php'; 
    //  $bid = $_POST["block_id"]; 
     $user_id = $_POST["us_id"];
     $prefix = $_POST["us_pre_id"];
     $fname = $_POST["us_fname"];
     $lname = $_POST["us_lname"];
     $role = $_POST["role_id"]; 
     $username = $_POST["us_username"]; 
     $password = $_POST["us_password"];
     
     $sql = "UPDATE `sfa_user` SET `us_fname`=' $fname', `us_lname`='$lname', `us_username`='$username', `us_password`='$password', 
     `us_role_id`='$role', `us_pre_id`= '$prefix' WHERE us_id = $user_id"; 
     $query = mysqli_query($con, $sql); 

     echo "<script>
     alert('เเก้ไขผู้ใช้งานสำเร็จ');
     window.location.href='../?content=list-user';
     </script>
     ";
?>