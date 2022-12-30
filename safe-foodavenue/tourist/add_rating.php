<?php
require("../php/config.php");
if (isset($_POST["rev_rating"])) {

    $us_id = $_POST["us_id"];
    $rev_rating = $_POST["rev_rating"];
    $rev_comment = $_POST["rev_comment"];
    $res_id = $_POST["res_id"];


    $sql_user = "SELECT  rev_id  
    FROM `sfa_review` WHERE rev_us_id =" . $us_id . " AND sfa_res_id =" . $res_id;

    $result_user = mysqli_query($con, $sql_user);

    if (mysqli_num_rows($result_user) > 0) {
        $row_review =  mysqli_fetch_assoc($result_user);
        
        $rev_id = $row_review['rev_id'];

        $sql_update = " UPDATE `sfa_review` 
            SET 
            `rev_us_id`= '$us_id',
            `rev_rating`= '$rev_rating',
            `rev_comment`= '$rev_comment'
    
            WHERE `rev_id` = '$rev_id'";

        $result_update = mysqli_query($con, $sql_update) OR Die("ERROR");

        echo "add complete";
    } else {
        $sql = "INSERT INTO sfa_review 
	(rev_us_id, rev_rating, rev_comment, sfa_res_id) 
	VALUES ('$us_id', '$rev_rating', '$rev_comment', '$res_id')";

        $result = mysqli_query($con, $sql);
    }
} else {
    echo "ERROR";
}
