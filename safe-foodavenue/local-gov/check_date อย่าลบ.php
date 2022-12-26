<?php 
require("../php/config.php");

$fcl_startdate = $_POST['fcl_startdate'];
$fcl_enddate = $_POST["fcl_enddate"];

// SELECT * FROM `sfa_formalin_checklist` WHERE `fcl_startdate` <= '2022-12-28' AND `fcl_enddate` >= '2023-01-01'
// OR `fcl_enddate` >= '2022-12-28' AND `fcl_enddate` <= '2023-01-01'
// OR `fcl_startdate` >= '2022-12-28' AND `fcl_startdate` <= '2023-01-01'
echo json_encode($fcl_startdate);
?>