<?php 
     session_start();
     require '../../php/config.php'; 
     $fcl_id = $_POST["fcl_id"];
     $fcl_startdate = $_POST["fcl_startdate"];
     $fcl_enddate = $_POST["fcl_enddate"];
     $fcl_year = date("Y", strtotime($fcl_startdate));
     
     $sql = "UPDATE `sfa_formalin_checklist` 
     SET `fcl_year` = '$fcl_year', `fcl_startdate` = '$fcl_startdate', `fcl_enddate` = '$fcl_enddate' 
     WHERE fcl_id = $fcl_id;
     "; 
     $query = mysqli_query($con, $sql);

     echo "<script>
     alert('แก้ไขรอบสำเร็จ');
     window.location.href='../?content=list-formalin-checklist';
     </script>
     ";
?>