<?php 
     require '../../php/config.php'; 
    //  $bid = $_POST["block_id"]; 
     $title = $_POST["zone_title"];
     $detail = $_POST["zone_desc"];
     $lat = $_POST["zone_lat"];
     $lon = $_POST["zone_lon"];
    //  echo  $title;
    //  echo $detail;
    //  echo $lat;
    //  echo $lon;
     
     $sql = "INSERT INTO `sfa_zone`(`zone_title`, `zone_description`, `zone_lat`, `zone_lon`) VALUES ('$title','$detail','$lat','$lon');"; 
     $query = mysqli_query($con, $sql); 
     echo "<script>
     alert('เพิ่มโซนสำเร็จ');
     window.location.href='../?content=list-zone';
     </script>
     ";
     // header("location:../?content=list-block");
?>