<?php 
  session_start();
  require("../php/config.php"); 
    
  $sql = "DELETE FROM `sfa_formalin_checklist` WHERE fcl_id = '" . $_GET["fcl_id"] . "'";
  mysqli_query($con, $sql);

  echo "
    <script>
      alert('ลบข้อมูลเรียบร้อย');
      window.location = 'index.php?content=list-formalin-checklist';
    </script>
  ";
?>