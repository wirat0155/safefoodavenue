<?php 
     require '../../php/config.php'; 
    //  $bid = $_POST["block_id"]; 
     $title = $_POST["block_title"];
     $zone = $_POST["zone_id"];
     $lat = $_POST["lat_name"];
     $lon = $_POST["lon_name"]; 
     
     $sql = "INSERT INTO `sfa_block`(`block_title`, `zone_id`, `block_lat`, `block_lon`) VALUES ('$title' ,'$zone','$lat','$lon')"; 
     $query = mysqli_query($con, $sql); 
     echo "<script>
     alert('เพิ่มบล็อกสำเร็จ');
     window.location.href='../?content=list-block';
     </script>
     ";
     // header("location:../?content=list-block");
?> 