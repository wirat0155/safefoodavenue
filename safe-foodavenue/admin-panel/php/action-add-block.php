<?php 
     session_start();
     require '../../php/config.php';

     $block_title = $_POST['block_title'];
     $block_zone_id = $_POST['block_zone_id'];
     $block_lat = $_POST['block_lat'];
     $block_lon = $_POST['block_lon'];
     $us_id = $_SESSION['id_user'];

     $sql = "INSERT INTO `sfa_block`
               (
               `block_title`, 
               `block_zone_id`, 
               `block_lat`, 
               `block_lon`, 
               `block_created_by`, 
               `block_updated_by`
               ) 
               VALUES 
               (
               '$block_title',
               '$block_zone_id',
               '$block_lat',
               '$block_lon',
               '$us_id',
               '$us_id'
               )";
     $query = mysqli_query($con, $sql); 

     echo "<script>
     alert('เพิ่มบล็อกสำเร็จ');
     window.location.href='../?content=list-block';
     </script>
     ";
?> 