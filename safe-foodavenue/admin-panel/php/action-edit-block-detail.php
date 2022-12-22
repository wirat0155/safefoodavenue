<?php 
     require '../../php/config.php'; 
     $bid = $_POST["block_id"]; 
     $title = $_POST["block_title"];
     $lat = $_POST["lat_name"];
     $lon = $_POST["lon_name"]; 
     
     $sql = "UPDATE sfa_block SET block_title = '$title', block_lat = '$lat', block_lon = '$lon' WHERE block_id = $bid"; 
     $query = mysqli_query($con, $sql);
     
     echo "<script>
     alert('แก้ไขบล็อกสำเร็จ');
     window.location.href='../?content=list-block';
     </script>
     ";
?> 