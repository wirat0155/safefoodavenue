<?php 
    session_start();
    require("../php/config.php");
    $is_pass = true;
    mysqli_query($con, "BEGIN");


    $sql = "DELETE FROM `sfa_restaurant` WHERE `res_id` = " . $_GET["res_id"];
    $delete_restaurant = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $delete_restaurant : $is_pass;


    $sql = "DELETE FROM `sfa_res_image` WHERE `res_img_res_id` = " . $_GET["res_id"];
    $delete_res_image = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $delete_res_image : $is_pass;


    $sql = "DELETE FROM `sfa_document_location` WHERE `doc_loc_res_id` = " . $_GET["res_id"];
    $delete_document_location = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $delete_document_location : $is_pass;

    $sql = "DELETE FROM `sfa_res_formalin_status` WHERE `res_for_res_id` = " . $_GET["res_id"];
    $delete_res_formalin = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $delete_res_formalin : $is_pass;

    $sql = "DELETE FROM `sfa_formalin` WHERE `for_res_id` = " . $_GET["res_id"];
    $delete_formalin = mysqli_query($con, $sql);
    $is_pass = $is_pass == true? $delete_formalin : $is_pass;


    if ($is_pass) {
        mysqli_query($con, "COMMIT");
        $_SESSION["crud-status"] = "0";
    } else {
        mysqli_query($con, "ROLLBACK");
        $_SESSION["crud-status"] = "1";
    }
    echo "<script>window.location.href='./?content=list-restaurant';</script>";
?>