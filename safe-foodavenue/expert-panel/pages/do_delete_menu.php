<!-- 
/*
* do_delete_menu
* do_delete_menu
* @input -
* @output -
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->

<?php 

  session_start();
  require("../php/config.php"); 
    
  $sql = "
    DELETE FROM sfa_menu 
    WHERE menu_id = '".$_GET["menu_id"]."';
  ";
  mysqli_query($con, $sql);

  echo "
    <script>
      alert('ลบข้อมูลเรียบร้อย');
      window.location = 'index.php?content=list-menu&res_id=".$_GET["res_id"]."&fcl_id=".$_GET["fcl_id"]."';
    </script>
  ";

?>