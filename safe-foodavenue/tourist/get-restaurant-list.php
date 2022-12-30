<?php
header('Content-Type: application/json');
require("../php/config.php");
$limit = '12'; // limit 12 tablew in table

$query_and = '';

if (isset($_POST['page'])) {
  $page = $_POST['page'];
} else {
  $page = 1;
}

if (isset($_POST['query'])) {
  $query_search = $_POST['query'];

  $query_and .=  " res_title LIKE '%$query_search%'";
} else {
  $query_and = '';
}


$start = ($page - 1) * $limit;


$response["data_res"] = array();


$sql = "
SELECT sfa_restaurant.res_id, sfa_restaurant.res_title, sfa_res_category.res_cat_title, 
sfa_res_image.res_img_path, sfa_res_formalin_status.res_for_status
FROM sfa_restaurant 
LEFT JOIN sfa_res_formalin_status
ON sfa_restaurant.res_id = sfa_res_formalin_status.res_for_res_id
LEFT JOIN sfa_res_category
ON sfa_restaurant.res_id = sfa_res_category.res_cat_id
LEFT JOIN sfa_res_image 
ON 
sfa_res_image.res_img_res_id = sfa_restaurant.res_id
WHERE " . $query_and . "LIMIT "  . $start .  "," . $limit;



$query = mysqli_query($con, $sql);


while ($row_list_rs = $query->fetch_assoc()) {

  //print_r($row_list_rs);

  $sql_review = "SELECT AVG(rev_rating) AS avg_rating FROM `sfa_review` WHERE sfa_res_id =" . $row_list_rs['res_id'];
  $query_review = mysqli_query($con, $sql_review) or die("Cannot ERROR sql_review");

  $row_list_review = $query_review->fetch_assoc();

  $row_list_rs["review"] = array();

  array_push($row_list_rs["review"], $row_list_review['avg_rating']);

  array_push($response["data_res"], $row_list_rs);
}

//var_dump($response["data_res"]);



$response['page'] = array();
$response['page'] = get_page_next_pre($query_and, $con, $limit, $page); // set to respone send to view page


echo json_encode($response);


function get_page_next_pre($query_and, $con, $limit, $page)
{
  $sql2 = "select * from sfa_restaurant WHERE " .  $query_and;
  $query2 = mysqli_query($con, $sql2);
  $all_count = mysqli_num_rows($query2);

  //$all_count =  count($response["data_res"]);
  //create next previous button

  $total_links = ceil($all_count / $limit);  // จำนวนแถว หารด้วย จำนวน limit  (ปัดเศษขึ้น)
  $previous_link = ''; // ตัวแปร
  $next_link = ''; //ตัวแปร

  for ($count = 1; $count <= $total_links; $count++) {
    $page_array[] = $count;
  }

  for ($count = 0; $count < count($page_array); $count++) {

    if ($page == $page_array[$count]) {

      $previous_id = $page_array[$count] - 1;

      if ($previous_id > 0) {
        $previous_link = '<a class="text-white m-2" href="javascript:get_res_list_data(`' . $_POST["query"] . '`, ' . $previous_id . ')"><button type="button" name="previous" class="btn  btn-primary btn-sm previous text-size-18">ก่อนหน้า</button></a>';
      } else {
        $previous_link = '
      <a class = "text-white m-2" href="#"><button type="button" name="previous" class="btn  btn-primary text-size-18 btn-sm previous text-white disabled">
           ก่อนหน้า
          </button></a>
          ';
      }
      $next_id = $page_array[$count] + 1;
      if ($next_id >= $total_links) {
        $next_link = '
      <a class="text-white text-size-18 m-2" href="#"><button type="button" name="previous" class="btn text-size-18  btn-primary btn-sm previous text-white disabled">
             ถัดไป
            </button></a>
              ';
      } else {
        $next_link = '<a class="text-white text-size-18 m-2" href="javascript:get_res_list_data(`' . $_POST["query"] . '`, ' . $next_id . ')"><button type="button" name="previous" class="btn  btn-primary text-size-18 btn-sm previous">ถัดไป</button></a>';
      }
    }
  } //for

  $next_pre = $previous_link . $next_link;

  return $next_pre;
}
