<?php
    require '../../php/config.php'; 
    $us_id = $_POST["us_id"];
    $us_pref_id = $_POST["us_pref_id"];
    $us_fname = $_POST["us_fname"];
    $us_lname = $_POST["us_lname"];
    $us_role_id = $_POST["role_id"]; 
    $us_username = $_POST["us_username"]; 
    $us_password = $_POST["us_password"];
    $us_gov_id = 0;
    
    $sql = "UPDATE `sfa_user` 
            SET 
            `us_fname`='$us_fname',
            `us_lname`='$us_lname',
            `us_username`='$us_username',
            `us_gov_id`='$us_gov_id',
            `us_role_id`='$us_role_id',
            `us_pref_id`='$us_pref_id'";
    if (trim($us_password) != "") {
        $sql .= ", `us_password` = '$us_password'";
    }
    $sql .= " WHERE us_id = $us_id";
    $query = mysqli_query($con, $sql); 


    echo "<script>
    alert('เเก้ไขผู้ใช้งานสำเร็จ');
    window.location.href='../?content=list-user';
    </script>
    ";
?>