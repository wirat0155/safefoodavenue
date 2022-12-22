<?php 

  session_start();
  require("../php/config.php"); 
    
  $sql = "
    DELETE FROM sfa_user
    WHERE us_id = '".$_GET["us_id"]."';
  ";
  mysqli_query($con, $sql);

  echo "
    <script>
      alert('ลบข้อมูลเรียบร้อย');
      window.location = './?content=list-user';
    </script>
  ";

?>