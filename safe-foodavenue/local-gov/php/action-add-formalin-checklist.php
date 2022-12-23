<?php
     session_start();
     require '../../php/config.php';
     $fcl_startdate = $_POST["fcl_startdate"];
     $fcl_enddate = $_POST["fcl_enddate"];
     $fcl_local_id = $_SESSION["us_id"];
     $fcl_gov_id = $_SESSION["us_gov_id"];
     
     $sql ="INSERT INTO `sfa_formalin_checklist`(`fcl_startdate`, `fcl_enddate`, `fcl_local_id`, `fcl_gov_id`) VALUES ('$fcl_startdate', '$fcl_enddate', $fcl_local_id, $fcl_gov_id)";
     $query = mysqli_query($con, $sql);

     echo "<script>
     alert('เพิ่มรอบสำเร็จ');
     window.location.href='../?content=list-formalin-checklist';
     </script>
     ";
?>