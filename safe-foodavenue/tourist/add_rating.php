<?php
require("../php/config.php");
if (isset($_POST["rev_rating"])) {

    $us_id = $_POST["us_id"];
    $rev_rating = $_POST["rev_rating"];
    $rev_comment = $_POST["rev_comment"];
    $res_id = $_POST["res_id"];


    //check user to review res
    $sql_user = "SELECT  rev_id  
    FROM `sfa_review` WHERE rev_us_id =" . $us_id . " AND sfa_res_id =" . $res_id;

    $result_user = mysqli_query($con, $sql_user);


    //check summary 
    $sql_check_sum = "SELECT srs_id FROM `sfa_review_summary` WHERE srs_res_id =" . $res_id;
    $result_check_sum = mysqli_query($con, $sql_check_sum);


        //check user to review res
    if (mysqli_num_rows($result_user) > 0) {
        $row_review =  mysqli_fetch_assoc($result_user);

        $rev_id = $row_review['rev_id'];

        $sql_update = " UPDATE `sfa_review` 
            SET 
            `rev_us_id`= '$us_id',
            `rev_rating`= '$rev_rating',
            `rev_comment`= '$rev_comment'    
            WHERE `rev_id` = '$rev_id'";

        $result_update = mysqli_query($con, $sql_update) or die("ERROR");

         //get count and sum rating
         $sql_get_sum = "SELECT SUM(rev_rating) AS sum_rating, COUNT(rev_id) AS count_review, sfa_res_id FROM `sfa_review` WHERE sfa_res_id =" . $res_id;
         $result_get_sum = mysqli_query($con, $sql_get_sum);
 
         $row_summary =  mysqli_fetch_assoc($result_get_sum);
         $sum_review = $row_summary['sum_rating'];
         $count_review = $row_summary['count_review'];

           //update to sfa_review_summary
           $sql_update_sum = " UPDATE `sfa_review_summary` 
           SET 
           `srs_sum_review`= '$sum_review',
           `srs_count`= '$count_review',
           `srs_res_id`= '$res_id'
   
           WHERE `srs_res_id` = '$res_id'";

           $result_update_sum = mysqli_query($con, $sql_update_sum) or die("ERROR");

        echo "update complete";


    } else {
      //case user never review res
        $sql = "INSERT INTO sfa_review 
            	(rev_us_id, rev_rating, rev_comment, sfa_res_id) 
	            VALUES ('$us_id', '$rev_rating', '$rev_comment', '$res_id')";

        $result = mysqli_query($con, $sql);

        //get count and sum rating
        $sql_get_sum = "SELECT SUM(rev_rating) AS sum_rating, COUNT(rev_id) AS count_review, sfa_res_id FROM `sfa_review` WHERE sfa_res_id =" . $res_id;
        $result_get_sum = mysqli_query($con, $sql_get_sum);

        $row_summary =  mysqli_fetch_assoc($result_get_sum);
        $sum_review = $row_summary['sum_rating'];
        $count_review = $row_summary['count_review'];

        if (mysqli_num_rows($result_check_sum) > 0) {

            //update to sfa_review_summary
            $sql_update_sum = " UPDATE `sfa_review_summary` 
            SET 
            `srs_sum_review`= '$sum_review',
            `srs_count`= '$count_review',
            `srs_res_id`= '$res_id'
    
            WHERE `srs_res_id` = '$res_id'";

            $result_update_sum = mysqli_query($con, $sql_update_sum) or die("ERROR");
        } else {
            //insert to sfa_review_summary
            $sql_insert_sum = "INSERT INTO sfa_review_summary 
            (srs_sum_review, srs_count, srs_res_id) 
            VALUES ('$sum_review', '$count_review', '$res_id')";
            $result_insert = mysqli_query($con, $sql_insert_sum);
        }
    }
} else {
    echo "ERROR";
}
