<?php 
     session_start();
     require '../../php/config.php'; 
     $us_pref_id = $_POST["us_pref_id"];
     $us_fname = $_POST["us_fname"];
     $us_lname = $_POST["us_lname"];
     $us_role_id = $_POST["role_id"]; 
     $us_username = $_POST["us_username"]; 
     $us_password = $_POST["us_password"];
     $us_gov_id = 0;

     $sql = "INSERT INTO `sfa_user`(`us_fname`, `us_lname`, `us_username`, `us_password`, `us_gov_id`, `us_role_id`, `us_pref_id`) 
              VALUES ('$us_fname', '$us_lname', '$us_username', '$us_password', '$us_gov_id', '$us_role_id', '$us_pref_id')";
     $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
     echo "<script>window.location.href='../?content=list-user'</script>";
?>