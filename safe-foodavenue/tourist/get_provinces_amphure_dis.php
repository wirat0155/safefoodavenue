<?php
header('Content-Type: application/json');
require("../php/config.php");

$response['data'] = array();


function get_provinces($con)
{

    $sql_provinces = "SELECT id, name_th  FROM `th_provinces` WHERE 1";
    $query_provinces = mysqli_query($con, $sql_provinces);

    return  $query_provinces;
}

function get_amphures($con, $provinces_id = 0)
{

    $sql_amphures = "SELECT id, name_th  FROM  `th_amphures` WHERE province_id =" . $provinces_id;
    $query_amphures = mysqli_query($con, $sql_amphures);

    return  $query_amphures;

}

function get_districts($con, $amphures_id = 0)
{

    $sql_amphures = "SELECT id, name_th  FROM  `th_districts` WHERE amphure_id =" . $amphures_id;
    $query_amphures = mysqli_query($con, $sql_amphures);

    return  $query_amphures;

}

function get_zone($con, $provinces_id = 0){
    $sql_zone = "SELECT zone_id, zone_title FROM `sfa_zone` 
    LEFT JOIN sfa_government 
    ON sfa_zone.zone_gov_id = sfa_government.gov_id
    LEFT JOIN th_provinces 
    ON sfa_government.gov_province_id = th_provinces.id
    WHERE th_provinces.id =" . $provinces_id;
    $query_zone = mysqli_query($con, $sql_zone);

    return  $query_zone;
}



if (isset($_POST['provinces'])) {

    $query = get_provinces($con);

} else if (isset($_POST['amphures'])) {

    if(isset($_POST['provinces_id'])){
        $query = get_amphures($con, $_POST['provinces_id']);
    }else{
        $query = get_amphures($con);
    }
} else if (isset($_POST['districts'])) {
    if(isset($_POST['amphures_id'])){
        $query = get_districts($con, $_POST['amphures_id']);
    }else{
        $query = get_districts($con);
    }
}else if (isset($_POST['zone'])) {
    if(isset($_POST['provinces_id'])){
        $query = get_zone($con, $_POST['provinces_id']);
    }else{
        $query = get_zone($con);
    }
}


while ($row_list = $query->fetch_assoc()) {

    array_push($response['data'], $row_list);
}

echo json_encode($response);

