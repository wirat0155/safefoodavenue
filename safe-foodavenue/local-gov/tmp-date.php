<?php 
require("../php/config.php");
$year = $_GET['year'];
//ดึงข้อมูล sql โดยการ like ตัวแปร end_date และ order by ตัวแปร end_date

$sql = "SELECT * FROM `sfa_formalin_checklist` WHERE fcl_enddate LIKE '".$year."%' ORDER BY fcl_enddate"; 
echo $sql; 
$result = mysqli_query($con, $sql);
// $json_array = array();
//   while($row = mysqli_fetch_array($result)) {
//    $json_array[] = $row;
//   }
  // echo '<pre>';
  echo json_encode($result);
  // echo '</pre>';
// echo json_encode($result);
?>