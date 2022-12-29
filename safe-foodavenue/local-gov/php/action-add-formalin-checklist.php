<?php
     session_start();
     require '../../php/config.php';
     $fcl_startdate = $_POST["fcl_startdate"];
     $fcl_enddate = $_POST["fcl_enddate"];
     $fcl_year = date("Y", strtotime($fcl_startdate));
     $fcl_local_id = $_SESSION["us_id"];
     $fcl_gov_id = $_SESSION["us_gov_id"];
     
     $sql ="INSERT INTO `sfa_formalin_checklist`(`fcl_year`, `fcl_startdate`, `fcl_enddate`, `fcl_local_id`, `fcl_gov_id`) VALUES ('$fcl_year', '$fcl_startdate', '$fcl_enddate', $fcl_local_id, $fcl_gov_id)";

     $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
     echo "<script>window.location.href='../?content=list-formalin-checklist';</script>";
?>