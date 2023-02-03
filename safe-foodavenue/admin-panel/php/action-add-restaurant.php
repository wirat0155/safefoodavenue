<?php
    session_start();
    require '../../php/config.php';

    mysqli_query($con, "BEGIN");
    $is_pass = true;
    $res_ent_id = $_POST['res_ent_id'];
    $res_title = $_POST['res_title'];
    $res_cat_id = $_POST['res_cat_id'];
    $res_description = $_POST['res_description'];
    $res_lat = $_POST['res_lat'] != ""? $_POST['res_lat'] : NULL;
    $res_lon = $_POST['res_lon'] != ""? $_POST['res_lon'] : NULL;
    $res_address = $_POST['res_address'];
    $res_district_id = $_POST['res_district_id'];
    $res_gov_id = $_POST['res_gov_id'];
    $res_zone_id = $_POST['res_zone_id'] != ""? $_POST['res_zone_id'] : 0;
    $res_block_id = $_POST['res_block_id'] != ""? $_POST['res_block_id'] : 0;
    $us_id = $_SESSION['us_id'];
    $doc_loc_address = $_POST['res_address'];
    $doc_loc_district_id = $_POST['res_district_id'];
    
    if (!isset($_POST["same_as_address"])) {
        $doc_loc_address = $_POST["res_address_2"];
        $doc_loc_district_id = $_POST["res_district_id_2"];
    }

    // insert into sfa_restaurant
    $sql = "INSERT INTO `sfa_restaurant`(
        `res_ent_id`,
        `res_title`,
        `res_cat_id`,
        `res_description`,
        `res_address`,
        `res_district_id`,
        `res_gov_id`,
        `res_zone_id`,
        `res_block_id`,";
    if ($res_lat != "") {
        $sql .= "`res_lat`,
        `res_lon`,";
    }
    $sql .= "
        `res_created_by`,
        `res_updated_by`
        )
        VALUES (
        $res_ent_id,
        '$res_title',
        $res_cat_id,
        '$res_description',
        '$res_address',
        $res_district_id,
        $res_gov_id,
        $res_zone_id,
        $res_block_id,";

    if ($res_lat != "") {
        $sql .= "$res_lat,
        $res_lon,";
    }
    $sql .= "
        $us_id,
        $us_id
    )";
    $insert_restautant = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $insert_restautant : $is_pass;

    // get inserted res_id
    $sql = "SELECT MAX(res_id) AS `res_id` FROM `sfa_restaurant` WHERE `sfa_restaurant`.`res_created_by` = $us_id";
    $result = mysqli_query($con, $sql);
    $arr_restaurant = mysqli_fetch_array($result);
    $res_id = $arr_restaurant['res_id'];

    $sql = "INSERT INTO `sfa_res_formalin_status`(`res_for_res_id`, `res_for_status`, `res_for_last_fcl_id`, `res_for_created_by`, `res_for_created_date`, `res_for_updated_by`, `res_for_updated_date`) VALUES ('$res_id', 1, 0,'[value-5]','[value-6]','[value-7]','[value-8]')";
    

    // upload image
    if (file_exists($_FILES['file_input']['tmp_name']) || is_uploaded_file($_FILES['file_input']['tmp_name'])) {
        $t = time();
        $target_dir = "./uploads/img/";
        $target_file = $target_dir . $t . $_FILES["file_input"]["name"];
        $file_name = $t . $_FILES["file_input"]["name"];

        if (!move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file)) {
            echo "เพิ่มรูปภาพไม่สำเร็จ กรุณาลองใหม่";
            exit; 
        }

        // insert into sfa_res_img
        $sql = "INSERT INTO `sfa_res_image`(`res_img_path`, `res_img_res_id`) VALUES ('$file_name', $res_id)";
        $insert_res_img = mysqli_query($con, $sql);
        $is_pass = $is_pass == true? $insert_res_img : $is_pass;
    }

    // insert document location
    $sql = "INSERT INTO `sfa_document_location`(`doc_loc_res_id`, `doc_loc_address`, `doc_loc_district_id`) 
            VALUES ($res_id,'$doc_loc_address',$doc_loc_district_id)";
    $insert_document_location = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $insert_document_location : $is_pass;

    if ($is_pass) {
        mysqli_query($con, "COMMIT");
        $_SESSION["crud-status"] = "0";
    } else {
        mysqli_query($con, "ROLLBACK");
        $_SESSION["crud-status"] = "1";
    }

    echo "<script>window.location.href='../?content=list-restaurant';</script>";
?>