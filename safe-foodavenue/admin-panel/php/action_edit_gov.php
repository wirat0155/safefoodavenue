<?php
     session_start();
     require '../../php/config.php'; 

     $gov_id = $_POST["gov_id"];
     $gov_name =  $_POST["gov_name"];
     $gov_province_id = $_POST["gov_province_id"]; 
     //$gov_created_by = NULL;
     $gov_updated_by = $_SESSION["us_id"] ;
     date_default_timezone_set('Asia/Bangkok');
    //$gov_created_date = NULL;
     $gov_updated_date = date("Y-m-d H:i:s");

     $sql ="UPDATE `sfa_government` SET `gov_name` = '$gov_name', `gov_province_id`= '$gov_province_id', `gov_updated_by` = '$gov_updated_by', `gov_updated_date`=' $gov_updated_date' WHERE gov_id = $gov_id";
    $result = mysqli_query($con, $sql);
    $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
     echo "<script>window.location.href='../?content=list-government';</script>";
?>