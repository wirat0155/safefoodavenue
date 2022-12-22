<?php 
     require '../../php/config.php'; 
     $z_id = $_POST["zone_id"]; 
     $title = $_POST["zone_title"];
     $zone_desc = $_POST["zone_desc"];
     $lat = $_POST["zone_lat"];
     $lon = $_POST["zone_lon"]; 
     
     
     $sql = "UPDATE sfa_zone SET zone_title = '$title', zone_description = '$zone_desc',zone_lat = '$lat' ,zone_lon = '$lon'  WHERE zone_id = $z_id"; 
     $query = mysqli_query($con, $sql); 
     echo "<script>
     alert('แก้ไขโซนสำเร็จ');
     window.location.href='../?content=list-zone';
     </script>
     ";
     // header("location:../?content=list-zone");
?>