<?php
    session_start();
    require '../../php/config.php'; 
    $user_id = $_POST["us_id"];
    $prefix = $_POST["us_pref_id"];
    $fname = $_POST["us_fname"];
    $lname = $_POST["us_lname"];
    $role = $_POST["role_id"]; 
    $username = $_POST["us_username"]; 
    $password = $_POST["us_password"];
    
    $sql = "UPDATE `sfa_user` SET `us_fname`=' $fname', `us_lname`='$lname', `us_username`='$username', ";
    if ($password != "") {
        $sql .= "`us_password` = '$password', ";
    }
    $sql .= "`us_role_id`='$role', `us_pref_id`= '$prefix' WHERE `us_id` = $user_id";
    mysqli_query($con, $sql);
    echo "<script>window.location.href='../?content=list-user'</script>";
?>