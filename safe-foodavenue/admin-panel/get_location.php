<?php
    require("../php/config.php");

    // get district by zip_code
    if (!empty($_POST['zip_code'])) {
        $zip_code = $_POST["zip_code"];
        $sql = "SELECT id AS `district_id`,  name_th AS `district_name` FROM `th_districts` WHERE `th_districts`.`zip_code` = '" . $zip_code . "'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo json_encode("no output");
            return 0;
        }

        $arrDistrict = array();
        while ($objDistrict = mysqli_fetch_array($result)) {
            $district = (object) [
                'district_id' => $objDistrict['district_id'],
                'district_name' => $objDistrict['district_name']
            ];
            array_push($arrDistrict, $district);
        }

        $sql = "SELECT `th_provinces`.`id` AS `province_id`, `th_amphures`.`name_th` AS `amphure_name`, `th_provinces`.`name_th` AS `province_name` FROM `th_districts`
                LEFT JOIN `th_amphures` ON `th_districts`.`amphure_id` = `th_amphures`.`id`
                LEFT JOIN `th_provinces` ON `th_amphures`.`province_id` = `th_provinces`.`id`
                WHERE `th_districts`.`zip_code` = '" . $zip_code . "' LIMIT 1;";
        $result = mysqli_query($con, $sql);
        $objAmphureProvince = mysqli_fetch_array($result);

        
        // get government by province_id
        $province_id = $objAmphureProvince['province_id'];
        $sql = "SELECT * FROM `sfa_government` WHERE `sfa_government`.`gov_province_id` = '$province_id'";
        $result = mysqli_query($con, $sql);
        $arrGovernment = array();

        while ($objGovernment = mysqli_fetch_array($result)) {
            $government = (object) [
                'gov_id' => $objGovernment['gov_id'],
                'gov_name' => $objGovernment['gov_name']
            ];
            array_push($arrGovernment, $government);
        }
        $objLocation = (object) [
            'arrDistrict' => $arrDistrict, 
            'amphure' => $objAmphureProvince['amphure_name'], 
            'province' => $objAmphureProvince['province_name'],
            'arrGovernment' => $arrGovernment
        ];
        echo json_encode($objLocation, JSON_UNESCAPED_UNICODE);
    }

    // get zone by gov_id
    if (!empty($_POST['gov_id'])) {
        $gov_id = $_POST['gov_id'];
        $sql = "SELECT `zone_id`, `zone_title` FROM `sfa_zone` WHERE `zone_gov_id` = '" . $gov_id . "'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo json_encode("no output");
            return 0;
        }

        $arr_zone = array();
        while ($obj_zone = mysqli_fetch_array($result)) {
            $zone = (object) ['zone_id' => $obj_zone['zone_id'], 'zone_title' => $obj_zone['zone_title']];
            array_push($arr_zone, $zone);
        }
        echo json_encode($arr_zone, JSON_UNESCAPED_UNICODE);
    }

    // get block by zone_id
    if (!empty($_POST['zone_id'])) {
        $zone_id = $_POST['zone_id'];
        $sql = "SELECT `block_id`, `block_title` FROM `sfa_block` WHERE `block_zone_id` = '" . $zone_id . "'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo json_encode("no output");
            return 0;
        }

        $arr_block = array();
        while ($obj_block = mysqli_fetch_array($result)) {
            $block = (object) ['block_id' => $obj_block['block_id'], 'block_title' => $obj_block['block_title']];
            array_push($arr_block, $block);
        }
        echo json_encode($arr_block, JSON_UNESCAPED_UNICODE);
    }
?>