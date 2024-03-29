<?php
require("../php/config.php");
include("date_helper.php");

if (isset($_POST["action"])) {
  
    $res_id = $_POST["res_id"];
    $response["review_data"] = array();
    $response["review_avg"] = array();
    $response["review_data_date"] = array();


    if($_POST["star"] == 0){
    

    $sql_comment = "
	SELECT   rev_rating, rev_comment, rev_us_id , sfa_user.us_fname, sfa_user.us_lname, rev_date 
    FROM `sfa_review` 
    RIGHT JOIN sfa_user
    ON sfa_user.us_id = sfa_review.rev_us_id
    WHERE sfa_res_id =  '$res_id'  ORDER BY sfa_review.rev_date DESC";

    $result_comment = mysqli_query($con, $sql_comment);

    while($row_comment = $result_comment->fetch_assoc()){
            array_push($response["review_data"], $row_comment); 
            array_push($response["review_data_date"], to_format($row_comment['rev_date'])); 
    }


    }else{

        $and = " And rev_rating =" . $_POST["star"];

        $sql_comment = "
        SELECT   rev_rating, rev_comment, rev_us_id , sfa_user.us_fname, sfa_user.us_lname, rev_date  
        FROM `sfa_review` 
        RIGHT JOIN sfa_user
        ON sfa_user.us_id = sfa_review.rev_us_id
        WHERE sfa_res_id = " . $res_id . $and;
    
        $result_comment = mysqli_query($con, $sql_comment);
    
        while($row_comment = $result_comment->fetch_assoc()){
                array_push($response["review_data"], $row_comment); 
                array_push($response["review_data_date"], to_format($row_comment['rev_date'])); 
        }


    }


    $sql_rating = "
    SELECT srs_sum_review/srs_count AS avg_rev_rating FROM `sfa_review_summary` WHERE srs_res_id = " . $res_id;
    $result_rating = mysqli_query($con, $sql_rating);

    $row_rating = mysqli_fetch_assoc($result_rating);

    array_push($response["review_avg"], $row_rating); 


    echo json_encode($response);

}
