<?php
     session_start();
     require '../../php/config.php'; 
     $role = $_POST["role_title"]; 
     
     $sql = "INSERT INTO `sfa_role`(`role_title`) VALUES ('$role')"; 
     $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
     echo "<script>window.location.href='../?content=list-user-role';</script>";
?>