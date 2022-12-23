<?php 
     session_start();
     require '../../php/config.php'; 
     $block_id = $_POST["block_id"];
     $block_title = $_POST["block_title"];
     $block_zone_id = $_POST["block_zone_id"];
     $block_lat = $_POST["block_lat"];
     $block_lon = $_POST["block_lon"];
     $us_id = $_SESSION["id_user"]; 
     
     $sql = "UPDATE `sfa_block` 
          SET `block_title`='$block_title',
          `block_zone_id`='$block_zone_id',
          `block_lat`='$block_lat',
          `block_lon`='$block_lon',
          `block_updated_by`='$us_id'
          WHERE `block_id` = '" . $block_id . "'";
     $query = mysqli_query($con, $sql);

     echo "<script>
     alert('แก้ไขบล็อกสำเร็จ');
     window.location.href='../?content=list-block';
     </script>
     ";
?> 