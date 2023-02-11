<?php
header('Content-Type: application/json');
require("../php/config.php");

$response["data_res"] = array();

if (isset($_POST['zip_code'])) {

  $zip_code = $_POST['zip_code'];

  try {
    $sql_res = "SELECT * FROM `sfa_restaurant` 
    LEFT JOIN th_districts 
    On sfa_restaurant.res_district_id = th_districts.id
    LEFT JOIN sfa_res_formalin_status
    ON sfa_restaurant.res_id = sfa_res_formalin_status.res_for_res_id
    LEFT JOIN sfa_res_category
    ON sfa_restaurant.res_id = sfa_res_category.res_cat_id
    LEFT JOIN sfa_res_image 
    ON 
    sfa_res_image.res_img_res_id = sfa_restaurant.res_id
    LEFT JOIN sfa_review_summary 
    ON 
    sfa_review_summary.srs_res_id = sfa_restaurant.res_id
    WHERE th_districts.zip_code = '$zip_code'
    LIMIT 6";

    $query_res = mysqli_query($con, $sql_res);

    if ($query_res) {

      if (mysqli_num_rows($query_res) > 0) {
        
        while ($row_res = $query_res->fetch_assoc()) {

          array_push($response["data_res"], $row_res);
        }
        echo json_encode($response);
      } else {

        echo json_encode("No data");
      }

    } else {

      throw new Exception('SQL ERROR');
    }
  } catch (Exception $event) {
    echo json_encode($event->getMessage());
  }
} else {
  echo json_encode("Noting isset");
}
