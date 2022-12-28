<?php
header('Content-Type: application/json');
require("../php/config.php");

$response["data_menu"] = array(); //Array ร้านอาหาร

//check parameter
if (isset($_POST["res_id"])) {
    $res_id =  $_POST["res_id"];

    $sql = "SELECT sfa_menu.menu_id, sfa_menu.menu_name, sfa_formalin.for_status, sfa_formalin.for_test_date AS status FROM sfa_menu 
    LEFT JOIN sfa_formalin 
    ON  sfa_menu.menu_id = sfa_formalin.for_menu_id
    
    WHERE menu_res_id = " . $res_id . " AND sfa_formalin.for_test_date = (SELECT MAX(sfa_formalin.for_test_date) FROM sfa_formalin  WHERE for_res_id = " . $res_id . " )";
    $query = mysqli_query($con, $sql);

    while ($row_menu = $query->fetch_assoc()) {
   
      array_push($response["data_menu"], $row_menu);
    }


    echo json_encode($response);
}

