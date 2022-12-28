<?php
header('Content-Type: application/json');
require("../php/config.php");
$limit = '12'; // limit 12 tablew in table

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$start = ($page - 1) * $limit;


$response["data_res"] = array();


$sql = "
    SELECT sfa_restaurant.res_id, sfa_restaurant.res_title, sfa_res_category.res_cat_title, sfa_review.rev_rating,
    sfa_res_image.res_img_path
    FROM sfa_restaurant 
    LEFT JOIN sfa_res_formalin_status
    ON sfa_restaurant.res_id = sfa_res_formalin_status.res_for_res_id
    LEFT JOIN sfa_res_category
    ON sfa_restaurant.res_id = sfa_res_category.res_cat_id
    LEFT JOIN sfa_review 
    ON 
    sfa_restaurant.res_id = sfa_review.sfa_res_id
    LEFT JOIN sfa_res_image 
    ON 
    sfa_res_image.res_img_res_id = sfa_restaurant.res_id
    WHERE 1
      LIMIT "  . $start .  "," . $limit;
      

      $query = mysqli_query($con, $sql);

      
      while($row_list_rs = $query->fetch_assoc()){
        array_push($response["data_res"], $row_list_rs);   
    }

    echo json_encode($response);