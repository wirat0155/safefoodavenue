<?php 
     require '../../php/config.php'; 
    //  $bid = $_POST["block_id"]; 
     $local_id = $_POST["id_user"];
     $startdate = $_POST["fcl_startdate"];
     $enddate = $_POST["fcl_enddate"];
     
     $sql = "INSERT INTO `sfa_formalin_checklist`(`fcl_startdate`, `fcl_enddate`, `local_id`) VALUES ('$startdate','$enddate','$local_id')"; 
     $query = mysqli_query($con, $sql);

     echo "<script>
     alert('เพิ่มรอบสำเร็จ');
     window.location.href='../?content=list-res-schedule';
     </script>
     ";
?>