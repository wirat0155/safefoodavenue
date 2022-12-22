<?php
    session_start();
    require '../../php/config.php';

    $res_id = $_POST['res_id'];
    $res_ent_id = $_POST['res_ent_id'];
    $res_title = $_POST['res_title'];
    $res_cat_id = $_POST['res_cat_id'];
    $res_description = $_POST['res_description'];
    $res_address = $_POST['res_address'];
    $res_district_id = $_POST['res_district_id'];
    $res_gov_id = $_POST['res_gov_id'];
    $res_zone_id = $_POST['res_zone_id'];
    $res_block_id = $_POST['res_block_id'] != ""? $_POST['res_block_id'] : 0 ;
    $us_id = $_SESSION['id_user'];
    $doc_loc_address = $_POST['res_address'];
    $doc_loc_district_id = $_POST['res_district_id'];

    if (!isset($_POST["same_as_address"])) {
        $doc_loc_address = $_POST["res_address_2"];
        $doc_loc_district_id = $_POST["res_district_id_2"];
    }


    $sql = "UPDATE `sfa_restaurant` 
            SET `res_address`='$res_address',
            `res_block_id`=$res_block_id,
            `res_ent_id`=$res_ent_id,
            `res_cat_id`=$res_cat_id,
            `res_title`='$res_title',
            `res_description`='$res_description',
            `res_district_id`=$res_district_id,
            `res_gov_id`=$res_gov_id,
            `res_zone_id`=$res_zone_id,
            `res_updated_by`=$us_id
            WHERE `sfa_restaurant`.`res_id` = $res_id";
    $query = mysqli_query($con, $sql) or die("Error Query REs");

    // upload image
    if(file_exists($_FILES['file_input']['tmp_name']) || is_uploaded_file($_FILES['file_input']['tmp_name'])) {
        $t = time();
        $target_dir = "./uploads/img/";
        $target_file = $target_dir . $t . $_FILES["file_input"]["name"];
        $file_name = $t . $_FILES["file_input"]["name"];
        if (move_uploaded_file($_FILES["file_input"]["tmp_name"], $target_file)) {
            echo "เพิ่มรูปภาพสำเร็จ";
        } else {
            echo "เพิ่มรูปภาพไม่สำเร็จ กรุณาลองใหม่";
        }

        $sql = "SELECT * FROM `sfa_res_image` WHERE `sfa_res_image`.`res_img_res_id` = '" . $res_id . "'";
        $arr_res_img = mysqli_query($con, $sql);
        if (mysqli_num_rows($arr_res_img) == 0) {
            $sql = "INSERT INTO `sfa_res_image` (`res_img_res_id`, `res_img_path`) VALUES ($res_id, '" . $file_name . "')";
            $query = mysqli_query($con, $sql);
        } else {
            $sql = "UPDATE `sfa_res_image` SET `res_img_path` = '" . $file_name . "' WHERE `res_img_res_id` = $res_id";
            $query = mysqli_query($con, $sql);
        }
    }

    // update document location
    $sql = "UPDATE `sfa_document_location` 
            SET `doc_loc_address`='$doc_loc_address',
            `doc_loc_district_id`=$doc_loc_district_id 
            WHERE `sfa_document_location`.`doc_loc_res_id` = $res_id";
    $query = mysqli_query($con, $sql);

    echo "<script>
     window.location.href='../?content=list-restaurant';
     </script>
     ";
?>