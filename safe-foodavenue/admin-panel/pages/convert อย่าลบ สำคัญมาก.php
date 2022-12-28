<?php
session_start();


function get_fcl_id($con, $date) {
    $sql = "SELECT `fcl_id` FROM `sfa_formalin_checklist` 
    WHERE `fcl_startdate` <= '" . $date . "'
    AND `fcl_enddate` >= '" . $date . "'";
    $arr_formalin_checklist = mysqli_query($con, $sql);  
    $obj_formalin_checklist = mysqli_fetch_array($arr_formalin_checklist);
    return $obj_formalin_checklist["fcl_id"];
}


$us_id = $_SESSION["us_id"];
$arr_res_id = array();
$sql = "SELECT `res_id` FROM `sfa_restaurant` ORDER BY `res_id`";
$arr_restaurant= mysqli_query($con, $sql);
while ($obj_restaurant = mysqli_fetch_assoc($arr_restaurant)) {
    array_push($arr_res_id, $obj_restaurant["res_id"]);
}

for ($i = 0; $i < count($arr_res_id); $i++) {
    $res_id = $arr_res_id[$i];
    $sql = "SELECT `sfa_menu`.`menu_id`, `sfa_menu`.`menu_name`, `sfa_formalin`.`for_status`, `sfa_formalin`.`for_test_date` FROM `sfa_menu`
    LEFT JOIN `sfa_formalin` ON  `sfa_menu`.`menu_id` = `sfa_formalin`.`for_menu_id` 
    WHERE `menu_res_id` = $res_id AND `sfa_formalin`.`for_test_date` = (SELECT MAX(`sfa_formalin`.`for_test_date`) FROM `sfa_formalin` WHERE `for_res_id` = $res_id)";
    $arr_formalin= mysqli_query($con, $sql);


    $for_res_status = "2"; // ให้ปลอดภัยไว้ก่อน
    // 1 คือไม่ปลอดภัย
    if (mysqli_num_rows($arr_formalin) == 0) {
        $for_res_status = "1";
    } else {
        $obj_formalin_date;
        while ($obj_formalin = mysqli_fetch_assoc($arr_formalin)) {
            $obj_formalin_date = $obj_formalin["for_test_date"];
            if ($for_res_status == "2") {
                $for_res_status = $obj_formalin["for_status"];
            } else {
                break;
            }
        }
        $fcl_id = get_fcl_id($con, $obj_formalin_date);
        $for_res_status = $for_res_status == "2" ? "0" : "1";
        $now = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `sfa_res_formalin_status`(`res_for_res_id`, `res_for_status`, `res_for_last_fcl_id`, `res_for_created_by`, `res_for_created_date`, `res_for_updated_by`, `res_for_updated_date`) 
        VALUES ($res_id, $for_res_status, $fcl_id, $us_id, '$now', $us_id, '$now')";
        mysqli_query($con, $sql);
    }
    
}

?>