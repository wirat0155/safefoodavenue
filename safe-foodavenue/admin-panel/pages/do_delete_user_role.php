<?php 

  session_start();
  require("../php/config.php"); 
    
  $sql = "
    DELETE FROM sfa_role
    WHERE role_id = '".$_GET["role_id"]."';
  ";
  mysqli_query($con, $sql);

  echo "
    <script>
      alert('ลบข้อมูลเรียบร้อย');
      window.location = './?content=list-user-role';
    </script>
  ";

?>