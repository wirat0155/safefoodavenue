<?php
header('Content-Type: application/json');
require("../php/config.php");
$limit = '12'; // limit 12 table in table

$response["data_res"] = array();

if (isset($_POST['page'])) {
  $page = $_POST['page'];
} else {
  $page = 1;
}
$start = ($page - 1) * $limit;

//search
$query_and = '';
if (isset($_POST['query'])) {
  $query_search = $_POST['query'];

  $query_and .=  "res_title LIKE  '%$query_search%'";
} else {
  $query_and .= '';
}

$start = ($page - 1) * $limit;

$join = '';

if ($_POST['zone'] != '') {
  $query_and .= "AND res_zone_id =  '" .  $_POST['zone'] . "'";

}else if ($_POST['districts'] != '') {

  $query_and .= "AND sfa_restaurant.res_district_id =  '" .  $_POST['districts'] . "'";

}else if ($_POST['amphures'] != '') {

  $join .= 'LEFT JOIN th_districts ON th_districts.id =  sfa_restaurant.res_district_id';
  $query_and .= "AND th_districts.amphure_id =  '" .  $_POST['amphures'] . "'";

}else if ($_POST['provinces'] != '') {

  $join .= 'LEFT JOIN th_districts ON th_districts.id =  sfa_restaurant.res_district_id LEFT JOIN th_amphures 
  ON th_districts.amphure_id = th_amphures.id';

  $query_and .= "AND th_amphures.province_id =  '" .  $_POST['provinces'] . "'";
}

if($_POST['star'] != ''){
  $query_and .= "AND  FORMAT(FLOOR(sfa_review_summary.srs_sum_review / sfa_review_summary.srs_count),0) = " .  $_POST['star'] . "";
}

$sql = "
SELECT sfa_restaurant.res_id, sfa_restaurant.res_title, sfa_res_category.res_cat_title, 
sfa_res_image.res_img_path, sfa_res_formalin_status.res_for_status, sfa_restaurant.res_zone_id,
sfa_review_summary.srs_sum_review, sfa_review_summary.srs_count
FROM sfa_restaurant 
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
$join WHERE res_status = 1 AND sfa_res_formalin_status.res_for_status = 0 AND $query_and  LIMIT "  . $start .  "," . $limit;

$query = mysqli_query($con, $sql) or die("Error get res");

if (mysqli_num_rows($query) > 0) {
  

  while ($row_list_rs = $query->fetch_assoc()) {

    $row_list_rs["review"] = array();

    array_push($response["data_res"], $row_list_rs);
  }
 
} else {
  echo json_encode("No data");
  exit();
}


$sql_no_lmit = "
SELECT sfa_restaurant.res_id, sfa_restaurant.res_title, sfa_res_category.res_cat_title, 
sfa_res_image.res_img_path, sfa_res_formalin_status.res_for_status, sfa_restaurant.res_zone_id,
sfa_review_summary.srs_sum_review, sfa_review_summary.srs_count
FROM sfa_restaurant 
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
$join WHERE res_status = 1 AND sfa_res_formalin_status.res_for_status = 0 AND $query_and";


$query_no_lmit = mysqli_query($con, $sql_no_lmit) or die("Error get res");


$response['page'] = array();
$response['page'] = get_page_next_pre(mysqli_num_rows($query_no_lmit), $con, $limit, $page); // set to respone send to view page


echo json_encode($response);


function get_page_next_pre($num_row, $con, $limit, $page)
{
  
  //create next previous button

  $total_links = ceil($num_row / $limit);  // 1
  $previous_link = ''; // ตัวแปร
  $next_link = ''; //ตัวแปร

  for ($count = 1; $count <= $total_links; $count++) {
    $page_array[] = $count; 
  }

 // 1
  for ($count = 0; $count < count($page_array); $count++) {

     
    if ($page == $page_array[$count]) {

      $previous_id = $page_array[$count] - 1;

      if ($previous_id > 0) {
        $previous_link = '<a class="text-white m-2" href="javascript:get_res_list_data(\'' . $_POST["query"] . '\',\'' . $previous_id . '\',\'' .$_POST["provinces"] . '\',\'' .$_POST["amphures"] . '\',\'' .$_POST["districts"] . '\',\'' .$_POST["zone"]  . '\',\'' .$_POST["star"] . '\')"><button type="button" name="previous" class="btn  btn-primary btn-sm previous text-size-18">ก่อนหน้า</button></a>';
      } else {
        $previous_link = '
        <a class = "text-white m-2" href="#"><button type="button" name="previous" class="btn  btn-primary text-size-18 btn-sm previous text-white disabled">
            ก่อนหน้า
            </button></a>
            ';
      }
      $next_id = $page_array[$count] + 1;
      if ($next_id > $total_links) {
      
        $next_link = '
        <a class="text-white text-size-18 m-2" href="#"><button type="button" name="previous" class="btn text-size-18  btn-primary btn-sm previous text-white disabled">
              ถัดไป
              </button></a>
              ';
      } else {
         
        $next_link = '<a class="text-white text-size-18 m-2" href="javascript:get_res_list_data(\'' . $_POST["query"] . '\',\'' . $next_id . '\',\'' .$_POST["provinces"] . '\',\'' .$_POST["amphures"] . '\',\'' .$_POST["districts"] . '\',\'' .$_POST["zone"]  . '\',\'' .$_POST["star"] . '\')"><button type="button" name="previous" class="btn  btn-primary text-size-18 btn-sm previous">ถัดไป</button></a>';
      }
    }
  } //for

  $next_pre = $previous_link . $next_link;

  return $next_pre;
}
