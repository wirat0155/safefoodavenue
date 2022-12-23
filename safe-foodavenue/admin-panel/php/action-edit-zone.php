<?php 
     session_start();
     require '../../php/config.php';

     $zone_id = $_POST['zone_id'];
     $zone_title = $_POST['zone_title'];
     $zone_description = $_POST['zone_description'];
     $zone_gov_id = $_POST['zone_gov_id'];
     $zone_lat = $_POST['zone_lat'];
     $zone_lon = $_POST['zone_lon'];
     $us_id = $_SESSION['id_user'];


     $sql = "UPDATE sfa_zone 
          SET zone_title = '$zone_title', 
          zone_description = '$zone_description',
          zone_gov_id = '$zone_gov_id',
          zone_lat = '$zone_lat',
          zone_lon = '$zone_lon'
          WHERE zone_id = $zone_id";
     $query = mysqli_query($con, $sql);

     echo "<script>
     alert('แก้ไขโซนสำเร็จ');
     window.location.href='../?content=list-zone';
     </script>
     ";
?>