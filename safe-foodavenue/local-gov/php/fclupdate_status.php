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
//session_start();

require("../../php/config.php");
$fcl_id = $_GET["fcl_id"];
$fcl_status = $_GET["fcl_status"];
$fcl_enddate = $_GET["fcl_end_date"];

$sql = "UPDATE `sfa_formalin_checklist` SET `fcl_enddate`= '$fcl_enddate', `fcl_status`= '$fcl_status' WHERE fcl_id =  '$fcl_id';";
$query = mysqli_query($con, $sql);
if($query){
  ?> 
    <script> 
      alert("ดำเนินการเปลี่ยนสภานะเสร็จสมบูรณ์");
      window.location.href = '../?content=list-formalin-checklist';
    </script>
  <?php 
}
else{
    ?> 
      <script> 
        alert("ไม่สามารถปิดการตรวจได้");
        window.location.href = '../?content=list-formalin-checklist';
      </script>
    <?php 
  
}
  
?>