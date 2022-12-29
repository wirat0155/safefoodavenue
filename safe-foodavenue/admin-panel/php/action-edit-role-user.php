<?php
     session_start();
     require '../../php/config.php'; 
     $role_id = $_POST["role_id"];
     $role = $_POST["role_title"]; 
     $sql = "UPDATE `sfa_role` SET `role_title`= '$role' WHERE role_id = $role_id"; 
     $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
     echo "<script>window.location.href='../?content=list-user-role';</script>";
?>