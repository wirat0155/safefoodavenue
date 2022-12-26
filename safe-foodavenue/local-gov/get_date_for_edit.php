
<?php 
require("../php/config.php");
$year = $_POST['year'];
$fcl_id = $_POST['fcl_id'];

$sql = "SELECT fcl_enddate FROM `sfa_formalin_checklist` 
WHERE fcl_enddate LIKE '" . $year . "%' AND `fcl_id` != $fcl_id
ORDER BY fcl_enddate DESC";
$result = mysqli_query($con, $sql);

$data = mysqli_fetch_array($result);

echo json_encode($data[0]);
?>