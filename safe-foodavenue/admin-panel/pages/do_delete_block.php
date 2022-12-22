<?php 

  session_start();
  require("../php/config.php"); 
    
  $sql = "
    DELETE FROM sfa_block
    WHERE block_id = '".$_GET["block_id"]."';
  ";
  mysqli_query($con, $sql);

  echo "
    <script>
      alert('ลบข้อมูลเรียบร้อย');
      window.location = './?content=list-block';
    </script>
  ";

?>