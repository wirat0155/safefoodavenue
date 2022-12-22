<!-- 
/*
* do_add-menu
* do_add-menu
* @input -
* @output -
* @author Jutamas Thaptong 62160079
* @Create Date 2565-06-20
*/ 
-->

<?php 

  session_start();
  require("../php/config.php"); 

  foreach($_POST["menu_name"] as $key => $menu_name){
    
    $sql = "
      INSERT INTO sfa_menu (res_id, menu_name, menu_price) 
      VALUES (
        '".$_POST["res_id"]."',
        '".$menu_name."',
        '0'
      )
    ";

    // echo "<pre>";
    // print_r($sql);
    // echo "</pre>";
    mysqli_query($con, $sql);

  }

  echo "
    <script>
      alert('เพิ่มข้อมูลเรียบร้อย');
      window.location = 'index.php?content=list-menu&res_id=".$_POST["res_id"]."&fcl_id=".$_POST["fcl_id"]."';
    </script>
  ";

?>