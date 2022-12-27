<?php
    session_start();
    require '../../php/config.php';
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $res_ent_id = $_POST['res_ent_id'];
    $res_title = $_POST['res_title'];
    $res_cat_id = $_POST['res_cat_id'];
    $res_description = $_POST['res_description'];
    $res_address = $_POST['res_address'];
    $res_district_id = $_POST['res_district_id'];
    $res_gov_id = $_POST['res_gov_id'];
    $res_zone_id = $_POST['res_zone_id'];
    $res_block_id = $_POST['res_block_id'] != ""? $_POST['res_block_id'] : 0 ;
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
        `res_block_id`,
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
        $res_block_id,
        $us_id,
        $us_id
    )";
    $query = mysqli_query($con, $sql);
    // get inserted res_id
    $sql = "SELECT MAX(res_id) AS `res_id` FROM `sfa_restaurant` WHERE `sfa_restaurant`.`res_created_by` = $us_id";
    $result = mysqli_query($con, $sql);
    $arr_restaurant = mysqli_fetch_array($result);
    $res_id = $arr_restaurant['res_id'];
    

    // upload image
    if(file_exists($_FILES['file_input']['tmp_name']) || is_uploaded_file($_FILES['file_input']['tmp_name'])) {
        $t = time();
        $target_dir = "./uploads/img/";
        $target_file = $target_dir . $t . $_FILES["file_input"]["name"];
        $file_name = $t . $_FILES["file_input"]["name"];

        echo $target_file . "<br>";
        echo $file_name . "<br>";
        if (move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file)) {
            echo "เพิ่มรูปภาพสำเร็จ";
        } else {
            echo "เพิ่มรูปภาพไม่สำเร็จ กรุณาลองใหม่";
        }
    
        // insert into sfa_res_img
        $sql = "INSERT INTO `sfa_res_image`(`res_img_path`, `res_img_res_id`) VALUES ('$file_name', $res_id)";
        $query = mysqli_query($con, $sql);
    }

    // insert document location
    $sql = "INSERT INTO `sfa_document_location`(`doc_loc_res_id`, `doc_loc_address`, `doc_loc_district_id`) 
            VALUES ($res_id,'$doc_loc_address',$doc_loc_district_id)";
    $query = mysqli_query($con, $sql);

    // echo "<script>
    //  window.location.href='../?content=list-restaurant';
    //  </script>
    //  ";
?>