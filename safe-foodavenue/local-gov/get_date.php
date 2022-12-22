
<?php 
require("../php/config.php");
$year = $_POST['year'];
//ดึงข้อมูล sql โดยการ like ตัวแปร end_date และ order by ตัวแปร end_date

$sql = "SELECT fcl_enddate FROM `sfa_formalin_checklist` WHERE fcl_enddate LIKE '".$year."%' ORDER BY fcl_enddate DESC";
$result = mysqli_query($con, $sql);

$data = mysqli_fetch_array($result);

  echo json_encode($data[0]);
?>