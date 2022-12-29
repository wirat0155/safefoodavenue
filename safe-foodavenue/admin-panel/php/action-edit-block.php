<?php 
     session_start();
     require '../../php/config.php'; 
     $block_id = $_POST["block_id"];
     $block_title = $_POST["block_title"];
     $block_zone_id = $_POST["block_zone_id"];
     $block_lat = $_POST["block_lat"];
     $block_lon = $_POST["block_lon"];
     $us_id = $_SESSION["us_id"]; 
     
     $sql = "UPDATE `sfa_block` 
          SET `block_title`='$block_title',
          `block_zone_id`='$block_zone_id',
          `block_lat`='$block_lat',
          `block_lon`='$block_lon',
          `block_updated_by`='$us_id'
          WHERE `block_id` = '" . $block_id . "'";
     
     $_SESSION["crud-status"] = mysqli_query($con, $sql) ? 0 : 1;
     echo "<script>window.location.href='../?content=list-block';</script>";
?> 