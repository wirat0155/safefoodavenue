<?php 
    session_start();
    require("../php/config.php");
    $us_id = $_SESSION["us_id"];
    mysqli_query($con, "BEGIN");
    $is_pass = true;

    function get_fcl_id($con, $date) {
        $sql = "SELECT `fcl_id` FROM `sfa_formalin_checklist` 
        WHERE `fcl_startdate` <= '" . $date . "'
        AND `fcl_enddate` >= '" . $date . "'";
        $arr_formalin_checklist = mysqli_query($con, $sql);  
        $obj_formalin_checklist = mysqli_fetch_array($arr_formalin_checklist);
        return $obj_formalin_checklist["fcl_id"];
    }

    $sql = "SELECT `menu_res_id` FROM `sfa_menu` WHERE `menu_id` = " . $_GET["menu_id"];
    $arr_res_id = mysqli_query($con, $sql);
    $obj_res_id = mysqli_fetch_assoc($arr_res_id);
    $res_id = $obj_res_id["menu_res_id"];


    $sql = "DELETE FROM `sfa_menu` WHERE `menu_id` = " . $_GET["menu_id"];
    $delete_menu = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $delete_menu : $is_pass;
    $sql = "DELETE FROM `sfa_formalin` WHERE `for_menu_id` = " . $_GET["menu_id"];
    $delete_formalin = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $delete_formalin : $is_pass;
    $sql = "DELETE FROM `sfa_res_formalin_status` WHERE `res_for_res_id` = " . $res_id;
    $delete_res_formalin_status = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $delete_res_formalin_status : $is_pass;

    $sql = "SELECT `sfa_menu`.`menu_id`, `sfa_menu`.`menu_name`, `sfa_formalin`.`for_status`, `sfa_formalin`.`for_test_date` FROM `sfa_menu`
    LEFT JOIN `sfa_formalin` ON  `sfa_menu`.`menu_id` = `sfa_formalin`.`for_menu_id` 
    WHERE `menu_res_id` = $res_id AND `sfa_formalin`.`for_test_date` = (SELECT MAX(`sfa_formalin`.`for_test_date`) FROM `sfa_formalin` WHERE `for_res_id` = $res_id)";
    $arr_formalin= mysqli_query($con, $sql);

    $for_res_status = "2"; // ให้ปลอดภัยไว้ก่อน
    // 1 คือไม่ปลอดภัย
    if (mysqli_num_rows($arr_formalin) > 0) {
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
        $insert_res_formalin_status = mysqli_query($con, $sql);
        $is_pass = $is_pass == true? $insert_res_formalin_status : $is_pass;
    }

    if ($is_pass) {
        mysqli_query($con, "COMMIT");
        $_SESSION["crud-status"] = "0";
    } else {
        mysqli_query($con, "ROLLBACK");
        $_SESSION["crud-status"] = "1";
    }

    echo "<script>window.location = 'index.php?content=list-menu&res_id=" . $res_id . "';</script>";
?>