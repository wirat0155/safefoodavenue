<?php
     session_start();
     require '../../php/config.php'; 
     $zone_title = $_POST["zone_title"];
     $zone_description = $_POST["zone_description"];
     $zone_lat = $_POST["zone_lat"];
     $zone_lon = $_POST["zone_lon"];
     $us_id = $_SESSION['id_user'];
     $zone_gov_id = $_POST["zone_gov_id"];

     $sql = "INSERT INTO `sfa_zone`(
          `zone_title`, 
          `zone_description`, 
          `zone_lat`, 
          `zone_lon`, 
          `zone_created_by`, 
          `zone_updated_by`, 
          `zone_gov_id`) 
          VALUES (
          '$zone_title',
          '$zone_description',
          '$zone_lat',
          '$zone_lon',
          '$us_id',
          '$us_id',
          '$zone_gov_id'
     )";
     $query = mysqli_query($con, $sql);

     echo "<script>
     alert('เพิ่มโซนสำเร็จ');
     window.location.href='../?content=list-zone';
     </script>
     ";
?>