<?php 
     session_start();
     require '../../php/config.php'; 
     $fcl_id = $_SESSION["fcl_id"];
     $fcl_startdate = $_POST["fcl_startdate"];
     $fcl_enddate = $_POST["fcl_enddate"];
     
     $sql = "UPDATE `sfa_formalin_checklist` SET `fcl_startdate` = '$startdate', `fcl_enddate` = '$enddate' WHERE fcl_id = $fcl_id;
     "; 
     $query = mysqli_query($con, $sql);

     echo "<script>
     alert('แก้ไขรอบสำเร็จ');
     window.location.href='../?content=list-formalin-checklist';
     </script>
     ";
?>