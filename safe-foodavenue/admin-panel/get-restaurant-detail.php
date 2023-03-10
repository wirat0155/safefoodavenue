<?php
header('Content-Type: application/json');
require("../php/config.php");
include("./php/date_helper.php");

if (isset($_POST["res_id"])) {

    $response["data_res"] = array(); //Array ร้านอาหาร
    $response["data_formalin"] = array(); //Array การตรวจฟอมาลีน
    $response["data_formalin_date"] = array(); // dateการตรวจฟอมาลีน
    $response["data_pic"] = array(); //Array รูปภาพ (เผื่อมีหลายรูปเด้อ)
    $response["data_location"] = array(); //Array ที่อยู่ (lat lon)

    //get data sfa_restaurant
    $sql = "SELECT *, th_amphures.name_th As name_amp, th_provinces.name_th AS name_pro, 
    th_districts.name_th AS name_dis  FROM  `sfa_restaurant` 
    LEFT JOIN sfa_res_category
    ON sfa_restaurant.res_cat_id = sfa_res_category.res_cat_id
    LEFT JOIN sfa_entrepreneur
    ON sfa_restaurant.res_ent_id = sfa_entrepreneur.ent_id
    LEFT JOIN th_districts ON th_districts.id =  sfa_restaurant.res_district_id 
    LEFT JOIN th_amphures ON th_districts.amphure_id = th_amphures.id
    LEFT JOIN th_provinces ON th_amphures.province_id = th_provinces.id
    WHERE res_id = " . $_POST["res_id"] . " ";

    $query = mysqli_query($con, $sql);


    //get data sfa_formalin
    $sql_formalin = "SELECT sfa_menu.menu_id, sfa_menu.menu_name, sfa_formalin.for_status, sfa_formalin.for_test_date FROM sfa_menu 
    LEFT JOIN sfa_formalin 
    ON  sfa_menu.menu_id = sfa_formalin.for_menu_id
    
    WHERE menu_res_id = " . $_POST["res_id"] . " AND sfa_formalin.for_test_date = 
    (SELECT MAX(sfa_formalin.for_test_date) FROM sfa_formalin  WHERE for_res_id = " . $_POST["res_id"] . " )";

    $query_formalin = mysqli_query($con, $sql_formalin);
    //เช็คว่าในรายการตรวจล่าสุดมีไม่ผ่านไหม
    while($row_res_formalin = $query_formalin->fetch_assoc()){

        if($row_res_formalin["for_status"] == "1"){ // not safe
           //check status formalin not safe
           array_push($response["data_formalin"], "Not Safe"); 
            break;
        }else if($row_res_formalin["for_status"] == "2"){
            array_push($response["data_formalin"], "Safe");
            array_push($response["data_formalin_date"], to_format($row_res_formalin["for_test_date"]));
        }else{
            array_push($response["data_formalin"], "Not Safe"); 
        }
    }


    //get data sfa_res_image
    $sql_res_pic = "SELECT * FROM sfa_res_image WHERE res_img_res_id = '" . $_POST["res_id"] . "'";
    $query_pic = mysqli_query($con, $sql_res_pic);


    //push to result to assoc
    $row_res = mysqli_fetch_assoc($query);
    $row_pic = mysqli_fetch_assoc($query_pic);


    //check location
    // เนื่องจากว่า ร้านมี block หรืออยู่แค่โซน
    // หรือไม่ได้อยู่ทั้ง 2 อย่าง
    // เลยต้องเช็คว่า เอาล๊อก หรือ เอา Location ร้านเอง
    if ($row_res["res_block_id"] != NULL AND $row_res["res_block_id"] != 0) {

        $sql_location = "SELECT block_lat AS lat, block_lon AS lon 
        FROM  `sfa_block` INNER JOIN `sfa_restaurant` 
        ON  `sfa_block`.`block_id` = `sfa_restaurant`.`res_block_id`
        WHERE sfa_restaurant.res_id = '" . $_POST["res_id"] . "'";

        $query_location = mysqli_query($con, $sql_location);
        $row_res_location = mysqli_fetch_assoc($query_location);

        array_push($response["data_location"], $row_res_location);

        //*** fix data */
    } else {
        $row_res_location["lat"] = $row_res["res_lat"] ;
        $row_res_location["lon"] = $row_res["res_lon"] ;
        array_push($response["data_location"], $row_res_location);
    }


    //เอาข้อมูลที่ได้ ยัดใส่ respone กลับไปที่ front-end
    array_push($response["data_res"], $row_res);
    array_push($response["data_pic"], $row_pic);

    echo json_encode($response);
}else{
    echo "error";
}

