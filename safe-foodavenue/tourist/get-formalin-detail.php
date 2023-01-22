<?php 
    // header('Content-Type: application/json');
    require ("../php/config.php");
    $arr_result =  array();


    $sql = "SELECT COUNT(`res_id`), `block_id`, `block_title`, `block_lat`, `block_lon` FROM `sfa_block`
    LEFT JOIN `sfa_restaurant` ON `sfa_block`.`block_id` = `sfa_restaurant`.`res_block_id`
    WHERE block_lat <> ''
    GROUP BY `block_id`
    HAVING COUNT(`res_id`) != 0";
    $arr_block = mysqli_query($con, $sql); 
    while($obj_block = mysqli_fetch_assoc($arr_block)){
        $arr_block_data = array();
        $block_id  = $obj_block["block_id"]; 
        $sql = "SELECT COUNT(`res_for_res_id`) AS `pass` FROM `sfa_res_formalin_status`
        LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
        WHERE `sfa_res_formalin_status`.`res_for_status` = 0 AND `sfa_restaurant`.`res_block_id` = " . $block_id;  
        $arr_res_formalin = mysqli_query($con, $sql);
        $obj_res_formalin = mysqli_fetch_assoc($arr_res_formalin);

        $sql = "SELECT COUNT(`res_id`) AS `num` FROM `sfa_restaurant` WHERE `res_block_id` = " . $block_id;
        $arr_restaurant = mysqli_query($con, $sql);
        $obj_restaurant = mysqli_fetch_assoc($arr_restaurant);
        $num_restaurant = $obj_restaurant["num"];
        // echo $block_id . " สถานะ " . $obj_res_formalin["pass"];
        // echo "<br>";
        if ($obj_res_formalin["pass"] == "0") {
            array_push($arr_block_data, $obj_block["block_id"], $obj_block["block_title"], $obj_block["block_lat"], $obj_block["block_lon"], 1, "block_id", $num_restaurant);
        } else {
            array_push($arr_block_data, $obj_block["block_id"], $obj_block["block_title"], $obj_block["block_lat"], $obj_block["block_lon"], 0, "block_id", $num_restaurant);
        }
        array_push($arr_result, $arr_block_data);
    }


    $sql = "SELECT * FROM `sfa_res_formalin_status` 
    LEFT JOIN `sfa_restaurant` ON `sfa_res_formalin_status`.`res_for_res_id` = `sfa_restaurant`.`res_id`
    WHERE (`res_block_id` = 0 OR `res_block_id` IS NULL) AND `res_lat` <> ''";
    $arr_restaurant = mysqli_query($con, $sql);
    while($obj_restaurant = mysqli_fetch_assoc($arr_restaurant)){
        $arr_restaurant_data = array();
        $res_id  = $arr_restaurant_data["res_id"];
        array_push($arr_restaurant_data, $obj_restaurant["res_id"], $obj_restaurant["res_title"], $obj_restaurant["res_lat"], $obj_restaurant["res_lon"], $obj_restaurant["res_for_status"], "res_id", 1);
        array_push($arr_result, $arr_restaurant_data);
    }
    echo json_encode($arr_result);
?>