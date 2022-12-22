<?php
require("../php/config.php"); 

// รับค่าจาก jQuery
$res_name = $_POST['s_restaurant'];
$block_name = $_POST['s_block'];
    $sql = "
    SELECT * FROM sfa_restaurant 
    LEFT JOIN sfa_block ON sfa_block.block_id = sfa_restaurant.block_id 
    WHERE res_title LIKE '%$res_name%' AND block_title LIKE '%$block_name%'"; 
    $query = mysqli_query($con,$sql);

   
?>