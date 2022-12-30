<?php
     session_start();
     require '../../php/config.php'; 
     
     $gov_name =  $_POST["gov_name"];
     $gov_province_id = $_POST["gov_province_id"]; 
     $gov_created_by = $_SESSION["us_id"];
     $gov_updated_by = $_SESSION["us_id"] ;
     date_default_timezone_set('Asia/Bangkok');
     $gov_created_date = date("Y-m-d H:i:s");
     $gov_updated_date = date("Y-m-d H:i:s");
     $sql ="INSERT INTO `sfa_government` (`gov_name`, `gov_province_id`, `gov_created_by`, `gov_created_date`, `gov_updated_by`, `gov_updated_date`)
       VALUES ('$gov_name','$gov_province_id', '$gov_created_by', '$gov_created_date', '$gov_updated_by', '$gov_updated_date' )";
    $result = mysqli_query($con, $sql);
    $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
     echo "<script>window.location.href='../?content=list-government';</script>";
?>