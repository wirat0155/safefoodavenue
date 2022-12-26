<?php 
  session_start();
  require("../php/config.php"); 
    
  $sql = "DELETE FROM sfa_menu WHERE menu_id = " . $_GET["menu_id"];
  mysqli_query($con, $sql);

  echo "<script>
      alert('ลบข้อมูลเรียบร้อย');
      window.history.back();
    </script>
  ";
?>