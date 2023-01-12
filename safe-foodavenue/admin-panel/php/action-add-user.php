<?php 
     session_start();
     require '../../php/config.php'; 
     $us_pref_id = $_POST["us_pref_id"];
     $us_fname = $_POST["us_fname"];
     $us_lname = $_POST["us_lname"];
     $us_role_id = $_POST["role_id"]; 
     $us_username = $_POST["us_username"]; 
     $us_password = $_POST["us_password"];
     //$us_gov_id = 0;
     $us_gov_id = $_POST["us_gov_id"];
     $us_province = $_POST["us_province"];

     // $gov_name = $_POST["us_government_name"];
     // $gov_province_id = $_POST["us_province"]; 
     // $gov_created_by = $_SESSION["us_id"];
     // $gov_updated_by = $_SESSION["us_id"] ;
     // date_default_timezone_set('Asia/Bangkok');
     // $gov_created_date = date("Y-m-d H:i:s");
     // $gov_updated_date = date("Y-m-d H:i:s");

     if($us_role_id != 3){
          $sql = "INSERT INTO `sfa_user`(`us_fname`, `us_lname`, `us_username`, `us_password`, `us_gov_id`, `us_role_id`, `us_pref_id`, `us_province_id`) 
     VALUES ('$us_fname', '$us_lname', '$us_username', '$us_password',  '$us_gov_id', '$us_role_id', '$us_pref_id', $us_province)";
          $result =  mysqli_query($con, $sql);
     //      $sql ="INSERT INTO `sfa_government` (`gov_name`, `gov_province_id`, `gov_created_by`, `gov_created_date`, `gov_updated_by`, `gov_updated_date`)
     //      VALUES ('$gov_name','$gov_province_id', '$gov_created_by', '$gov_created_date', '$gov_updated_by', '$gov_updated_date' )";
     //    $result = mysqli_query($con, $sql);
     }else{
          $sql = "INSERT INTO `sfa_user`(`us_fname`, `us_lname`, `us_username`, `us_password`, `us_role_id`, `us_pref_id`) 
          VALUES ('$us_fname', '$us_lname', '$us_username', '$us_password', '$us_role_id', '$us_pref_id')";
          $result =  mysqli_query($con, $sql);
     }
     echo "<script>window.location.href='../?content=list-user'</script>";
?>