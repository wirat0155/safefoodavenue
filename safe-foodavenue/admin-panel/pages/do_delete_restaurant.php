<?php 
  session_start();
  require("../php/config.php"); 
    
  $sql = "
    DELETE FROM sfa_restaurant
    WHERE res_id = '".$_GET["res_id"]."';
  ";
  mysqli_query($con, $sql);

  echo "<script>
     alert('ลบร้านอาหารเรียบร้อยแล้ว');
     window.location.href='./?content=list-restaurant';
     </script>
     ";
?>