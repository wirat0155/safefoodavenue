<?php
    $sql = "SELECT `res_id`, `block_zone_id` FROM `sfa_restaurant`
    LEFT JOIN `sfa_block` ON `sfa_restaurant`.`res_block_id` = `sfa_block`.`block_id`";
    $arr_restaurant = mysqli_query($con, $sql);

    while($obj_restaurant = mysqli_fetch_assoc($arr_restaurant)) {
        echo $obj_restaurant["res_id"] . " " . $obj_restaurant["block_zone_id"];
        echo "<br />";

        $sql = "UPDATE `sfa_restaurant` SET `res_zone_id` = " . $obj_restaurant["block_zone_id"] . " WHERE `res_id` = " . $obj_restaurant["res_id"];
        mysqli_query($con, $sql);
    }
?>